<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use HasFactory;
    use SoftDeletes;

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
