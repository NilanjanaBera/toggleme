@extends("layouts.employer-admin")

@section("content")
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
              <li class="breadcrumb-item"><a href="{{route("employer.dashboard")}}">Employer</a></li>
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
                
                <div class="row">
                    <div class="col-lg-6">
                      <div  class="d-flex justify-content-between align-items-center mb-3" >
                        <img src={{url($company->logo)}} style="max-width: 100px; max-height: 100px" />
                        <h4> {{$company->company_name}} </h4>
                        <a href="{{route("employer.company-profile.edit")}}" class="btn btn-primary btn-sm">  <i class="fa fa-edit"></i> Edit </a>
                      </div>
                        <div>
                            <table class="table table-striped">
                                <tr>
                                    <td> Phone </td>
                                    <td> {{$company->phone}} </td>
                                </tr>
                                
                                <tr>
                                    <td> Email </td>
                                    <td> {{$company->email}} </td>
                                </tr>

                                <tr>
                                  <td> GST </td>
                                  <td> {!! $company->gst ?: "<span class='not-available'>Not Available</span>" !!} </td>
                              </tr>
                                
                                <tr>
                                    <td> CIN </td>
                                    <td> {!! $company->cin ?: "<span class='not-available'>Not Available</span>" !!} </td>
                                </tr>

                                <tr>
                                    <td> Business Type </td>
                                    <td> {{$company->business_type}} </td>
                                </tr>

                                <tr>
                                  <td> Business Type </td>
                                  <td> {{$company->business_type}} </td>
                              </tr>

                                <tr>
                                    <td> Address </td>
                                    <td> 
                                        <p>Street: {{$company->street}}</p>
                                        <p>Area: {{$company->area}}</p>
                                        <p>City: {{$company->city}}</p>
                                        <p>State: {{$company->state}}</p>
                                        <p>Landmark: {{$company->landmark}}</p>

                                    </td>
                                </tr>

                            </table>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="px-4">
                            <div class="d-flex justify-content-between">
                                <h4> Branches </h4>
                                <a href="{{route("employer.branch.index")}}" class="btn btn-primary btn-sm"> 
                                     Add Branch 
                                </a>
                            </div>
                            @if(count($company->branches))
                            @foreach ($company->branches as $branch)
                            <div class="mt-3">
                              <div class="card">
                                <div class="card-header">
                                  {{$branch->branch_name}}
                                </div>
                                <div class="card-body">
                                  <div class="d-flex justify-content-between">
                                    <div>
                                      <a href="mailto:{{$branch->email}}">
                                        <i class="fa fa-envelope"></i> {{$branch->email}}
                                      </a>
                                    </div>
                                    <div>
                                      <a href="tel:{{$branch->phone}}">
                                        <i class="fa fa-phone"></i> {{$branch->phone}}
                                      </a>
                                    </div>
                                  </div>

                                  <div>
                                    Description: {{$branch->description}}
                                  </div>

                                  <div class="mt-3">Address: </div>

                                  <div>
                                     <table style="width: 100%">
                                      <tr>
                                        <td>Street: {{$branch->street}}</td>
                                        <td>Area: {{$branch->area}}</td>
                                      </tr>
                                      <tr>
                                        <td>City: {{$branch->city}}</td>
                                        <td>State: {{$branch->state}}</td>
                                      </tr>
                                      <tr>
                                        <td>Landmark: {{$branch->landmark}}</td>
                                        <td>PIN: {{$branch->pin}}</td>
                                      </tr>
                                     </table>
                                     
                                  </div>
                                </div>
                                <div class="card-footer">
                                  <div class="d-flex justify-content-end ">
                                    <a href="{{route("employer.branch.edit", $branch->id)}}" class="btn btn-primary btn-sm">
                                      <i class="fa fa-edit"></i> <i>Edit</i>
                                    </a>
                                    <button class="btn btn-danger btn-sm ml-2">
                                      <i class="fa fa-trash"></i> <i>Delete</i>
                                    </button>
                                  </div>
                                </div>
                              </div>
                          </div>
                                
                            @endforeach
                            @else
                            <div class="mt-2 not-available">No Branches Available</div>
                            @endif
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