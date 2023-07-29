@extends("layouts.master")

@section("content")



<!-- login-form -->

<div class="login">
    <div class="max-width">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 d-lg-none d-block">
                    <div class="login-img">
                        <img src="img/login.jpg" alt="image" class="w-100">
                    </div>
                </div>
                <div class="col-lg-5">
                    <form action="{{url("login")}}" method="post">
                        @csrf
                        <div class="login-inner shadow py-4 px-3 px-lg-5">
                            <div class="login-header">
                                <h4>LogIn</h4>
                                <hr>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="email" class="form-control"  placeholder="Username" required>
                                <label for="Username">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control"  placeholder="password" maxlength="8" minlength="6" required>
                                <label for="passsword">Password</label>
                                @error("email")
                                <div>
                                    <div class="text-danger"> {{$message}} </div>
                                </div>
                                @enderror
                            </div>
                            <div class="forget-password-2 text-end">
                              <a href="forget-password.php"><p>Forget Password</p></a>  
                            </div>
                            <div class="button-lgon mb-3">
                                <button class="btn btn-login-button form-control">Sign In</button>
                            </div>
                            <div class="otp-login">
                              <h4 class="text-center">Or,</h4>
                            </div>
                            <div class="form-floating mb-3">
                              <input type="number" class="form-control"  placeholder="phonenumber">
                              <label for="phonenumber">Phone Number</label>
                          </div>
                          <div class="button-lgon mb-3">
                            <button class="btn btn-login-button form-control">OTP</button>
                        </div>
                            <div class="forget-password-2 text-center pt-3">
                               <p>You don't have an account ?  <a href="register.php">Register Now</a> </p> 
                              </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 d-lg-block d-none">
                    <div class="login-img">
                        <img src="{{asset("assets/img/login.jpg")}}" alt="image" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end -->

@endsection