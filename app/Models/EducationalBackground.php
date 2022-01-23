<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function population()
    {
        return $this->belongsTo(Population::class);
    }
}
