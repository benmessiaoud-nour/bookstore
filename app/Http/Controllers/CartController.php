<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;


class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

public function addToCart(Request $request){
        $book = Book::find($request->id);
        if(auth()->user()->booksInCart->contains($book)) {
            $newQuantity = $request->quantity + auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->nbr_of_copies;
            if ($newQuantity > $book->nbr_of_copies) {

                session()->flash('warning_message', 'This Quantity Not Available. ' . ($book->nbr_of_copies - auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->nbr_of_copies) . ' books remaining');
                return redirect()->back();


            } else {
                auth()->user()->booksInCart()->updateExistingPivot($book->id, ['nbr_of_copies' => $newQuantity]);
            }
        } else{
                auth()->user()->booksInCart()->attach($request->id, ['nbr_of_copies' => $request->quantity]);
            }


        $num_product =auth()->user()->booksInCart()->count();
        return response()->json(['num_product' => $num_product]);

        }

        public function viewCart(){
        $items = auth()->user()->booksInCart;
        return view('cart',compact('items'));
        }


        public function removeOne(Book $book){
        $oldQuantity= auth()->user()->booksInCart()->where('book_id',$book->id)->first()->pivot->nbr_of_copies;

        if($oldQuantity>1){
            auth()->user()->booksInCart()->updateExistingPivot($book->id,['nbr_of_copies' => -- $oldQuantity]);

        }else{
            auth()->user()->booksInCart()->detach($book->id);
        }
        return redirect()->back();
        }

        public function removeAll(Book $book){
        auth()->user()->booksInCart()->detach($book->id);
        return redirect()->back();
        }

}
