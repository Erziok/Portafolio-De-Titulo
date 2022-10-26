<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'breed',
        'specie_id',
    ];
    
    public function animal() {
        return $this->hasMany(Animal::class, 'breed_id', 'id');
    }

    public function specie() {
        return $this->belongsTo(Specie::class, 'specie_id');
    }

}
