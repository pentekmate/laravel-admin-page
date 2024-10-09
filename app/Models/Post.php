<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['title','content','tags','user_id'];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function scopeSearch(Builder $query,string $title){
        return $query->where('title','LIKE','%' . $title . '%');
    }

    public function scopeOwnPosts(Builder $query,string $user_id){
        return $query->where('user_id',$user_id);
    }
}
