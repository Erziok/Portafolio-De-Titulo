<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'incidentDate',
        'description',
        'photo',
        'active',
        'user_id',
        'animal_id',
        'category_id',
    ];
}
