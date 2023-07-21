<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientTicket extends Model
{
    use HasFactory;
    protected $table = 'ticket_client';

    protected $fillable = [
      'titre',
      'niveauUrgence',
      'id_client',
      'idSite',
      'contenuTicket',
      'Etat',
    ];

    public function client()
    {
        return $this->belongsTo(client::class,'id_client');
    }

    public function siteClient()
    {
        return $this->belongsTo(site_client::class,'idSite');
    }

    public function ticketReplays()
    {
        return $this->hasMany(ticketReplay::class,'idTicket','id');
    }
}
