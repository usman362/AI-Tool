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

document.addEventListener('DOMContentLoaded', function () {
          const slider = document.getElementById('slider-pips');
          const toggleSwitch = document.querySelector('.switch-input');
          const sliderInput = document.getElementById('slider-pips-input');
          const hiddenInput = document.getElementById('length-hidden');
          
          // Ensure savedLength is correctly formatted as a number
          const savedLength = parseFloat("50");
      
          // Check if savedLength is a valid number before initializing the slider
          if (isNaN(savedLength)) {
              console.error('Invalid savedLength value:', savedLength);
              return;
          }
      
          // Initialize the noUiSlider with the saved length
          noUiSlider.create(slider, {
              start: savedLength, // Use the saved value from the database
              range: {
                  min: 0,
                  max: 100
              },
              step: 1,
              tooltips: true, // Display tooltip
              connect: 'lower',
              pips: {
                  mode: 'values',
                  values: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                  density: 10
              }
          });
      
          // Set the initial value of the input fields
          sliderInput.value = savedLength + ' Second';
          hiddenInput.value = savedLength;
      
          // Function to enable or disable the slider based on the toggle switch state
          function toggleSlider(enable) {
              if (enable) {
                  slider.removeAttribute('disabled');
                  slider.noUiSlider.updateOptions({
                      start: savedLength
                  });
              } else {
                  slider.setAttribute('disabled', true);
                  slider.noUiSlider.updateOptions({
                      start: [savedLength]
                  });
              }
          }
      
          // Update the input fields when the slider value changes (only when enabled)
          slider.noUiSlider.on('update', function (values, handle) {
              if (!slider.hasAttribute('disabled')) {
                  const currentValue = values[handle];
                  sliderInput.value = currentValue + ' Second';
                  hiddenInput.value = currentValue;
              }
          });
      
          // Set the initial state of the slider based on the toggle switch
          toggleSlider(toggleSwitch.checked);
      
          // Add an event listener to the toggle switch to enable/disable the slider
          toggleSwitch.addEventListener('change', function () {
              toggleSlider(this.checked);
          });
      });

function sliderVal(){
    
		var a = parseInt(document.querySelector('.noUi-tooltip').innerText);
		document.getElementById("slider-pips4-input").value = a + " min";
		$('input[name="call_duration"]').attr('data-size', a);
	}


    const fileInput = document.getElementById('ownimage');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');

    // Event listener for file selection
    fileInput.addEventListener('change', function(event) {
      // Clear any previous previews
      //imagePreviewContainer.innerHTML = '';

      // Get selected files
      const files = event.target.files;

      // Loop through each selected file and create an image preview
      Array.from(files).forEach(file => {
        // Only process image files
        if (file.type.startsWith('image/')) {
          const reader = new FileReader();

          // Set up what to do when the file is read
          reader.onload = function(e) {
            // Create a container for the image and the remove button
            const imageContainer = document.createElement('div');
            imageContainer.classList.add('image-preview-container');

            // Create an image element
            const imgElement = document.createElement('img');
            imgElement.src = e.target.result;
            imgElement.classList.add('image-preview');

            // Create a button element for removing the image
            const removeBtn = document.createElement('button');
            removeBtn.classList.add('remove-btn');
            removeBtn.textContent = '×';  // Cross icon

            // Event listener for remove button
            removeBtn.addEventListener('click', function() {
              imagePreviewContainer.removeChild(imageContainer);
            });

            // Append the image and the remove button to the container
            imageContainer.appendChild(imgElement);
            imageContainer.appendChild(removeBtn);

            // Append the image container to the main preview container
            imagePreviewContainer.appendChild(imageContainer);
          };

          // Read the file as a data URL
          reader.readAsDataURL(file);
        }
      });
    });



    const audioInput = document.getElementById('audioInput');
    const audioPreviewContainer = document.getElementById('audioPreviewContainer');

    // Event listener for file selection
    audioInput.addEventListener('change', function(event) {
      // Get selected files
      const files = event.target.files;

      // Loop through each selected file and create an audio preview
      Array.from(files).forEach(file => {
        // Only process audio files (MP3)
        if (file.type.startsWith('audio/')) {
          const reader = new FileReader();

          // Set up what to do when the file is read
          reader.onload = function(e) {
            // Create a container for the audio player and the remove button
            const audioContainer = document.createElement('div');
            audioContainer.classList.add('audio-preview');

            // Create an audio element
            const audioElement = document.createElement('audio');
            audioElement.src = e.target.result;
            audioElement.controls = true;  // Add audio controls (play, pause, volume)
            audioElement.classList.add('audio-preview-player');

            // Create a remove button for the audio player
            const removeBtn = document.createElement('button');
            removeBtn.classList.add('remove-btn');
            removeBtn.textContent = '×';  // Cross icon

            // Event listener for remove button
            removeBtn.addEventListener('click', function() {
              audioPreviewContainer.removeChild(audioContainer);
            });

            // Append the audio player and the remove button to the container
            audioContainer.appendChild(audioElement);
            audioContainer.appendChild(removeBtn);

            // Append the audio container to the main preview container
            audioPreviewContainer.appendChild(audioContainer);
          };

          // Read the file as a data URL
          reader.readAsDataURL(file);
        }
      });
    });
</script>