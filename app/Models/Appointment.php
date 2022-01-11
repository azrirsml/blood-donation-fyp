<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['date'];

    public function donationType()
    {
        return $this->belongsTo(DonationType::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
