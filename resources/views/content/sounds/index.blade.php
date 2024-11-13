@extends('layouts/layoutMaster')

@section('title', 'Manage Sounds')

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
          Manage Sounds
    </h4>
</div>



<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="m-0"></h5>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bx bx-plus me-0 me-sm-1"></i> Add Sound</button>
    
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
                    	
                    		SUD_{{$av->cnt}}
                        
                    </td>
                    <td>
                  
                    	<div class="text-center1"><b>{{$av->name}}</b></div>
                        <div class="text-center1">{{$av->description}}</div>
                            


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
                    	        
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#editModal{{ $av->_id }}"><i class="bx bx-edit"></i></button>


                      <div class="modal fade x-modal" id="editModal{{ $av->_id }}" tabindex="-1"
                                    aria-labelledby="editModal{{ $av->_id }}Label" aria-hidden="true"
                                    data-bs-backdrop="static" data-bs-keyboard="false">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header bg-custom-grey pb-2">
                                                <div class="d-flex w-100">
                                                    <div
                                                        class="d-flex justify-content-center align-items-center p-2 gap-1 bg-white rounded-2 mx-auto">
                                                        
                                                        <h5 class="modal-title fs-3"
                                                            id="editModal{{ $av->_id }}Label">Edit Sound</h5>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @include('content.sounds.includes.edit_form')
                                            </div>
                                            <div class="modal-footer p-0 d-flex justify-content-center pb-2">
                                                <button type="submit" class="btn btn-info fs-3"
                                                    form="editForm{{ $av->_id }}">Update </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                         <form action="sounds/{{$av->id}}"  onsubmit="confirmAction(event, () => event.target.submit())" method="post"  class="d-inline">
                      
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

  <x-modal
    id="createModal"
    title="Add Sound"
    saveBtnText="Create"
    saveBtnType="submit"
    saveBtnForm="createForm"
    size="md"
    :show="old('showCreateFormModal')? true: false"
  >
    @include('content.sounds.includes.create_form')
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
    </script>

        @endsection
@endsection

