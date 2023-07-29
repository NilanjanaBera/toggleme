@extends("layouts.master")

@push("js")
    <script>
        $("#join_branch_button").click(function(){
            $("#join_branch_div").slideDown();
        })

        $("#join").click(function(){
            var branch_id = $("#branch_select").val();
            var company_id = {{$company->id}}
            var _token = "{{csrf_token()}}"
            
            $.post({
                url: "{{route('branch.join')}}",
                data: {_token, branch_id, company_id},
                success: function() {
                    window.location.reload()
                },
                error: function() {
                    alert("Unable to join the branch");
                }
            })
        })
    </script>
@endpush

@section("content")

<!-- banner -->
<div class="banner-2">
    <div class="container">
        <div class="row justify-content-center align-itens-center">
            <div class="col-lg-8">
                <div class="banner-inner-2 text-center">
                    <h1 class="">Company Profile</h1>
                    <div class="banner-links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="#">/</a>
                        <a href="#">Company</a>
                        <a href="#">/</a>
                        <a href="#">Profile</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end banner -->

<div class="profile py-3 py-lg-5">
    <div class="max-width">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 mb-lg-5 mb-3 p-lg-3 ">
                    <div class="profile-one shadow">
                        <div class="row  align-items-center p-4">
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
                                    <h4 class="mb-0">{{ $company->company_name }}</h4>
                                    <div>
                                        <span> <i class="fa fa-phone"></i> {{$company->phone}} </span> &emsp;
                                        <span> <i class="fa fa-envelope"></i> {{$company->email}} </span>
                                    </div>
                                    <div>
                                        <span> Strength: {{$company->strength}} </span>                                         
                                    </div>
                                    <div style="font-size: 14px" class="mt-2">
                                        <div style="font-size: 16px; font-weight: bold">HQ Address</div>
                                        <div> <b>Street:</b> {{$company->street}} </div>
                                        <div> <b>Area:</b> {{$company->area}} </div>
                                        <div> <b>City:</b> {{$company->city}} </div>
                                        <div> <b>State:</b> {{$company->state}} </div>
                                        <div> <b>Land Mark: </b> {{$company->landmark}} </div>
                                        <div> <b>PIN:</b> {{$company->pin}} </div>


                                    </div>
                                    {{-- <a href="{{route("jobseeker.profile.edit.basic-info")}}">Edit Profile</a> --}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="download-resume text-lg-end text-start p-4">
                                    @if(count($user->ownedCompanies))
                                    {{-- <a href="Resume" download>
                                        <button class="btn btn-cv">Resume <i class="fa fa-file"></i></button>
                                    </a> --}}
                                    @else
                                    <div class="mb-3" style="text-align: left">
                                        You role: {{$role->role}} <br>
                                        @if($role->branch)
                                        Branch:{{$role->branch->branch_name}}
                                                @else
                                                <div style="display: flex">
                                                    <div class="not-available"> You are not associated with any branch </div>
                                                    <div>
                                                        <button id="join_branch_button" class="btn btn-secondary" style="font-size: 12px; white-space: nowrap;">Join a Branch</button>
                                                    </div>
                                                </div>
                                                <div id="join_branch_div" style="display: none; margin-top: 12px; background: #E7E6E6; padding: 12px">
                                                    <div style="display: flex; justify-content: space-between">
                                                        <div>
                                                            <select id="branch_select" class="form-control">
                                                                <option value="">Select a Branch</option>
                                                                @foreach ($company->branches as $branch)
                                                                    <option value="{{$branch->id}}"> {{$branch->branch_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <button id="join" class="btn btn-cv">Join</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                    
                                                @endif
                                    </div>
                                    <div style="display: flex; width: 100%; justify-content: end; margin-top: 36px">
                                        <a href="{{route("company.edit", $company->id)}}" class="btn btn-cv" style="font-size: 12px"> Edit Info </a>                                       

                                    </div>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="profile-3 shadow p-4 mb-4">
                      <h4> Add Branch </h4>
                      <hr>

                      <div class="info">
                        <form action="{{route("branch.create", $company->id)}}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-12 form-floating mb-2">
                                    <input type="branch_name" class="form-control" name="branch_name" value="{{old("branch_name")}}" placeholder="branch_name">
                                    <label for="branch_name"> Branch Name* </label>
                                    @error('branch_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 form-floating mb-2">
                                    <textarea type="description" class="form-control" name="description" value="{{old("description")}}" rows="10" placeholder="description"></textarea>
                                    <label for="description"> Branch Description </label>
                                    @error('description')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating mb-2">
                                    <input type="phone" class="form-control" name="phone" value="{{old("phone")}}" placeholder="phone">
                                    <label for="phone"> Phone* </label>
                                    @error('phone')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating mb-2">
                                    <input type="email" class="form-control" name="email" value="{{old("email")}}" placeholder="email">
                                    <label for="email"> Email* </label>
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                

                                <div class="col-6 form-floating mb-2">
                                    <input type="street" class="form-control" name="street" value="{{old("street")}}" placeholder="street">
                                    <label for="street"> Street* </label>
                                    @error('street')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating mb-2">
                                    <input type="area" class="form-control" name="area" value="{{old("area")}}" placeholder="area">
                                    <label for="area"> Area* </label>
                                    @error('area')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating mb-2">
                                    <input type="city" class="form-control" name="city" value="{{old("city")}}" placeholder="city">
                                    <label for="city"> City* </label>
                                    @error('city')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating mb-2">
                                    <select class="form-select form-control py-3 mb-3" name="state" aria-label=".form-select-lg example">
                                        <option value=""> Select a State* </option>
                                        @foreach($states as $state)
                                        <option value="{{$state->name}}" {{old("state", $state->name ) == $state->name ? "selected" : ""}}> {{$state->name}} </option>
                                        @endforeach
                                    </select>
                                    @error("state")
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>                            
                                    @enderror
                                </div>

                                <div class="col-6 form-floating mb-2">
                                    <input type="landmark" class="form-control" name="landmark" value="{{old("landmark")}}" placeholder="landmark">
                                    <label for="landmark"> Landmark* </label>
                                    @error('landmark')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating mb-2">
                                    <input type="pin" class="form-control" name="pin" value="{{old("pin")}}" placeholder="pin">
                                    <label for="pin"> PIN* </label>
                                    @error('pin')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 form-floating mb-2 " style="text-align: right">
                                   <button class="btn btn-cv "> Add Branch </button>
                                   
                                </div>
                                
                            </div>
                        </form>
                      </div>
                    </div>

                    
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="profile-2 shadow p-4">
                        <h4> Branches of this Company </h4>
                        
                        @if(count($company->branches))
                        @foreach ($company->branches as $branch)
                            <div style="width: 100%; background: #e7e6e6; padding: 12px; margin-top: 12px; display:flex; justify-content: space-between; align-items: flex-end">
                                <div>
                                    <div>{{$branch->branch_name}}</div>
                                    <div style="font-size: 14px">
                                        @if($branch->description)
                                        <div>Description: {{$branch->description}}</div>
                                        @endif
                                        <div> <i class="fa fa-phone"></i> {{$branch->phone}} &emsp; <i class="fa fa-envelope"></i> <a href="mailto:{{$branch->email}}">{{$branch->email}}</a></div>
                                        <div> Address:
                                            <div>
                                                <span> Street: {{$branch->street}} </span>
                                            <span> Area: {{$branch->area}} </span>
                                            </div> 
                                            <div>
                                                <span> City: {{$branch->city}} </span>
                                            <span> State: {{$branch->state}} </span>
                                            </div>
                                            
                                            <div>
                                                <span> Landmark: {{$branch->landmark}} </span>
                                            <span> PIN: {{$branch->pin}} </span>
                                            </div>
                                            
    
                                        </div>
    
                                    </div>
                                </div>

                                <div>
                                    <a href="#" class="btn btn-cv" style="font-size: 12px"> Edit Info </a>
                                    <a href="#" class="btn btn-cv" style="background: red; font-size: 12px"> Delete Branch </a> 
                                </div>
                                
                            </div>
                        @endforeach
                        @else
                        <div class="not-available"> No Branches available for this company </div>
                        @endif

                    </div>
                </div>
                
                
                
            </div>



            
        </div>
    </div>
</div>
    
@endsection