<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'detail',
        'description',
        'prix',
        'nprix',
        'quantite',
        'sku',
        'user_id',
        'marque_id',
        'image'
    ];

    public function categories() : BelongsToMany{
        return $this->belongsToMany(Categorie::class);
    }

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function marque() : BelongsTo{
        return $this->belongsTo(Marque::class);
    }
}
