<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'rut',
        'password',
        'roles_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)//Eloquent password hashing
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function publication() {
        return $this->hasMany(Publication::class, 'user_id', 'id');
    }
    public function comment() {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
    public function favourite() {
        return $this->hasMany(Favourite::class, 'user_id', 'id');
    }
    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function service() {
        return $this->hasMany(Service::class, 'user_id', 'id');
    }
}
