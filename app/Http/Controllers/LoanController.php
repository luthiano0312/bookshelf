<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\School;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::all();
        $books = Book::all();
        $schools = School::all();
        return view("loans.index", compact("loans","books","schools"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();
        $books = Book::all();
        return view("loans.create", compact("schools","books"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = Loan::create($request->all());
        
        if ($created) {
            return redirect()->route("loans.index")->with("success","cadastrado com sucesso");
        }
       
        return redirect()->route("loans.create")->with("error","erro ao cadastrar");
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
        $loan = Loan::findOrFail($id);
        $schools = School::all();
        $books = Book::all();
        return view("loans.edit", compact("loan","schools","books"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $loan = Loan::findOrFail($id);
        $updated = $loan->update($request->all());

        if ($updated) {
            return redirect()->route("loans.index")->with("success","atualizado com sucesso");
        }
        
        return redirect()->route("loans.edit")->with("error","erro ao atualizar");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        return redirect()->route("loans.index");
    }
}
