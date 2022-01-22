<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
