@extends("layouts.master")

@section("content")

<div class="banner-3">
    <div class="container">
        <div class="row">
        <div class="row justify-content-center align-itens-center">
            <div class="col-lg-8">
                <div class="banner-inner-2 text-center">
                  <h1 class="">Applied Jobs</h1>
                  <div class="banner-links">
                    <a href="{{url("/")}}">Home</a>
                    <a href="#">/</a>
                    <a href="">Saved Jobs</a>
                  </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="save-candidates py-5">
    <div class="max-width">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 mb-4">
                    <div class="input-area-one d-flex">
                    <i class="fa-solid fa-magnifying-glass pt-2"></i>
                    <input type="text" class="form-control update-input  px-4" placeholder="Search jobs">
                    </div>
                </div>

                <div class="col-lg-2 mb-5 mb-lg-4">
                    <div class="dropdown px-4 ">
                        <select class="form-select btn-dropdowns" aria-label="Default select example">
                            <option selected>Select</option>
                            <option value="1">Newest</option>
                            <option value="2">Oldest</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-8">

                    @if(count($jobs))

                        @foreach ($jobs as $saved_job)
                        <div class=" candidates-inner d-flex align-items-center p-4 shadow mb-3">
                            <div class="candidates-inner-img">
                                <img src="img/g.jpg" alt="">
                            </div>
                            <div class=" col-7 candidates-inner-text px-4">
                                <h4 class="">{{$saved_job->jobDetails->job_name}}</h4>
                                <p class="mb-0"> {{$saved_job->jobDetails->location}} </p>
                            </div>
                            <div class="view-profile">
                                <button class=" btn btn-view-profile"> <a href="profile.php"> View Job Details</a></button>
                            </div>
                            <div class="save-profile text-end">
                                <i class="fa-solid fa-bookmark"></i>
                            </div>
                        </div>
                        @endforeach

                    @else
                    <div class="not-available"> You have not applied for any job yet </div>

                    @endif
                
                    

                    
                    
                    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection