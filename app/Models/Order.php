<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product','status','quantity','total','user_id'];

    public static $status = ['Shipped','Completed','Return','Pedding'];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function scopeSearch(Builder $query,string $id){
            return $query->where('id','LIKE','%'. $id . '%');
    }
    public function scopeOwnOrders(Builder $query,string $user_id){
            return $query->where('user_id',$user_id);
    }
}
