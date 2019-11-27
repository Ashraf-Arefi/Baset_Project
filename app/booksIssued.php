<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class booksIssued extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'book_issueds';

    protected $guarded = [];

    public function member(){
        return $this->belongsTo(member::class, 'memId');
    }
    public function book(){
        return $this->belongsTo(Book::class,'bookId');
    }
}
