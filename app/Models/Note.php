<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'etudiant_id',
        'examen_id',
        'valeur',
        'coefficient',
        'type',
    ];
    public function etudiant(){
        return $this->belongsTo(\App\Models\Etudiant::class);
    }
    public function examen(){
        return $this->belongsTo(\App\Models\Examen::class);
    }
}
