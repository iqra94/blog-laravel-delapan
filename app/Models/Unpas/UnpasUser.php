<?php

namespace App\Models\Unpas;

use Database\Factories\UnpasUserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UnpasUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected static function newFactory()
    {
        return UnpasUserFactory::new();
    }
    public function unpasPosts(){
        return $this->hasMany(UnpasPost::class);
    }
}
