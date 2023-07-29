<?php

namespace App\Models;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $guarded = ["id", "created_at", "updated_at"];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
