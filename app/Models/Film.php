<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'nom', 'description', 'année_de_sortie', 'duree', 'id_categorie'];

    public function categorie () {
        return $this->hasOne('App\Categories');
    }

}
