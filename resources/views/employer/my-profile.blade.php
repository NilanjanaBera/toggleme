@extends("layouts.employer-admin")

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("employer.dashboard")}}">Employer</a></li>
              <li class="breadcrumb-item active"> My Profile </li>
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
                <h5 class="m-0">My Profile</h5>
              </div>
              <div class="card-body">
               
                <div class="row">
                    <div class="col-lg-6">

                    </div>
                    <div class="col-lg-6">
                        <h4>{{$user->first_name." ".$user->last_name}}</h4>
                        
                        <div class="mt-3">
                            <h5>Contact details</h5>
                            <table class="table table-striped">
                                <tr>
                                    <td> Email </td>
                                    <td> {{ $user->email }} </td>
                                </tr>

                                <tr>
                                    <td> Alternate Email </td>
                                    <td> {!! $user->alternate_email?: "<span class='not-available'>Not available</span>" !!} </td>
                                </tr>

                                <tr>
                                    <td> Phone </td>
                                    <td> {{ $user->phone }} </td>
                                </tr>

                                <tr>
                                    <td> Alternate Phone </td>
                                    <td> {!! $user->alternate_phone?: "<span class='not-available'>Not available</span>" !!} </td>
                                </tr>

                                <tr>
                                    <td> Whatsapp Number </td>
                                    <td> {!! $user->whatsapp_number?: "<span class='not-available'>Not available</span>" !!} </td>
                                </tr>
                            </table>
                        </div>

                        <div class="mt-5">
                            <h5> Company Details</h5>
                            <table class="table table-striped">
                                <tr>
                                    <td> Company </td>
                                    <td> {{ $company->company_name }} </td>
                                </tr>

                                <tr>
                                    <td> Branch </td>
                                    <td> {!! $branch ? $brnach->branch_name : "<span class='not-available'>Not available</span>" !!} </td>
                                </tr>

                                <tr>
                                    <td> Your Role </td>
                                    <td> {{ $role->role }} </td>
                                </tr>

                                
                            </table>
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