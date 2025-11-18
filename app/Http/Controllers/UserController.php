<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\school;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = school::all();
        return view("users.create", compact("schools"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = user::create($request->all());
        
        if ($created) {
            return redirect()->route("users.index")->with("success","cadastrado com sucesso");
        }
       
        return redirect()->route("users.create")->with("error","erro ao cadastrar");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
