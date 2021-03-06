<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Donation</title>

    <!-- Custom fonts for this template-->

    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">


</head>

<body class="bg-gradient-primary">

<div class="container-fluid">

    <!-- Outer Row -->
    <div class="row">

        <div class="offset-lg-3 col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="offset-lg-2 col-lg-8">
                            <div class="p-5">
                                <div class="text-center">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(session()->has('message'))
                                        <div class="alert alert-{{ session('type') }}">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    <h1 class="h2 text-gray-900 mb-4">Donor Registration</h1><hr>
                                </div>
                                <form class="user" action="{{ route('donor-register-post') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name *">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="address" placeholder="Address *"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mobile" placeholder="Mobile No. *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="" placeholder="Occupation">
                                    </div>


                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email *">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password *">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Re-Type Password *">
                                    </div>

                                    <button type="submit"  class="btn btn-primary btn-block">
                                        Resigter as a Donor
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
