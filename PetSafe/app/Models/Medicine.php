<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'activeSubstance',
        'function',
        'implementation',
        'laboratory',
        'specie',
        'price',
        'discount',
        'benefit_id',
    ];

    public function benefit() {
        return $this->belongsTo(Benefit::class, 'benefit_id');
    }
}
