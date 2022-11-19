<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'day',
        'startHour',
        'endHour',
        'service_id',
    ];

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
