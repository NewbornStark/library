<?php

namespace App\Http\Controllers;

use App\Book;
use App\BorrowedBooks;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'published' => 'required|date|date_format:Y-m-d',
        ]);

        $book = Book::create([
            'author' => request('author'),
            'title' => request('title'),
            'description' => request('description'),
            'published' => request('published'),
        ]);

        return redirect()->route('books');
    }

    public function lend($id = null)
    {
        $book = Book::findOrFail($id);

        $now = new DateTime('now', new DateTimeZone('America/Mexico_City'));

        
        request()->validate([
            'return_date' => 'required|date|date_format:"Y-m-d H:i:s"|after:tomorrow'
        ]);

        $borrowedBook = [
            'id_user' => Auth::id(),
            'id_book' => $book->id,
            'loan_date' => $now->format('Y-m-d H:i:s'),
            'return_date' => request('return_date'),
            'status' => 1
        ];

        BorrowedBooks::create($borrowedBook);

        return redirect()->route('books');
    }

    public function borrowed()
    {
        $books = BorrowedBooks::where('status', 1)
            ->orderBy('loan_date')
            ->get();
        return $books;
        return view('books.borrowed', compact('books'));
    }
}
