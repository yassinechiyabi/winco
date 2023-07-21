<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class site_client extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
protected $table = 'site_client';


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';


    public function ticketClients()
    {
        return $this->hasMany(TicketClient::class,'idSite','id');
    }
    
    public function client()
    {
        return $this->belongsTo(client::class,'id_client');
    }

}
