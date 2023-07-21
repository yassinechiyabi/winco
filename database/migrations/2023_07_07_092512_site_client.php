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
        Schema::create('site_client',function (Blueprint $table){
            $table->id();
            $table->string('nom_site');
            $table->string('description_site');
            $table->string('domaine_site');
            $table->string('type_site');
            $table->foreignId('id_plan')->constrained(
                table: 'plan_site', indexName: 'plan_site_client_constraint'
            );
            $table->foreignId('id_client')->constrained(
                table: 'client', indexName: 'plan_site_for'
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
