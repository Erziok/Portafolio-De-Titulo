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
        'active',
        'image',
        'users_id',
        'animals_id',
        'categories_id',
    ];
}
