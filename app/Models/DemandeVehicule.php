<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeVehicule extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'demande_vehicules';

    // Champs qui peuvent être assignés massivement
    protected $fillable = [
        'demande_id',   // Clé étrangère vers la table demandes
        'nbrePlace',    // Basé sur +nbrePlace: int dans la migration
        'nbreVehicule', // Basé sur +nbreVehicule: int dans la migration
        'dateDepart',   // Basé sur +dateDepart: datetime dans la migration
        'raison',       // Basé sur raison: string dans la migration
    ];

    /**
     * Une demande de véhicule appartient à une demande.
     */
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    /**
     * Une demande de véhicule peut avoir plusieurs chauffeurs (relation many-to-many).
     */
    public function chauffeurs()
    {
        // belongsToMany(RelatedModel, pivotTable, foreignKeyOfThisModelOnPivot, foreignKeyOfRelatedModelOnPivot)
        return $this->belongsToMany(Chauffeur::class, 'chauffeur_demande_vehicules', 'demande_vehicule_id', 'chauffeur_id');
    }
}