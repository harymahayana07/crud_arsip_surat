<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>App Surat | IAHN GDE PUDJA MATARAM</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('thema/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('thema/assets/css/style.css') }}">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('thema/assets/css/style-2.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('thema/assets/images/favicon.ico') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth" style="background-image: url('https://siska.universitasbumigora.ac.id/assets/gambar/blurred5.jpg');">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5" style="border-radius: 10px;">
                            <h4 class="text-center" style="text-shadow: 0 0 3px #FFFEFF, 0 0 5px #0000FF;">IAHN GDE PUDJA MATARAM</h4>
                            <div class="text-center mb-3">
                                <img src="{{ asset('thema/assets/images/faces/IAHN.jpeg') }}" alt="IAHN GDE PUDJA MATARAM" style="width: 200px;margin: auto;">
                            </div>
                            <!-- <h6 class="font-weight-light">Login sebelum masuk ke Web App Arsip Surat</h6> -->
                            <h6 class="font-weight-light text-center" style="color: red;">*Login sebelum masuk ke Web App Arsip Surat</h6>

                            <form method="POST" action="/login" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <input type="submit" value="Login" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!--Digunakan untuk alert-->
    @include('sweetalert::alert')
    <!-- plugins:js -->
    <script src="{{ asset('thema/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('thema/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('thema/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('thema/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('thema/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('thema/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('thema/assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->

</body>

</html>