<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Breed extends Model
{
    use HasFactory;
    use SoftDeletes;
    
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
