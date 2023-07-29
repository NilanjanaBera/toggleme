@extends("layouts.master")

@section("content")


<div class="banner-2">
    <div class="container">
        <div class="row justify-content-center align-itens-center">
            <div class="col-lg-8">
                <div class="banner-inner-2 text-center">
                <h1 class="">Edit Profile</h1>
                <div class="banner-links">
                    <a href="{{route("home")}}">Home</a>
                    <a href="#">/</a>
                    <a href="edit-profile.php">Edit Profile</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="basic-info ">
<div class="max-width">
    <form action="{{route("jobseeker.profile.update.basic-info")}}" method="POST">
        @csrf
    <div class="container">
        <div class="row justify-conten-center align-items-center">
            <div class="col-lg-12">
                <div class="basic-info-heading text-center">
                    <h4>Personal Infomation</h4>
                    <hr>
                    @if(session()->has("m1"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong></strong> {{session()->get("message")}}
                        <button  class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                       
                    @endif
                </div>
            </div>
            <div class="col-lg-4 mb-3">
            <div class="profile-photo-div" id="profile-photo-div">
                <div class="profile-img-div" id="profile-img-div" >
                <div id="loader"></div><img id="profile-img" src="https://s3.amazonaws.com/FringeBucket/default-user.png">
                <input id="x-position" type="range" name="x-position" value="0" min="0">
                <input id="y-position" type="range" name="y-position" value="0" min="0">
                </div>
                <div class="profile-buttons-div">
                <div class="profile-img-input" id="profile-img-input">
                    <label class="button" id="change-photo-label" for="change-photo">UPLOAD PHOTO</label>
                    <input id="change-photo" name="change-photo" type="file" style="display: none;" accept="image/*">
                </div>
                <div class="profile-img-confirm" id="profile-img-confirm" style="display: none;">
                    <div class="button half green" id="save-img"><i class="fa fa-check" aria-hidden="true"></i></div>
                    <div class="button half red" id="cancel-img"><i class="fa fa-remove" aria-hidden="true"></i></div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-8 px-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="first_name" value="{{ old("first_name", $user->first_name) }}" class="form-control"  placeholder="First Name" require>
                            <label for="FullName"> First Name </label>
                            @error("first_name")
                            <div class="text-danger">
                                {{$message}}
                            </div>                            
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="last_name" value="{{ old("last_name", $user->last_name) }}" class="form-control"  placeholder="Last Name" require>
                            <label for="FullName"> Last Name </label>
                            @error("last_name")
                            <div class="text-danger">
                                {{$message}}
                            </div>                            
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" value="{{ old("email", $user->email) }}" class="form-control"  placeholder="PrimaryEmail" require>
                            <label for="PrimaryEmail"> Primary Email </label>
                            @error("email")
                            <div class="text-danger">
                                {{$message}}
                            </div>                            
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="alternate_email" value="{{ old("alternate_email", $user->alternate_email) }}" class="form-control"  placeholder="SecondaryEmail" require>
                            <label for="FullNSecondaryEmailame"> Alternate Email </label>
                            @error("alternate_email")
                            <div class="text-danger">
                                {{$message}}
                            </div>                            
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-floating ">
                            <input type="number" name="phone" value="{{ old("phone", $user->phone) }}" class="form-control"  placeholder="PrimaryPhoneNumber" require>
                            <label for="PrimaryPhoneNumber"> Primary Phone Number </label>
                            @error("phone")
                            <div class="text-danger">
                                {{$message}}
                            </div>                            
                            @enderror
                        </div>

                        <div class="form-check check-box">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                               Use My Primary Number as whatsapp Number
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="number" name="alternate_phone" value="{{ old("alternate_phone", $user->alternate_phone) }}" class="form-control"  placeholder="SecondaryPhoneNumber" require>
                            <label for="SecondaryPhoneNumber"> Alternate Phone Number </label>
                            @error("alternate_phone")
                            <div class="text-danger">
                                {{$message}}
                            </div>                            
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class=" mb-3" style="display: flex; justify-content: space-between">
                            
                            <div> Gender  </div> 
                            <label><input type="radio" name="gender" value="male" {{old("gender", $profile->gender) == "male" ? "checked" : ""}}>Male</label>
                            <label><input type="radio" name="gender" value="female" {{old("gender", $profile->gender) == "female" ? "checked" : ""}}>Female</label>
                            
                            
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="date" name="dob" value="{{ old("dob", $user->profile->dob) }}" class="form-control"  placeholder="SecondaryPhoneNumber" require>
                            <label for="dob"> DOB </label>
                            @error("dob")
                            <div class="text-danger">
                                {{$message}}
                            </div>                            
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <!-- <div class="col-lg-4 d-lg-block d-none">
            
                            
                <div class="profile-photo-div" id="profile-photo-div">
                    <div class="profile-img-div" id="profile-img-div" style="height: 151px;">
                    <div id="loader"></div><img id="profile-img" src="https://s3.amazonaws.com/FringeBucket/default-user.png">
                    <input id="x-position" type="range" name="x-position" value="0" min="0">
                    <input id="y-position" type="range" name="y-position" value="0" min="0">
                    </div>
                    <div class="profile-buttons-div">
                    <div class="profile-img-input" id="profile-img-input">
                        <label class="button" id="change-photo-label" for="change-photo">UPLOAD PHOTO</label>
                        <input id="change-photo" name="change-photo" type="file" style="display: none;" accept="image/*">
                    </div>
                    <div class="profile-img-confirm" id="profile-img-confirm" style="display: none;">
                        <div class="button half green" id="save-img"><i class="fa fa-check" aria-hidden="true"></i></div>
                        <div class="button half red" id="cancel-img"><i class="fa fa-remove" aria-hidden="true"></i></div>
                    </div>
                    </div>
                </div>
                
                <div class="error" id="error">min sizes 400*400px</div>
                <canvas id="croppedPhoto" width="400" height="400"></canvas>
            </div> -->

            <div class="row">
                 <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="street" value="{{old("street", $profile? $profile["street"] : '' )}}" class="form-control"  placeholder="Street" require>
                        <label for="Street">Street</label>
                        @error("street")
                        <div class="text-danger">
                            {{$message}}
                        </div>                            
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="landmark" value="{{old("landmark", $profile? $profile["landmark"] : '' )}}" class="form-control"  placeholder="Landmark" require>
                        <label for="Landmark">Landmark</label>
                        @error("landmark")
                        <div class="text-danger">
                            {{$message}}
                        </div>                            
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="area" value="{{old("area", $profile? $profile["area"] : '' )}}" class="form-control"  placeholder="Landmark" require>
                        <label for="Landmark"> Area </label>
                        @error("area")
                        <div class="text-danger">
                            {{$message}}
                        </div>                            
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="city" value="{{old("city", $profile? $profile["city"] : '' )}}" class="form-control"  placeholder="Landmark" require>
                        <label for="Landmark"> City </label>
                        @error("city")
                        <div class="text-danger">
                            {{$message}}
                        </div>                            
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <select class="form-select form-control py-3 mb-3" name="state" aria-label=".form-select-lg example">
                        <option value=""> Select a State </option>
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
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="pin" value="{{old("pin", $profile->pin)}}" class="form-control"  placeholder="PinCodeNumber" require>
                        <label for="PinCodeNumber">Pin Code Number</label>
                    </div>
                    @error("pin")
                    <div class="text-danger">
                        {{$message}}
                    </div>                            
                    @enderror
                </div>
                
                <div class="col-lg-12">
                    <div class="next-button mb-3 text-center">
                        <button class="btn btn-next-button" type="submit"> Update </button>
                        <a href="{{route("jobseeker.profile.edit.academics")}}" class="btn btn-next-button"> Next </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>

@endsection