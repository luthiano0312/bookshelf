<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\School;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $schools = School::all();
        $categories = Category::all();
        return view("books.index", compact("books"), compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();
        $categories = Category::all();
        return view("books.create", compact("schools"), compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = Book::create($request->all());
        
        if ($created) {
            return redirect()->route("books.index")->with("success","cadastrado com sucesso");
        }
       
        return redirect()->route("books.create")->with("error","erro ao cadastrar");
        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $schools = School::all();
        $categories = Category::all();
        return view("books.edit", compact("book","schools","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $updated = $book->update($request->all());

        if ($updated) {
            return redirect()->route("books.index")->with("success","atualizado com sucesso");
        }
        
        return redirect()->route("books.edit")->with("error","erro ao atualizar");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route("books.index");
    }
}
