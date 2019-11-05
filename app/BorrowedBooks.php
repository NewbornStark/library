<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowedBooks extends Model
{
    protected $table = 'borrowed_books';

    public $timestamps = false;
}
