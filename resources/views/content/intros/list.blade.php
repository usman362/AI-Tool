@extends('layouts/layoutMaster')

@section('title', 'Manage Intros')

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

@include('layouts/customDesign')

<style>

.custom-file-input {
    display: none;
}

/* Style the custom button */
.custom-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ECECEC;
    color: #1c274c !important;
    font-size: 16px;
    
    border-radius: 5px;
    text-align: center;
    border: dashed #8c8c8c 4px;
    width: 250px;
    margin-top:10px;
    z-index: 1;
  position: relative;
  cursor: pointer !important;
  
}
#fileName{
    margin-top:5px;
}

.custom-button:hover {
    background-color: #ECECEC;
}

.custom-button:active {
    background-color: #ECECEC;
}
.custom-btn-div{
    margin:auto;
    cursor: pointer;
}


	.details{
		background: #f3f3f3;
	  	padding: 5px;
	  	border-radius: 10px;
	  	padding-bottom: 10px;
	  	margin-top: 5px;
	}
	.w-px-40{
		height:40px !important;
	}
	.upper{
		text-transform:uppercase;
	}
	.text-rigth{
		float:left;
		margin-right:10px;
	}
	.ava-link{
		color:unset;
	}
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
          Manage Intros
    </h4>
</div>



<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="m-0"></h5>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bx bx-plus me-0 me-sm-1"></i> Add Intros</button>
     </div>

    <div class="row">
      @if(count($categories) > 0)
      	
      

            @foreach ($categories as $av)

            <div class="col-lg-4">
    <div class="postbox ">
  <div class="post-innter">
    <div class="post_avatar">
      <div class="heading_post av_name">Bave Teyar</div>
      <div class="details_post av_task">Funny news</div>
    </div>
    <div class="post_time delbtn">

   

      <form action="{{ url('/')}}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
       
       
        <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove">
          <i class="bx bx-trash me-1"></i>
        </button>
      </form>
    </div>
    <div class="post_img" data-bs-toggle="modal" data-bs-target="#createModal1">
      <img src="https://cdnph.upi.com/svc/sv/i/7261728058834/2024/1/17280596862788/Movie-review-Terrifier-3-increases-shocks-with-surprising-restraint.jpg">
        
      <div class="bot-div">
        <span class="play-btn"><i class="menu-icon tf-icons bx bx-play"></i></span>
        <span class="play-time">150 sec</span>
      </div>
        <div class="overlay"></div>
    </div>

    <div class="play-bar1">
        
    </div>
    
    
    <div class="clear clearfix"></div>
  </div>
</div>
    </div>  
            	

            @endforeach

      @else
      	<div class="row1">
            <div class=" col-md-10" style="margin:auto;">
            <div class="alert alert-info">
            	No data exist.
            </div>
                
            </div>
        </div>
      	
      @endif
      
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
  <div class="modal fade" id="createModal1" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <video width="100%" controls style="height2:80%">
                    <source src="{{ asset('images/popvide.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>

  <x-modal
    id="createModal"
    title="Add Intros"
    saveBtnText="Upload"
    saveBtnType="submit"
    saveBtnForm="createForm"
    size="md"
    :show="old('showCreateFormModal')? true: false"
  >
    @include('content.intros.includes.create_intro_form')
  </x-modal>

            <!-- pricingModal -->
                        <!--/ pricingModal -->

          </div>
          <!-- / Content -->


          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
        @section('page-script')

        <script>
        function confirmAction(event, callback) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-danger me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    callback();
                }
            });
        }

 
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const fileName = event.target.files[0] ? event.target.files[0].name : 'No file chosen';
            document.getElementById('fileName').textContent = fileName;
        });


    </script>

        @endsection
@endsection

