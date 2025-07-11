<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Spécifie le nom de la table si Laravel ne peut pas le deviner (Role -> roles, ici c'est bon, mais explicite c'est mieux)
    protected $table = 'roles';

    // Champs qui peuvent être assignés massivement (mass assignable)
    protected $fillable = [
        'nom', // Basé sur nom dans votre migration create_roles_table
    ];

    /**
     * Un rôle peut avoir plusieurs utilisateurs.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Un rôle a plusieurs permissions (relation many-to-many via role_permissions).
     */
    public function permissions()
    {
        // belongsToMany(RelatedModel, pivotTable, foreignKeyOfThisModelOnPivot, foreignKeyOfRelatedModelOnPivot)
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }
}