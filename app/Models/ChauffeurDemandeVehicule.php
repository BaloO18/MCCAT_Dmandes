<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChauffeurDemandeVehicule extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'idDemandeVehicule',
        'idChauffeur',
        'idChauffeurDemandeVehicule',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
