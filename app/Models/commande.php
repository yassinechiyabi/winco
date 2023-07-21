<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    protected $table = 'commande';

    public function client()
    {
        return $this->belongsTo(client::class,'id_client');
    }
}
