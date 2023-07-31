<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;


    protected $table = 'plan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nom_plan',
        'desc_plan',
        'nbr_modification',
        'nbr_page',
        'nbr_post',
        'pack_reseau_sociaux',
        'prix_mensuel_plan',
        'prix_miseEnligne_plan',
        'isActive',
    ];
}
