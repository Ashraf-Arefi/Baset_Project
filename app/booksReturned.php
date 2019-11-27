<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class booksReturned extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'books_returneds';

    protected $guarded = [];

    public function member(){
        return $this->belongsTo(booksReturned::class, 'memId');
    }
}
