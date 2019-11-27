<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Book extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'books';

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(booksCategory::class,'catId');
    }

    public function issues(){
        return $this->hasMany(booksIssued::class, 'bookId');
    }

}
