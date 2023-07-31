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
        Schema::create('commande', function (Blueprint $table) {
            $table->id();
            $table->string("domaine",250);
            $table->string("nomSite",250);
            $table->string("typeSite",250);
            $table->string('descSite',500);
            $table->foreignId('id_client')->constrained(table:"client",indexName:"commandeClient");
            $table->foreignId('id_plan')->constrained(table:"plan", indexName:"commandePlan");
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
