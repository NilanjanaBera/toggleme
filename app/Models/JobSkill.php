<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];

    public function details()
    {
        return $this->belongsTo(AllSkill::class, "all_skill_id");
    }
}
