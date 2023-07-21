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
        Schema::create('plan_site',function (Blueprint $table){
            $table->id();
            $table->string('nom_plan');
            $table->string('desc_plan');
            $table->integer('nbr_modification');
            $table->integer('nbr_page');
            $table->integer('nbr_post');
            $table->float('prix_mensuel_plan');
            $table->integer('prix_miseEnLigne_plan');
            $table->boolean('isActive');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_site');
    }
};
