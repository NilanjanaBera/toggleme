@extends('layouts.master')

@section('content')
    <!-- banner -->
    <div class="banner-2">
        <div class="container">
            <div class="row justify-content-center align-itens-center">
                <div class="col-lg-8">
                    <div class="banner-inner-2 text-center">
                        <h1 class="">My Profile</h1>
                        <div class="banner-links">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="#">/</a>
                            <a href="#">My Profile</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end banner -->

    @if(Auth()->user()->type == "jobseeker")
    <div class="profile py-3 py-lg-5">
        <div class="max-width">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11 mb-lg-5 mb-3 p-lg-3 ">
                        <div class="profile-one shadow">
                            <div class="row  align-items-center">
                                <div class="col-lg-2 d-flex">
                                    <div class="profile-img">
                                        @if($user->profile && $user->profile->profile_image)
                                        <img src="{{$user->profile->profile_image}}" alt="image">
                                        @else
                                        <img src="{{asset("assets/img/user-default.png")}}" alt="image">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 px-lg-0 ">
                                    <div class="basic-info px-3 p-lg-0 pb-4">
                                        <h4 class="mb-0">{{ $user->first_name . ' ' . $user->last_name }}</h4>
                                        <span>{{ $experience }}</span><br>
                                        <a href="{{route("jobseeker.profile.edit.basic-info")}}">Edit Profile</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="download-resume text-lg-end text-start p-4">
                                        @if(count($user->resumes))
                                        <a href="Resume" download>
                                            <button class="btn btn-cv">Resume <i class="fa fa-file"></i></button>
                                        </a>
                                        @else
                                        <div class="not-available">
                                            Resume Not Available
                                        </div>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 mb-3">
                        <div class="profile-2 shadow p-4">
                            <h4>Candidates About</h4>
                            <p class="about-text">
                                @if ($user->profile)
                                    @if ($user->profile->about)
                                        {{ $user->profile->about }}
                                    @else
                                        <div class="not-available"> Not Available </div>
                                    @endif
                                @else
                                    <div class="not-available"> Not Available </div>
                                @endif
                            </p>

                            <h4>Education</h4>
                            {{-- <div class="education-info d-flex">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p class="px-2">Higher Secondary Education : <strong>Carmel School</strong> </p>
                            </div>
                            <div class="education-info d-flex">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p class="px-2">Graduate : <strong>M.M.M.C</strong> </p>
                            </div> --}}

                            @if (count($user->academics))
                                @if ($user->academics)
                                    {{ $user->academics }}
                                @else
                                    <div class="not-available"> Not Available </div>
                                @endif
                            @else
                                <div class="not-available"> Not Available </div>
                            @endif

                            <h4 class="mt-4">Skills</h4>
                            {{-- <ul>
                              <li>Leadership experience.</li>
                              <li>Computer proficiency.</li>
                          </ul> --}}
                            @if (count($user->skills))
                                @if ($user->skills)
                                    {{ $user->skills }}
                                @else
                                    <div class="not-available"> Not Available </div>
                                @endif
                            @else
                                <div class="not-available"> Not Available </div>
                            @endif
                            

                            {{-- <h4>Language Known</h4>
                            <ul>
                                <li>HTML , CSS, Bootstrap , java </li>
                            </ul> --}}

                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="profile-3 shadow p-4 mb-4">
                            <h4>Basic Information</h4>
                            <hr>

                            <div class="info">
                                <p class="mb-0"><strong>Age :</strong> 
                                  @if($user->profile && $user->profile->dob)
                                  {{$user->profile->dob}}
                                  
                                  @else
                                  <span class="not-available"> Not Available </span>
                                  @endif
                                </p>
                                {{-- <p class="mb-0"><strong>job Experience :</strong> 3 Yrs</p> --}}
                                <p class="mb-0">
                                    <strong>Gender :</strong>
                                    @if($user->profile && $user->profile->gender)
                                    {{$user->profile->gender}}
                                    
                                    @else
                                    <span class="not-available"> Not Available </span>
                                    @endif
                                </p>
                                {{-- <p class="mb-0"><strong>Expected Salary :</strong> 5k</p> --}}
                                <p class="mb-0"><strong>Location :</strong> 
                                    @if($user->profile && $user->profile->city)
                                    {{$user->profile->city}}
                                    
                                    @else
                                    <span class="not-available"> Not Available </span>
                                    @endif
                                </p>
                                <p class="mb-0"><strong>Language know :</strong> 
                                @if (count($user->languages))
                                    
                                @else
                                    <span class="not-available"> Not Available</span>
                                @endif
                                </p>
                                {{-- <p class="mb-0"><strong>Gender :</strong> Female</p> --}}
                            </div>
                        </div>

                        <!-- <div class="profile-4 shadow p-4">
                                  <h4>Save Jobs</h4>
                                  <hr>
                                  <div class="save-jobs d-flex">
                                    <div class="save-image">
                                      <img src="img/25.png" alt="logo">
                                    </div>
                                    <div class="save-text px-3">
                                      <h5 class="mb-0">Graphic Designer</h5>
                                      <p>Tata Consultancy Services</p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="save-jobs d-flex">
                                    <div class="save-image">
                                      <img src="img/25.png" alt="logo">
                                    </div>
                                    <div class="save-text px-3">
                                      <h5 class="mb-0">Graphic Designer</h5>
                                      <p>Tata Consultancy Services</p>
                                    </div>
                                  </div>
                                </div>  -->

                        <div class="profile-5">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(Auth()->user()->type == "employer")
    <div class="profile py-3 py-lg-5">
        <div class="max-width">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11 mb-lg-5 mb-3 p-lg-3 ">
                        <div class="profile-one shadow">
                            <div class="row  align-items-center">
                                <div class="col-lg-2 d-flex">
                                    <div class="profile-img">
                                        @if($user->profile && $user->profile->profile_image)
                                        <img src="{{$user->profile->profile_image}}" alt="image">
                                        @else
                                        <img src="{{asset("assets/img/user-default.png")}}" alt="image">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 px-lg-0 ">
                                    <div class="basic-info px-3 p-lg-0 pb-4">
                                        <h4 class="mb-0">{{ $user->first_name . ' ' . $user->last_name }}</h4>
                                        <span> Employer </span><br>
                                        <a href="{{route("jobseeker.profile.edit.basic-info")}}">Edit Profile</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="download-resume text-lg-end text-start p-4">
                                        @if(count($user->ownedCompanies))
                                        {{-- <a href="Resume" download>
                                            <button class="btn btn-cv">Resume <i class="fa fa-file"></i></button>
                                        </a> --}}
                                        @else
                                        <div class="not-available">
                                            You are not associated with any company.
                                        </div>
                                        <div style="display: flex; width: 100%; justify-content: space-between; margin-top: 26px">
                                            <a href="{{route("company.create")}}" class="btn btn-cv" style="font-size: 12px">Create a Company</a>
                                            <a class="btn btn-secondary" style="font-size: 12px">Join a Company</a>

                                        </div>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
