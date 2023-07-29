@extends('layouts.employer-admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Company Branches </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('employer.dashboard') }}">Employer</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('employer.company-profile') }}">Company</a>
                            </li>
                            <li class="breadcrumb-item active">Branches</li>
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
                                <h5 class="m-0"> Edit Branch </h5>
                            </div>
                            <div class="card-body">
                                {{-- <h6 class="card-title">Special title treatment</h6> --}}

                                <div class="row">

                                    <div class="col-lg-5">
                                        <div class="px-4">
                                            <div class="d-flex justify-content-between">
                                                <h4> Branch </h4>

                                            </div>
                                            <div class="mt-3">
                                                <div class="card">
                                                    <div class="card-header">
                                                        {{ $branch->branch_name }}
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <a href="mailto:{{ $branch->email }}">
                                                                    <i class="fa fa-envelope"></i> {{ $branch->email }}
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="tel:{{ $branch->phone }}">
                                                                    <i class="fa fa-phone"></i> {{ $branch->phone }}
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            Description: {{ $branch->description }}
                                                        </div>

                                                        <div class="mt-3">Address: </div>

                                                        <div>
                                                            <table style="width: 100%">
                                                                <tr>
                                                                    <td>Street: {{ $branch->street }}</td>
                                                                    <td>Area: {{ $branch->area }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>City: {{ $branch->city }}</td>
                                                                    <td>State: {{ $branch->state }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Landmark: {{ $branch->landmark }}</td>
                                                                    <td>PIN: {{ $branch->pin }}</td>
                                                                </tr>
                                                            </table>

                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="d-flex justify-content-end ">
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="fa fa-edit"></i> <i>Edit</i>
                                                            </button>
                                                            <button class="btn btn-danger btn-sm ml-2">
                                                                <i class="fa fa-trash"></i> <i>Delete</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if(session()->has("message"))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{session()->get("message")}}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="px-4">
                                            <div class="d-flex justify-content-between">
                                                <h4> Edit Branch </h4>
                                            </div>

                                            <div class="bg-light p-4">
                                                <form action="{{ route('employer.branch.update', $branch->id ) }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-lg-12">
                                                            <label for="exampleInputEmail1" class="form-label">Branch
                                                                Name</label>
                                                            <input type="text" class="form-control" name="branch_name"
                                                                id="exampleInputEmail1" value="{{ old('branch_name', $branch->branch_name) }}"
                                                                aria-describedby="emailHelp">
                                                            @error('branch_name')
                                                                <div id="emailHelp" class="form-text text-danger">
                                                                    {{ $message }} </div>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="exampleInputEmail1" class="form-label">Branch
                                                                Description</label>
                                                            <textarea type="text" class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp">{{ old('description', $branch->description) }}</textarea>
                                                            @error('description')
                                                                <div id="emailHelp" class="form-text text-danger">
                                                                    {{ $message }} </div>
                                                            @enderror
                                                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ old('email', $branch->email) }}" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp">
                                                            @error('email')
                                                                <div id="emailHelp" class="form-text text-danger">
                                                                    {{ $message }} </div>
                                                            @enderror
                                                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label"> Phone Number
                                                            </label>
                                                            <input type="text" name="phone" class="form-control"
                                                                value="{{ old('phone', $branch->phone) }}"" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp">
                                                            @error('phone')
                                                                <div id="emailHelp" class="form-text text-danger">
                                                                    {{ $message }} </div>
                                                            @enderror
                                                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label"> Street
                                                            </label>
                                                            <input type="text" name="street" class="form-control"
                                                                value="{{ old('street', $branch->street) }}" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp">
                                                            @error('street')
                                                                <div id="emailHelp" class="form-text text-danger">
                                                                    {{ $message }} </div>
                                                            @enderror
                                                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label"> Area
                                                            </label>
                                                            <input type="text" name="area" class="form-control"
                                                                value="{{ old('area', $branch->area) }}" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp">
                                                            @error('area')
                                                                <div id="emailHelp" class="form-text text-danger">
                                                                    {{ $message }} </div>
                                                            @enderror
                                                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label"> City
                                                            </label>
                                                            <input type="text" name="city" class="form-control"
                                                                value="{{ old('city', $branch->city) }}" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp">
                                                            @error('city')
                                                                <div id="emailHelp" class="form-text text-danger">
                                                                    {{ $message }} </div>
                                                            @enderror
                                                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label"> State
                                                            </label>
                                                            <select name="state" class="form-control">
                                                                <option value="">Select a State</option>
                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->name }}"
                                                                        @if (old('state', $branch->state) == $state->name) {{ 'selected' }} @endif>
                                                                        {{ $state->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('state')
                                                                <div id="emailHelp" class="form-text text-danger">
                                                                    {{ $message }} </div>
                                                            @enderror
                                                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label"> Landmark
                                                            </label>
                                                            <input type="text" name="landmark" class="form-control"
                                                                value="{{ old('landmark', $branch->landmark) }}" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp">
                                                            @error('landmark')
                                                                <div id="emailHelp" class="form-text text-danger">
                                                                    {{ $message }} </div>
                                                            @enderror
                                                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label"> PIN
                                                            </label>
                                                            <input type="text" name="pin" class="form-control"
                                                                value="{{ old('pin', $branch->pin) }}" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp">
                                                            @error('pin')
                                                                <div id="emailHelp" class="form-text text-danger">
                                                                    {{ $message }} </div>
                                                            @enderror
                                                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                        </div>

                                                        <div class="mb-3 ">
                                                            <button class="btn btn-primary btn-sm"> Update Branch </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>


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
