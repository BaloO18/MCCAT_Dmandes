<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeSalle extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'demande_salles';

    // Champs qui peuvent être assignés massivement
    protected $fillable = [
        'demande_id',   // Clé étrangère vers la table demandes
        'salle_id',     // Clé étrangère vers la table salles
        'nbrePersonne', // Basé sur +ibre Personne int dans la migration
        'dateDebut',    // Basé sur +dateDebut: date dans la migration
        'dateFin',      // Basé sur +dateFin: date dans la migration
        'heureDebut',   // Basé sur +heureDebut time dans la migration
        'heureFin',     // Basé sur +heureFin: time dans la migration
        'raison',       // Basé sur raison: string dans la migration
    ];

    /**
     * Une demande de salle appartient à une demande générale.
     */
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    /**
     * Une demande de salle est pour une salle spécifique.
     */
    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }
}