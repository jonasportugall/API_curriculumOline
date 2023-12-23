<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function people(){
        return $this->belongsToMany(People::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }
}
