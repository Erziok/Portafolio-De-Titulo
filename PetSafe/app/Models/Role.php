<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const is_admin = 1;
    public const is_user = [2, 3];

    protected $fillable = [
        'role',
    ];

    public function user() {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

}
