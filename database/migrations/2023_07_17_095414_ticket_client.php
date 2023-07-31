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
        Schema::create('ticket_client', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 255);
            $table->integer('niveauUrgence');
            $table->foreignId('id_client')->constrained(table:"client",indexName:"ticketClient");
            $table->foreignId('idSite')->constrained(table:"site_client",indexName:"ticketSite");
            $table->text('contenuTicket');
            $table->integer('Etat');
            $table->timestamps();
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_client');
    }
};
