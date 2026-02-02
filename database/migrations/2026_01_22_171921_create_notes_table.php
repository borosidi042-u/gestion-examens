<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table){
            $table->id();
            $table->foreignId('etudiant_id')->constrained()->onDelete('cascade');
            $table->foreignId('examen_id')->constrained()->onDelete('cascade');
            $table->decimal('valeur', 5, 2); // La note (ex: 15.50)
            $table->text('commentaire')->nullable(); // Juste au cas où
            $table->unique(['etudiant_id', 'examen_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
