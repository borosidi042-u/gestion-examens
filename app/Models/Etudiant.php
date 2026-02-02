<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'mail',
        'telephone',
        'filiere_id'
    ];
    // Relation vers filiere
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function cours(){
        return $this->belongsTo(Cours::class, 'filiere_id', 'cours_id')->wherePivot('filiere_id',$this->filiere_id);
    }
    public function moyenneGenerale(){
        // Recupère toutes les notes de l'etudiant dans la variable $notes
        $notes = $this->notes()->witht('examen.cours')->get();
        // Veirifie si l'etudiant à des notes
        if($notes->isEmpty()) return null;
        // Initialisation des totaux( Variable pour accumuler les points et coefficient)
        $totalPoints = 0;
        $totalCoefficient = 0;
        // Boucle de calcul
        foreach($notes as $note){
            $coeff = $note->coefficient * ($note->examen->coefficient ?? 1);
            $totalPoints += $note->valeur * $coeff;
            $totalCoefficient += $coeff;
        }
        return $totalCoefficient > 0 ? round($totalPoints / $totalCoefficient, 2) : 0;
    }
}
