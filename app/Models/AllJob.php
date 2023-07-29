<?php

namespace App\Models;

use App\Models\JobSkill;
use App\Models\JobQualification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AllJob extends Model
{
    use HasFactory;

    protected $guarded = ["id", "created_at", "updated_at"];

    public function qualifications()
    {
        return $this->hasMany(JobQualification::class);
    }

    public function skills()
    {
        return $this->hasMany(JobSkill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
