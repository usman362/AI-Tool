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
          Manage Category
    </h4>
</div>



<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="m-0"></h5>
                <a class="btn btn-primary" href="categories/create"><i class="bx bx-plus me-0 me-sm-1"></i> Add Category</a>
            </div>

    <div class="table-responsive text-nowrap">
      @if(count($categories) > 0)
      	
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Total Post</th>
            <th>Total Avatar</th>
            <th>Status</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">


            @foreach ($categories as $av)
            	<tr>
                	<td class="upper">
                    	
                    		CAT_{{$av->cnt}}
                        
                    </td>
                    <td>
                    <a class="ava-link" href="{{url('/manage-avatars/' . $av->id)}}">
                    	<div class="w-px-40 text-rigth" >
                    	
                        </div>


                    	&nbsp;<span>{{$av->name}}<br />{{$av->task}}</span>

                        </a>
                    </td>
                    <td>1028</td>
                    <td>1.02k</td>
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
                    	<a class="btn" href="series/categories/{{$av->id}}/edit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></a>



                         <form action="categories/{{$av->id}}" onsubmit="confirmAction(event, () => event.target.submit())"  class="d-inline">
                               
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

