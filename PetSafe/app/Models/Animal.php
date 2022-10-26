<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'breed_id',
        'gender',
        'name'
    ];

    public function breed() {
        return $this->belongsTo(Breed::class, 'breed_id');
    }    

    public function publication() {
        return $this->hasOne(Publication::class, 'animal_id', 'id');
    }
}
