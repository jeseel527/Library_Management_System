<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Book;  // use book model
use Illuminate\Support\Facades\Validator;
   
class BookController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $books = Book::all();
        return Inertia::render('Books/Index', ['books' => $books]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Books/Create');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'genre' => ['required'],
            'price' => ['required']
        ])->validate();
   
        Book::create($request->all());
    
        return redirect()->route('books.index');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Book $book)
    {
        return Inertia::render('Books/Edit', [
            'book' => $book
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'genre' => ['required'],
            'price' => ['required']
        ])->validate();
    
        Book::find($id)->update($request->all());
        return redirect()->route('books.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->route('books.index');
    }
}