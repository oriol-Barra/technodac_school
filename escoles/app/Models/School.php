<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class School extends Model{
    //
    use HasFactory;

    protected $fillable=[
        'nombre',
        'direccion',
        'logo',
        'email',
        'telefono',
        'website',
    ];

    //relació amb la taula students(alumnos)
    
    public function students(){

        return $this->hasMany(Student::class,'escuela');
    }

}
