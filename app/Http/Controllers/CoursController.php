<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Filiere;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index(){
        // Récuperer la liste des cours
        $cour = Cours::all();
        return view('cours.index', compact('cour'));
    }
    public function create(){
        $filieres = Filiere::all();
        return view('cours.create', compact('filieres'));
    }
    public function store(Request $request){
        // Verification si les champs ne sont pas vide
        $request->validate([
            'name'=>"required",
            'description'=>"required",
            'filiere_id' =>'required|exists:filieres,id'
            #'filiere_id'
        ]);
        // Ici on met nom du model et de la methode
        Cours::create($request->only(['name', 'description', 'filiere_id']));
        return redirect()->route('cours.index')->with('success', 'Cours créer avec succès');
    }
    // Formulaire de modification
    public function edit($id){
        $cour = Cours::find($id);
        $filieres = Filiere::all();
        return view('cours.edit', compact('cour', 'filieres'));
    }
    // Enregistrement de la modification
    public function update(Request $request,$id){
        $request->validate([
            "name"=>'required',
            "name"=>'required',
            "filiere_id"=>"required|exists:filieres,id"
        ]);
        $cour = Cours::find($id);
        $cour->update($request->all());
        return redirect()->route('cours.index')->with('success', 'Cours modiifer avec succès');
    }
    public function destroy($id){
        $cour = Cours::find($id);
        $cour->delete();
        return redirect()->route('cours.index')->with('success', 'Cours supprimer avec succès');
    }
}

