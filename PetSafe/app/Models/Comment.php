<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'comment',
        'publication_id',
        'user_id',
        'comment_id'
    ];

    public function publication () {
        return $this->belongsTo(Publication::class, 'publication_id');
    }
    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function child () {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }
}
