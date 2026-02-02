<?php
namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }
    public function create(){
        $filieres = Filiere::all();
        return view('etudiants.create', compact('filieres'));
    }
    public function store(Request $request ){
        // Verifie si les champs ne sont pas vides
        $validateData = $request->validate([
            'nom'=>"required",
            'prenom'=>"required",
            'mail'=>"required",
            'telephone'=>"required",
            'filiere_id'=>"required"
        ]);
        // Ici on met le nom du model et nom du method
        Etudiant::create($validateData);
        return redirect()->route('etudiant.index')->with('success', 'Etudiant enregistrer avec succès');
    }
    // Methode pour afficher le formulaire de modification
    public function edit($id){
        $etudiant = Etudiant::findOrFail($id);
        $filieres = Filiere::all();
        return view('etudiants.edit', compact('etudiant', 'filieres'));
    }
    // Cette methode verifie si les champs ne sont pas vide et enregistre les modifications
    public function update(Request $request, $id){
        $request->validate([
            'nom'=>"required",
            'prenom'=>"required",
            'mail'=>"required",
            'telephone'=>"required",
            'filiere_id'=>"required"
        ]);
        $etudiant = Etudiant::find($id);
        $etudiant->update($request->all());
        return redirect()->route('etudiant.index')->with('success', 'Vos informations ont été mis à jour avec succès');
    }
    // Methode pour supprimer
    public function destroy($id){
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect()->route('etudiant.index')->with('success', 'Etudiant supprimer avec succès');
    }
}
