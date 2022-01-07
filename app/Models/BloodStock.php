<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodStock extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

     public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

}
