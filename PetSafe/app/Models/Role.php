<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const is_admin = 1;
    public const is_neighbour = 2;
    public const is_partner = 3;
   


    protected $fillable = [
        'role',
    ];

    public function user() {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

}
