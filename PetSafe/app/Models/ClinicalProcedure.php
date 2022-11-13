<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalProcedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'benefit_id',
    ];
}
