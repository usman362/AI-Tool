<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/hammer/hammer.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/i18n/i18n.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/typeahead-js/typeahead.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@yield('vendor-script')
<script src="{{ asset(mix('assets/vendor/libs/toastr/toastr.js')) }}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/js/main-typeahead.js') }}"></script>
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>
<script src="{{ asset('assets/js/utils.js') }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<!-- Form Validation -->
<script src="{{asset('assets/vendor/libs/@form-validation/popular.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>

@yield('page-script')
{{-- <script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script> --}}
<!-- END: Page JS-->


@stack('scripts')

<script>
$( document ).ready(function() {

	var filename = "av_video.mp4";
	
        $(".download_vid").click(function(){
          
        // Make an AJAX request to the download route
        $.ajax({
            url: '{{ route("video.download") }}?v=1.0',
            method: 'GET',
            xhrFields: {
                responseType: 'blob' // Important for downloading files
            },
            success: function(response) {
                // Create a download link for the file
                var link = document.createElement('a');
                var blob = response;
                var url = window.URL.createObjectURL(blob);

                // Set up the download attributes
                link.href = url;
                link.download = filename; // You can also set a custom filename here
                link.click();

                // Optionally, show a success message
                $('#status').html('Download started.');
            },
            error: function(xhr) {
                // Handle error (e.g., file not found)
                $('#status').html('Error: ' + xhr.responseJSON.message);
            }
        });
	});


		$(".download_img").click(function(){
          
			var photo = "Feed Photo.png";
		  // Make an AJAX request to the download route
		  $.ajax({
			  url: '{{ route("photo.download") }}?v=1.0',
			  method: 'GET',
			  xhrFields: {
				  responseType: 'blob' // Important for downloading files
			  },
			  success: function(response) {
				  // Create a download link for the file
				  var link = document.createElement('a');
				  var blob = response;
				  var url = window.URL.createObjectURL(blob);
  
				  // Set up the download attributes
				  link.href = url;
				  link.download = photo; // You can also set a custom filename here
				  link.click();
  
				  // Optionally, show a success message
				  $('#status').html('Download started.');
			  },
			  error: function(xhr) {
				  // Handle error (e.g., file not found)
				  $('#status').html('Error: ' + xhr.responseJSON.message);
			  }
		  });



        })
     
	
	@if(isset($generatvideo) && $generatvideo == 1){
		$(".sections").hide();
		$(".selection_section").show();
	}
	@endif

	@if(isset($generatvideo) && $generatvideo == 0){
		$(".list_video_section").show();
		$(".selection_section").hide();
	}
	@endif

	//$(document).on("click", ".generate_video", function(){
	//	$(".sections").hide();
	//	$(".selection_section").show();
	//});
	
	$(".gene_f_link").click(function(){
		$(".selection_section").hide();
		$(".options_section").show();
		$(".link_section").show();
		$(".text_section").hide();
	})
	
	$(".gene_f_text").click(function(){
		$(".selection_section").hide();
		$(".options_section").show();
		$(".link_section").hide();
		$(".text_section").show();
	})
	
	$(".conver_back_btn").click(function(){
		$(".sections").hide();
		$(".selection_section").show();
	});
	
	$(".conver_vid_btn").click(function(){
		$(".options_section").hide();
		$(".link_conversion_section").show();
	});
	
	$(".back_con_btn").click(function(){
		$(".options_section").show();
		$(".link_conversion_section").hide();
	});
	
	
});
</script>