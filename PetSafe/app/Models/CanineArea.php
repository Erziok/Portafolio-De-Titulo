<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanineArea extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'comment',
        'url',
        'photo',
        'active',
        'benefit_id',
    ];

    public function benefit(){
        return $this->belongsTo(Benefit::class, 'benefit_id');
    }
}
