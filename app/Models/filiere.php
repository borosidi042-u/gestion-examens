<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class filiere extends Model
{
    protected $fillable = [
        'name'
    ];
    // Relation vers cours
    public function cours(){
        return $this->hasMany(cours::class);
    }
}
