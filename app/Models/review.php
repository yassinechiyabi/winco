<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $table="review";
    protected $primaryKey="id";

    protected $fillable = [
        'content',
        'rating',
        'id_client',
    ];

    public function clients() 
    {
        return $this->belongsTo(client::class,'id_client');
    }
}
