<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopping extends Model
{
    use HasFactory;
    protected $table ='book_user';

    public function user(){
        return $this->belongsTo('App\Models\user');

    }

    public function book(){
        return $this->belongsTo('App\Models\book');
    }
}
