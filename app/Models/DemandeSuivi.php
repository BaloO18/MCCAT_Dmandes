<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeSuivi extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'demande_suivis';

    // Champs qui peuvent être assignés massivement
    protected $fillable = [
        'demande_id',  // Clé étrangère vers la table demandes
        'dateSuivi',   // Basé sur +dateSuivi: date dans la migration
        'statut',      // Basé sur +statut: string dans la migration
        'commentaire', // Basé sur +commentaire: text dans la migration
    ];

    /**
     * Un suivi de demande appartient à une demande.
     */
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}