@extends("layouts.employer-admin")

@push("css")
  <link rel="stylesheet" href="{{asset("DataTables/datatables.min.css")}}">
  <style>
    #published_job td{
      min-width: 160px;
    }
  </style>
@endpush

@push("js")
<script src="{{asset("DataTables/datatables.min.js")}}"></script>

<script>
  $(function () {
      
      var table = $('#published_job').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('employer.job.my-job.draft.list') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'job_name', name: 'job_name'},
              {data: 'job_designation', name: 'job_designation'},

              {data: 'opening_date', name: 'opening_date'},
              // {data: 'score', name: 'score'},
              {data: 'closing_date', name: 'closing_date'},
              {data: 'information', name: 'information'},
              {data: 'location', name: 'location', orderable: false, searchable: false},
              {data: "state", name: "state"},
              {data: "salary_disclosed", name: "salary_disclosed"},
              {data: "min_salary", name: "min_salary"},
              {data: "max_salary", name: "max_salary"},
              {data: "min_qualification", name: "min_qualification"},
              {data: "min_experience", name: "min_experience"},
              {data: "max_experience", name: "max_experience"},
              {data: "qualifications", name: "qualifications"},
              {data: "skills", name: "skills"},
              {data: "created_at", name: "created_at"},
              



          ]
      });
      
    });
</script>
  
@endpush

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Draft Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("employer.dashboard")}}">Employer</a></li>
              <li class="breadcrumb-item active"> My Saved Jobs </li>
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
                <div class=" d-flex justify-content-between">
                    <h5 class="m-0">My Published Jobs</h5>
                    <a href="{{route("employer.job.create")}}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Create a new Job </a>
                </div>
                
              </div>
              <div class="card-body">
               
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            {{-- @if (count($jobs)) --}}
                            <div style="width: 100%; overflow: hidden; overflow-x: auto">
                              <table id="published_job" class="table table-striped">
                              <thead class="table-info">
                                <th> ID </th>
                                <th> Job Name </th>
                                <th> Job Designation </th>
                                <th> Opening Date </th>
                                <th> Closing Date </th>
                                <th> Information </th>
                                <th> Location </th>
                                <th> State </th>
                                <th> Salary Disclosed </th>
                                <th> Min Salary </th>
                                <th> Max Salary </th>
                                <th> Min qualification </th>
                                <th> Min Experience </th>
                                <th> Max Experience </th>
                                <th> Qualifications </th>
                                <th> Skills </th>
                                <th> Created At </th>
                              </thead>

                            </table>
                            </div>
                            

                            {{-- @else
                                <div> 
                                    <span class="not-available" style="font-size: 14px">No Job Pulished Yet!</span>
                                    <a href="{{route("employer.job.create")}}"> Create a Job </a>
                                </div>
                            @endif --}}
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