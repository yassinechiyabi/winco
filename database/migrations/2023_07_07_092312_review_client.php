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
        Schema::create('review_client',function (Blueprint $table){
            $table->id();
            $table->string('titre_review');
            $table->string('contenu_review');
            $table->integer('nombre_etoile');
            $table->foreignId('id_client')->constrained(
                table: 'client', indexName: 'review_client_constrain'
            );

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
