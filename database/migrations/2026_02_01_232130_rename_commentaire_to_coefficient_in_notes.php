<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Ne pas oublier cet import !

return new class extends Migration
{
    public function up(): void
    {
        // ÉTAPE 1 : Nettoyage des anciennes données texte
        // On remplace tous les textes par '1' pour que SQL accepte la conversion en chiffre
        DB::table('notes')->update(['coefficient' => '1']);

        // ÉTAPE 2 : On change le type de la colonne
        Schema::table('notes', function (Blueprint $table) {
            $table->integer('coefficient')->default(1)->change();
        });
    }

    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->text('coefficient')->nullable()->change();
        });
    }
};