<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Student extends Model{
    //
    use HasFactory;

    protected $fillable=[
        'nombre',
        'apellidos',
        'escuela',
        'fecha_nacimiento',
        'ciudad_natal',
    ];


    //relació amb la taula escuelas(schools)
    public function school(){

        return $this->belongsTo(School::class, 'escuela', 'id');
    }
}
