<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Ne pas oublier cet import !

return new class extends Migration
{
    public function up(): void
{
    Schema::table('notes', function (Blueprint $table) {
        // 1. Si la colonne s'appelait 'commentaire', on la renomme d'abord
        // Si elle s'appelle déjà 'coefficient', cette ligne n'est pas nécessaire
        // $table->renameColumn('commentaire', 'coefficient');
    });

    // 2. On change le type de la colonne en premier pour être sûr qu'elle existe
    Schema::table('notes', function (Blueprint $table) {
        $table->integer('coefficient')->default(1)->change();
    });

    // 3. MAINTENANT que la colonne 'coefficient' existe bien, on fait l'update
    DB::table('notes')->update(['coefficient' => 1]);
}
};