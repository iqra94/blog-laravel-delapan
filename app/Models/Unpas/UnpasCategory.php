<?php

namespace App\Models\Unpas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnpasCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function posts(){
        return $this->hasMany(UnpasPost::class);
    }
}
