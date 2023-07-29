@extends("layouts.master")

@section("content")

<div class="banner">
    <div class="container">
        <div class="row justify-content-center align-itens-center">
            <div class="col-lg-8">
                <div class="banner-inner text-center">
                    <h1 class="animate__animated animate__fadeInDown"> Job Details </h1>
                    <p class="px-lg-5 px-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">

                <div class="card-body">
                    <div class="row bg-light p-5">
                        <div class="col-md-12">
                            <h4>Job Details</h4>
                            <hr>
                        </div>



                        <table class="table">

                            <tr>
                                <td>Job ID</td>
                                <td>{{ $job->id }}</td>
                            </tr>
                            <tr>
                                <td>Job Name</td>
                                <td>{{ $job->job_name }}</td>
                            </tr>
                            <tr>
                                <td>Job Designation</td>
                                <td>{{ $job->job_designation }}</td>
                            </tr>

                            <tr>
                                <td>Company</td>
                                <td>
                                   <a href="{{route("company.details", $job->user->role->company->id)}}">
                                    {{ $job->user->role->company->company_name }}
                                    </a>
                                </td>
                            </tr>

                        </table>

                    </div>

                    <div class="row bg-white p-5">
                        <div class="col-md-12">
                            <h4>Job Validity and Location</h4>
                            <hr>
                        </div>

                        <div class="col-md-12">

                            <table class="table">
                                <tr>
                                    <td>Opening Date</td>

                                    <td>{{ Carbon::parse($job->opening_date)->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Closing Date</td>

                                    <td>{{ Carbon::parse($job->closing_date)->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Location</td>

                                    <td>{{ $job->location }}</td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td>
                                        {{ $job->state }}
                                    </td>
                                </tr>
                            </table>

                        </div>




                    </div>

                    <div class="row bg-light p-5">
                        <div class="col-md-12">
                            <h4>Job and Office Type</h4>
                            <hr>
                        </div>

                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <td>Job Type</td>
                                    <td>{{ $job->job_type }}</td>
                                </tr>
                                <tr>
                                    <td>Office Type</td>
                                    <td>{{ $job->office_type }}</td>
                                </tr>
                            </table>

                        </div>

                    </div>

                    <div class="row bg-white p-5">
                        <div class="col-md-12">
                            <h4>Salary</h4>
                            <hr>
                        </div>

                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Salary Disclosed</td>
                                        <td>
                                            {!! $job->salary_disclosed == 'no' ? '<span>Not Disclosed</span>' : '<span>Yes</span>' !!}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Minimum Salary</td>
                                        <td>
                                            {!! $job->min_salary ? '₹' . $job->min_salary : "<sapn class='not-available'>Not Available</span>" !!}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Maximum Salary</td>
                                        <td>
                                            {!! $job->max_salary ? '₹' . $job->max_salary : "<sapn class='not-available'>Not Available</span>" !!}

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>




                    </div>

                    <div class="row bg-light p-5">
                        <div class="col-md-12">
                            <h4>Skills, Qualification and Experience</h4>
                            <hr>
                        </div>

                        <div class="col-md-12">

                            <table class="table">
                                <tr>
                                    <th>Skills Required</th>
                                    <td>

                                        @foreach ($job->skills as $skill)
                                            {{ $skill->details->skill_name }},
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Minimum Qualification</th>
                                    <td>
                                        {{ $job->min_qualification }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Qualifications</th>
                                    <td>
                                        @foreach ($job->qualifications as $qualification)
                                            {{ $qualification->details->qualification_name }},
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Minimum Experience</th>
                                    <td>
                                        {{ $job->min_experience != '0' ? $job->min_experience . 'year(s)' : 'Fresher Allowed' }}

                                    </td>
                                </tr>
                                <tr>
                                    <th>Maximum Experience</th>
                                    <td>
                                        {{ $job->max_experience != '' ? $job->min_experience . 'year(s)' : 'No Limit' }}

                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <div class="row bg-white p-5">
                        <div class="col-md-12">
                            <h4>Information</h4>
                            <hr>
                        </div>


                        <div class="col-md-12">
                            <div>
                                {{-- <b>Salary Disclosed</b> --}}
                                <span>
                                    {!! $job->information !!}
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="row bg-white p-5">
                        <div class="col-md-12">
                            <hr>
                            <div class="text-center">
                                <button class="btn btn-apply btn-sm"> Apply Now </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
