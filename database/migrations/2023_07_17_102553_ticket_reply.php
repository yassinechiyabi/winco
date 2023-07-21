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
        Schema::create('ticket_replay', function (Blueprint $table) {
            $table->id();
            $table->text('contenu');
            $table->foreignId('id_client')->constrained(table:"client",indexName:"replyClient");
            $table->foreignId('idTicket')->constrained(table:"ticket_client", indexName:"replyTicket");
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
