<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'startDay',
        'endDay',
        'startHour',
        'endHour',
        'service_id',
    ];

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
