<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'description',
        'photo',
        'active',
        'type_id',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function medicine() {
        return $this->hasMany(Medicine::class, 'service_id', 'id');
    }
    public function schedule() {
        return $this->hasMany(Schedule::class, 'service_id', 'id');
    }
}
