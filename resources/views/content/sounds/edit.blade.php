@extends('layouts/layoutMaster')

@section('title', 'Sounds - Edit')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css " rel="stylesheet">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
@endsection

@section('content')
    <script>
        const dropZoneInitFunctions = [];
    </script>

<style>
	.m-t-10{
		margin-top:10px;
	}
	.card{
		padding:20px;
	}
	.details{
		background: #F5F5F5;
	  	padding: 5px;
	  	border-radius: 10px;
	  	padding-bottom: 10px;
	  	margin-top: 10px;
		margin-bottom:10px;
	}
	.bordered{
		background: #fff;
		  padding: 8px;
		  border-radius: 10px;
		  margin-top:5px;
	}
	.details b{
		color:#1c274c !important;
	}
	.bordered input{
		float: right;
  		margin-top: 5px;
	}
	.form-check-input{
		float:right !important;
	}
	.form-switch{
		padding-left:0px !important;
	}
	.righ-check-option{
		float:right;
		width:100px;
	}
	
	.source_list{
		width:calc(100% - 50px);
		float:left;
		margin-bottom:10px;
	}
	.sources{
		
	}
	.source_btn{
		width:40px;
		margin-left: 10px;
  		margin-top: 5px;
		background:#DDDDDD;
	}
	#avatar_image{
		height:120px;
		border-radius:50%;
		width:120px;
		cursor:pointer;
	}
	#uploadimage{
		display:none;
	}
	.removebtn{
		position: absolute;
		  margin-top: 15px;
		  margin-right: 10px;
		  margin-left: -30px;
		  height: 30px;
		  width: 30px;
		  max-width: 30px;
		  padding: 5px;
		  display:none;
	}

</style>

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            <div class="d-flex justify-content-between card col-md-4"  style="margin:auto; margin-bottom:20px;">
                <h3 class="fw-bold " style="margin:0px;">
                      Edit Sound
                </h3>
            </div>

<!-- Basic Bootstrap Table -->

<div class="card col-md-8" style="margin:auto;">
    
        <form method="POST" action="{{ route('sounds.update', $intro->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
                <div class="row">
                    <div class="col-md-12">
                    	<div class="details">
                            <h4><b>Category Name</b></h4>
                            
                            <div class="row">
                                <div class="col-md-12">
                                	<label><b>Category Name</b></label>
                                    <input class="form-control" name="cat_name" value="{{$intro->name}}" placeholder="Type Category Name" required="required" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="details">
                            <h4><b>Allowed Portals</b></h4>
                           
                            <div class="row form-switch">
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <div>Yekbun
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('yekbun', $intro->is_yekbun) == 1 ? 'checked' : '' }} name="yekbun" type="checkbox">
                                          </div>
                                        </div>
                                   
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="yahala">Yahala</label>
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('yahala', $intro->is_yahala) == 1 ? 'checked' : '' }} id="yahala" name="yahala" type="checkbox">
                                          
                                        </div>
                                </div>
                                
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="facebook">Facebook</label>
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('facebook', $intro->is_facebook) == 1 ? 'checked' : '' }} id="facebook" name="facebook" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="tiktok">TikTok</label>
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('tiktok', $intro->is_tiktok) == 1 ? 'checked' : '' }} id="tiktok" name="tiktok" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="insta">Instagram</label>
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('insta', $intro->is_insta) == 1 ? 'checked' : '' }} id="insta" name="insta" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="twitter">Twitter</label>
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('twitter', $intro->is_twitter) == 1 ? 'checked' : '' }} id="twitter" name="twitter" type="checkbox">
                                          
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                   <!-- row -->
                    </div>
               
            <div class="row">
            	<div class="col-md-12 text-center">
                
                	<a href="{{url('sounds')}}" class="btn btn-label-secondary">Back</a>
                	<button type="submit" class="btn btn-default" style="border: solid 2px;">Save changes</button>
            	</div>
           </div>
        </form>

    </div>

            <!-- pricingModal -->
                        <!--/ pricingModal -->

          </div>
          <!-- / Content -->

          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
        @section('page-script')
      
@endsection
@endsection