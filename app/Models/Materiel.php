<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'materiels';

    // Champs qui peuvent être assignés massivement
    // Ces champs sont basés sur une structure typique d'une table 'materiels'.
    // Si votre migration `create_materiels_table` a des noms de champs différents ou des champs supplémentaires,
    // veuillez les ajuster ici.
    protected $fillable = [
        'nomMateriel',     // Ex: "Ordinateur Portable"
        'quantite',        // Ex: 10
        'disponibilite',   // Ex: true/false
        'designation',
    ];

    /**
     * Un matériel peut apparaître dans plusieurs "éléments de matériel" de demandes.
     */
    public function itemMateriels()
    {
        return $this->hasMany(ItemMateriel::class);
    }
}