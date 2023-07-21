<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newslettre extends Model
{
    use HasFactory;

    protected $table = 'newslettre';
    protected $primaryKey = 'id';
    protected $fillable = ['email'];
}
