@extends('layouts.employer-admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Job Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('employer.dashboard') }}">Employer</a></li>
                            <li class="breadcrumb-item active"> My Published Jobs </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">


                    <!-- /.col-md-6 -->
                    <div class="col-lg-12">

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class=" d-flex justify-content-between">
                                    <h5 class="m-0">Job Details : ID:{{ $job->id }} Name: {{ $job->job_name }}</h5>
                                    <a href="{{ route('employer.job.edit', $job->id) }}" class="btn btn-sm btn-primary"> <i
                                            class="fa fa-edit"></i> Edit this job </a>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="row bg-light p-5">
                                    <div class="col-md-12">
                                        <h4>Job Image</h4>
                                        <hr>
                                        @if (!empty($job['image']))
                                        <img src="{{ asset('admin/upload/image/job_images//' . $job['image']) }}" alt=""
                                            width="100%" height="405px">
                                    @else
                                    {{"N/A"}}
                                    @endif
                                    </div>
                                </div>

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
                                            <td>Job Category</td>
                                            <td>{{ $job->job_category }}</td>
                                        </tr>
                                        <tr>
                                            <td>Job Designation</td>
                                            <td>{{ $job->job_designation }}</td>
                                        </tr>
                                        <tr>
                                            <td>Company</td>
                                            <td>{{ $job->job_designation }}</td>
                                        </tr>
                                        <tr>
                                            <td>User</td>
                                            <td>{!! $job->user->first_name . ' ' . $job->user->last_name !!}</td>
                                        </tr>
                                        <tr>
                                            <td>Company</td>
                                            <td>{{ $job->user->role->company->company_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                @if ($job->published)
                                                    <span style="background: green">Published</span>
                                                @else
                                                    <span style="background: yellow">Draft</span>
                                                @endif
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

{{--
                                    <div class="col-md-12">
                                        <div>
                                            <b>Skills Required</b>
                                            <span>
                                                @foreach ($job->skills as $skill)
                                                    {{ $skill->details->skill_name }},
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div>
                                            <b>Minimum Qualification</b>
                                            <span>
                                                {{ $job->min_qualification }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div>
                                            <b>Qulifications:</b>
                                            <span>
                                                @foreach ($job->qualifications as $qualification)
                                                    {{ $qualification->details->qualification_name }},
                                                @endforeach

                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div>
                                            <b>Minimum Experience:</b>
                                            <span>
                                                {{ $job->min_experience != '0' ? $job->min_experience . 'year(s)' : 'Fresher Allowed' }}

                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div>
                                            <b>Maximum Experience:</b>
                                            <span>
                                                {{ $job->max_experience != '' ? $job->min_experience . 'year(s)' : 'No Limit' }}

                                            </span>
                                        </div>
                                    </div> --}}

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

                                {{-- <div class="row">
                    <div class="col-lg-3 mt-3">
                        <b>Job ID:</b> {{$job->id}}
                    </div>

                    <div class="col-lg-5 mt-3">
                        <b>Job Name:</b> {{$job->job_name}}
                    </div>

                    <div class="col-lg-4 mt-3">
                        <b>Job Designation:</b> {{$job->job_designation}}
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Opening Date:</b> {{Carbon::parse($job->opening_date)->format("d/m/Y")}}
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Closing Date:</b> {{Carbon::parse($job->closing_date)->format("d/m/Y")}}
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Location:</b> {{$job->location}}
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>State:</b> {{$job->state}}
                    </div>

                    <div class="col-lg-3 mt-3">

                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Salary Disclosed:</b> {{$job->salary_disclosed}}
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Min Salary:</b> {!!$job->min_salary?:"<span class='not-available'>Not available</span>"!!}
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Max Salary:</b> {!!$job->max_salary?:"<span class='not-available'>Not available</span>"!!}
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Min Qualification:</b> {!! $job->min_qualification !!}
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Min Experience:</b> {!! $job->min_experience !!} year(s)
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Max Experience:</b> {!! $job->max_experience !!} years(s)
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Status:</b>
                        @if ($job->published)
                        <span style="background: green">Published</span>
                        @else
                        <span style="background: yellow"> Draft </span>
                        @endif
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>User:</b> {!! $job->user->first_name." ".$job->user->last_name !!}
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Qualification:</b>
                        @foreach ($job->qualifications as $qualification)
                            {{$qualification->details->qualification_name}},
                        @endforeach
                    </div>

                    <div class="col-lg-3 mt-3">
                        <b>Skills:</b>
                        @foreach ($job->skills as $skill)
                            {{$skill->details->skill_name}},
                        @endforeach
                    </div>

                    <div class="col-lg-12 mt-3">
                        <b>Information:</b>
                        {!!$job->information!!}
                    </div>

                </div> --}}

                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
