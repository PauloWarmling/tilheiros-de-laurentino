<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

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
            'number' => 'required|integer',
        ]);
    
        $pessoa = new Pessoa();
    
        // Set other attributes
        $pessoa->name = $request->input('name');
        $pessoa->email = $request->input('email');
        $pessoa->age = $request->input('age');
        $pessoa->number = $request->input('number');
        $pessoa->save();
        return redirect()->route('pessoa.index')
            ->with('success', 'Pessoa created successfully.');
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
        'name' => 'required|max:20',
        'email' => 'required|email',
        'age' => 'required|integer',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $pessoa = Pessoa::find($id);
    
    // Check if a photo was uploaded
    if ($request->hasFile('photo')) {
        // Get the file from the request
        $photo = $request->file('photo');
        
        // Generate a unique name for the photo
        $photoName = time() . '_' . $photo->getClientOriginalName();
        
        // Move the photo to the desired directory
        $photo->move(public_path('photos'), $photoName);
        
        // Store the new photo path
        $pessoa->photo = $photoName;
    }
    
    // Update other attributes
    $pessoa->name = $request->input('name');
    $pessoa->email = $request->input('email');
    $pessoa->age = $request->input('age');
    
    // Save the updated person record
    $pessoa->save();

    return redirect()->route('pessoa.index')
        ->with('success', 'Pessoa updated successfully.');
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
