<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = school::all();
        return view("schools.index", compact("schools"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("schools.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = school::create($request->all());
        
        if ($created) {
            return redirect()->route("schools.index")->with("success","cadastrado com sucesso");
        }
       
        return redirect()->route("schools.create")->with("error","erro ao cadastrar");
        // var_dump($request->all()); 
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
        $school = school::findOrFail($id);
        return view("schools.edit", compact("school"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $school = school::findOrFail($id);
        $updated = $school->update($request->all());

        if ($updated) {
            return redirect()->route("schools.index")->with("success","atualizado com sucesso");
        }
        
        return redirect()->route("schools.edit")->with("error","erro ao atualizar");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
