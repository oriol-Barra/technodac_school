<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;


class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //injecció de diverses escoles amb un seed:
        School::create([
            'nombre'=>'ceip escola 1era',
            'direccion'=>'carrer major 1',
            //'logo'=>'public/storage/logos/img.png,
            'email'=>'escola1era@hotmail.com',
            'telefono'=>'977123456',
            'website'=>'www.escola1era.cat'
        ]);

        School::create([
            'nombre'=>'ceip escola 2ona',
            'direccion'=>'carrer llarg n3',
            //'logo'=>'public/storage/logos/img.png,
            'email'=>'escola2ona@gmail.com',
            'telefono'=>'977654321',
            'website'=>'www.escola2ona.es'
        ]);

        School::create([
            'nombre'=>'ceip escola 3era',
            'direccion'=>'carrer curt 3',
            //'logo'=>'public/storage/logos/img.png,
            'email'=>'escola3era@hotmail.com',
            'telefono'=>'977456123',
            'website'=>'www.escola3era.com'
        ]);

    }
}
