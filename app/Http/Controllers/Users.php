<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::paginate(2);
        return view('modules/users/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules/users/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new User();
        $item->name = $request->name; // Lado izquierdo = Campo de la base de datos | Lado derecho = Campo del formulario
        $item->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = User::find($id);
        return view('modules/users/show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::find($id);
        return view('modules/users/edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = User::find($id);
        $item->name = $request->name;
        $item->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::find($id);
        $item->delete();
        return redirect()->route('index');
    }
}
