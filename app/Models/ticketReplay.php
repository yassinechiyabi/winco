<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticketReplay extends Model
{
    use HasFactory;
    protected $table = 'ticket_replay';

    protected $fillable = [
      'contenu',
      'id_client',
      'idTicket',
    ];
  
    public function ticket()
    {
      return $this->belongsTo(clientTicket::class,"idTicket");
    }
  
    public function client()
    {
      return $this->belongsTo(client::class,"id_client");
    }
}
