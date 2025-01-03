<?php

namespace App\Http\Controllers;

use App\Models\ModelLivro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $livros = ModelLivro::all();
        //dd($livros);
        return view('livro.index', compact('livros'));

    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         ModelLivro::create($request->all());
         return redirect()->route('livros.index')->with('success','Post Criado');
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
        $livros = ModelLivro::findOrFail($id);
        $livros->delete();
        return redirect()->route('livros.index')->with('success','Post Deletado');
    }
}
