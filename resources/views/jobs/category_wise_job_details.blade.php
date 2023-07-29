@extends('layouts.master')

@section('content')

    <div class="banner-2">
        <div class="container">
            <div class="row justify-content-center align-itens-center">
                <div class="col-lg-8">
                    <div class="banner-inner-2 text-center">
                        <h1 class="">{{ $cat->category }} - Jobs</h1>
                        <div class="banner-links">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="#">/</a>
                            <a href="">Category wise Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- recomanded-jobs -->
    <div class="recomanded-jobs py-5">
        <div class="max-width">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 recomanded-jobs-sticky">
                        <form action="#">
                            <div class="search2 shadow">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control control" placeholder="Search">
                                            <label for="search">Search job , company name..</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example">
                                                <option selected>Select</option>
                                                <option value="1">Kolkata</option>
                                                <option value="2">Delhi</option>
                                                <option value="3">Howrah</option>
                                                <option value="4">Durgapur</option>
                                                <option value="5">Burdwan</option>
                                            </select>
                                            <label for="floatingSelect">Select location</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-job-ser form-control">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-8">
                        @if (count($select_job))
                            @foreach ($select_job as $job)
                                <a href="{{ route('job.job_details', $job->id) }}">
                                    <div class="recomanded-jobs-inner shadow mb-5">
                                        <div class="row ">
                                            <div class="col-lg-2">
                                                <div class="re-job-img">
                                                    <img src="{{ asset($job->company->logo) }}" alt="icon">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="re-job-text pt-2 px-4">
                                                    <h4>{{ $job->job_designation }}</h4>
                                                    <h6>{{ $job->company->company_name }}</h6>
                                                    <div class="re-jobs-icon d-flex">
                                                        <div class="location-icon d-flex">
                                                            <i class="fa-solid fa-location-dot pt-1"></i>
                                                            <p class="px-2 mb-0">{{ $job->location }}</p>
                                                        </div>
                                                        <div class="location-icon d-flex px-3">
                                                            <i class="fa-solid fa-briefcase pt-1"></i>
                                                            <p class="px-2 mb-0 part-time">{{ $job->job_type }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="keyword py-2">
                                                        <p class="mb-0"> <strong>Keywords :</strong>
                                                            @foreach ($job->skills as $key => $skill)
                                                                @php
                                                                    $count = count($job->skills);

                                                                @endphp
                                                                {{ $skill->details->skill_name }}  @if($key<$count-1),@endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    <div class="job-description">

                                                        <p><strong>Job Description :</strong> {!! substr_replace($job['information'], '...', 10) !!} </p>
                                                    </div>
                                                    <div class="post-time d-flex">
                                                        <i class="fa-regular fa-clock pt-1"></i>
                                                        <p class="px-3 mb-0">5 min ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="re-new-button pt-lg-5 pt-3">
                                                    <!-- <button class="">Apply Now</button> -->

                                                    <button type="button" class="btn btn-apply-job">
                                                        View Details
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="save text-end d-flex">
                                                    <p>Save</p>
                                                    <i class="fa-regular fa-bookmark"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            <div class="slide-button mt-5 d-flex justify-content-center">
                                <div class="left-arow">
                                    <i class="fa-solid fa-arrow-left pt-2"></i>
                                </div>
                                <div class="slide-button-inner px-2">
                                    <input type="text" value="1" class="slide-input">
                                </div>
                                <div class="slide-button-inner px-2">
                                    <input type="text" value="2" class="slide-input">
                                </div>
                                <div class="left-arow">
                                    <i class="fa-solid fa-arrow-right pt-2"></i>
                                </div>
                            </div>
                    </div>
                @else
                    No Jobs under this category
                    @endif



                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div> -->
@endsection
