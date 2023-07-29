<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerAppliedJobs extends Model
{
    use HasFactory;

    public function jobDetails()
    {
        return $this->belongsTo(AllJob::class, "all_job_id");
    }
}
