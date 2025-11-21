<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();
        return view("categories.create", compact("schools"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();

        $data['school_id'] = auth()->user()->school_id;

        $created = Category::create($data);
        
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
        $category = Category::findOrFail($id);
        $schools = School::all();
        return view("categories.edit", compact("category"), compact("schools"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $data = $request->all();

        $data['school_id'] = auth()->user()->school_id;
        
        $category = Category::findOrFail($id);
        $updated = $category->update($data);

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
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route("categories.index");
    }
}
