<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = [
        'name',
        'description',
        'filiere_id'
    ];
    // Relation vers filiere
    public function filiere(){
        return $this->belongTo(filiere::class);

    }
}
