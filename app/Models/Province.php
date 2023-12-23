<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function people(){
        return $this->belongsToMany(People::class);
    }

    public function counties(){
        return $this->hasMany(County::class);
    }
}
