<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Benefit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'active',
        'user_id',
        'benefit_type_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function clinicalProcedure() {
        return $this->hasMany(ClinicalProcedure::class, 'benefit_id', 'id');
    }

    public function course() {
        return $this->hasMany(Course::class, 'benefit_id', 'id');
    }

    public function medicine() {
        return $this->hasMany(Medicine::class, 'benefit_id', 'id');
    }
    public function canineArea() {
        return $this->hasMany(CanineArea::class, 'benefit_id', 'id');
    }
    public function type() {
        return $this->belongsTo(BenefitType::class, 'benefit_type_id');
    }
}
