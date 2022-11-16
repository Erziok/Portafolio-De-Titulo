<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'specie'
    ];
    public function breed() {
        return $this->hasMany(Breed::class, 'specie_id', 'id');
    }
}
