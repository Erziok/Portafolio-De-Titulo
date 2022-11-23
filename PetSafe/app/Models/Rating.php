<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'value',
        'user_id',
        'service_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
