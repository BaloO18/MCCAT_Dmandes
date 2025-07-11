<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'salles';

    // Champs qui peuvent être assignés massivement
    // Ces champs sont basés sur une structure typique d'une table 'salles'.
    // Si votre migration `create_salles_table` a des noms de champs différents ou des champs supplémentaires,
    // veuillez les ajuster ici.
    protected $fillable = [
        'nomSalle',      // Ex: "Salle Conférence A"
        'capacite',      // Ex: 50
        'disponibilite', // Ex: true/false
    ];

    /**
     * Une salle peut être l'objet de plusieurs demandes de salle.
     */
    public function demandeSalles()
    {
        return $this->hasMany(DemandeSalle::class);
    }
}