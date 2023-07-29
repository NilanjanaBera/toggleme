@extends('layouts.master')

@section('content')
    <div class="register py-lg-5 py-0">
        <div class="max-width">
            <div class="container Seekers-container shadow">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/img/checklist.png') }}" alt="" class="w-100">
                    </div>
                    <div class="col-lg-5 ">
                        <form action="{{ url('register') }}" method="post">
                            @csrf
                            <div class="register-info px-3 px-lg-5 py-4 ">
                                <div class="register-header">
                                    <h5>Register Your Account</h5>
                                    <hr>
                                </div>
                                <input name="type" type="hidden" value="2" />
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
                                <div class="form-floating mb-3">
                                    <input type="Number" class="form-control" name="phone" value={{ old('phone') }}
                                        placeholder="Number">
                                    <label for="phonenumber">Phone Number</label>
                                    @error('phone')
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
    </div>
@endsection
