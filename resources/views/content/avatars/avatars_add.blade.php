@extends('layouts/layoutMaster')

@section('title', 'Avatar - Add')

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
            
            <div class="d-flex justify-content-between">
    <h4 class="fw-bold py-3 mb-4">
          Create Avatar
    </h4>
</div>

<!-- Category Model -->
<div class="modal fade" id="createnewscategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel3">Add Category</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" id="addForm" action="#">
                        @crsf                        
                       	<div class="col mb-3">
                            <label for="nameLarge" class="form-label">Category Name</label>
                            <input type="text" id="nameLarge" class="form-control" placeholder="Category Name" name="news_category">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addForm">Create</button>
            </div>
        </div>
    </div>
</div>

@if($message = Session::get('success'))
					<div class="alert alert-success alert-message">
						<i class="fa fa-check-circle"></i>
						{{ $message }}
					</div>
				@endif

<!-- Basic Bootstrap Table -->
<div class="card">
    
  
        
        <form method="POST" enctype="multipart/form-data">
        	
            @csrf
            
                <div class="row">
                    
                    <h4>Create Avatar</h4>
                    <p>Add New Avatar</p>
                    <hr />
                    
                    <div class="col-md-4">
                    
                    	<div class="" style="text-align:center;;margin-top:30px;">
                        
                        	<label for="uploadimage"><img id="avatar_image" src="{{asset('/images/uploadimage.png')}}" />	</label>
                            <input name="dp" id="uploadimage" type="file" onchange="loadFile(event)" class="dropify" data-height="90" accept="image/*" />
                            
                            <button type="button" class="btn btn-danger removebtn">X</button>
                            
                        </div>
                    
                    	<div class="details">
                            <h4><b>Avatar Details</b></h4>
                            <div class="txt">Name and Task of Avatar</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" name="avatar_name" placeholder="Type Avatar Name" required="required" />
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" name="avatar_task" placeholder="Type Avatar Task" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="details"
                            <h4><b>Avatar Activity</b></h4>
                            <div class="txt">Working Time</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="avatar_days" required>
                                    	<option value="">Working Days</option>
                                        <option value="Every Day">Every Day</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="avatar_hours" required>
                                    	<option value="">Working Hours</option>
                                        <option value="4">00:01 - 04:00</option>
                                        <option value="8">04:01 - 08:00</option>
                                        <option value="12">08:01 - 12:00</option>
                                        <option value="16">12:01 - 16:00</option>
                                        <option value="20">16:01 - 20:00</option>
                                        <option value="24">20:01 - 00:00</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="details"
                            <h4><b>Avatar Article</b></h4>
                            <div class="txt">Amount per Time</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="aricle_per_day" required>
                                    	<option value="">Article Per day</option>
                                        <option value="2">2</option>
                                        <option value="4">4</option>
                                        <option value="6">6</option>
                                        <option value="8">8</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="feed_per_hour" required>
                                    	<option value="">Feeds per Hours</option>
                                        <option value="2">Every 2 Hours</option>
                                        <option value="4">Every 4 Hours</option>
                                        <option value="6">Every 6 Hours</option>
                                        <option value="8">Every 8 Hours</option>
                                        <option value="10">Every 10 Hours</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                       
                        
                        
                    
                    
                    
                    </div>
                    
                    
                    <!-- col6 start -->
                    <div class="col-md-4">
                        
                        
                         <div class="details"
                            <h4><b>Permissions</b></h4>
                            <div class="txt">Convert blog to Video</div>
                            <div class="row">
                                <div class="col-md-6 ">
                                	<div class="bordered">
                                    	<label for="yes_convert">Yes Convert</label>
                                    	<input type="radio" id="yes_convert"  name="permissions" value="0"  />
                                    </div>
                                	
                                </div>
                                <div class="col-md-6">
                                    <div class="bordered">
                                    	<label for="no_convert">Do Not Convert </label>
                                    	<input type="radio" id="no_convert" name="permissions" value="1" checked="checked"  />
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                        <div class="details"
                            <h4><b>Sharing Options</b></h4>
                            <div class="txt">Who can see the Post</div>
                            <div class="row">
                                <div class="col-md-6 ">
                                	<div class="bordered">
                                    	<label for="alluser">All Users</label>
                                    	<input type="radio" id="alluser"  name="sharing_options" value="0"  />
                                    </div>
                                	
                                </div>
                                <div class="col-md-6">
                                    <div class="bordered">
                                    	<label for="educated_users">Educated Users</label>
                                    	<input type="radio" id="educated_users" name="sharing_options" value="1" checked="checked"  />
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                	<div class="bordered">
                                    	<label for="cul_users">Cultivated Users</label>
                                    	<input type="radio" id="cul_users" name="sharing_options" value="2"  />
                                    </div>
                                	
                                </div>
                                <div class="col-md-6 ">
                                	<div class="bordered">
                                    	<label for="ac_users">Academic Users</label>
                                    	<input type="radio" id="ac_users" name="sharing_options" value="3"  />
                                    </div>
                                	
                                </div>
                            </div>
                        </div>
                        

                        <div class="details">
                            <b>Language Setting</b>
                                 <div  class="form-check form-switch mb-2 righ-check-option">
                            	 	<input class="form-check-input closetogglebtn" name="languages_settings" type="checkbox" >
                                </div>
                            
                            <div class="txt">Translate Settings</div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <select class="form-control" name="select_lang">
                                        <option value="">Select Language</option>

                                        
                                            <option value="English">English</option>
                                            <option value="Kurdi">Kurdi</option>
                                            <option value="Deutsch">Deutsch</option>
                                            <option value="Arabic">Arabic</option>
                                        

                                    </select>
                                	
                                </div>
                                <div class="col-md-6">
                                <select class="form-control" name="translate_lang">
                                        <option value="">Translate To</option>
                                        
                                        
                                        <option value="English">English</option>
                                            <option value="Kurdi">Kurdi</option>
                                            <option value="Deutsch">Deutsch</option>
                                            <option value="Arabic">Arabic</option>


                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="details">
                            <b>Sources</b>
                                 
                            <div class="txt">Article Sources List</div>
                            <div class="row" id="sourcelist">
                                <div class="col-md-12 sources" id="main_source_item">
                                	<input class="form-control source_list" name="source_link[]" placeholder="Add Source Link Here" />
                                    <button type="button" onclick="addnew();" class="btn btn-sm btn-icon source_btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Add">
                                	<i class="bx bx-plus"></i>
                                </button>
                                    
                                </div>
                                
                               
                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- col6 ends -->
                    
                    
                    <!-- col6 start -->
                    
                    <!-- col6 start -->
                    <div class="col-md-4">
                        
                        
                         <div class="details"
                            <h4><b>Social Media Login</b></h4>
                            <div class="txt">Add Access to Portal</div>
                            <div class="row">
                                <div class="col-md-12 ">
                                	
                                    	
                                    	<input class="form-control" placeholder="Social Media Title" name="media_1" />
                                   
                                </div>
                                <div class="col-md-6 m-t-10">
                                    <input class="form-control" name="username_1" placeholder="Username" />
                                </div>
                                <div class="col-md-6 m-t-10">
                                    <input type="password" class="form-control" name="pass_1" placeholder="Password" />
                                </div>
                                
                                <div class="col-md-6">
                                	
                                    <div class="bordered">
                                    	<label for="keeponline1">Keep Online</label>
                                     	<div  class="form-check form-switch mb-2 righ-check-option " style="width:50px;">
                                     		
                                        	<input id="keeponline1" class="form-check-input closetogglebtn" name="keep_online_1" type="checkbox" >
                                    	</div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="bordered" style="font-size:12px;">
                                    	Logout after
                                        <select name="logout_time_1">
                                        	<option value="15">15 min</option>
                                            <option value="30">30 min</option>
                                            <option value="45">45 min</option>
                                            <option value="60">60 min</option>
                                            <option value="90">90 min</option>
                                            <option value="120">120 min</option>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                        
                        <div class="details"
                            <h4><b>Social Media Login</b></h4>
                            <div class="txt">Add Access to Portal</div>
                            <div class="row">
                                <div class="col-md-12 ">
                                	
                                    	
                                    	<input class="form-control" placeholder="Social Media Title" name="media_2" />
                                   
                                </div>
                                <div class="col-md-6 m-t-10">
                                    <input class="form-control" name="username_2" placeholder="Username" />
                                </div>
                                <div class="col-md-6 m-t-10">
                                    <input type="password" class="form-control" name="pass_2" placeholder="Password" />
                                </div>
                                
                                <div class="col-md-6">
                                	
                                    <div class="bordered">
                                    	<label for="keeponline2">Keep Online</label>
                                     	<div  class="form-check form-switch mb-2 righ-check-option " style="width:50px;">
                                     		
                                        	<input id="keeponline2" class="form-check-input closetogglebtn" name="keep_online_2" type="checkbox" >
                                    	</div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="bordered" style="font-size:12px;">
                                    	Logout after
                                        <select name="logout_time_2">
                                        	<option value="15">15 min</option>
                                            <option value="30">30 min</option>
                                            <option value="45">45 min</option>
                                            <option value="60">60 min</option>
                                            <option value="90">90 min</option>
                                            <option value="120">120 min</option>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="details"
                            <h4><b>Social Media Login</b></h4>
                            <div class="txt">Add Access to Portal</div>
                            <div class="row">
                                <div class="col-md-12 ">
                                	
                                    	
                                    	<input class="form-control" placeholder="Social Media Title" name="media_3" />
                                   
                                </div>
                                <div class="col-md-6 m-t-10">
                                    <input class="form-control" name="username_3" placeholder="Username" />
                                </div>
                                <div class="col-md-6 m-t-10">
                                    <input type="password" class="form-control" name="pass_3" placeholder="Password" />
                                </div>
                                
                                <div class="col-md-6">
                                	
                                    <div class="bordered">
                                    	<label for="keeponline3">Keep Online</label>
                                     	<div  class="form-check form-switch mb-2 righ-check-option " style="width:50px;">
                                     		
                                        	<input id="keeponline3" class="form-check-input closetogglebtn" name="keep_online_3" type="checkbox" >
                                    	</div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="bordered" style="font-size:12px;">
                                    	Logout after
                                        <select name="logout_time_3">
                                        	<option value="15">15 min</option>
                                            <option value="30">30 min</option>
                                            <option value="45">45 min</option>
                                            <option value="60">60 min</option>
                                            <option value="90">90 min</option>
                                            <option value="120">120 min</option>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                        
                    </div>    
                    
                    <!-- col6 ends -->
                   
                    
                   <!-- row -->
                    </div>
               

            <div class="row">
            	<div class="col-md-12 text-center">
                
                	<a href="{{url('avatars')}}" class="btn btn-label-secondary">Back</a>
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
      
	  	<script>
			
			
			var imgsrc = $("#avatar_image").attr("src");
			
			
			
			setTimeout(function(){
				$(".alert-message").fadeOut("slow");
			}, 5000);
		
		
			function addnew(){
				var str = '<div class="col-md-12 sources">'
                str = str + '<input class="form-control source_list" name="source_link[]" placeholder="Add Source Link Here" />'
				str = str + '<button type="button"  class="btn btn-sm btn-icon source_btn remove" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Add">';
				str = str + '<i class="bx bx-trash"></i></button></div>';
				
				$("#sourcelist").append(str);	
			}
			
			$(document).on("click", ".remove", function(){
				$(this).closest(".sources").html("");
				
			});
			
			
			var loadFile = function(event) {
				var image = document.getElementById('avatar_image');
				
				image.src = URL.createObjectURL(event.target.files[0]);
				$(".removebtn").show();
			};
			
			$(document).on("click", ".removebtn", function(){
				$("#avatar_image").attr("src", imgsrc);
				$(".removebtn").hide();
				
				var fileInput = document.getElementById('uploadimage')
			   fileInput.value = ''
			   fileInput.dispatchEvent(new Event('change'));
				
			});
		
    

</script>
@endsection
@endsection