<?php

use App\Http\Controllers\CoursController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Models\Examen;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //-- GROUP FILIERES --
    Route::prefix('filiere')->group(function(){
        Route::get('/',[FiliereController::class, 'index'])->name('filiere.index');
        Route::get('/create',[FiliereController::class, 'create'])->name('filiere.create');
        Route::get('/',[FiliereController::class, 'index'])->name('filiere.index');
        Route::post('/store',[FiliereController::class, 'store'])->name('filiere.store');
        Route::get('/edit/{id}',[FiliereController::class, 'edit'])->name('filiere.edit');
        Route::put('/update/{id}',[FiliereController::class, 'update'])->name('filiere.update');
        Route::delete('/delete/{id}',[FiliereController::class, 'destroy'])->name('filiere.destroy');
    });
    // --- GROUP COURS ---
    Route::prefix('cours')->group(function () {
        Route::get('/', [CoursController::class, 'index'])->name('cours.index');
        Route::get('/create', [CoursController::class, 'create'])->name('cours.create');
        Route::post('/store', [CoursController::class, 'store'])->name('cours.store');
        Route::get('/edit/{id}', [CoursController::class, 'edit'])->name('cours.edit');
        Route::put('/update/{id}', [CoursController::class, 'update'])->name('cours.update');
        Route::delete('/delete/{id}', [CoursController::class, 'destroy'])->name('cours.destroy');
    });
    // --- GROUP ETUDIANTS ---
    Route::prefix('etudiant')->group(function () {
        Route::get('/', [EtudiantController::class, 'index'])->name('etudiant.index');
        Route::get('/create', [EtudiantController::class, 'create'])->name('etudiant.create');
        Route::post('/store', [EtudiantController::class, 'store'])->name('etudiant.store');
        Route::get('/edit/{id}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
        Route::put('/update/{id}', [EtudiantController::class, 'update'])->name('etudiant.update');
        Route::delete('/delete/{id}', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');
    });

    // --- GROUP EXAMENS ---
    Route::prefix('examen')->group(function () {
        Route::get('/', [ExamenController::class, 'index'])->name('examen.index');
        Route::get('/create', [ExamenController::class, 'create'])->name('examen.create');
        Route::post('/store', [ExamenController::class, 'store'])->name('examen.store');
        Route::get('/edit/{id}', [ExamenController::class, 'edit'])->name('examen.edit');
        Route::put('/update/{id}', [ExamenController::class, 'update'])->name('examen.update');
        Route::delete('/delete/{id}', [ExamenController::class, 'destroy'])->name('examen.destroy');
    });
    // --- GROUP NOTE ---
    Route::prefix('note')->group(function () {
        Route::get('/', [NoteController::class, 'index'])->name('note.index');
        Route::get('/create', [NoteController::class, 'create'])->name('note.create');
        Route::post('/store', [NoteController::class, 'store'])->name('note.store');
        Route::get('/edit/{id}', [NoteController::class, 'edit'])->name('note.edit');
        Route::put('/update/{id}', [NoteController::class, 'update'])->name('note.update');
        Route::delete('/delete/{id}', [NoteController::class, 'destroy'])->name('note.destroy');
        Route::get('/moyenne',[NoteController::class, 'moyenne'])->name('note.moyenne');
    });
});

require __DIR__.'/auth.php';
