<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeMateriel extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'demande_materiels';

    // Champs qui peuvent être assignés massivement
    // Basé sur la migration, il semble qu'il n'y ait que 'demande_id' comme champ en plus de l'ID primaire.
    // Si vous avez d'autres champs dans votre migration 'demande_materiels', ajoutez-les ici.
    protected $fillable = [
        'demande_id', // Clé étrangère vers la table demandes
        // 'raison', // Ajoutez ce champ si votre migration create_demande_materiels_table l'inclut
    ];

    /**
     * Une demande de matériel appartient à une demande générale.
     */
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    /**
     * Une demande de matériel peut contenir plusieurs éléments de matériel spécifiques.
     */
    public function itemMateriels()
    {
        return $this->hasMany(ItemMateriel::class);
    }
}