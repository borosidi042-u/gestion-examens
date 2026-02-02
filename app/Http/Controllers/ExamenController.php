<?php
namespace App\Http\Controllers;
use App\Models\Cours;
use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function index(){
        $examens = Examen::all();
        return view('examens.index', compact('examens'));
    }
    public function create(){
        $cours = Cours::all();
        return view('examens.create', compact('cours'));
    }
    public function store(Request $resquest){
        $validateData = $resquest->validate([
            'titre'=>'required',
            'date_examen'=>'required',
            'cours_id'=>'required'
        ]);
        Examen::create($validateData);
        return redirect()->route('examen.index')->with('success', 'Examen créer avec succès');
    }
    // Methode pour afficher le formulaire de modification
    public function edit($id){
        // Verifier si les champs ne sont pas vide
        $examen = Examen::findOrFail($id);
        $cours = Cours::all();
        return view('examens.edit', compact('examen', 'cours'));
    }
    // Methode pour la modification
    public function update(Request $request, $id){
        $request->validate([
            'titre'=>'required',
            'date_examen'=>'required',
            'cours_id'=>'required'
        ]);
        $examen = Examen::findOrFail($id);
        $examen->update($request->only(['titre', 'date_examen', 'cours_id']));
        return redirect()->route('examen.index')->with('success', 'Examen modifier avec succès');
    }
    public function destroy($id){
        $examen = Examen::findOrFail($id);
        $examen->delete();
        return redirect()->route('examen.index')->with('success', 'Examen supprimer avec succès');
    }
}