<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\School;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

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
    public function store(StoreBookRequest $request)
    {
        $data = $request->all();

        $data['school_id'] = auth()->user()->school_id;

        $created = Book::create($data);
        
        if ($created) {
            return redirect()->route("books.index")->with("success","cadastrado com sucesso");
        }
       
        return redirect()->route("books.create")->with("error","erro ao cadastrar");
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
    public function update(UpdateBookRequest $request, string $id)
    {
        $data = $request->all();

        $data['school_id'] = auth()->user()->school_id;
        
        $book = Book::findOrFail($id);
        $updated = $book->update($data);

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
