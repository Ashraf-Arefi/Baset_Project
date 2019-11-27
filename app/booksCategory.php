<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class booksCategory extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'books_categories';

    protected $guarded = [];

    public function books(){
        return $this->hasMany(Book::class, 'catId');
    }
}
