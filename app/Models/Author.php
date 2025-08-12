<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    function book(){
        return $this->belongsToMany('App\Models\Book','book_author');
    }
}
