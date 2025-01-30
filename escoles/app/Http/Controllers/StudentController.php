<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $students = Student::paginate(1);
        return view('students.index', compact('students'));

    }

     /** 
     *funció que retorna als estudiants en funció de l'escola.
     */
    public function studentsBySchool( School $school){

    // fent servir la relació hasMany retornem els estudiants per escola
    $students = $school->students()->paginate(1); 

    // Retornar la vista amb els estudiants de l'escuela
    return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        $schools = School::all();
       
        //formulari per a la creació de l'usuari
        return view('students.create',compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $validated= $request->validate([
                    'nombre'=>'required|string|max:255',
                    'apellidos'=>'required|string|max:255',
                    'escuela' => 'required|exists:schools,id',  
                    'fecha_nacimiento' => 'required|date',
                    'ciudad_natal' => 'nullable|string|max:255',  // Puede ser nulo
                    ]);
        Student::create($validated);
        return redirect()->route('students.index');        
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student){

        return view('students.show', compact('student'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student){

        $schools = School::all();

        return view('students.edit', compact('student','schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student){

        $validated= $request->validate([
            'nombre'=>'required|string|max:255',
            'apellidos'=>'required|string|max:255',
            'escuela' => 'required|exists:schools,id',  
            'fecha_nacimiento' => 'required|date',
            'ciudad_natal' => 'nullable|string|max:255',  // Puede ser nulo
            ]);

            $student->update($validated);
            return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student){

        $student->delete();
        return redirect()->route('students.index');    
    }
}

