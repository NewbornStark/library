<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowedBooks extends Model
{
    protected $table = 'borrowed_books';

    protected $fillable = ['id_user', 'id_book', 'loan_date', 'return_date', 'status'];

    public $timestamps = false;
}
