<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\school;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

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
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();

        if (!isset($data['school_id']) || empty($data['school_id'])) {
            $data['school_id'] = auth()->user()->school_id;
        }

        $created = user::create($data);
        
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
        $user = user::findOrFail($id);
        $schools = school::all();
        return view("users.edit", compact("user"), compact("schools"));
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

        $user = user::findOrFail($id);
        $updated = $user->update($data);

        if ($updated) {
            return redirect()->route("users.index")->with("success","atualizado com sucesso");
        }
        
        return redirect()->route("users.edit")->with("error","erro ao atualizar");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return redirect()->route("users.index");
    }
}
