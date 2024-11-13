@extends('layouts/layoutMaster') @section('title', 'Dashboard - Analytics') @section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css " rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"> @endsection @section('vendor-script') <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script> @endsection @section('page-script') <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script> @endsection @section('content') @include('layouts/customDesign') <style>
  .sections {
    display: none;
  }

  .selection_section {
    display: block;
  }

  .details {
    background: #EBEBEF;
  }
</style>
<form method="post" action="{{ url('genratvideo')}}"> @csrf
  <!-- selection part -->
  <div class="selection_section sections">
    <div class="row ">
      <div class="col-md-4">
        <div class="postbox selection-box">
          <div class="post-innter">
            <i class="bx bx-link option-icon"></i>
            <h3>Create From Link</h3>
            <div class="description"> Turn any blog post into a dynamic video by simply pasting the URL </div>
            <button class="btn btn-success gene_f_link" type="button"> Move Now <span class="play-span">
                <i class="bx bx-play"></i>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="postbox selection-box">
          <div class="post-innter">
            <i class="bx bx-file option-icon"></i>
            <h3>Create from Text</h3>
            <div class="description"> Write or paste your script and turn it into a compelling video </div>
            <button class="btn btn-success gene_f_text" type="button"> Move Now <span class="play-span">
                <i class="bx bx-play"></i>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="postbox selection-box">
          <div class="post-innter">
            <i class="bx bx-film option-icon"></i>
            <h3>Visual to Video</h3>
            <div class="description"> Create Slidershow Video with your owen Images and Video Clips </div>
            <button class="btn btn-success" type="button"> Move Now <span class="play-span">
                <i class="bx bx-play"></i>
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- selection part -->
  
  
  <!-- create link section -->
  <div class="row options_section main_section sections">
    <div class="col-md-12" style="margin:auto;">
      <div class="row">
      <div class="col-md-6">
        <h4 class="link_section">
          <b>Create From Link</b>
        </h4>
        <h4 class="text_section">
          <b>Create From Text</b>
        </h4>
        
        <div class="details1 link_section">
          <div class="details text_section">
            <div class="txt ">Type or Paste Text</div>
            <div class="row ">
              <div class="col-md-12">
                <input class="form-control" name="blog_link" placeholder="Place your blog link here">
              </div>
            </div>
          </div>
        </div>
        <div class="details text_section2" style="display:none !important;">
          <div class="txt ">Select Images </div>
          <div class="row ">
            <div class="col-md-6">
              <div class="bordered text-center">
                <i class="bx bx-text md-font"></i>
                <h4>Write your content</h4>
              </div>
            </div>
            <div class="col-md-6">
              <div class="bordered text-center bg-brown">
                <i class="bx bx-music md-font"></i>
                <h4>Upload Audio</h4>
              </div>
            </div>
            <div class="col-md-12">
              <div class="m-t-10 text-center">
                <textarea class="form-control" placeholder="Type your text..."></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="details">
          <div class="txt ">Select Voice</div>
          <div class="row ">
            <div class="col-md-6">
              <select class="form-control" name="select_avatar">
                <option value="">Select Language</option>
                <option value="arabic">Arabic</option>
                <option value="kurdish">Kurdish</option>
                <option value="turkey">Turkey</option>
              </select>
            </div>
            <div class="col-md-6">
              <select class="form-control" name="select_category">
                <option value="">Select Speaker</option>
                <option value="myoung">Male Young</option>
                <option value="fyoung">Female Young</option>
                <option value="mold">Male Old</option>
                <option value="fold">Female Old</option>
              </select>
            </div>
            <div class="col-md-12 m-t-10">
              <input class="form-control" name="video_title" placeholder="Type Video Title">
            </div>
          </div>
        </div>
        <br />
        <div class="details">
          <div class="txt ">Video Length <br> Video length duration based on Voice - Over </div>
          <div class="row ">
            <div class="col-md-12">
              <img src="{{ asset('images/viddet.png')}}" style="width:100%;" />
            </div>
          </div>
        </div>
        <br />
        <div class="details link_section">
          <div class="row">
            <div class="txt col-md-12">Blog Link <button class="btn  generate">Generate</button>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-12">
              <input class="form-control" name="blog_link" placeholder="Place your blog link here">
            </div>
          </div>
        </div>
        <div class="details text_section">
        <div class="row">
            <div class="txt col-md-12 m-10"><b>Type or Paste your Text</b></div>
          </div>

          <div class="row m-10">
          <div class="col-md-6">
              <div class="bordered text-center">
                <i class="bx bx-text md-font"></i>
                <h4>Write your content</h4>
              </div>
            </div>
            <div class="col-md-6">
              <div class="bordered text-center bg-brown">
                <i class="bx bx-music md-font"></i>
                <h4>Upload Audio</h4>
              </div>
            </div>
          </div>

          
          <div class="row ">
            <div class="col-md-12">
              <textarea class="form-control" rows="6" name="generated_script" placeholder="Paste your Blog Text here"></textarea>
              <div class="text-center">
                <button class="btn  regenerate">Generate</button>
              </div>
            </div>
          </div>
        </div>
      <br />
      <div class="details">
        <div class="row">
          <div class="txt col-md-12">Provided Script <button class="btn  generate">
              <i class="menu-icon tf-icons bx bx-volume"></i>
            </button>
          </div>
        </div>
        <div class="row ">
          <div class="col-md-12">
            <textarea class="form-control" rows="15" name="generated_script" placeholder="Generated script here"></textarea>
            <div class="text-center">
              <button class="btn  regenerate">Re Generate</button>
            </div>
          </div>
        </div>
      </div>
      <br />
      <div class="details">
        <div class="txt ">Video Format</div>
        <div class="row">
          <div class="col-md-6 ">
            <div class="bordered">
              <label for="tiktok_format">
                <b>9:16</b>
                <br> Tiktok Reels </label>
              <input type="radio" id="tiktok_format" name="video_format" value="0">
            </div>
          </div>
          <div class="col-md-6">
            <div class="bordered">
              <label for="ig_format">
                <b>1:1</b>
                <br> Instagram </label>
              <input type="radio" id="ig_format" name="video_format" value="1" checked="checked">
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="bordered">
              <label for="t_reels">
                <b>9:16</b>
                <br> Tiktok Reels </label>
              <input type="radio" id="t_reels" name="video_format" value="2">
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="bordered">
              <label for="tv_format">
                <b>High Size</b>
                <br> TV </label>
              <input type="radio" id="tv_format" name="video_format" value="3">
            </div>
          </div>
        </div>
      </div>
      </div>
      <!-- right part -->
      <div class="col-md-6">
      	
        <h4 class="link_section" style="display: block;">&nbsp;
          
        </h4>
      
      
      <div class="details">
        <div class="txt ">Select Images </div>
        <div class="row ">
          <div class="col-md-6">
            <div class="bordered text-center">
              <i class="bx bx-bulb bg-font"></i>
              <h4>AI Visual</h4> Auto Generate video footage or images using AI
            </div>
          </div>
          <div class="col-md-6">
            <div class="bordered text-center bg-brown">
              <i class="bx bx-image bg-font"></i>
              <h4>Own Image</h4> Upload your own images take care of image size
            </div>
          </div>
        </div>
      </div>
      
      <div class="details">
       
        <div class="row form-switch">
          <div class="col-md-12 ">
            <div class="bordered ">
              <b>Infinte Zoom</b>
              <div>Zoom into Sceen Endlessly using AI - Generated images <input class="form-check-input closetogglebtn toggl-input" checked="checked" name="zoom_option" type="checkbox">
              </div>
            </div>
          </div>
          <div class="col-md-12 ">
            <div class="bordered ">
              <b>Character Consistency</b>
              <div>Soon <input class="form-check-input closetogglebtn toggl-input" checked="checked" name="character_option" type="checkbox">
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="details">
          <div class="txt ">
            <b>Image Style</b>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/sketch.png') }}" />
                  <div class="art-txt">Sketch</div>
                </div>
              </div>
            </div>
            <div class="col-md-4  col-sm-4">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/pixelart.png') }}" />
                  <div class="art-txt">Pixel Art</div>
                </div>
              </div>
            </div>
            <div class="col-md-4  col-sm-4">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/relastic.png') }}" />
                  <div class="art-txt">Realistic</div>
                </div>
              </div>
            </div>
            <div class="col-md-4  col-sm-4">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/cinemtic.png') }}" />
                  <div class="art-txt">Cinematic</div>
                </div>
              </div>
            </div>
            <div class="col-md-4  col-sm-4">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/anime.png') }}" />
                  <div class="art-txt">Anime</div>
                </div>
              </div>
            </div>
            <div class="col-md-4  col-sm-4">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/3d.png') }}" />
                  <div class="art-txt">3D Model</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="details">
          <div class="txt ">Select Music </div>
          <div class="row ">
            <div class="col-md-6">
              <div class="bordered text-center">
                <i class="bx bx-bulb bg-font"></i>
                <h4>AI Music</h4> Auto Generate music AI depends on duration
              </div>
            </div>
            <div class="col-md-6">
              <div class="bordered text-center bg-brown">
                <i class="bx bx-image bg-font"></i>
                <h4>Own Music</h4> Upload your own Music take care of duration
              </div>
            </div>
            <div class="col-md-3  col-sm-3">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/music.jpg') }}" />
                  <div class="art-txt">Happy</div>
                </div>
              </div>
            </div>
            <div class="col-md-3  col-sm-3">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/music.jpg') }}" />
                  <div class="art-txt">Energetic</div>
                </div>
              </div>
            </div>
            <div class="col-md-3  col-sm-3">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/music.jpg') }}" />
                  <div class="art-txt">Playful</div>
                </div>
              </div>
            </div>
            <div class="col-md-3  col-sm-3">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/music.jpg') }}" />
                  <div class="art-txt">Suspenseful</div>
                </div>
              </div>
            </div>
            <div class="col-md-3  col-sm-3">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/music.jpg') }}" />
                  <div class="art-txt">Epic</div>
                </div>
              </div>
            </div>
            <div class="col-md-3  col-sm-3">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/music.jpg') }}" />
                  <div class="art-txt">Serious</div>
                </div>
              </div>
            </div>
            <div class="col-md-3  col-sm-3">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/music.jpg') }}" />
                  <div class="art-txt">Inspiring</div>
                </div>
              </div>
            </div>
            <div class="col-md-3  col-sm-3">
              <div class="details ">
                <div class="art-image">
                  <img src="{{ asset('images/arts/music.jpg') }}" />
                  <div class="art-txt">None</div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      
      
      <!--right part ends above -->
      </div>
      </div>
      <div class=" text-center">
        <button class="btn btn-success conver_back_btn" type="button"> Back <span class="play-span">
            <i class="bx bx-play"></i>
          </span>
        </button>
        <button class="btn btn-success conver_vid_btn1" type="submit"> Convert Now <span class="play-span">
            <i class="bx bx-play"></i>
          </span>
        </button>
      </div>
    </div>
  </div>
  </div>
  
  </div>
  <!-- create link section ends -->
  
  
  
  
  <!-- conversion section -->
  <div class="row link_conversion_section main_section sections">
    <div class="col-md-8" style="margin:auto;">
      <div class="form-switch">
        <div class="details ">
          <div class="txt ">
            <b>Select Voice</b>
          </div>
          <div class="row ">
            <div class="col-md-6">
              <select class="form-control" name="select_avatar">
                <option value="">Select Language</option>
              </select>
            </div>
            <div class="col-md-6">
              <select class="form-control" name="select_category">
                <option value="">Select Speaker</option>
              </select>
            </div>
            <div class="col-md-12 ">
              <div class="bordered ">
                <b>Captions</b>
                <div>Describe this area <input class="form-check-input closetogglebtn toggl-input" checked="checked" name="character_option" type="checkbox">
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="text-center m-b-20">
          <button class="btn btn-success back_con_btn" type="button"> Back <span class="play-span">
              <i class="bx bx-play"></i>
            </span>
          </button>
          <button class="btn btn-success" type="submit"> Convert Now <span class="play-span">
              <i class="bx bx-play"></i>
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- conversion section ends -->
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
</script> @endsection