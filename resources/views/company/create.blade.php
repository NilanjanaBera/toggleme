@extends("layouts.master")

@section("content")
<div class="register py-lg-5 py-0">
    <div class="max-width">
        <div class="container Seekers-container shadow">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5">
                    <img src="{{ asset('assets/img/checklist.png') }}" alt="" class="w-100">
                </div>
                <div class="col-lg-6 ">
                    <form action="{{ route("company.create.post") }}" method="post">
                        @csrf
                        <div class="register-info px-3 px-lg-5 py-4 ">
                            <div class="register-header">
                                <h5>Create Company</h5>
                                <hr>
                            </div>
                            <input name="type" type="hidden" value="2" />
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="company_name"
                                    value="{{ old('company_name') }}" placeholder="fullname">
                                <label for="fullname">Company Name*</label>
                                @error('company_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone"
                                    value="{{ old('phone') }}" placeholder="fullname">
                                <label for="fullname">Official Phone Number*</label>
                                @error('phone')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="email">
                                <label for="email">Official Email Address*</label>
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                            <div class="row">

                                <div class="col-6 form-floating mb-1">
                                    <input type="strength" class="form-control" name="strength" placeholder="strength">
                                    <label for="strength">Strength*</label>
                                    @error('strength')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 form-floating mb-1">
                                    <select class="form-select form-control py-3 mb-3" name="business_type" aria-label=".form-select-lg example">
                                        <option value=""> Business Type* </option>
                                        <option> Automotive </option>
                                        <option> Business Support & Supplies </option>
                                        <option> Computers & Electronics  </option>
                                        <option> Construction & Contractors </option>
                                        <option> Education </option>
                                        <option> Entertainment </option>
                                        <option> Food & Dining </option>
                                        <option> Health & Medicine </option>
                                        <option> Home & Garden </option>
                                        <option> Information & Technology </option>
                                        <option> Legal & Financial </option>
                                        <option> Manufacturing, Wholesale,
                                            Distribution </option>
                                        <option> Merchants (Retail) </option>
                                        <option> Personal Care & Services </option>
                                        <option> Real Estate </option>
                                        <option> Travel & Transportation </option>
                                    </select>
                                    @error("business_type")
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>                            
                                    @enderror
    
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-6 form-floating mb-3">
                                    <input type="text" class="form-control" name="gst" placeholder="gst">
                                    <label for="gst">GST No.</label>
                                    @error('gst')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 form-floating mb-3">
                                    <input type="text" class="form-control" name="cin" placeholder="cin">
                                    <label for="cin">CIN No.</label>
                                    @error('cin')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
    
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-12 form-floating mb-1">
                                    <select class="form-select form-control py-3 mb-3" name="role" aria-label=".form-select-lg example">
                                        <option value=""> Your Role In Company* </option>
                                        <option> Owner </option>
                                        <option> HR </option>
                                       
                                    </select>
                                    @error("role")
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>                            
                                    @enderror
    
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 form-floating mb-3">
                                    <input type="text" class="form-control" name="street" value="{{ old('street') }}"  placeholder="Street">
                                    <label for="phonenumber"> Street* </label>
                                    @error('street')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating mb-3">
                                    <input type="text" class="form-control" name="area" value="{{ old('area') }}"  placeholder="Area">
                                    <label for="phonenumber"> Area* </label>
                                    @error('area')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-floating mb-3">
                                    <input type="text" class="form-control" name="city" value="{{ old('city') }}"
                                        placeholder="City">
                                    <label for="phonenumber"> City* </label>
                                    @error('city')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating mb-3">
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
                            </div>

                            <div class="row">
                                <div class="col-6 form-floating mb-3">
                                    <input type="text" class="form-control" name="landmark" value="{{ old('landmark') }}"
                                        placeholder="Land Mark">
                                    <label for="phonenumber"> Land Mark </label>
                                    @error('landmark')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating mb-3">
                                    <input type="Number" class="form-control" name="pin" value={{ old('pin') }}
                                        placeholder="Number">
                                    <label for="phonenumber"> PIN* </label>
                                    @error('pin')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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