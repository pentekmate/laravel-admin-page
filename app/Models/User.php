<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public static $filters =[
        ''=>'Latest',
        'has_2_FA'=>'Has 2FA',
        'is_Admin'=>'Is Admin'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function orders():HasMany{
        return $this->hasMany(Order::class);
    }
    public function posts():hasMany{
        return $this->hasMany(Post::class);
    }

    public function isAdmin():bool{
        return $this->isAdmin==1;
    }

    public function scopeHas2FA(Builder $query){
        return $query->where('has2FA','=','1');
    }
    public function scopeIsAdmin(Builder $query){
        return $query->where('isAdmin','=','1');
    }

    public function scopeSearch(Builder $query,string $name){
        return $query->where('name','LIKE', '%'. $name. '%');
    }
}
