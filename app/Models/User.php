<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // Garder si vous utilisez la vérification d'email
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Garder si vous utilisez Sanctum

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Spécifie le nom de la table
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',          // Basé sur votre migration create_users_table
        'prenom',       // Basé sur votre migration create_users_table
        'email',
        'password',
        'role_id',      // Clé étrangère vers la table roles
        'structure_id', // Clé étrangère vers la table structures
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
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 10+ utilise 'hashed'
    ];


    /**
     * Un utilisateur appartient à un rôle.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Un utilisateur appartient à une structure.
     */
    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }

    /**
     * Un utilisateur peut faire plusieurs demandes.
     */
    public function demandes()
    {
        return $this->hasMany(Demande::class, 'user_id'); // Spécifie explicitement la clé étrangère si ce n'est pas user_id
    }
}