@extends("layouts.master")

@push("js")
<script>
    $("#whatsapp").change(function(){
        if($(this).is(":checked"))
        {
            $("#whatsapp_div").slideUp()
        }
        else
        {
            $("#whatsapp_div").slideDown()
        }
    })
</script>
    
@endpush

@section("content")

<div class="employers-register ">
    
        <div class="container employer-container shadow">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <img src="{{url('assets/img/111.png')}}" alt="" class="w-100">
                </div>
                <div class="col-lg-5">
                    <form action="{{ route("employer.register") }}" method="post">
                        @csrf
                        <div class="register-info px-3 px-lg-5 py-4 ">
                            <div class="register-header">
                                <h5>Register Your Account</h5>
                                <hr>
                            </div>
                            <input name="type" type="hidden" value="1" />
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="first_name"
                                    value="{{ old('first_name') }}" placeholder="fullname">
                                <label for="fullname">First Name</label>
                                @error('first_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="last_name"
                                    value="{{ old('last_name') }}" placeholder="fullname">
                                <label for="fullname">Last Name</label>
                                @error('last_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="email">
                                <label for="email">Your Email Address</label>
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating ">
                                <input type="Number" class="form-control" name="phone" value={{ old('phone') }}
                                    placeholder="Number">
                                <label for="phonenumber">Phone Number</label>
                                
                                @error('phone')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class=" mb-3">
                            <label>
                                <input name="whatsapp" id="whatsapp" class="" type="checkbox" {{old("whatsapp") == "on" ? "checked" : "" }} />This is my WhatsApp Number
                            </label>
                            </div>

                            <div class="form-floating mb-3" id="whatsapp_div" style="{{old("whatsapp") == "on" ? "display: block" : "display: none" }}">
                                <input type="Number" class="form-control" name="whatsapp_number" value={{ old('whatsapp_number') }}
                                    placeholder="Number">
                                <label for="whatsapp">WhatsApp Number (optional)</label>
                                
                                @error('whatsapp_number')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" placeholder="password"
                                    maxlength="8" minlength="8">
                                <label for="passsword">Password</label>
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="password" maxlength="8" minlength="8">
                                <label for="repasssword">Re-Password</label>

                            </div>
                            <div class="button-lgon">
                                <button class="btn btn-login-button form-control"> Register</button>
                            </div>
                            <div class="forget-passwords text-center pt-3">
                                <p>Have an account ? <a href="{{ route('login') }}">Login Now</a> </p>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    
</div>

@endsection