<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['body','user_id','parent_id','commentable_id','commentable_type'];

     public function commentable() {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function parent() {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
