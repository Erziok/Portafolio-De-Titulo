<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'description',
        'objectives',
        'materials',
        'benefit_id',
    ];

    public function benefit() {
        return $this->belongsTo(Benefit::class, 'benefit_id');
    }

    public function session() {
        return $this->hasMany(Session::class, 'course_id', 'id');
    }
}
