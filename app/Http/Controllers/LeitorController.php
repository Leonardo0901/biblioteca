<?php

namespace App\Http\Controllers;

use App\Models\Leitor;
use Illuminate\Http\Request;

class LeitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        if ($request != null){
            $filter = $request->search; // Supondo que o filtro está vindo de um formulário, por exemplo.  
            $leitores = Leitor::where(function ($query) use ($filter) {  
                if ($filter) {  
                    $query->where('nome', 'like', '%' . $filter . '%')  
                    ->orWhere('bi', 'like', '%' . $filter . '%')  
                    ->orWhere('contacto', 'like', '%' . $filter . '%')  
                    ->orWhere('endereco', 'like', '%' . $filter . '%')  
                    ->orWhere('cartao', 'like', '%' . $filter . '%');  
                }  
            })->paginate(1);
            return view('leitor.index', compact('leitores'));  
        }
    $leitores = Leitor::all();
    return view('leitor.index', compact('leitores'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Leitor::create($request->all());
        return redirect()->route('leitor.index')->with('success', 'Leitor criado com sucesso!'); 
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
    public function update(Request $request)
    {
        // dd($request);
        $leitor = Leitor::findOrFail($request->id_leitor);
        $leitor->update($request->all());     
        return redirect()->route('leitor.index');; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leitor = Leitor::findOrFail($id);
        $leitor->delete();        
        return redirect()->route('leitor.index')->with('success', 'Leitor Deletado com sucesso!'); 
    }

    public function search(Request $request){
        
        // dd($request);
        if ($request != null){
            $filter = $request->search; // Supondo que o filtro está vindo de um formulário, por exemplo.  
            $leitores = Leitor::where(function ($query) use ($filter) {  
                if ($filter) {  
                    $query->where('nome', 'like', '%' . $filter . '%')  
                    ->orWhere('bi', 'like', '%' . $filter . '%')  
                    ->orWhere('contacto', 'like', '%' . $filter . '%')  
                    ->orWhere('cartao', 'like', '%' . $filter . '%');  
                }  
            })->get();
            return view('leitor.index', compact('leitores'));  
        }
    $leitores = Leitor::all();
    return view('leitor.index', compact('leitores'));  
    }
}
