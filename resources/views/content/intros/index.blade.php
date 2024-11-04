@extends('layouts/layoutMaster')

@section('title', 'YekBûn SocialMedia Kurdî')

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
                <a class="btn btn-primary" href="{{url('/intros/create')}}"><i class="bx bx-plus me-0 me-sm-1"></i> Add Intro</a>
            </div>

    <div class="table-responsive text-nowrap">
      @if(count($categories) > 0)
      	
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Total Items</th>
            <th>Status</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">


            @foreach ($categories as $av)
            	<tr>
                	<td class="upper">
                    	
                    		INT_{{$av->cnt}}
                        
                    </td>
                    <td>
                  
                    	<div class="text-center1"><b>{{$av->name}}</b></div>
                            @php

                                $showd = 0;

                                if($av->is_yahala == 1){
                                    echo 'Yahala';
                                    $showd = 1;
                                }

                                if($av->is_yekbun == 1){
                                    
                                    if($showd == 1){
                                        echo ' - ';
                                    }
                                    echo 'Yekbun';
                                    $showd = 1;
                                }

                                if($av->is_facebook == 1){
                                    
                                    if($showd == 1){
                                        echo ' - ';
                                    }
                                    echo 'Facebook';
                                    $showd = 1;
                                }

                                if($av->is_tiktok == 1){
                                    
                                    if($showd == 1){
                                        echo ' - ';
                                    }
                                    echo 'Tiktok';
                                    $showd = 1;
                                }

                                if($av->is_insta == 1){
                                    
                                    if($showd == 1){
                                        echo ' - ';
                                    }
                                    echo 'Instagram';
                                    $showd = 1;
                                }

                                if($av->is_twitter == 1){
                                    
                                    if($showd == 1){
                                        echo ' - ';
                                    }
                                    echo 'Twitter';
                                    $showd = 1;
                                }


                            @endphp


                    </td>
                    <td>1028</td>
                    <td>
                    	@if($av->status == 1)
                        	<label class="switch me-0">
							  <input type="checkbox" class="switch-input" checked="">
							  <span class="switch-toggle-slider">

							  </span>
							  <span class="switch-label"></span>
							</label>
                        @else
                        	<label class="switch me">
							  <input type="checkbox" class="switch-input">
							  <span class="switch-toggle-slider">

							  </span>
							  <span class="switch-label"></span>
							</label>
                        @endif
                    </td>
                    <td>
                    	<a class="btn" href="intros/{{$av->id}}/edit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></a>



                         <form action="intros/{{$av->id}}"  onsubmit="confirmAction(event, () => event.target.submit())" method="post"  class="d-inline">
                      
                                @method('DELETE')
                                @csrf                                <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove">
                                	<i class="bx bx-trash me-1"></i>
                                </button>
                            </form>


                    </td>

                </tr>

            @endforeach



                </tbody>
      </table>
      
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
    </script>

        @endsection
@endsection

