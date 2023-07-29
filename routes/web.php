<?php

use App\Models\State;
use App\Models\JobSeekerProfile;
use App\Models\JobSeekerExperience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AllJobController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AllSkillController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\User\JobController;
use App\Http\Controllers\AllQualificationController;
use App\Http\Controllers\JobSeekerProfileController;
use App\Http\Controllers\JobSeekerExperienceController;
use App\Http\Controllers\JobSeekerAppliedJobsController;
use App\Http\Controllers\User\CompanyController as UserCompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// })->name("home");

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/job-list", [HomeController::class, "job_list"])->name("job_list");
Route::post("/auto-job-list", [HomeController::class, "auto_job_list"])->name("auto_job_list");

Route::group(["prefix" => "job", "as" => "job."], function () {
   // Route::get("{id}/details", [JobController::class, "details"])->name("details");
    Route::get("{id}/job-details", [JobController::class, "job_details"])->name("job_details");
    Route::get("category/{id}", [JobController::class, "category_wise_job_details"])->name("category_wise_job_details");
});

Route::get("company/{id}/details", [UserCompanyController::class, "details"])->name("company.details");


Route::get('/home', function () {
    return view('home');
});

Route::get("/master", function() {
    return view("layouts.master");
});

Route::get("/account-type", function() {
    return view("auth.pre-register");
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Jobseeker Routes

Route::get("/profile", [JobSeekerProfileController::class, "index"])->name("jobseeker.profile");

Route::get("/profile/edit/basic-info", [JobSeekerProfileController::class, "editBasicInfo"])->name("jobseeker.profile.edit.basic-info");
Route::post("/profile/update/basic-info", [JobSeekerProfileController::class, "updateBasicInfo"])->name("jobseeker.profile.update.basic-info");

Route::get("/profile/edit/academics", [JobSeekerProfileController::class, "editAcademics"])->name("jobseeker.profile.edit.academics");
Route::post("/profile/edit/academics", [JobSeekerProfileController::class, "updateAcademics"])->name("jobseeker.profile.update.academics");

Route::post("/profile/delete/academics", [JobSeekerProfileController::class, "deleteAcademics"])->name("jobseeker.profile.delete.academics");

Route::get("/profile/edit/experience", [JobSeekerExperienceController::class, "edit"])->name("jobseeker.experience.edit");
Route::post("/profile/edit/experience", [JobSeekerExperienceController::class, "update"])->name("jobseeker.experience.update");
Route::post("/profile/delete/experience", [JobSeekerExperienceController::class, "delete"])->name("jobseeker.experience.delete");

Route::get("jobs/saved-jobs", [AllJobController::class, "savedJobs"])->name("jobseeker.job.saved-jobs");
Route::get("jobs/applied-jobs", [JobSeekerAppliedJobsController::class, "index"])->name("jobseeker.job.applied-jobs");

Route::post("employer-register", [UserController::class, "employerRegister"])->name("employer.register");

Route::get("company/create", [CompanyController::class, "create"])->name("company.create");
Route::post("company/create", [CompanyController::class, "store"])->name("company.create.post");

Route::get("company/profile", [CompanyController::class, "profile"])->name("company.profile");
Route::get("company/edit/{id}", [CompanyController::class, "edit"])->name("company.edit");
Route::post("company/edit/{id}", [CompanyController::class, "update"])->name("company.update");

Route::post("company/{id}/branch/create", [BranchController::class, "store"])->name("branch.create");
Route::post("/branch/update", [BranchController::class, "joinBranch"])->name("branch.join");


Route::get("/all_skills", [AllSkillController::class, "index"])->name("all_skills.index");
Route::get("/all_qualification", [AllQualificationController::class, "index"])->name("all_qualifications.index");


Route::group(["prefix" => "employer/dashboard", "as" => "employer.", "middleware" => ["auth"]], function () {

Route::get("/", [EmployerController::class, "dashboard"])->name("dashboard");
Route::get("my-profile", [EmployerController::class, "myProfile"])->name("my-profile");

Route::get("company", [CompanyController::class, "profile"])->name("company-profile");
Route::get("company/edit", [CompanyController::class, "employerCompanyEdit"])->name("company-profile.edit");
Route::post("company/update/{id}", [CompanyController::class, "update"])->name("company-profile.update");

Route::post("company/logo-upload", [CompanyController::class, "logoUpload"])->name("company-profile.logo-upload");


Route::get("branch", [BranchController::class, "index"])->name("branch.index");
Route::get("branch/{id}/edit", [BranchController::class, "edit"])->name("branch.edit");
Route::post("branch/{id}/update", [BranchController::class, "update"])->name("branch.update");

Route::get("/job/company", [AllJobController::class, "companyIndex"])->name("job.company.index");
Route::get("/job/my-job/published", [AllJobController::class, "myIndex"])->name("job.my-job.index");
Route::get("/job/create", [AllJobController::class, "createJob"])->name("job.create");
Route::post("/job/store", [AllJobController::class, "storeJob"])->name("job.store");
Route::post("/job/cstore", [AllJobController::class, "cstoreJob"])->name("job.cstore");
Route::get("/job/my-job/list", [AllJobController::class, "myJobList"])->name("job.my-job.list");
Route::get("/job/{id}/details", [AllJobController::class, "details"])->name("job.details");
Route::get("/job/my-job/draft", [AllJobController::class, "draft"])->name("job.my-job.draft");
Route::get("/job/my-job/draft/list", [AllJobController::class, "draftList"])->name("job.my-job.draft.list");
Route::get("/job/{id}/edit", [AllJobController::class, "jobEdit"])->name("job.edit");
Route::post("/job/{id}/update", [AllJobController::class, "jobUpdate"])->name("job.update");


});





// Jobseeker Routes

// Admin Routes
Route::get("/admin-panel", function(){
    return view("admin.index");
});

Route::get("/employer-admin", function() {
    return view("employer.dashboard");
});

// Admin Routes


Route::get("/insert-states", function() {
    State::insert([
        ["name" => "Andaman and Nicobar Islands"],
        ["name" => "Chandigarh"],
        ["name" => "Dadra and Nagar Haveli and Daman & Diu"],
        ["name" => "Delhi"],
        ["name" => "Jammu & Kashmir"],
        ["name" => "Ladakh"],
        ["name" => "Lakshadweep"],
        ["name" => "Puducherry"],
        ["name" => "Andhra Pradesh"],
        ["name" => "Arunachal Pradesh"],
        ["name" => "Assam"],
        ["name" => "Bihar"],
        ["name" => "Chhattisgarh"],
        ["name" => "Goa"],
        ["name" => "Gujarat"],
        ["name" => "Haryana"],
        ["name" => "Himachal Pradesh"],
        ["name" => "Jharkhand"],
        ["name" => "Karnatak"],
        ["name" => "Kerala"],
        ["name" => "Madhay Pradesh"],
        ["name" => "Maharashtra"],
        ["name" => "Mainpur"],
        ["name" => "Meghalaya"],
        ["name" => "Mizoram"],
        ["name" => "Nagaland"],
        ["name" => "Odisha"],
        ["name" => "Punjab"],
        ["name" => "Rajasthan"],
        ["name" => "Sikkim"],
        ["name" => "Tamil Nadu"],
        ["name" => "Telengana"],
        ["name" => "Tripura"],
        ["name" => "Uttarakhand"],
        ["name" => "Uttar Pradesh"],
        ["name" => "West Bengal"],
    ]);
});
