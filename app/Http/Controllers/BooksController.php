<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $books = Book::paginate(15);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store()
    {
        request()->validate([
            'author' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'published' => 'required|date|date_format:Y-m-d|before:tomorrow',
        ]);

        $book = Book::create([
            'author' => request('author'),
            'title' => request('title'),
            'description' => request('description'),
            'published' => request('published'),
        ]);

        return redirect()->route('books');
    }
}
