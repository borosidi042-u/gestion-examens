<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $fillable = [
        'titre',
        'date_examen',
        'cours_id'
    ];
    public function cours(){
        return $this->belongsTo(Cours::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
}