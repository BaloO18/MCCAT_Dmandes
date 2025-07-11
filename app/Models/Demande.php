<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'demandes';

    // Champs qui peuvent être assignés massivement
    protected $fillable = [
        'user_id', // Clé étrangère vers la table users
        'date',    // Correspond à +date: date dans le diagramme
        'typeDemande', // Correspond à +typeDemande: string dans le diagramme
        'statut',  // Correspond à +statut: string dans le diagramme
        'raison',  // Correspond à +raison: string dans le diagramme
    ];

    /**
     * Une demande appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Une demande peut avoir plusieurs suivis (historique de statut).
     */
    public function demandeSuivis()
    {
        return $this->hasMany(DemandeSuivi::class);
    }

    /**
     * Une demande peut être une demande de véhicule (relation un à un).
     */
    public function demandeVehicule()
    {
        return $this->hasOne(DemandeVehicule::class);
    }

    /**
     * Une demande peut être une demande de salle (relation un à un).
     */
    public function demandeSalle()
    {
        return $this->hasOne(DemandeSalle::class);
    }

    /**
     * Une demande peut être une demande de matériel (relation un à un).
     */
    public function demandeMateriel()
    {
        return $this->hasOne(DemandeMateriel::class);
    }
}