<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    
    protected $fillable = ['course','instituition','level','start_date','end_date'];

    public function people(){
        return $this->belongsTo(People::class);
    }
}
