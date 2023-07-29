@extends('layouts.master')

@section('content')
    <div class="job-info py-5">
        <div class="max-width">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="job-image pt-5 mb-4">
                            @if (!empty($job['image']))
                            <img src="{{ asset('admin/upload/image/job_images/' . $job['image']) }}" alt="image">
                            @else
                            {{"No image added"}}
                            @endif
                        </div>
                        <div class="job-text ">
                            <p>{{ $job->job_name }}</p>
                        </div>
                        <div class="job-text2">
                            {{-- <h4>Welcome to  {{ $job->user->role->company->company_name }} </h4> --}}
                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's
                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                scrambled it to make a
                                type specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets containing
                                Lorem Ipsum passages,
                                and more recently with desktop publishing software like Aldus PageMaker including versions
                                of Lorem Ipsum.</p>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                                classical Latin literature from 45 BC, making it over 2000 years old.</p> --}}
                        </div>
                        <div class="job-text2">
                            <h4>Information :</h4>
                            <ul>
                                {!! $job->information !!}
                            </ul>
                        </div>

                        <div class="job-info-inner py-4 px-4">
                            <div class="job-info-heading">
                                <h4>Job Details</h4>
                                <hr>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-briefcase pt-1"></i>
                                <p class="px-3"><strong>Job Name : </strong> {{ $job->job_name }}</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-user"></i>
                                <p class="px-3"><strong>Job Designation : </strong> {{ $job->job_designation }}</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-building"></i>
                                <p class="px-3"><strong>Company : </strong> <a href="{{route("company.details", $job->user->role->company->id)}}">
                                    {{ $job->user->role->company->company_name }}
                                    </a> </p>
                            </div>

                        </div>

                        <div class="job-info-inner py-4 px-4">
                            <div class="job-info-heading">
                                <h4>Job Validity and Location</h4>
                                <hr>
                            </div>
                            <div class="experience d-flex">

                                <i class="fa-solid fa-calendar-days"></i>
                                <p class="px-3"><strong>Opening Date : </strong>{{ Carbon::parse($job->opening_date)->format('d/m/Y') }}</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-calendar-days"></i>
                                <p class="px-3"><strong>Closing Date : </strong> {{ Carbon::parse($job->closing_date)->format('d/m/Y') }}</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-location-dot pt-1"></i>
                                <p class="px-3"><strong>Location : </strong> {{ $job->location }}</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-location-dot pt-1"></i>
                                <p class="px-3"><strong>State : </strong> {{ $job->state }}</p>
                            </div>

                        </div>

                        <div class="job-info-inner py-4 px-4">
                            <div class="job-info-heading">
                                <h4>Job and Office Type</h4>
                                <hr>
                            </div>
                            <div class="experience d-flex">

                                <i class="fa-solid fa-house-laptop"></i>
                                <p class="px-3"><strong>Job Type : </strong> {{ $job->job_type }}</p>
                            </div>
                            <div class="experience d-flex">

                                <i class="fa-solid fa-briefcase"></i>
                                <p class="px-3"><strong>Office Type : </strong> {{ $job->office_type }}</p>
                            </div>


                        </div>
                        <div class="job-info-inner py-4 px-4">
                            <div class="job-info-heading">
                                <h4>Salary</h4>
                                <hr>
                            </div>
                            <div class="experience d-flex">

                                <i class="fa-solid fa-money-bill"></i>
                                <p class="px-3"><strong>Salary Disclosed : </strong> {!! $job->salary_disclosed == 'no' ? '<span>Not Disclosed</span>' : '<span>Yes</span>' !!}</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <p class="px-3"><strong>Minimum Salary : </strong> {!! $job->min_salary ? '₹' . $job->min_salary : "<sapn class='not-available'>Not Available</span>" !!}</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <p class="px-3"><strong>Maximum Salary : </strong>
                                    {!! $job->max_salary ? '₹' . $job->max_salary : "<sapn class='not-available'>Not Available</span>" !!}
                                     </p>
                            </div>

                        </div>
                        <div class="job-info-inner py-4 px-4">
                            <div class="job-info-heading">
                                <h4>Skills, Qualification and Experience</h4>
                                <hr>
                            </div>
                            <div class="experience d-flex">

                                <i class="fa-solid fa-check"></i>

                                <p class="px-3"><strong>Skills Required : </strong> @foreach ($job->skills as $key=>$skill)
                                    @php
                                        $count=count($job->skills);

                                        @endphp
                                    {{ $skill->details->skill_name }} @if($key<$count-1),@endif
                                @endforeach</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-check"></i>
                                <p class="px-3"><strong>Minimum Qualification : </strong> {{ $job->min_qualification }}</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-check"></i>
                                <p class="px-3"><strong>Qualification : </strong>   @foreach ($job->qualifications as $key=>$qualification)
                                    @php
                                    $count=count($job->qualifications);

                                    @endphp
                                    {{ $qualification->details->qualification_name }} @if($key<$count-1),@endif
                                @endforeach</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-check"></i>
                                <p class="px-3"><strong>Minimum Experience : </strong>  {{ $job->min_experience != '0' ? $job->min_experience . 'year(s)' : 'Fresher Allowed' }}</p>
                            </div>
                            <div class="experience d-flex">
                                <i class="fa-solid fa-check"></i>
                                <p class="px-3"><strong>Maximum Experience : </strong>  {{ $job->max_experience != '' ? $job->min_experience . 'year(s)' : 'No Limit' }}</p>
                            </div>

                        </div>
                        <div class="applied-btn mt-4">
                            <button class="btn applied-btnn">Apply Now</button>
                        </div>

                    </div>
                    <div class="col-lg-4 pt-5">
                        <div class="similar-jobs">
                            <div class="similar-job-heading">
                                <h4 class="text-center">Similar Jobs</h4>
                                <hr>
                            </div>
                            @if (count($recent_jobs))
                            @foreach ($recent_jobs as $sjob)
                            <div class="similer-job-inner d-flex">
                                <div class="similer-img">
                                    <a href="{{route("job.job_details", $sjob->id)}}">
                                    <img src="{{ asset($sjob->company->logo) }}" alt="logo">
                                    </a>
                                </div>
                                <div class="similer-text px-4">
                                    <h5>{{ $sjob->job_designation }}</h5>

                                    <div class="d-flex">
                                        <div class="similer-icon d-flex">
                                            <i class="fa-solid fa-briefcase pt-1"></i>
                                            <p class="px-2 mb-0">{{ $sjob->job_type }}</p>
                                        </div>
                                        <div class="similer-icon d-flex">
                                            <i class="fa-regular fa-clock pt-1"></i>
                                            <p class="px-2 mb-0">5 min ago</p>
                                        </div>
                                    </div>
                                    <div class="salary">
                                        <p class="mb-0">5k - 10k <span>/month</span></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                            @else
                                No Similar Jobs
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
