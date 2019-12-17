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
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .rotate-n-15 {
            transform: rotate(0deg)!important;
        }
    </style>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="http://echaritybd.com/E-Donation_transparent.png" height="50px">
            </div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">




                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-lg-inline text-gray-600 small">User Name</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                
                <form action="{{ route('getCharityList') }}" method="post">
                    @csrf
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Donate Now!</h1><hr>
                <div class="row">
                    
                    <div class="col-lg-12">
                            <div class="form-group">
                                <label class="h3">Choose Your Expected Location</label>
                                <select id="getThana" required class="form-control" name="district_id" style="margin-bottom:10px">
                                    <option value="0">Select District</option>
                                        @foreach($district as $districts)
                                            
                                            <option value="{{ $districts->id }}">{{ $districts->name }}</option>
                                        @endforeach
                                </select>
                                
                                <select id="thana" required class="form-control" name="thana_id" style="margin-bottom:10px">
                                    <option value="0">Select Thana/Upojela</option>
                                
                                </select>
                            </div>
                    </div>
                    
                    
                    
                    <div class="col-lg-12">
                            <div class="form-group">
                                <label class="h3">What do you want to donante?</label>
                                <select id="getSubcat" name="category" class="form-control" required>
                                    <option value='0'>Select Category</option>
                                    <?php foreach($category as $categories){ 
                                        echo "<option value='$categories->id'> $categories->name </option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="Subcat" name="subcategory" class="form-control" required>
                                    
                                </select>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary">Get Beneficiary List</button>
                       
                    </div>
                </div>

             </form>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; E-Donation 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ asset('/') }}">Logout</a>
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
<script type="text/javascript">
    $('#district').change(function(){
        $('#getSubcat').prop('selectedIndex', 0);
    });
    
    $('#getSubcat').change(function(){
    var getSubcat = $(this).val();    
    if(getSubcat){
        $.ajax({
           type:"GET",
           url:"{{url('getSubcat')}}?getSubcat="+getSubcat,
           success:function(res){               
            if(res){
                $("#Subcat").empty();
                $.each(res,function(key,value){
                    $("#Subcat").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#Subcat").empty();
            }
           }
        });
    }    
   });
   
   
   $('#getThana').change(function(){
    var getThana = $(this).val();    
    if(getThana){
        $.ajax({
           type:"GET",
           url:"{{url('getThana')}}?getThana="+getThana,
           success:function(res){               
            if(res){
                $("#thana").empty();
                $.each(res,function(key,value){
                    $("#thana").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#thana").empty();
            }
           }
        });
    }    
   });
</script>

</body>

</html>
