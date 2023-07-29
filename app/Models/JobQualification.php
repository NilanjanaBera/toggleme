<?php

namespace App\Models;

use App\Models\AllQualification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobQualification extends Model
{
    use HasFactory;

    protected $guarded = ["id", "created_at", "updated_at"];

    public function details()
    {
        return $this->belongsTo(AllQualification::class, "all_qualification_id");
    }
}
