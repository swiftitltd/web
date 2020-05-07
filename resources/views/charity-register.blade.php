<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
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

<style>
    .bg-gradient-primary {
    background-color: #dee1e6;
    background-image: linear-gradient(180deg,#dee1e6 10%,#d1d1d2 100%);
    background-size: cover;
}
</style>
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
                                <a href="{{ url('/donation-platform') }}" class="btn btn-success">Home</a>
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
                                    <h1 class="h2 text-gray-900 mb-4">Recieving Organization Registration</h1><hr>
                                </div>
                                
                                <form class="user" action="{{ route('charity-register-post') }}" method="post">
                                        @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="orgName" placeholder="Organization Name *" value={{ old('orgName') }}>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="orgAddress" placeholder="Organization Address *" >{{ old('orgAddress') }}</textarea>
                                    </div>
                                                                        
                                     <div class="form-group">
                                <!--<label class="h5">Choose Your Expected Location</label>-->
                                <select id="getThana" required class="form-control" name="districtID" style="margin-bottom:10px">
                                    <option value="0">Select District</option>
                                        @foreach($district as $districts)
                                            
                                            <option value="{{ $districts->id }}">{{ $districts->name }}</option>
                                        @endforeach
                                </select>
                                
                                <select id="thana" required class="form-control" name="thanaID" style="margin-bottom:10px">
                                    <option value="0">Select Thana/Upazila</option>
                                
                                </select>
                            </div>
                                        
                                        
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="telephoneNo" placeholder="Telephone No. " value={{ old('telephoneNo') }}>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="orgMobile" placeholder="Mobile No. *" value={{ old('orgMobile') }}>
                                    </div>
                                    
                                    <div class="form-group">
                                        <select class="form-control" name="categoryID" id="items">
                                            <option>Select Category</option>
                                            @foreach($category as $categories)
                                                <option value="{{ $categories->id }}" >{{ $categories->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="orgEmail" placeholder="Organization Email *" value="{{ old('orgEmail') }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="website" placeholder="Organization Website " value="{{ old('website') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Registration Date</label>
                                        <input type="date" class="form-control" name="regDate" placeholder="Date of Formation *" >
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password *" >
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Re-Type Password *" >
                                    </div>

                                    <p>Organization Type</p>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="orgType" value="{{ old('type') }}">National
                                        </label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="orgType">International
                                        </label>
                                    </div>

                                    <br>
                                    <p>Select Organization Upload Registration Documents</p><hr>
                                    <div class="form-group">
                                        <input type="checkbox" class="NGO"></input>
                                        <label class="" for="customCheck">NGO Bureau</label>
                                        <input type="file" name="NGO" class="form-control hide-file" id="NGOCertficate" placeholder="Re-Type Password *" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="checkbox" class="DSS">
                                        <label class="" for="customCheck">Department of Social Service</label>
                                        <input type="file" name="DSS" class="form-control hide-file" id="DSSCertficate" placeholder="Re-Type Password *" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="checkbox" class="Zakat">
                                        <label class="" for="customCheck">Zakat Board</label>
                                        <input type="file" name="Zakat" class="form-control hide-file" id="ZakatCertficate" placeholder="Re-Type Password *" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="checkbox" class="Stock">
                                        <label class="" for="customCheck">Joint Stock Company</label>
                                        <input type="file" name="Stock" class="form-control hide-file" id="StockCertficate" placeholder="Re-Type Password *" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="checkbox" class="SubRegistrar ">
                                        <label class="" for="customCheck">Sub Registrar Office</label>
                                        <input type="file" name="SubRegistrar" class="form-control hide-file" id="SubRegistrar" placeholder="Re-Type Password *" >
                                    </div>
                                    

                                    <br>
                                    <br>
                                    <h5>Contact Person Details</h5><hr>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="contactPersonName" placeholder="Contact Person Name *" value={{ old('contactPersonName') }}>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="contactPersonNo" placeholder="Mobile No. *" value={{ old('contactPersonNo') }}>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="contactPersonPosition" placeholder="Position *" value={{ old('contactPersonPosition') }}>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Resigter
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
<style>
    .hide-file{
        display: none;
    }
</style>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<script>
    $(document).ready(function(){
      $(".NGO").click(function(){
        $("#NGOCertficate").toggleClass("hide-file");
      });
      $(".DSS").click(function(){
        $("#DSSCertficate").toggleClass("hide-file");
      });
      $(".Zakat").click(function(){
        $("#ZakatCertficate").toggleClass("hide-file");
      });
      $(".Stock").click(function(){
        $("#StockCertficate").toggleClass("hide-file");
      });
      $(".SubRegistrar").click(function(){
        $("#SubRegistrar").toggleClass("hide-file");
      });
      
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
                $("#thana").append('<option value="0">Select Thana/Upazila</option>');
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
      
      
    });
</script>

</body>

</html>
