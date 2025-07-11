<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    // Spécifie le nom de la table
    protected $table = 'permissions';

    // Champs qui peuvent être assignés massivement
    protected $fillable = [
        'libelle', // Basé sur libelle dans votre migration create_permissions_table
    ];

    /**
     * Une permission peut être associée à plusieurs rôles (relation many-to-many via role_permissions).
     */
    public function roles()
    {
        // belongsToMany(RelatedModel, pivotTable, foreignKeyOfThisModelOnPivot, foreignKeyOfRelatedModelOnPivot)
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
    }
}