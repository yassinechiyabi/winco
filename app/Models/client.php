<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
 * The table associated with the model.
 *
 * @var string
 */
    protected $table = 'client';


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomClient',
        'prenomClient',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

 /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function sites(): HasMany
    {
        return $this->hasMany(site_client::class,'id_client','id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(review::class,'id_client','id');
    }

    public function ticketClients(): HasMany
    {
        return $this->hasMany(clientTicket::class,'id_client','id');
    }

    public function ticketReplays(): HasMany
    {
        return $this->hasMany(ticketReplay::class,'id_client','id');
    }

    public function commandes(): HasMany
    {
        return $this->hasMany(commande::class,'id_client','id');
    }
}
