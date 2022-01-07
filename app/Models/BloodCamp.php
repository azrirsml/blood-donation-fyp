<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodCamp extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['date'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    
}
