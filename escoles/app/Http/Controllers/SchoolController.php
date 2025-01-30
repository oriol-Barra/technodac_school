<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Validation\Rule;



class SchoolController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $schools = School::paginate(1);
        return view('schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        return view('schools.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //validar les dades provinents del formulari
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=200,min_height=200',
            'email' => 'nullable|email|unique:schools,email',
            'telefono' => 'nullable|string|max:15',
            'website' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public'); // Desar a public/logos
            $validated['logo'] = $logoPath; // Assignar la ruta de la imatge al model
        }
        //creem l'escola amb les dades validades del formulari
        School::create($validated);

        //tornem a la llista d'escoles
        return redirect()->route('schools.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school){
        //
        return view('schools.show', compact('school'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
        return view('schools.edit', compact('school'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school){

         // Validació de dades
         $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=200,min_height=200',
            'email' => ['nullable', 'email', Rule::unique('schools')->ignore($school->id)],
            'telefono' => 'nullable|string|max:15',
            'website' => 'nullable|url',
        ]);

        // Si es carrega una nova imatge, guardar-la
        if ($request->hasFile('logo')) {
            // Eliminar la imatge anterior si n'hi ha
            if ($school->logo) {
                Storage::delete('public/' . $school->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $logoPath;
        }

        // Actualitzar els detalls de l'escola
        $school->update($validated);

        // Redirigir a la llista d'escoles
        return redirect()->route('schools.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school){

        $school->delete();
        return redirect()->route('schools.index');    
    }
}
