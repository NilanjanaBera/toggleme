@extends('layouts.employer-admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> My Company </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('employer.dashboard') }}">Employer</a></li>
                            <li class="breadcrumb-item active">Company</li>
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
                                <h5 class="m-0"> Company Profile </h5>
                            </div>
                            <div class="card-body">
                                {{-- <h6 class="card-title">Special title treatment</h6> --}}

                                <div class="row align-items-center">

                                    <div class="col-md-6">

                                        <div class="d-flex justify-content-center">
                                            <div style="border: 1px dashed #c6c3c3; height: 400px; width: 400px">
                                                <img id="preview_image" src="{{url($company->logo)}}" style="max-height: 100%; max-width: 100%" />
                                            </div>
                                        </div>


                                        <form id="logo_upload_form" enctype="multipart/form-data" class="mt-2">
                                            @csrf
                                            <div class="text-center">
                                                <input type="file" id="logo" name="logo" />
                                            </div>

                                            <div class="text-center mt-2">
                                                <button id="logo_upload_button" class="btn btn-primary"> <i
                                                        class="fa fa-upload"></i> Upload Logo </button>
                                            </div>
                                        </form>

                                        <div class="mt-2">
                                            <div class="alert alert-success alert-dismissible fade show"
                                                style="display: none" role="alert">
                                                Logo Updated Successfully
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="alert alert-danger alert-dismissible fade show"
                                                style="display: none" role="alert">
                                                There is some error to upload the Logo
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h4> {{ $company->company_name }} </h4>
                                            {{-- <a href="{{ route('employer.company-profile.edit') }}"
                                                class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit </a> --}}
                                        </div>
                                        <div>
                                          <form action="{{route("employer.company-profile.update", $company->id)}}" method="post" >
                                            @csrf
                                            <table class="table table-striped">
                                                <tr>
                                                    <td> Company Name </td>
                                                    <td>
                                                        <input class="form-control" name="company_name"
                                                            value="{{ old('company_name', $company->company_name) }}" />
                                                        @error('company_name')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Phone </td>
                                                    <td>
                                                        <input class="form-control" name="phone"
                                                            value="{{ old('phone', $company->phone) }}" />
                                                        @error('phone')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td> Email </td>
                                                    <td>
                                                        <input class="form-control" name="email"
                                                            value="{{ old('email', $company->email) }}" />
                                                        @error('email')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td> Strength </td>
                                                    <td>
                                                        <input class="form-control" name="strength"
                                                            value="{{ old('strength', $company->strength) }}" />
                                                        @error('strength')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td> GST </td>
                                                    <td>
                                                        <input class="form-control" name="gst"
                                                            value="{{ old('gst', $company->gst) }}" />
                                                        @error('gst')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td> CIN </td>
                                                    <td>
                                                        <input class="form-control" name="cin"
                                                            value="{{ old('cin', $company->cin) }}" />
                                                        @error('cin')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td> Business Type </td>
                                                    <td>
                                                        <select class="form-control" name="business_type" aria-label="">
                                                            <option value=""> Business Type* </option>
                                                            <option
                                                                @if ($company->business_type == 'Automotive') {{ 'selected' }} @endif>
                                                                Automotive </option>

                                                            <option value="Business Support & Supplies"
                                                                @if ($company->business_type == 'Business Support & Supplies') selected @endif>Business
                                                                Support & Supplies</option>
                                                            <option value="Computers & Electronics"
                                                                @if ($company->business_type == 'Computers & Electronics') selected @endif>Computers
                                                                & Electronics</option>
                                                            <option value="Construction & Contractors"
                                                                @if ($company->business_type == 'Construction & Contractors') selected @endif>
                                                                Construction & Contractors</option>
                                                            <option value="Education"
                                                                @if ($company->business_type == 'Education') selected @endif>Education
                                                            </option>
                                                            <option value="Entertainment"
                                                                @if ($company->business_type == 'Entertainment') selected @endif>
                                                                Entertainment</option>
                                                            <option value="Food & Dining"
                                                                @if ($company->business_type == 'Food & Dining') selected @endif>Food &
                                                                Dining</option>
                                                            <option value="Health & Medicine"
                                                                @if ($company->business_type == 'Health & Medicine') selected @endif>Health &
                                                                Medicine</option>
                                                            <option value="Home & Garden"
                                                                @if ($company->business_type == 'Home & Garden') selected @endif>Home &
                                                                Garden</option>
                                                            <option value="Information & Technology"
                                                                @if ($company->business_type == 'Information & Technology') selected @endif>
                                                                Information & Technology</option>
                                                            <option value="Legal & Financial"
                                                                @if ($company->business_type == 'Legal & Financial') selected @endif>Legal &
                                                                Financial</option>
                                                            <option value="Manufacturing, Wholesale, Distribution"
                                                                @if ($company->business_type == 'Manufacturing, Wholesale, Distribution') selected @endif>
                                                                Manufacturing, Wholesale, Distribution</option>
                                                            <option value="Merchants (Retail)"
                                                                @if ($company->business_type == 'Merchants (Retail)') selected @endif>
                                                                Merchants (Retail)</option>
                                                            <option value="Personal Care & Services"
                                                                @if ($company->business_type == 'Personal Care & Services') selected @endif>Personal
                                                                Care & Services</option>
                                                            <option value="Real Estate"
                                                                @if ($company->business_type == 'Real Estate') selected @endif>Real
                                                                Estate</option>
                                                            <option value="Travel & Transportation"
                                                                @if ($company->business_type == 'Travel & Transportation') selected @endif>Travel &
                                                                Transportation</option>
                                                        </select>

                                                        @error('business_type')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td> Address </td>
                                                    <td>
                                                        <p><input class="form-control" name="street"
                                                                value="{{ old('street', $company->street) }}"
                                                                placeholder="Street" /></p>
                                                        @error('street')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror

                                                        <p>
                                                            <input class="form-control" name="area"
                                                                value="{{ old('area', $company->area) }}"
                                                                placeholder="Area" />
                                                            @error('area')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                        </p>
                                                        <p>
                                                            <input class="form-control" name="city"
                                                                value="{{ old('city', $company->city) }}"
                                                                placeholder="City" />
                                                            @error('city')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                        </p>
                                                        <p>

                                                            <select class="form-select form-control" name="state"
                                                                aria-label=".form-select-lg example">
                                                                <option value=""> Select a State* </option>
                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->name }}"
                                                                        {{ old('state', $state->name) == $state->name ? 'selected' : '' }}>
                                                                        {{ $state->name }} </option>
                                                                @endforeach
                                                            </select>
                                                            @error('state')
                                                            <div class="text-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror

                                                        </p>
                                                        <p>
                                                            <input class="form-control" name="landmark"
                                                                value="{{ old('landmark', $company->landmark) }}"
                                                                placeholder="Landmark" />
                                                            @error('landmark')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                        </p>
                                                        <p>
                                                            <input class="form-control" name="pin"
                                                                value="{{ old('pin', $company->pin) }}"
                                                                placeholder="pin" />
                                                            @error('pin')
                                                            <div class="text-danger"> {{ $message }} </div>
                                                        @enderror
                                                        </p>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                      @if(session()->has("message"))
                                                      <div class="text-success">
                                                        {{session()->get("message")}}
                                                      </div>
                                                      @endif
                                                    </td>
                                                    <td class="text-right">
                                                        <button type="submit" class="btn btn-primary btn-sm"> Update
                                                        </button>
                                                    </td>
                                                </tr>

                                            </table>
                                          </form>
                                        </div>

                                    </div>

                                </div>

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

@push('js')
    <script>
        $(document).ready(function() {
            // When the file input changes
            $('#logo').change(function(e) {
                var file = e.target.files[0];

                // Check if the selected file is an image
                if (file && file.type.match('image.*')) {
                    var reader = new FileReader();

                    // Set up the reader to load the image
                    reader.onload = function(e) {
                        $('#preview_image').attr('src', e.target.result);
                    }

                    // Read the image file as a data URL
                    reader.readAsDataURL(file);
                }
            });
        });

        $(document).ready(function() {
            // Intercept the form submission
            $('#logo_upload_form').submit(function(e) {
                e.preventDefault(); // Prevent form from submitting normally

                var formData = new FormData();
                var fileInput = $('#logo')[0].files[0]; // Get the selected file
                var csrfToken = "{{ csrf_token() }}";

                formData.append('logo', fileInput); // Add the file to the form data

                $.ajax({
                    url: "{{ route('employer.company-profile.logo-upload') }}", // Replace 'upload.php' with the URL to your server-side script
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                    },
                    success: function(response) {
                        $(".alert-success").show()
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        $(".alert-danger").show()
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
