<?php

namespace App\Http\Controllers;

use App\Models\filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    // La liste de toute les filires
    public function index(){
        // Récuperer la liste des filieres
        $filieres = Filiere::all();
        return view('filieres.index', compact('filieres'));
    }

    // Formulaire de creation d'une filiere
    public function create(){
        return view('filieres.create');
    }
    // Enregistrement d'une filiere
    public function store(Request $request){
        //dd($request->all());
        // Verifier si les champs ne sont pas vide
        $validateData = $request->validate([
            'name'=> "required"
        ]);
        filiere::create($validateData);
        return redirect()->route('filiere.index')->with('success', 'Filiere enregistrée avec succès');
    }
    // Formulaire de modification
    public function edit($id){
        $filiere = Filiere::find($id);
        return view('filieres.edit', compact('filiere'));
    }
    // Enregistrement de la modification
    public function update(Request $request,$id){
        $request->validate([
            "name"=>'required'
        ]);
        $filiere = Filiere::find($id);
        $filiere->update($request->all());
        return redirect()->route('filiere.index')->with('success', 'filière modiifer avec succès');
    }
    //Formulaire de suppression
    public function destroy($id){
        $filiere = Filiere::find($id);
        $filiere->delete();
        return redirect()->route('filiere.index')->with('success', 'Filière supprimer avec succès');
    }
}
