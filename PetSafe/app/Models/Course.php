<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'description',
        'objectives',
        'materials',
        'active',
        'benefit_id',
    ];

    public function benefit() {
        return $this->belongsTo(Benefit::class, 'benefit_id');
    }

    public function session() {
        return $this->hasMany(Session::class, 'course_id', 'id');
    }
}
