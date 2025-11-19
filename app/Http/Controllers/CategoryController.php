<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\school;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        return view("categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = school::all();
        return view("categories.create", compact("schools"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = category::create($request->all());
        
        if ($created) {
            return redirect()->route("categories.index")->with("success","cadastrado com sucesso");
        }
       
        return redirect()->route("categories.create")->with("error","erro ao cadastrar");
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
        $category = category::findOrFail($id);
        $schools = school::all();
        return view("categories.edit", compact("category"), compact("schools"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = category::findOrFail($id);
        $updated = $category->update($request->all());

        if ($updated) {
            return redirect()->route("categories.index")->with("success","atualizado com sucesso");
        }
        
        return redirect()->route("categories.edit")->with("error","erro ao atualizar");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route("categories.index");
    }
}
