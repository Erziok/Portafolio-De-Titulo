<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitType extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
    ];
    public function benefit() {
        return $this->hasMany(Benefit::class, 'benefit_type_id');
    }
}
