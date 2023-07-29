@extends("layouts.master")

@section("content")

<div class="banner-2">
    <div class="container">
        <div class="row justify-content-center align-itens-center">
            <div class="col-lg-8">
                <div class="banner-inner-2 text-center">
                <h1 class="">Edit Profile</h1>
                <div class="banner-links">
                    <a href="index.php">Home</a>
                    <a href="#">/</a>
                    <a href="edit-profile.php">Edit Profile</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job-experience">
    <div class="max-width">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="job-experience-heading text-center">
                        <h4>Job Experience</h4>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{route("jobseeker.experience.update")}}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="company_name"   placeholder="Company Name" required>
                                <label for="CompanyName">Company Name</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="designation"  placeholder="Jobrole" required>
                                <label for="Jobrole"> Designation </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="start_date"  placeholder="Start Date" required>
                                <label for="StartDate">Start Date</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="end_date"  placeholder="End Date" required>
                                <label for="EndDate">End Date</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="annual_ctc"  placeholder="Annual CTC" required>
                                <label for="AnnualCTC">Annual CTC</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="next-button mb-3 text-center">
                                <button class="btn btn-next-button"> Add </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                
                <div class="col-lg-6">
                    @if(count($experiences))
                        @foreach ($experiences as $experience)
                        <div style="background: #FDDBE6; width: 100%; padding: 40px" class="mb-2">
                            <div style="font-weight: 700">
                                {{$experience->company_name}}
                            </div>
                            <div class="mt-1">
                                {{$experience->designation}}
                            </div>
                            <div class="mt-1">
                                From: {{$experience->start_date}} to {{$experience->end_date}}
                            </div>
                            <div class="mt-1">
                                Annual CTC: ₹{{$experience->annual_ctc}}
                            </div>
                            <div style="text-align: right; ">
                                <form action="{{route("jobseeker.experience.delete")}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$experience->id}}" />
                                <button class="btn btn-sm btn-danger ">Delete This Record</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="not-avialable"> No Experiences Yet  </div>
                    @endif
                    
                </div>

            </div>
        </div>
    </div>
</div>
    
@endsection