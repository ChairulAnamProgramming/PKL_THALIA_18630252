<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function population()
    {
        return $this->belongsTo(Population::class);
    }

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class);
    }
}
