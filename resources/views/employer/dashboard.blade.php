@extends("layouts.employer-admin")

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("employer.dashboard")}}">Employer</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="col-lg-6">
           

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Company</h5>
              </div>
              <div class="card-body">
                {{-- <h6 class="card-title">Special title treatment</h6> --}}
                @if($company)
                    <div>
                        <h4> {{$company->company_name}} </h4>
                        <div> <button class="btn btn-primary"> Details </button> </div>
                    </div>
                @else
                <p class="card-text">You are not associated with any Company.</p>
                <a href="#" class="btn btn-primary">Create a Company</a>
                <a href="#" class="btn btn-default">Join a Company</a>
                @endif
                
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->
          <div class="col-lg-6">
           

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">My Profile</h5>
              </div>
              <div class="card-body">
                {{-- <h6 class="card-title">Special title treatment</h6> --}}
                
                    <div>
                        <h4> {{Auth()->user()->first_name." ".Auth()->user()->last_name}} </h4>
                        <h6> {{$role}} at {{$company->company_name}} </h6>
                        <div> <a class="btn btn-primary" href="{{route("employer.my-profile")}}"> Details </a> </div>
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