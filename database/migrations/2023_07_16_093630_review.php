<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->integer('rating');
            $table->foreignId('id_client')->constrained(
                table: 'client', indexName: 'reviews_client'
            );
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
