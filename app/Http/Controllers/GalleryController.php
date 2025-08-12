<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $books = Book::paginate(12);
        $title ='Recommendations Just for You';
        return view('gallery', compact('books', 'title'));
    }

    public function search(Request $request){
        $books = Book::where('title','LIKE' , "%{$request->term}%")->paginate(12);
        $title = 'Results For:'.$request->term;
        return view('gallery', compact('books', 'title'));
    }
}
