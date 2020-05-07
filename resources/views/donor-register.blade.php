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
                            <a href="{{ url('/donation-platform') }}" class="btn btn-success" style="margin-top:20px">Home</a>
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
                                        <input type="text" class="form-control" name="orgName" placeholder="Name *" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="orgAddress" placeholder="Address *">{{ old('address') }}</textarea>
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
                                        <input type="text" class="form-control" name="orgMobile" placeholder="Mobile No. *" value="{{ old('mobile') }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="occupation" placeholder="Occupation" value="{{ old('occupation') }}">
                                    </div>


                                    <div class="form-group">
                                        <input type="text" class="form-control" name="orgEmail" placeholder="Email *" value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password *">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Re-Type Password *">
                                    </div>

                                    <button type="submit"  class="btn btn-primary btn-block">
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

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script>
    $(document).ready(function(){

      
      
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
                $("#thana").append('<option value="0">Select Thana/Upojela </option>');
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
