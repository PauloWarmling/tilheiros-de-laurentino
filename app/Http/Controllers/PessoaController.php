<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoa = Pessoa::all();
        return view('pessoa.index', compact('pessoa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email',
            'age' => 'required|integer',
            'number' => 'required|string',
        ]);
    
        $pessoa = new Pessoa();
    
        $pessoa->name = $request->input('name');
        $pessoa->email = $request->input('email');
        $pessoa->age = $request->input('age');
        $pessoa->number = $request->input('number');
    
        try {
            $pessoa->save();
            return redirect()->route('pessoa.index')
                ->with('success', 'Pessoa created successfully.');
        } catch (\Exception $e) {
            // Delete uploaded photo if save fails
            if (isset($photoPath)) {
                Storage::delete('public/' . $photoPath);
            }
    
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create Pessoa: ' . $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoa.show', compact('pessoa'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email',
            'age' => 'required|integer',
            'number' => 'required|string',
        ]);
    
        try {
            $pessoa = Pessoa::findOrFail($id); // Find the Pessoa by ID
    
            // Update the attributes
            $pessoa->name = $request->input('name');
            $pessoa->email = $request->input('email');
            $pessoa->age = $request->input('age');
            $pessoa->number = $request->input('number');
    
            $pessoa->save(); // Save the updated Pessoa
    
            return redirect()->route('pessoa.index')
                ->with('success', 'Pessoa updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update Pessoa: ' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->delete();
        return redirect()->route('pessoa.index')
        ->with('success', 'pessoa deleted successfully');
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoa.create');
    }

     /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoa.edit', compact('pessoa'));
    }
}
