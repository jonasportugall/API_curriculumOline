<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'telephone',
        'address',
        'date_of_birth'];

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function experiences(){
        return $this->hasMany(Experience::class);
    }

    public function formations(){
        return $this->hasMany(Formation::class);
    }

    public function tecnologies(){
        return $this->hasMany(Tecnologie::class);
    }

    public function country(){
        return $this->hasOne(Country::class);
    }

    public function province(){
        return $this->hasOne(Province::class);
    }

    public function curriculum(){
        return $this->hasOne(Curriculum::class);
    }
}
