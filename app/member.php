<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class member extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'members';

    protected $guarded = [];

    public function issuedBooks(){
        return $this->hasMany(booksIssued::class, 'memId');
    }

    public function returnBooks(){
        return $this->hasMany(booksReturned::class, 'memId');
    }
}
