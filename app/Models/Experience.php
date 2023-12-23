<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected  $fillable = ['office','company','start_date','end_date','description'];

    public function people(){
        return $this->belongsTo(People::class);
    }
}
