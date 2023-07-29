<?php

namespace App\Models;

use App\Models\AllJob;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobSeekerSavedJob extends Model
{
    use HasFactory;

    protected $guarded = ["id", "created_at", "update_at"];

    public function jobDetails()
    {
        return $this->belongsTo(AllJob::class, "all_job_id");
    }
}
