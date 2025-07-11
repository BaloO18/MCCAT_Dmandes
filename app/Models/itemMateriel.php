<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMateriel extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'item_materiels';

    // Champs qui peuvent être assignés massivement
    // Ces champs sont basés sur votre migration `create_item_materiels_table`.
    protected $fillable = [
        'demande_materiel_id', // Clé étrangère vers la table demande_materiels
        'materiel_id',         // Clé étrangère vers la table materiels
        'quantiteDemande',     // La quantité de ce matériel spécifique demandé
    ];

    /**
     * Un élément de matériel appartient à une demande de matériel spécifique.
     */
    public function demandeMateriel()
    {
        return $this->belongsTo(DemandeMateriel::class);
    }

    /**
     * Un élément de matériel fait référence à un matériel spécifique.
     */
    public function materiel()
    {
        return $this->belongsTo(Materiel::class);
    }
}