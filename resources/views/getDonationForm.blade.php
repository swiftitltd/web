<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beneficiary Home | E-Donation</title>

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
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="http://echaritybd.com/E-Donation_transparent.png" height="50px">
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

    
        <!-- Nav Item - Dashboard 
        <li class="nav-item">
            <a class="nav-link" href="{{ url('charity/getDonationForm') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Apply For Donation</span>
            </a>
        </li>
-->
        <!-- Sidebar Toggler (Sidebar) 
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
-->
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
                            My Account<span class="mr-2 d-lg-inline text-gray-600 small"></span>
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
            <div class="container">
                <!--<form action="{{ url('donationFormSubmit') }}" method="post">-->
                <form action="{{ url('donationFormSubmit') }}" method="post">
                <h1 class="h3 mb-4 text-gray-800">Submit Your Application</h1><hr>
                <a href="{{ url('/charity/home') }}" class="btn btn-success">Home</a>
                <div class="row" style="padding:12px">
                    @if (Session::has('message'))
                       <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <select id="getThana" required class="form-control" name="district_id" style="margin-bottom:10px">
                        <option value="0">Select District</option>
                    @foreach($district as $districts)
                        
                        <option value="{{ $districts->id }}">{{ $districts->name }}</option>
                    @endforeach
                    </select>
                    
                    <select id="thana" required class="form-control" name="thana_id" style="margin-bottom:10px">
                        <option value="0">Select Thana/Upazila</option>
                    
                    </select>
                    <br><br><br>
                    <select id="getSubcat[0]" swift="0" required class="form-control getSubCat" name="item_0" data-sl="0" style="margin-bottom:10px" onChange="callAsif(0)">
                        <option value="0">Select Your Item</option>
                    @foreach($subcategory as $subcat)
                        
                        <option value="{{ $subcat->id }}" >{{ $subcat->name }}</option>
                    @endforeach
                    </select>
                    
                    <select id="Subcat" name="subcat_0" class="form-control subCat0" required>
                        
                    </select>
                    <br><br>

                    <input required type="number" name="qty_0" min=0 step="0.05" class="form-control" placeholder="Type your quantity" style="margin-bottom:10px">
                    <input required type="number" name="price_0" min="0" class="form-control" placeholder="Type your value"><br><br>
                    <textarea name="note_0" class="form-control" placeholder="Description(Optional)"></textarea>
                    <input required type="hidden" name="count" value="0">
                    <hr><hr>
                </div>
                
                <div id="addCat"></div>
                <input required type="button" value="Add more" id="catAdd" style="margin-top:10px">
                
                <input required type="button" value="Remove" id="catMinus" style="margin-top:10px">
                
                {{ csrf_field() }}
                <input required type="submit" value="Submit" style="margin-top:10px">
                </form>
                <!-- Page Heading -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; E-Donation 2020</span>
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
                <a class="btn btn-primary" href="/donation-platform">Logout</a>
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
<script>


$(document).on('change', '.getSubCat', function(){

    var sv = $(this).attr('swift');
    var getSubcat = $(this).val();    
    if(getSubcat){
        $.ajax({
           type:"GET",
           url:"{{url('getSubcat')}}?getSubcat="+getSubcat,
           success:function(res){               
            if(res){
                $(".subCat"+sv).empty();
                
                $(".subCat"+sv).append('<option value="0">Select Subcategory </option>');
                $.each(res,function(key,value){
                    $(".subCat"+sv).append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $(".subCat"+sv).empty();
            }
           }
        });
    }


});



i=1;
$("#catAdd").click(function(){
  $("#addCat").append("<div id='"+i+"'>"
  +"<input required type='hidden' name='count' value='"+i+"'><br>"
  +"<select required name='item_"+i+"' swift='"+i+"' class='form-control getSubCat'>"
  +"<option value='0'>Select Your Item</option>"
  +"@foreach($subcategory as $subcat)"
  +"<option value='{{ $subcat->id }}'>{{ $subcat->name }}</option>"
  +"@endforeach</select><br>"
  
  +"<select required name='subcat_"+i+"' class='form-control subCat"+i+"'>"
  +"<option value='0'>Select Your Sub Category</option>"
  +"</select><br>"

  +"<input required type='text' name='qty_"+i+"' placeholder='Type your quantity' class='form-control'><br>"
  +"<input required type='text' placeholder='Type your value' name='price_"+i+"' class='form-control'><br>"
  +'<textarea name="note_'+i+'" class="form-control" placeholder="Description(Optional)"></textarea>'
  +"</div><hr><hr>");
  i++;
    
});

$("#catMinus").click(function(){
    d = i;
    d--;
    if(confirm("Do you want to remove this item?")){
        $("#"+d).remove();
    }
    
});


$("#minusAdd").click(function(){
    $("div#sec").remove();
});
//<input required style='margin-top:10px' type='button' value='-' onclick='hideData("+i+")'>
function hideData(id){
   $("#"+id).remove();
}

$('#getSubcat').change(function(){
    var getSubcat = $(this).val();    
    if(getSubcat){
        $.ajax({
           type:"GET",
           url:"{{url('getSubcat')}}?getSubcat="+getSubcat,
           success:function(res){               
            if(res){
                $("#Subcat").empty();
                
                $("#Subcat").append('<option value="0">Select Subcategory </option>');
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
