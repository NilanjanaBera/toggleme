<?php

namespace App\Models;

use App\Models\Resume;
use App\Models\Language;
use App\Models\CompanyOwner;
use App\Models\JobSeekerSkill;
use App\Models\JobSeekerProfile;
use App\Models\JobSeekerAcademic;
use App\Models\JobSeekerSavedJob;
use Laravel\Sanctum\HasApiTokens;
use App\Models\JobSeekerExperience;
use App\Models\JobSeekerAppliedJobs;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        "last_name",
        'email',
        "phone",
        'password',
        "type",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
       return $this->hasOne(JobSeekerProfile::class);
    }

    public function academics()
    {
        return $this->hasMany(JobSeekerAcademic::class);
    }

    public function experiences()
    {
        return $this->hasMany(JobSeekerExperience::class);
    }

   

    public function skills()
    {
        return $this->hasMany(JobSeekerSkill::class);
    }

    public function languages()
    {
        return $this->hasMany(Language::class);
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }

    public function savedJobs()
    {
        return $this->hasMany(JobSeekerSavedJob::class);
    }

    public function appliedJobs()
    {
        return $this->hasMany(JobSeekerAppliedJobs::class);
    }

    public function ownedCompanies()
    {
        return $this->hasMany(CompanyOwner::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }
}
