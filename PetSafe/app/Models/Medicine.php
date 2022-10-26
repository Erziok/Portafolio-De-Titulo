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
        'service_id',
    ];

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
