<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\School;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        //trobem les escoles per el seu nom 
        $school1 = School::where('nombre', 'ceip escola 1era')->first();
        $school2 = School::where('nombre', 'ceip escola 2ona')->first();
        $school3 = School::where('nombre', 'ceip escola 3era')->first();
        
        //creació de diversos alumnes per a cada escola
        Student::create([
            'nombre' => 'Oriol',
            'apellidos' => 'Barrachina',
            'escuela' => $school1->id,
            'fecha_nacimiento' => '1990-04-19',
            'ciudad_natal' => 'Granollers',
        ]);
        Student::create([
            'nombre' => 'Andreu',
            'apellidos' => 'Andreuós',
            'escuela' => $school1->id,
            'fecha_nacimiento' => '1993-05-27',
            'ciudad_natal' => 'Terrassa',
        ]);
        Student::create([
            'nombre' => 'Juana',
            'apellidos' => 'Juanola',
            'escuela' => $school2->id,
            'fecha_nacimiento' => '2000-01-01',
            'ciudad_natal' => 'Almeria',
        ]);
        Student::create([
            'nombre' => 'Mariana',
            'apellidos' => 'Marina',
            'escuela' => $school2->id,
            'fecha_nacimiento' => '2007-02-28',
            'ciudad_natal' => 'Alexandria',
        ]);
        Student::create([
            'nombre' => 'Pepitu',
            'apellidos' => 'Pepitillas',
            'escuela' => $school3->id,
            'fecha_nacimiento' => '2010-05-15',
            'ciudad_natal' => 'Napoles',
        ]);
        Student::create([
            'nombre' => 'Júlia',
            'apellidos' => 'julieta',
            'escuela' => $school3->id,
            'fecha_nacimiento' => '1999-12-12',
            'ciudad_natal' => 'Barcelona',
        ]);

    }
}
