<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $fillable = [
        'publication_id',
        'user_id',
    ];
    use HasFactory;
    public function publication() {
        return $this->belongsTo(Publication::class, 'publication_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
