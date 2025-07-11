<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'structures';

    // Champs qui peuvent être assignés massivement
    protected $fillable = [
        'designation', // Basé sur designation dans votre migration create_structures_table
    ];

    /**
     * Une structure peut avoir plusieurs utilisateurs.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}