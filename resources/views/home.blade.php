@extends('layouts.master')

@section('content')
    <!-- banner -->

    <div class="banner">
        <div class="container">
            <div class="row justify-content-center align-itens-center">
                <div class="col-lg-8">
                    <div class="banner-inner text-center">
                        <h1 class="animate__animated animate__fadeInDown">Job Searching Just Got Easy</h1>
                        <p class="px-lg-5 px-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end banner -->

    <!-- searching -->

    <div class="searching-jobs mb-5">
        <div class="max-width">
            <div class="container conten shadow py-3 px-4" data-aos="zoom-in" data-aos-duration="1500">
                <form class="" method="get" action="{{ route('job_list') }}">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="input">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control controls" id="company_list" name="company"
                                        placeholder="Company Name">
                                    <label for="companey">Enter Company Name / Job Name / Job Type</label>
                                </div>
                                <div id="companylist">
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="col-lg-5">
                            <div class="form-floating mb-3 mt-3">
                                <select class="form-select controls" id="floatingSelect" name="location"
                                    aria-label="Floating label select example">
                                    <option value="">Open this select menu</option>
                                    <option value="Kolkata">Kolkata</option>
                                    <option value="Howrah">Howrah</option>
                                    <option value="Delhi">Delhi</option>
                                </select>
                                <label for="floatingSelect">Select Location</label>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="top-search-btn mb-3 mt-3 text-center">
                                <button type="submit" class="btn btn-search">SEARCH</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end searching -->

    <!--recent section  -->
    <div class="recent-jobs  py-5">
        <div class="max-width">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 animate__animated animate__fadeInUp">
                        <div class="heading py-4">
                            <h4 class="mb-0 ">Recent Jobs</h4>
                            <hr>
                        </div>



                        @if (count($recent_jobs))
                            @foreach ($recent_jobs as $job)
                                <!-- recent job 1 -->
                                <div class="recent-body mb-4 shadow">
                                    <div class="row justify-content-center align-itens-center">
                                        <div class="col-lg-2">
                                            <div class="img px-2 text-center text-lg-start pt-2">
                                                <img src="{{ asset($job->company->logo) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="recent-text py-3 ">
                                                <h4 class="mb-2 text-center text-lg-start mb-0"> {{ $job->job_designation }}
                                                </h4>
                                                <div
                                                    class="recent-inner d-flex px-4 p-lg-0 text-center justify-content-center justify-content-lg-start">
                                                    <p class="mb-0">{{ $job->company->company_name }}</p>
                                                    <div class="location d-flex px-3">
                                                        <i class="fa-solid fa-location-dot pt-1"></i>
                                                        <p class="px-2 mb-0">{{ $job->location }}</p>
                                                    </div>
                                                    <div class="location d-flex ">
                                                        <i class="fa-regular fa-clock pt-1"></i>
                                                        <p class="px-2 mb-0">{{ $job->job_type }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="appply-btn px-2 text-center text-lg-end">
                                                <button class="btn btn-apply"><a
                                                        href="{{ route('job.job_details', $job->id) }}"> View Details
                                                    </a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- recent job 1 end -->
                            @endforeach
                        @else
                            No Recent Jobs
                        @endif



                    </div>

                    <div class="col-lg-4 pt-4 animate__animated animate__fadeInUp">
                        <div class="recent-news shadow p-4">
                            <h4>Categories</h4>
                            <hr>
                            @if (count($categories))
                                @foreach ($categories as $category)
                                    <div class="categories-inner d-flex">
                                        <i class="fa-solid fa-angles-right pt-1"></i>
                                        <a href="{{ route('job.category_wise_job_details', ['id' => $category['id']]) }}">
                                            <p class="px-3">{{ $category->category }}</p>
                                        </a>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end -->



    <!--Featured section  -->

    <div class="featured-jobs py-5">
        <div class="max-width">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="heading py-4">
                            <h4 class="mb-0" data-aos="fade-right" data-aos-easing="linear">Featured Jobs</h4>
                            <hr>
                        </div>

                        @if (count($featured_jobs))
                            @foreach ($featured_jobs as $job)
                                <!-- recent job 1 -->
                                <div class="recent-body mb-4 shadow">
                                    <div class="row justify-content-center align-itens-center">
                                        <div class="col-lg-2">
                                            <div class="img px-2 text-center text-lg-start">
                                                <img src="{{ asset($job->company->logo) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="recent-text py-3 ">
                                                <h4 class="mb-2 text-center text-lg-start mb-0">
                                                    {{ $job->job_designation }} </h4>
                                                <div
                                                    class="recent-inner d-flex px-4 p-lg-0 text-center justify-content-center justify-content-lg-start">
                                                    <p class="mb-0"> {{ $job->company->company_name }} </p>
                                                    <div class="location d-flex px-3">
                                                        <i class="fa-solid fa-location-dot pt-1"></i>
                                                        <p class="px-2 mb-0"> {{ $job->location }} </p>
                                                    </div>
                                                    <div class="location d-flex ">
                                                        <i class="fa-regular fa-clock pt-1"></i>
                                                        <p class="px-2 mb-0"> {{ $job->job_type }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="appply-btn px-2 text-center text-lg-end">
                                                <button class="btn btn-apply"><a href="#">Apply Now</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- recent job 1 end -->
                            @endforeach
                        @else
                            No Featured Jobs
                        @endif

                    </div>
                    <div class="col-lg-4 pt-4">
                        <div class="recent-news shadow p-4">
                            <h4>Latest Jobs</h4>
                            <hr>
                            @if (count($categories))
                                @foreach ($categories as $category)
                                    <div class="categories-inner d-flex">
                                        <i class="fa-solid fa-angles-right pt-1"></i>
                                        <p class="px-3">{{ $category->category }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- how it works -->

    <div class="how-it-work py-5">
        <div class="max-width">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-9">
                        <div class="heading-4 text-center pb-3">
                            <h4>How It Works?</h4>
                            <hr class="my-2">
                            <p class="px-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim
                                quam et
                                metus effici turac fringilla lorem facilisis.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6 py-lg-3">
                        <div class="creat-ac text-center">
                            <div class="account-icon">
                                <i class="fa-regular fa-user" data-aos="fade-down" data-aos-easing="linear"
                                    data-aos-duration="1500"></i>
                            </div>
                            <div class="account-text">
                                <h5>Create Account</h5>
                                <p>Post a job to tell us about your project. We'll quickly match you with the right
                                    freelancers find place best.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="creat-ac2 text-center">
                            <div class="account-icon-2">
                                <i class="fa-solid fa-magnifying-glass" data-aos="fade-down" data-aos-easing="linear"
                                    data-aos-duration="1500"></i>
                            </div>
                            <div class="account-text-2">
                                <h5>Search Jobst</h5>
                                <p>Post a job to tell us about your project. We'll quickly match you with the right
                                    freelancers find place best.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="creat-ac3 text-center">
                            <div class="account-icon-3">
                                <i class="fa-solid fa-trophy" data-aos="fade-down" data-aos-easing="linear"
                                    data-aos-duration="1500"></i>
                            </div>
                            <div class="account-text-3">
                                <h5>Apply</h5>
                                <p>Post a job to tell us about your project. We'll quickly match you with the right
                                    freelancers find place best.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- company -->
    <div class="companies py-5">
        <div class="max-width">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="Companies-heading">
                            <h4>Hearing Companies</h4>
                            <hr>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="companiess">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-2 col-6">
                                        <img src="{{ asset('assets/img/25.png') }}" alt="company"
                                            class="companiess-img">
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <img src="{{ asset('assets/img/00.png') }}" alt="company"
                                            class="companiess-img">
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <img src="{{ asset('assets/img/4.jpg') }}" alt="company"
                                            class="companiess-img">
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <img src="{{ asset('assets/img/4.jpg') }}" alt="company"
                                            class="companiess-img">
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <img src="{{ asset('assets/img/25.png') }}" alt="company"
                                            class="companiess-img">
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <img src="{{ asset('assets/img/00.png') }}" alt="company"
                                            class="companiess-img">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4 pt-4">
                        <div class="recent-news shadow  p-4">
                            <h4>Today's News</h4>
                            <hr>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end -->
@endsection

@push('js')
    <script>
        // $(document).ready(function() {
        //     $('#company_list').keyup(function() {
        //         var querry = $(this).val();
        //         console.log(querry);
        //         if (querry != '') {
        //             var _token = $('input[name="_token"]').val();
        //             $.ajax({
        //                 url: "{{ route('auto_job_list') }}",
        //                 method: "POST",
        //                 data: {
        //                     querry: querry,
        //                     _token: _token
        //                 },
        //                 success: function(data) {
        //                     $('#companylist').fadeIn();
        //                     $('#companylist').html(data);
        //                 }
        //             });
        //         }
        //     });

        //     $(document).on('click', 'li', function() {
        //         $('#company_list').val($(this).text());
        //         $('#companylist').fadeOut();
        //     });
        // });
    </script>
@endpush
