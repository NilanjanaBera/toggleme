@extends("layouts.master")

@section("content")

<div class="option pb-4">
    <div class="max-width">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4">
                    <a href="{{url("register?type=jobseeker")}}">
                        <div class="option-inner text-center p-4 mb-4">
                            <i class="fa-solid fa-user-graduate pb-4"></i>
                            <h6> Job Seekers </h6>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="{{url("register?type=employer")}}">
                        <div class="option-inner-one text-center p-4 mb-4">
                            <i class="fa-solid fa-user pb-4"></i>
                            <h6> Employers </h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection