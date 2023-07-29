@extends('layouts.employer-admin')

@push('css')
    <style>
        .ck-editor__editable {
            min-height: 200px !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">New Job</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('employer.dashboard') }}">Employer</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('employer.job.my-job.index') }}">Jobs</a></li>
                            <li class="breadcrumb-item active"> Create New Job </li>
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
                                <h5 class="m-0"> Create New Job </h5>
                            </div>
                            <div class="card-body">

                                <div>
                                    <form id="job_form" action="{{ route('employer.job.cstore') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Job Name </label>
                                                <input type="text" class="form-control" name="job_name"
                                                    value="{{ old('job_name') }}" aria-describedby="emailHelp">

                                                <span class="text-danger error-text job_name_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Job Designation </label>
                                                <input type="text" class="form-control" name="job_designation"
                                                    value="{{ old('job_designation') }}" aria-describedby="emailHelp">
                                                <span class="text-danger error-text job_designation_error"></span>

                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Job Image </label>
                                                <input type="file" name="job_image" id="job_image">

                                                <span class="text-danger error-text job_image_error"></span>

                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Job Category </label>

                                                <select type="text" class="form-control" name="job_category"
                                                    aria-describedby="emailHelp">
                                                    <option value=""> Select job category </option>
                                                    @foreach ($category as $category)
                                                        <option value="{{ $category->category }}"> {{ $category->category }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger error-text job_category_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Job Type </label>
                                                <br />
                                                <label><input type="radio" name="job_type" value="Full Time"> Full Time
                                                </label>
                                                &nbsp;
                                                <label><input type="radio" name="job_type" value="Part Time"> Part Time
                                                </label>

                                                <span class="text-danger error-text job_type_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Office Type </label>
                                                <br />
                                                <label><input type="radio" name="office_type" value="Work From Office">
                                                    Work From Office </label>
                                                &nbsp;
                                                <label><input type="radio" name="office_type" value="Work From Home"> Work
                                                    From Home </label>
                                                &nbsp;
                                                <label><input type="radio" name="office_type"
                                                        value="Both Work From Home & Office"> Both Work From Home & Office
                                                </label>

                                                <span class="text-danger error-text office_type_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-12">
                                                <label for="exampleInputEmail1" class="form-label"> Job Information </label>
                                                <textarea id="information" name="information">{{ old('information') }}</textarea>
                                                <span class="text-danger error-text information_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Job Post Validity
                                                    Starts
                                                    From </label>
                                                <div id="emailHelp" class="form-text not-available"> This Post will be
                                                    visible on the portal <b>from</b> this date </div>

                                                <input type="date" class="form-control" name="opening_date"
                                                    value="{{ old('opening_date') }}" aria-describedby="emailHelp">
                                                <span class="text-danger error-text opening_date_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Job Post Validity Ends
                                                    On </label>
                                                <div id="emailHelp" class="form-text not-available"> This Post will be
                                                    visible on the portal <b>up to</b> this date </div>

                                                <input type="date" class="form-control" name="closing_date"
                                                    value="{{ old('closing_date') }}" aria-describedby="emailHelp">
                                                <span class="text-danger error-text closing_date_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Location </label>

                                                <input type="text" class="form-control" name="location"
                                                    value="{{ old('location') }}" aria-describedby="emailHelp"
                                                    placeholder="City name only, e.g: Kolkata">
                                                <span class="text-danger error-text location_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> State </label>

                                                <select type="text" class="form-control" name="state"
                                                    aria-describedby="emailHelp">
                                                    <option value=""> Select a state </option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->name }}"> {{ $state->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger error-text state_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Salary Disclosed
                                                </label>

                                                <select type="text" id="salary_disclosed" class="form-control"
                                                    name="salary_disclosed" aria-describedby="emailHelp">
                                                    <option value="no" selected> No </option>
                                                    <option value="yes"> Yes </option>

                                                </select>
                                                <span class="text-danger error-text salary_disclosed_error"></span>

                                            </div>

                                            <div class="col-lg-6">
                                                <div id="salary_section" class="row" style="display: none">
                                                    <div class="mb-3 col-lg-6">
                                                        <label for="exampleInputEmail1" class="form-label"> Minimum Salary
                                                            Per Year
                                                        </label>

                                                        <input type="text" class="form-control" name="min_salary"
                                                            value="{{ old('min_salary') }}" aria-describedby="emailHelp">
                                                        <span class="text-danger error-text min_salary_error"></span>


                                                    </div>
                                                    <div class="mb-3 col-lg-6">
                                                        <label for="exampleInputEmail1" class="form-label"> Maximum Salary
                                                            Per
                                                            Year
                                                        </label>

                                                        <input type="text" class="form-control" name="max_salary"
                                                            value="{{ old('max_salary') }}" aria-describedby="emailHelp">
                                                        <span class="text-danger error-text max_salary_error"></span>>


                                                    </div>
                                                </div>



                                            </div>

                                            <div class="mb-3 col-lg-4">
                                                <label for="exampleInputEmail1" class="form-label"> Minimum Education
                                                    Level
                                                </label>

                                                <select type="text" class="form-control" name="min_qualification"
                                                    aria-describedby="emailHelp">
                                                    <option value=""> Select One </option>
                                                    <option value="1"> 10 </option>
                                                    <option value="2"> 10+2 </option>
                                                    <option value="3"> Graduation </option>
                                                    <option value="4"> Post Graduation </option>
                                                </select>
                                                <span class="text-danger error-text min_qualification_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-4">
                                                <label for="exampleInputEmail1" class="form-label"> Minimum Experience
                                                </label>

                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="min_experience"
                                                        value="{{ old('min_experience') }}" aria-describedby="emailHelp"
                                                        placeholder="Write 0 if freshers are allowed">

                                                    <span class="input-group-text" id="basic-addon2">years</span>
                                                </div>

                                                <span class="text-danger error-text min_experience_error"></span>


                                            </div>

                                            <div class="mb-3 col-lg-4">
                                                <label for="exampleInputEmail1" class="form-label"> Maximum Experience
                                                </label>

                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="max_experience"
                                                        value="{{ old('max_experience') }}" aria-describedby="emailHelp"
                                                        placeholder="Leave it blank if there is no up limit">

                                                    <span class="input-group-text" id="basic-addon2">years</span>
                                                </div>


                                                <span class="text-danger error-text max_experience_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Qualifications
                                                </label>

                                                <select type="text" class="form-control" id="qualifications"
                                                    name="qualifications[]" multiple="multiple"
                                                    aria-describedby="emailHelp">

                                                </select>
                                                <span class="text-danger error-text qualifications_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label"> Skills
                                                </label>

                                                <select type="text" class="form-control" id="skills"
                                                    name="skills[]" multiple="multiple" aria-describedby="emailHelp">

                                                </select>
                                                <span class="text-danger error-text skills_error"></span>

                                            </div>

                                            <div class="mb-3 col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label> Publishing Options </label>
                                                        <br />
                                                        <label><input type="radio" name="publish_option" value="1"
                                                                id=""> Publish Now</label>
                                                        <br />
                                                        <label><input type="radio" name="publish_option" value="0"
                                                                id=""> Save as Draft</label>
                                                        <span class="text-danger error-text publish_option_error"></span>

                                                    </div>
                                                    <div class="col-md-6" style="text-align: right">
                                                        <button id="publish_btn" class="btn btn-sm btn-primary"
                                                            type="submit">
                                                            <i class="fa fa-upload"></i> Publish </button>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 col-lg-12" style="text-align: center">


                                                <div id="alert_success"
                                                    class="alert alert-success alert-dismissible fade show"
                                                    style="display: none" role="alert">
                                                    <strong>Success!</strong> Job is published.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div id="alert_draft"
                                                    class="alert alert-warning alert-dismissible fade show"
                                                    style="display: none" role="alert">
                                                    <strong>Success!</strong> Job is saved as draft.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>


                                            </div>

                                        </div>
                                    </form>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        var informationEditor;
        ClassicEditor
            .create(document.querySelector('#information'))
            .then(editor => {
                editor.ui.view.editable.element.style.height = '200px';
                informationEditor = editor
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        $("input[name=publish_option]").click(function() {
            var v1 = $(this).val();
            if (v1 == "1") {
                $("#publish_btn").html("<i class='fa fa-upload'></i> Publish Now")
                $("#publish_btn").removeClass("btn-primary").addClass("btn-success")
            } else {
                $("#publish_btn").html("<i class='fa fa-save'></i> Save As Draft Now")
                $("#publish_btn").removeClass("btn-success").addClass("btn-primary")
            }
        })

        $("#salary_disclosed").change(function() {
            var v1 = $(this).val()
            if (v1 == "yes") {
                $("#salary_section").slideDown(600)
            } else {
                $("#salary_section").slideUp(600)
            }
        })

        $("#qualifications").select2({
            theme: "classic",
            placeholder: "Select multiple qualifications",
            ajax: {
                url: "{{ route('all_qualifications.index') }}",
                dataType: 'json',
                data: function(term, page) {
                    return {
                        q: term, // search term
                        page_limit: 10,
                    };
                },

                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }

        });

        $("#skills").select2({
            theme: "classic",
            placeholder: "Select multiple skills",
            ajax: {
                url: "{{ route('all_skills.index') }}",
                dataType: 'json',
                data: function(term, page) {
                    return {
                        q: term, // search term
                        page_limit: 10,
                    };
                },

                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        // $("#publish_btn").click(function(e) {
        //     e.preventDefault();
        //     var image = $('#job_image').val();
        //     console.log(image);
        //     var all_variable = $("#job_form").serialize();
        //     all_variable += "&information=" + informationEditor.getData();
        //     console.log("information", all_variable, image)
        //     $.post("{{ route('employer.job.store') }}", all_variable, function(data) {
        //             $("#alert_success").slideDown(600);
        //         })
        //         .done(function() {
        //             // $("#job_form").empty()
        //             $(':input', '#job_form')
        //                 .not(':button, :submit, :reset, :hidden')
        //                 .val('')
        //                 .prop('checked', false)
        //                 .prop('selected', false);
        //             $("#qualifications").select2()
        //             $("#skills").select2()
        //             informationEditor.setData("")

        //             $("#job_form").reset()

        //         })
        //         // .fail(function(data) {
        //         //     // console.log("fail", data.responseJSON.errors)
        //         //     var d1 = data.responseJSON.errors
        //         //     if (d1.job_name) {
        //         //         $("#job_name_error").html(d1.job_name[0])
        //         //     } else {
        //         //         $("#job_name_error").html("")
        //         //     }

        //         //     if (d1.office_type) {
        //         //         $("#office_type_error").html(d1.office_type[0])
        //         //     } else {
        //         //         $("#office_type_error").html("")
        //         //     }

        //         //     if (d1.job_type) {
        //         //         $("#job_type_error").html(d1.job_type[0])
        //         //     } else {
        //         //         $("#job_type_error").html("")
        //         //     }
        //         //     if (d1.job_category) {
        //         //         $("#job_category_error").html(d1.job_category[0])
        //         //     } else {
        //         //         $("#job_category_error").html("")
        //         //     }
        //         //     if (d1.job_designation) {
        //         //         $("#job_designation_error").html(d1.job_designation[0])
        //         //     } else {
        //         //         $("#job_designation_error").html("")
        //         //     }
        //         //     if (d1.job_image) {
        //         //         $("#job_image_error").html(d1.job_image[0])
        //         //     } else {
        //         //         $("#job_image_error").html("")
        //         //     }

        //         //     if (d1.information) {
        //         //         $("#information_error").html(d1.job_information[0])
        //         //     } else {
        //         //         $("#information_error").html("")
        //         //     }

        //         //     if (d1.opening_date) {
        //         //         $("#opening_date_error").html(d1.opening_date[0])
        //         //     } else {
        //         //         $("#opening_date_error").html("")
        //         //     }

        //         //     if (d1.closing_date) {
        //         //         $("#closing_date_error").html(d1.closing_date[0])
        //         //     } else {
        //         //         $("#closing_date_error").html("")
        //         //     }

        //         //     if (d1.location) {
        //         //         $("#location_error").html(d1.location[0])
        //         //     } else {
        //         //         $("#location_error").html("")
        //         //     }

        //         //     if (d1.state) {
        //         //         $("#state_error").html(d1.location[0])
        //         //     } else {
        //         //         $("#state_error").html("")
        //         //     }

        //         //     if (d1.salary_disclosed) {
        //         //         $("#salary_disclosed_error").html(d1.salary_disclosed[0])
        //         //     } else {
        //         //         $("#salary_disclosed_error").html("")
        //         //     }

        //         //     if (d1.min_salary) {
        //         //         $("#min_salary_error").html(d1.min_salary[0])
        //         //     } else {
        //         //         $("#min_salary_error").html("")
        //         //     }

        //         //     if (d1.max_salary) {
        //         //         $("#max_salary_error").html(d1.max_salary[0])
        //         //     } else {
        //         //         $("#max_salary_error").html("")
        //         //     }

        //         //     if (d1.min_qualification) {
        //         //         $("#min_qualification_error").html(d1.min_qualification[0])
        //         //     } else {
        //         //         $("#min_qualification_error").html("")
        //         //     }

        //         //     if (d1.min_experience) {
        //         //         $("#min_experience_error").html(d1.min_experience[0])
        //         //     } else {
        //         //         $("#min_experience_error").html("")
        //         //     }

        //         //     if (d1.max_experience) {
        //         //         $("#max_experience_error").html(d1.max_experience[0])
        //         //     } else {
        //         //         $("#max_experience_error").html("")
        //         //     }

        //         //     if (d1.qualifications) {
        //         //         $("#qualification_error").html(d1.qualifications[0])
        //         //     } else {
        //         //         $("#qualification_error").html("")
        //         //     }

        //         //     if (d1.skills) {
        //         //         $("#skills_error").html(d1.skills[0])
        //         //     } else {
        //         //         $("#skills_error").html("")
        //         //     }

        //         //     if (d1.publish_option) {
        //         //         $("#publish_error").html(d1.publish_option[0])
        //         //     } else {
        //         //         $("#publish_error").html("")
        //         //     }

        //         // })
        // });
        $('#job_form').on('submit', function(e) {

            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        console.log(data.error);
                        $.each(data.error, function(key, value) {
                            $('span.' + key + '_error').text(value[0]);
                        });

                    } else {
                        $('#job_form')[0].reset();


                        console.log(data.success);
                        $("#alert_success").slideDown(600);
                        //    location.reload(true);
                        //    setTimeout(function() {
                        //     location.reload(true);
                        //         }, 600);
                        setTimeout(function() {
                            // alert('Reloading Page');
                            location.reload(true);
                        }, 3000);


                    }
                }
            });

        });
    </script>
@endpush
