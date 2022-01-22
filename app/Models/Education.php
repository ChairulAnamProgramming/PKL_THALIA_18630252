<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function populations()
    {
        return $this->hasMany(Population::class);
    }

    public function workTrainings()
    {
        return $this->hasMany(WorkTraining::class);
    }
}
