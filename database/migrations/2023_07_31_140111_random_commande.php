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
        Schema::create('random_commande', function (Blueprint $table) {
            $table->id();
            $table->string("nom_complet",250);
            $table->string("nom_site",250);
            $table->string("adresse_email",250);
            $table->string('phone_number',500);
            $table->timestamps();
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
