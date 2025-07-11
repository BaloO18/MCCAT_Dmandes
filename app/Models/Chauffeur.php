<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'chauffeurs';

    // Champs qui peuvent être assignés massivement
    // Ces champs sont basés sur votre diagramme de classe (+nom, +prenom, +contact).
    // Si votre migration `create_chauffeurs_table` a des noms de champs différents,
    // veuillez les ajuster ici.
    protected $fillable = [
        'nom',
        'prenom',
        'contact',
    ];

    /**
     * Un chauffeur peut être associé à plusieurs demandes de véhicule (relation many-to-many).
     */
    public function demandeVehicules()
    {
        // belongsToMany(RelatedModel, pivotTable, foreignKeyOfThisModelOnPivot, foreignKeyOfRelatedModelOnPivot)
        return $this->belongsToMany(DemandeVehicule::class, 'chauffeur_demande_vehicules', 'chauffeur_id', 'demande_vehicule_id');
    }
}