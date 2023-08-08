<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'detail'
    ];

    // public function produits(): HasMany{
    //     return $this->hasMany(Produit::class);
    // }
    
    public function produits() : BelongsToMany {
        return $this->belongsToMany(Produit::class);
    }
}
