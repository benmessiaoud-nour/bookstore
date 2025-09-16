<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Category;
use App\Models\Rating;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;





class BooksController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::all();

        return view('admin.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $authors=Author::all();
       $categories=Category::all();
       $publishers=Publisher::all();
       return view('admin.books.create',compact('authors','categories','publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'title' =>'required',
           'ibsn' => ['required', 'alpha_num', Rule::unique('books', 'ibsn')],
           'cover_image'=>'image|required',
           'authors'=>'nullable',
           'publishers'=>'nullable',
           'categories'=>'nullable',
           'description'=>'nullable',
           'publish_year'=>'numeric|nullable',
           'nbr_of_pages'=>'numeric|required',
           'nbr_of_copies'=>'numeric|required',
           'price'=>'numeric|required'

       ]);

       $book= new Book;

       $book->title= $request->title;
       $book->cover_image = $this->UploadImage($request->file('cover_image'));
       $book->ibsn =$request->ibsn;
       $book->category_id=$request->categories;
       $book->publisher_id = $request->publishers;
       $book->publish_year =$request->publish_year;
       $book->nbr_of_copies= $request->nbr_of_copies;
       $book->nbr_of_pages= $request->nbr_of_pages;
       $book->description= $request->description;
       $book->price= $request->price;

       $book->save();

       $book->author()->attach($request->authors);

       session()->flash('flash_message','Add Seccessfully');

       return redirect(route('books.show',$book));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin/books/show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors=Author::all();
        $categories=Category::all();
        $publishers=Publisher::all();
        return view('admin.books.edit',compact( 'book','authors','categories','publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request,[
            'title' =>'required',
            'cover_image'=>'image',
            'authors'=>'nullable',
            'publishers'=>'nullable',
            'categories'=>'nullable',
            'description'=>'nullable',
            'publish_year'=>'numeric|nullable',
            'nbr_of_pages'=>'numeric|required',
            'nbr_of_copies'=>'numeric|required',
            'price'=>'numeric|required'

        ]);


        $book->title= $request->title;

        if($request->has('cover_image')){
            Storage::disk('public')->delete($book->cover_image);
            $book->cover_image = $this->UploadImage($request->file('cover_image'));
        }

        $book->ibsn =$request->ibsn;
        $book->category_id=$request->categories;
        $book->publisher_id = $request->publishers;
        $book->publish_year =$request->publish_year;
        $book->nbr_of_copies= $request->nbr_of_copies;
        $book->nbr_of_pages= $request->nbr_of_pages;
        $book->description= $request->description;
        $book->price= $request->price;

        if($book->isDirty('ibsn')){
            $this->validate($request,[
                'ibsn' => ['required', 'alpha_num', Rule::unique('books', 'ibsn')],
            ]);
        }

        $book->save();

        $book->author()->detach();
        $book->author()->attach($request->authors);

        session()->flash('flash_message','Updated Seccessfully');

        return redirect(route('books.show',$book));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->cover_image);
        $book->delete();
        session()->flash('flash_message','Deleted Seccessfully');

        return redirect(route('books.index'));
    }


    public function details(Book $book)
    {
        $bookfind=0;
        if(Auth::check()){
            $bookfind=auth()->user()->ratedPurchase()->where('book_id',$book->id)->first();
        }
        return view('books.details', compact('book','bookfind'));
    }

    public function rate(Request $request , Book $book){

        if(auth()->user()->rated($book)){
            $rating = Rating::where(['user_id'=> auth()->user()->id, 'book_id'=>$book->id])->first();
            $rating->value = $request->value;
            $rating->save();
        }else{
            $rating = new Rating;
            $rating->user_id = auth()->user()->id;
            $rating->book_id = $book->id;
            $rating->value = $request->value;
            $rating->save();
        }
             return back();
    }
}
