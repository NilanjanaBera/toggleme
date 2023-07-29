<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset("assets/img/favicon.png")}}" sizes="48x48" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">

    <link rel="stylesheet" href="{{asset("assets/css/responsive.css")}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Toggle me</title>
</head>

<body>

    {{-- Header --}}
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top ">
        <div class="container ">
          <a class="navbar-brand" href="{{route("home")}}"><img src="{{asset("assets/img/logo-3.png")}}" alt=""></a>
          <div class=" d-lg-none d-md-block d-block">
          <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
          <i class="fa-solid fa-align-right"></i>
          </a>

          </div>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Jobs
                </a>
                <ul class="dropdown-menu nav-menu shadow" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="jobs.php">Recomanded Job</a></li>
                  <li><a class="dropdown-item" href="featuredjobs.php">Featured Jobs</a></li>

                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="companies.php">Companies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="update.php">Updates</a>
              </li>
              @auth

              <li class="nav-item">
                <a class="nav-link" href="job-packages.php">Pricing</a>
              </li>
              @endauth
            </ul>

            @guest

            <div class="btns d-flex">
                <div class="rege">
                   <a href="{{url("account-type")}}"><button class="btn btn-regi">Register</button></a>
                </div>
                <div class="rege px-3">
                  <div class="rege px-3">
                    <a href="{{url("login")}}"><button class="btn btn-login">Login</button></a>
                </div>


              </div>
            </div>
            @endguest
            <!-- <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="fa-regular fa-heart"></i></button> -->
              <div class="profile">
                <div class="dropdown">
                  @auth
                  <button class="btn btn-profile dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-regular fa-user"></i>
                  @auth()
                      {{Auth()->user()->first_name}}
                  @endauth

                  </button>



                  <ul class="dropdown-menu profile-menu shadow-sm" aria-labelledby="dropdownMenuButton1">
                    @if(Auth()->user()->type == "jobseeker")
                    <li><a class="dropdown-item profile-item" href="{{route("jobseeker.profile")}}">My Profile</a></li>
                    <li><a class="dropdown-item profile-item" href="#"><button class="btn px-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    Wish List</button></a></li>
                    <li><a class="dropdown-item profile-item" href="{{route("jobseeker.job.saved-jobs")}}"> Saved Jobs </a></li>
                    <li><a class="dropdown-item profile-item" href="{{route("jobseeker.job.applied-jobs")}}"> Applied Jobs </a></li>

                    @endif

                    @if(Auth()->user()->type == "employer")
                    <li><a class="dropdown-item profile-item" href="{{route("employer.dashboard")}}"> Dashboard </a></li>

                    {{-- <li><a class="dropdown-item profile-item" href="{{route("jobseeker.profile")}}"> My Profile </a></li>
                    <li><a class="dropdown-item profile-item" href="{{route("company.profile")}}"> My Company </a></li> --}}
                    @endif

                    {{-- <li><a class="dropdown-item profile-item" href="candidates.php">Candidates</a></li>
                    <li><a class="dropdown-item profile-item" href="shortlist-candidate.php">Shortlist Candidate</a></li>

                    <li><a class="dropdown-item profile-item" href="job-post.php">Post a job</a></li>
                    <li><a class="dropdown-item profile-item" href="employer.php">Employer Profile</a></li>
                    <li><a class="dropdown-item profile-item" href="employer-edit.php">Edit Profile</a></li>
                    <li><a class="dropdown-item profile-item" href="hr-profile.php">HR Profile</a></li> --}}
                    <li><a class="dropdown-item profile-item" href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"> Logout </a></li>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                  </ul>
                  @endauth

                </div>
              </div>
          </div>
        </div>
    </nav>
    <!-- end header -->

            <div class="profile2 d-lg-none d-block text-end d-flex">
             <button class="btn px-0 text-end" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
              <i class="fa-regular fa-heart"></i></button>
                <div class="dropdown">
                  <button class="btn btn-profile dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-regular fa-user"></i>
                  </button>
                  <ul class="dropdown-menu profile-menu shadow-sm" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item profile-item" href="profile.php">MY Profile</a></li>

                    <li><a class="dropdown-item profile-item" href="candidates.php">Candidates</a></li>
                    <li><a class="dropdown-item profile-item" href="shortlist-candidate.php">Shortlist Candidate</a></li>
                    <li><a class="dropdown-item profile-item" href="savecandidate.php">Save Candidates</a></li>
                    <li><a class="dropdown-item profile-item" href="employer.php">Employer Profile</a></li>
                    <li><a class="dropdown-item profile-item" href="job-post.php">Post a job</a></li>
                    <li><a class="dropdown-item profile-item" href="#">Dashboard</a></li>
                  </ul>
                </div>
              </div>

<div class="offcanvas offcanvas-start mobile-navs" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header justify-content-end">

    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
        <div class="offcanvas-body mobile-nav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Jobs
                </a>
                <ul class="dropdown-menu nav-menu shadow" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="jobs.php">Recomanded Job</a></li>
                  <li><a class="dropdown-item" href="featuredjobs.php">Featured Jobs</a></li>

                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="companies.php">Companies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="update.php">Updates</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="job-packages.php">Pricing</a>
              </li>
            </ul>
            <div class="btns ">
                <div class="rege">
                   <a href="before-register.php"><button class="btn btn-regi">Register</button></a>
                </div>
                <div class="rege ">
                  <div class="rege ">
                    <a href="{{url("login")}}"><button class="btn btn-login">Login</button></a>
                </div>


              </div>
            </div>
          </div>
        </div>




  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">

      <div class="offcanvas-head">
      <h5 id="offcanvasRightLabel">Save & Applied Jobs</h5>
      <hr>
      </div>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="save-jobs d-flex align-items-center">
        <div class="save-image offcanvas-logo">
          <img src="{{asset("assets/img/25.png")}}" alt="logo">
        </div>
        <div class="save-text px-3 d-flex">
          <div class="">
            <h6 class="mb-0">Graphic Designer</h6>
            <p>Tata Consultancy Services</p>
          </div>
        </div>
        <div class="text-end">
          <button class="btn btn-apply offcanvas-apply-btn">Apply</button>
        </div>

      </div>
      <hr>
      <div class="save-jobs d-flex align-items-center">
        <div class="save-image">
          <img src="{{asset("assets/img/14.png")}}" alt="logo">
        </div>
        <div class="save-text px-3 d-flex">
          <div class="">
            <h6 class="mb-0">Web Designer</h6>
            <p>Tata Consultancy Services</p>
          </div>
        </div>
        <div class="text-end">
          <button class="btn btn-applied offcanvas-apply-btn">Applied</button>
        </div>

      </div>
      <hr>
      <div class="save-jobs d-flex align-items-center">
        <div class="save-image">
          <img src="{{asset("assets/img/i.png")}}" alt="logo">
        </div>
        <div class="save-text px-3 d-flex">
          <div class="">
            <h6 class="mb-0"> Web Developer</h6>
            <p>Tata Consultancy Services</p>
          </div>
        </div>
        <div class="text-end">
          <button class="btn btn-apply offcanvas-apply-btn">Apply</button>
        </div>

      </div>
    </div>
  </div>
    {{-- Header --}}

@yield("content")

{{-- Footer --}}
<footer class="footer py-5">
    <div class="max-width">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="footer-img">
              <a href="index.php"><img src="{{asset("assets/img/logo2.png")}}" alt="logo" class="mb-4"></a>
              <p class="">Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper.</p>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="link">
              <h4>Quick Links</h4>
              <ul>
                <li><a href="about.php">About</a></li>
                <li><a href="contactus.php">Contact</a></li>
                <li><a href="#">Support</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="link">
              <ul class="pt-4">
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Product License</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="link2">
              <h4>Subscribe Now</h4>
              <p class="py-2">Sed consequat sapien faus quam bibendum convallis.</p>
              <div class="input-type d-flex">
                <input type="text" class="from-control control-2" placeholder="Enter Email...">
                <button class="btn btn-submit">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="footer-after py-3">
    <div class="max-width">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-10">
            <center><p class="copy-right mb-0"> &copy; 2023 Online Job Portal. Designed by <a href= "www.starpactglobal.com">Starpact Global Services</a></p></center>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasRightLabel">Save & Applied Jobs</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="save-jobs d-flex align-items-center">
        <div class="save-image">
          <img src="{{asset("assets/img/25.png")}}" alt="logo">
        </div>
        <div class="save-text px-3 d-flex">
          <div class="">
            <h6 class="mb-0">Graphic Designer</h6>
            <p>Tata Consultancy Services</p>
          </div>
        </div>
        <div class="text-end">
          <button class="btn btn-apply offcanvas-apply-btn">Apply</button>
        </div>

      </div>
      <hr>
      <div class="save-jobs d-flex align-items-center">
        <div class="save-image">
          <img src="{{asset("assets/img/25.png")}}" alt="logo">
        </div>
        <div class="save-text px-3 d-flex">
          <div class="">
            <h6 class="mb-0">Graphic Designer</h6>
            <p>Tata Consultancy Services</p>
          </div>
        </div>
        <div class="text-end">
          <button class="btn btn-applied offcanvas-apply-btn">Applied</button>
        </div>

      </div>
      <hr>
      <div class="save-jobs d-flex align-items-center">
        <div class="save-image">
          <img src="{{asset("assets/img/25.png")}}" alt="logo">
        </div>
        <div class="save-text px-3 d-flex">
          <div class="">
            <h6 class="mb-0">Graphic Designer</h6>
            <p>Tata Consultancy Services</p>
          </div>
        </div>
        <div class="text-end">
          <button class="btn btn-apply offcanvas-apply-btn">Apply</button>
        </div>

      </div>
    </div>
  </div>

{{-- Footer --}}


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- owl slide -->
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    <!-- end owl slide -->

    <!-- candidate list -->
    <script>
        $(document).ready(function() {
            $('button').on('click', function(e) {
                if ($(this).hasClass('list')) {
                    $('#container ul').addClass('list').removeClass('grid');
                } else if ($(this).hasClass('grid')) {
                    $('#container ul').addClass('grid').removeClass('list');
                }
            });
        });
    </script>


    <!-- aso animation -->
    <script>
        AOS.init();
    </script>

    <!-- upload image -->

    <script>
        var $profileImgDiv = document.getElementById("profile-img-div"),
            $profileImg = document.getElementById("profile-img"),
            $changePhoto = document.getElementById("change-photo"),
            $xPosition = document.getElementById("x-position"),
            $yPosition = document.getElementById("y-position"),
            $saveImg = document.getElementById("save-img"),
            $loader = document.getElementById("loader"),
            $cancelImg = document.getElementById("cancel-img"),
            $profileImgInput = document
            .getElementById("profile-img-input"),
            $profileImgConfirm = document
            .getElementById("profile-img-confirm"),
            $error = document.getElementById("error");

        var currentProfileImg = "",
            profileImgDivW = getSizes($profileImgDiv).elW,
            NewImgNatWidth = 0,
            NewImgNatHeight = 0,
            NewImgNatRatio = 0,
            NewImgWidth = 0,
            NewImgHeight = 0,
            NewImgRatio = 0,
            xCut = 0,
            yCut = 0;

        makeSquared($profileImgDiv);

        $changePhoto.addEventListener("change", function() {
            currentProfileImg = $profileImg.src;
            showPreview(this, $profileImg);
            $loader.style.width = "100%";
            $profileImgInput.style.display = "none";
            $profileImgConfirm.style.display = "flex";
            $error.style.display = "none";
        });

        $xPosition.addEventListener("input", function() {
            $profileImg.style.left = -this.value + "px";
            xCut = this.value;
            yCut = 0;
        });

        $yPosition.addEventListener("input", function() {
            $profileImg.style.top = -this.value + "px";
            yCut = this.value;
            xCut = 0;
        });

        $saveImg.addEventListener("click", function() {
            cropImg($profileImg);
            resetAll(true);
        });

        $cancelImg.addEventListener("click", function() {
            resetAll(false);
        });

        window.addEventListener("resize", function() {
            makeSquared($profileImgDiv);
            profileImgDivW = getSizes($profileImgDiv).elW;
        });

        function makeSquared(el) {
            var elW = el.clientWidth;
            el.style.height = elW + "px";
        }

        function showPreview(input, el) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            if (input.files && input.files[0]) {
                reader.onload = function(e) {
                    setTimeout(function() {
                        el.src = e.target.result;
                    }, 300);

                    var poll = setInterval(function() {
                        if (el.naturalWidth && el.src != currentProfileImg) {
                            clearInterval(poll);
                            setNewImgSizes(el);
                            setTimeout(function() {
                                $loader.style.width = "0%";
                                $profileImg.style.opacity = "1";
                            }, 1000);
                        }
                    }, 100);
                };
            } else {
                return;
            }
        }

        function setNewImgSizes(el) {
            if (getNatSizes(el).elR > 1) {
                el.style.width = "auto";
                el.style.height = "100%";
                newImgWidth = getSizes(el).elW;
                $xPosition.style.display = "block";
                $yPosition.style.display = "none";
                $xPosition.max = newImgWidth - profileImgDivW;
            } else if (getNatSizes(el).elR < 1) {
                el.style.width = "100%";
                el.style.height = "auto";
                newImgHeight = getSizes(el).elH;
                $xPosition.style.display = "none";
                $yPosition.style.display = "block";
                $yPosition.max = newImgHeight - profileImgDivW;
            } else if (getNatSizes(el).elR == 1) {
                el.style.width = "100%";
                el.style.height = "100%";
                $xPosition.style.display = "none";
                $yPosition.style.display = "none";
            }
        }

        function getNatSizes(el) {
            var elW = el.naturalWidth,
                elH = el.naturalHeight,
                elR = elW / elH;
            return {
                elW: elW,
                elH: elH,
                elR: elR
            };
        }

        function getSizes(el) {
            var elW = el.clientWidth,
                elH = el.clientHeight,
                elR = elW / elH;
            return {
                elW: elW,
                elH: elH,
                elR: elR
            };
        }

        function cropImg(el) {
            var natClientImgRatio = getNatSizes(el).elW / getSizes(el).elW;
            (myCanvas = document.getElementById("croppedPhoto")),
            (ctx = myCanvas.getContext("2d"));
            ctx.fillStyle = "#ffffff";
            ctx.fillRect(0, 0, 400, 400);
            ctx.drawImage(
                el,
                xCut * natClientImgRatio,
                yCut * natClientImgRatio,
                profileImgDivW * natClientImgRatio,
                profileImgDivW * natClientImgRatio,
                0,
                0,
                400,
                400
            );
            var newProfileImgUrl = myCanvas.toDataURL("image/jpeg");
            $profileImg.src = newProfileImgUrl;
        }

        function resetAll(confirm) {
            if (!confirm) {
                $profileImg.src = currentProfileImg;
            }
            $changePhoto.value = "";
            $profileImgInput.style.display = "block";
            $profileImgConfirm.style.display = "none";
            $profileImg.style.left = "0";
            $profileImg.style.top = "0";
            $profileImg.style.width = "100%";
            $profileImg.style.height = "100%";
            $xPosition.style.display = "none";
            $yPosition.style.display = "none";
            $xPosition.value = "0";
            $yPosition.value = "0";
            xCut = "0";
            yCut = "0";
        }

        function checkMinSizes(el) {
            if (getNatSizes(el).elW > 400 && getNatSizes(el).elH > 400) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    @stack("js")

</body>

</html>
