@extends("layouts.master")

@section("content")

<div class="banner">
    <div class="container">
        <div class="row justify-content-center align-itens-center">
            <div class="col-lg-8">
                <div class="banner-inner text-center">
                    <h1 class="animate__animated animate__fadeInDown"> Company Details </h1>
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
                            <h4>Company Details</h4>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <img src="{{url($company->logo)}}" class="img img-responsive w-100" alt="" />
                        </div>

                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <td> Company Name </td>
                                    <td> {{$company->company_name}} </td>
                                </tr>
                                <tr>
                                    <td> Company Email </td>
                                    <td> 
                                        <a href="mailto:{{$company->email}}">
                                            {{$company->email}} 
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Company Phone </td>
                                    <td> {{$company->phone}} </td>
                                </tr>
                                <tr>
                                    <td> Company GST </td>
                                    <td> {!! $company->gst?:"<span class='not-available'> Not Available </span>" !!} </td>
                                </tr>
                                <tr>
                                    <td> Company CIN </td>
                                    <td> {!! $company->cin?:"<span class='not-available'> Not Available </span>" !!} </td>
                                </tr>
                                <tr>
                                    <td> Strength </td>
                                    <td> {{$company->strength}} </td>
                                </tr>
                                <tr>
                                    <td> Business Type </td>
                                    <td> {{$company->business_type}} </td>
                                </tr>
                                <tr>
                                    <td> Address </td>
                                    <td> 
                                        {{"Street: ". $company->street}} <br/>
                                        {{"Area: ".  $company->street}} <br/>
                                        {{"City: ".  $company->city}} <br/>
                                        {{"State: ".  $company->state}} <br/>
                                        {{"PIN: ".  $company->pin}} <br/>
                                        {{"Landmark: ".  $company->landmark}}
                                    </td>
                                </tr>
                            </table>
                        </div>

                        {{-- <table class="table">

                            <tr>
                                <td>Company Name</td>
                                <td>{{ $company->company_name }}</td>
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
                            
                        </table> --}}

                    </div>

                    

                </div>
            </div>            
        </div>
    </div>

</div>

@endsection