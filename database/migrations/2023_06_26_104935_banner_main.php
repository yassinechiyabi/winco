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
        Schema::create('Top_banner',function (Blueprint $table){
            $table->id();
            $table->string('bigTitle_banner');
            $table->string('desc_banner');
            $table->string('images_banner');
            $table->boolean('isActive');

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
