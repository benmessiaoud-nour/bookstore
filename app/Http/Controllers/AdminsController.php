<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;


class AdminsController extends Controller
{
public function index(){

    $books_number = Book::count();
    $authors_number= Author::count();
    $publishers_number= Publisher::count();
    $categories_number= Category::count();

    return view('admin.index', compact('books_number', 'authors_number', 'publishers_number', 'categories_number'));

}
}
