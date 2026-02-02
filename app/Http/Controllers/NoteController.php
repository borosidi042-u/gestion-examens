<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Etudiant;
use App\Models\Examen;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
    public function index(){
        $notes =Note::with(['etudiant', 'examen'])->get();
        return view('notes.index', compact('notes'));
    }
    public function create(){
        $etudiants = Etudiant::all();
        $examens = Examen::all();
        return view('notes.create', compact('etudiants','examens'));
    }
    public function store(Request $request){
        // Verifie si les champs ne sont pas vide
        $request->validate([
            'etudiant_id'=>'required|exists:etudiants,id',
            'examen_id'=>[
                'required',
                'exists:examens,id',
                // Cette règle verifie si le couple etudinat_id + examen_id existe déjà
                Rule::unique('notes')->where(function($query) use($request){
                    return $query->where('etudiant_id', $request->etudiant_id);
                }),
            ],
            'note'=>'required|numeric|min:0|max:20', //on valide note venat de formulaire
            'coefficient' => 'required|integer|min:1',
            'type' => 'required|in:CC,Examen', // Validation pour les deux

            ],[
            // Message d'erreur personnalisé
            'examen_id.unique'=> 'Cet etudiant à déjà une note pour cet examen .',
            'note.max'=>'La note ne peut pas dépassé 20.',
            'note.min'=>'La note doit être positive.',
        ]);
        // Création en mappant 'note' vers 'valeur'
        Note::create([
            'etudiant_id'=>$request->etudiant_id,
            'examen_id'=>$request->examen_id,
            'valeur'=>$request->note, // On dit à laravel:prend la donnée 'note' et mets-la dans 'valeur'
            'coefficient'=>$request->coefficient,
            'type'=>$request->type,
        ]);
        return redirect()->route('note.index')->with('success', 'Note enregistrer avec succès ');
    }
    public function moyenne(){
        // On récupère les etudiants avec les notes
        $etudiants = Etudiant::with('notes')->get();
        //On calcule la moyenne de chaque etudiant avant d'envoyer ça à la vue
        $etudiants = $etudiants->map(function ($etudiant) {
            $sommeCoeffs = $etudiant->notes->sum('coefficient');
            $totalPoint = $etudiant->notes->sum(fn($n) => $n->valeur * $n->coefficient);
            // On ajjoute dynamiquement la propriété 'moyenne_calculee ' à l'objet etudiant
            $etudiant->moyenne_calculee = $sommeCoeffs > 0 ? $totalPoint / $sommeCoeffs : 0;
            $etudiant->totalPoint = $totalPoint;
            $etudiant->sommeCoefficient = $sommeCoeffs;
            return $etudiant;
        })->sortByDesc('moyenne_calculee')->values(); // On trie du plus grand au plus petit
        return view('notes.moyenne', compact('etudiants'));
    }
}
