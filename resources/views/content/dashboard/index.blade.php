

@extends('layouts/layoutMaster')

@section('title', 'Dashboard - Analytics')



@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css " rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection


@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')

@include('layouts/customDesign')

<style>
  


  </style>

<div class="row list_video_section sections">
  <div class="col-lg-12 order-0">
    
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <h5>New Videos</h5>
        </div>
      </div>
    
  </div>
</div>

<div class=" list_video_section sections">
<div class="row ">

 

@php
for($i=0; $i<3; $i++){
@endphp


    <!-- videos section -->

    <div class="col-lg-4">
    <div class="postbox ">
  <div class="post-innter">
    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="" class="w-px-30 h-auto rounded-circle">
    <div class="post_avatar">
      <div class="heading_post av_name">Bave Teyar</div>
      <div class="details_post av_task">Funny news</div>
    </div>
    <div class="post_time delbtn">

    <button type="button" class="btn btn-sm btn-icon download_vid">
          <i class="bx bx-download me-1"></i>
        </button>

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
    <div class="">
      <div class="artilce_title" >Nirxdana fîlimê...</div>
      <div class="artilce_title" >10.10.2024 - 09:00</div>
      <div class="article_time article_details">Funny</div>
      
      
    </div>
    
    <div class="clear clearfix"></div>
  </div>
</div>
    </div>  
    <!-- videos section -->
    @php
}

@endphp
  
  
  
</div>




<div class="row ">
  <div class="col-lg-12 order-0">
    
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <h5>New Feeds</h5>
        </div>

        
      </div>
    
  </div>
</div>

<div class="row ">


@php
for($i=0; $i<4; $i++){
@endphp


    <!-- videos section -->
	
    <div class="col-lg-3">
    <div class="postbox ">
  <div class="post-innter">
    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="" class="w-px-30 h-auto rounded-circle">
    <div class="post_avatar">
      <div class="heading_post av_name">Bave Teyar</div>
      <div class="details_post av_task">Funny news</div>
    </div>
    <div class="post_time">

        

      <form action="{{ url('/')}}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
       
       
        <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove">
          <i class="bx bx-trash me-1"></i>
        </button>
      </form>
    </div>
    <div class="post_img">
      <img src="https://static.scientificamerican.com/sciam/subscriptions/sciam_subgrid_product_digital.jpg">
    </div>

    
    <div class="">
      <div class="artilce_title" >Nirxdana fîlimê...</div>
      <div class="artilce_title" >10.10.2024 - 09:00</div>
      <div class="article_time article_details">Funny</div>
      
      
    </div>
    
    <div class="clear clearfix"></div>
  </div>
</div>
    </div>  
    <!-- videos section -->
    @php
}

@endphp
  
  </div>
</div>

<div class="modal fade" id="createModal1" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog popped">
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
    id="createModal10"
   
    size="md"
  >
    @include('content.dashboard.includes.video_form')
  </x-modal>





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


