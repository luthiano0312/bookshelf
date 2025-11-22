<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\school;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $librarians = User::FromUserSchool()->get();
        return view("librarians.index", compact("librarians"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = school::all();
        return view("librarians.create", compact("schools"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();

        if (!isset($data['school_id']) || empty($data['school_id'])) {
            $data['school_id'] = auth()->user()->school_id;
        }
        
        $created = User::create($data);
        
        if ($created) {
            return redirect()->route("librarians.index")->with("success","cadastrado com sucesso");
        }
       
        return redirect()->route("librarians.create")->with("error","erro ao cadastrar");
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
        $librarian = User::findOrFail($id);
        $schools = school::all();
        return view("librarians.edit", compact("librarian"), compact("schools"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data = $request->all();

        if (!isset($data['school_id']) || empty($data['school_id'])) {
            $data['school_id'] = auth()->user()->school_id;
        }
        
        $librarian = User::findOrFail($id);
        $updated = $librarian->update($data);

        if ($updated) {
            return redirect()->route("librarians.index")->with("success","atualizado com sucesso");
        }
        
        return redirect()->route("librarians.edit")->with("error","erro ao atualizar");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $librarian = User::findOrFail($id);
        $librarian->delete();
        return redirect()->route("librarians.index");
    }
}
