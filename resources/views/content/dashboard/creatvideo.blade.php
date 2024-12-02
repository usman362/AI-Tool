

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

:root {
  --color-brand-primary-100: #ebe3ff;
  --color-brand-primary-300: #b89fff;
  --color-brand-primary-500: #6b3bf4;
  --color-brand-primary-700: #562fc4;
  --color-brand-primary-900: #402391;
  --color-nutral-100: #e9e9ef;
  --color-nutral-300: #ceced4;
  --color-nutral-500: #86868f;
  --color-nutral-700: #4e4e58;
  --color-nutral-900: #252529;
  --color-text-white: #ffffff;
  --color-text-disable: #ceced4;
  --color-text-lowemphasis: #86868f;
  --color-text-highemphasis: #4e4e58;
  --color-text-heading: #252529;
  --color-text-primary: #6b3bf4;
  --color-text-hover: #562fc4;
  --color-text-error: #d92121;
  --color-text-error2: #ff4b4b;
  --color-text-warning: #d77502;
  --color-text-info: #0065c2;
  --color-text-success: #009d81;
  --color-background: #edeef3;
  --color-background-light: #ffffff;
  --color-background-gray-1: #ededf0;
  --color-background-scrimgray-1: rgba(237, 237, 240, .5);
  --color-background-dark: #1d1d25;
  --color-background-scrimprimary-1: rgba(107, 59, 244, .1);
  --color-background-error: rgba(217, 33, 33, .1);
  --color-background-warning: rgba(247, 144, 9, .1);
  --color-background-info: rgba(0, 101, 194, .1);
  --color-background-success: rgba(0, 157, 129, .1);
  --color-button-white: #ffffff;
  --color-button-disable: #ceced4;
  --color-button-black: #252529;
  --color-button-blackhover: #323237;
  --color-button-primay: #6b3bf4;
  --color-button-primaryhover: #562fc4;
  --color-borders-1: #e9e9ef;
  --color-borders-2: #ceced4;
  --color-misc-yellow: #ffd43d;
  --color-misc-purple-gradiant: linear-gradient( 90deg, #6b3bf4 0%, #9859ff 100% );
  --tooltip-text-color: white;
  --tooltip-background-color: black;
  --tooltip-margin: 30px;
  --tooltip-arrow-size: 6px
}
input[type=range] {
  --range-progress: 0;
  -webkit-appearance:none;
  position:relative;
  background:#ccc;
  width:80px;
  height:2px;
  border-radius:2px;
  cursor:pointer
}
input[type=range]::-moz-range-track {
  position:relative;
  background:#ccc;
  width:50px;
  height:2px;
  border-radius:2px;
  cursor:pointer
}
input[type=range]:before {
  content:"";
  height:2px;
  background:#6b3bf4;
  width:var(--range-progress);
  border-bottom-left-radius:2px;
  border-top-left-radius:2px;
  position:absolute;
  top:0;
  left:0
}
input[type=range]::-moz-range-progress {
  background:#6b3bf4;
  border-bottom-left-radius:2px;
  border-top-left-radius:2px;
  height:2px
}
input[type=range]::-webkit-slider-thumb {
  -webkit-appearance:none;
  height:8px;
  width:8px;
  border-radius:50%;
  border:none;
  background-color:#6b3bf4;
  cursor:pointer;
  position:relative
}
input[type=range]:active::-webkit-slider-thumb {
  transform:scale(1.2)
}
input[type=range]::-moz-range-thumb {
  height:8px;
  width:8px;
  border-radius:50%;
  background:#6b3bf4;
  cursor:pointer;
  border:transparent;
  position:relative
}
input[type=range]:active::-moz-range-thumb {
  transform:scale(1.2)
}
.progress {
  display:flex;
  align-items:center
}
.progress input {
  display:inline-block;
  margin-right:10px;
  flex-grow:1
}
.react-tabs {
  -webkit-tap-highlight-color:transparent
}
.react-tabs__tab-list {
  border-bottom:1px solid #aaa;
  margin:0 0 10px;
  padding:0
}
.react-tabs__tab {
  display:inline-block;
  border:1px solid transparent;
  border-bottom:none;
  bottom:-1px;
  position:relative;
  list-style:none;
  padding:6px 12px;
  cursor:pointer
}
.react-tabs__tab--selected {
  background:#fff;
  border-color:#aaa;
  color:#000;
  border-radius:5px 5px 0 0
}
.react-tabs__tab--disabled {
  color:GrayText;
  cursor:default
}
.react-tabs__tab:focus {
  outline:none
}
.react-tabs__tab:focus:after {
  content:"";
  position:absolute;
  height:5px;
  left:-4px;
  right:-4px;
  bottom:-5px;
  background:#fff
}
.react-tabs__tab-panel {
  display:none
}
.react-tabs__tab-panel--selected {
  display:block
}
.transparent-btn{
  background:transparent;
  border-color:transparent;
}


:root {
  --color-brand-primary-100: #ebe3ff;
  --color-brand-primary-300: #b89fff;
  --color-brand-primary-500: #6b3bf4;
  --color-brand-primary-700: #562fc4;
  --color-brand-primary-900: #402391;
  --color-nutral-100: #e9e9ef;
  --color-nutral-300: #ceced4;
  --color-nutral-500: #86868f;
  --color-nutral-700: #4e4e58;
  --color-nutral-900: #252529;
  --color-text-white: #ffffff;
  --color-text-disable: #ceced4;
  --color-text-lowemphasis: #86868f;
  --color-text-highemphasis: #4e4e58;
  --color-text-heading: #252529;
  --color-text-primary: #6b3bf4;
  --color-text-hover: #562fc4;
  --color-text-error: #d92121;
  --color-text-error2: #ff4b4b;
  --color-text-warning: #d77502;
  --color-text-info: #0065c2;
  --color-text-success: #009d81;
  --color-background: #edeef3;
  --color-background-light: #ffffff;
  --color-background-gray-1: #ededf0;
  --color-background-scrimgray-1: rgba(237, 237, 240, .5);
  --color-background-dark: #1d1d25;
  --color-background-scrimprimary-1: rgba(107, 59, 244, .1);
  --color-background-error: rgba(217, 33, 33, .1);
  --color-background-warning: rgba(247, 144, 9, .1);
  --color-background-info: rgba(0, 101, 194, .1);
  --color-background-success: rgba(0, 157, 129, .1);
  --color-button-white: #ffffff;
  --color-button-disable: #ceced4;
  --color-button-black: #252529;
  --color-button-blackhover: #323237;
  --color-button-primay: #6b3bf4;
  --color-button-primaryhover: #562fc4;
  --color-borders-1: #e9e9ef;
  --color-borders-2: #ceced4;
  --color-misc-yellow: #ffd43d;
  --color-misc-purple-gradiant: linear-gradient( 90deg, #6b3bf4 0%, #9859ff 100% )
}
@-webkit-keyframes slide-in-left {
  to {
    left:0
  }
}
@keyframes slide-in-left {
  to {
    left:0
  }
}
@-webkit-keyframes slide-in-right {
  to {
    right:0
  }
}
@keyframes slide-in-right {
  to {
    right:0
  }
}
@keyframes shake {
  10%,
  90% {
    transform:translate3d(-1px,0,0)
  }
  20%,
  80% {
    transform:translate3d(2px,0,0)
  }
  30%,
  50%,
  70% {
    transform:translate3d(-4px,0,0)
  }
  40%,
  60% {
    transform:translate3d(4px,0,0)
  }
}
@keyframes l2 {
  to {
    background-size:110%
  }
}
@-webkit-keyframes rotate {
  0% {
    -webkit-transform:rotate(0deg)
  }
  to {
    -webkit-transform:rotate(360deg)
  }
}
@keyframes rotate {
  0% {
    transform:rotate(0)
  }
  to {
    transform:rotate(360deg)
  }
}
* {
  margin:0;
  padding:0;
  box-sizing:border-box;
  box-shadow:none
}
*:hover {
  box-shadow:none
}
*:focus {
  outline-width:0
}
body {
  min-width:375px;
  background-color:var(--color-background);
  font-family:Mulish,sans-serif;
  font-optical-sizing:auto;
  font-style:normal
}
.grecaptcha-badge {
  display:none!important
}
button {
  cursor:pointer
}
.dPikOc {
  position: relative;
  height: 46px;
  width: 100%;
  border: 2px solid rgb(107, 59, 244);
  border-radius: 8px;
}
.dPikOc::before {
  content: "";
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-size: auto 100%;
  opacity: 1;
  z-index: 1;
  background-image: url("https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/681ba266c5124851afff0432b1c8c848_Ads%20Food.jpg");
}


:root {
  --toastify-color-light: #fff;
  --toastify-color-dark: #121212;
  --toastify-color-info: #3498db;
  --toastify-color-success: #07bc0c;
  --toastify-color-warning: #f1c40f;
  --toastify-color-error: #e74c3c;
  --toastify-color-transparent: rgba(255, 255, 255, .7);
  --toastify-icon-color-info: var(--toastify-color-info);
  --toastify-icon-color-success: var(--toastify-color-success);
  --toastify-icon-color-warning: var(--toastify-color-warning);
  --toastify-icon-color-error: var(--toastify-color-error);
  --toastify-toast-width: 320px;
  --toastify-toast-offset: 16px;
  --toastify-toast-top: max(var(--toastify-toast-offset), env(safe-area-inset-top));
  --toastify-toast-right: max(var(--toastify-toast-offset), env(safe-area-inset-right));
  --toastify-toast-left: max(var(--toastify-toast-offset), env(safe-area-inset-left));
  --toastify-toast-bottom: max(var(--toastify-toast-offset), env(safe-area-inset-bottom));
  --toastify-toast-background: #fff;
  --toastify-toast-min-height: 64px;
  --toastify-toast-max-height: 800px;
  --toastify-toast-bd-radius: 6px;
  --toastify-font-family: sans-serif;
  --toastify-z-index: 9999;
  --toastify-text-color-light: #757575;
  --toastify-text-color-dark: #fff;
  --toastify-text-color-info: #fff;
  --toastify-text-color-success: #fff;
  --toastify-text-color-warning: #fff;
  --toastify-text-color-error: #fff;
  --toastify-spinner-color: #616161;
  --toastify-spinner-color-empty-area: #e0e0e0;
  --toastify-color-progress-light: linear-gradient( to right, #4cd964, #5ac8fa, #007aff, #34aadc, #5856d6, #ff2d55 );
  --toastify-color-progress-dark: #bb86fc;
  --toastify-color-progress-info: var(--toastify-color-info);
  --toastify-color-progress-success: var(--toastify-color-success);
  --toastify-color-progress-warning: var(--toastify-color-warning);
  --toastify-color-progress-error: var(--toastify-color-error);
  --toastify-color-progress-bgo: .2
}
.Toastify__toast-container {
  z-index:var(--toastify-z-index);
  -webkit-transform:translate3d(0,0,var(--toastify-z-index));
  position:fixed;
  padding:4px;
  width:var(--toastify-toast-width);
  box-sizing:border-box;
  color:#fff
}
.Toastify__toast-container--top-left {
  top:var(--toastify-toast-top);
  left:var(--toastify-toast-left)
}
.Toastify__toast-container--top-center {
  top:var(--toastify-toast-top);
  left:50%;
  transform:translate(-50%)
}
.Toastify__toast-container--top-right {
  top:var(--toastify-toast-top);
  right:var(--toastify-toast-right)
}
.Toastify__toast-container--bottom-left {
  bottom:var(--toastify-toast-bottom);
  left:var(--toastify-toast-left)
}
.Toastify__toast-container--bottom-center {
  bottom:var(--toastify-toast-bottom);
  left:50%;
  transform:translate(-50%)
}
.Toastify__toast-container--bottom-right {
  bottom:var(--toastify-toast-bottom);
  right:var(--toastify-toast-right)
}

.WfOju {
  background: rgb(107, 59, 244);
  color: white;
  font-weight: bold;
  position: relative;
}
.ftbEit {
  position: relative;
  height: 46px;
  width: 100%;
  border: medium;
  border-radius: 0px;
}
.ftbEit::before {
  content: "";
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-image: url("https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/7b7d35dec1f041b58d808fc0f3ea877a_Ads%20Food.jpg");
  background-size: auto 100%;
  opacity: 1;
  z-index: 1;
}
.eHkceJ {
  position: relative;
  height: 46px;
  width: 100%;
  border: medium;
  border-radius: 0px;
}
.eHkceJ::before {
  content: "";
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-image: url("https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/0732ad7d5a5a430597fc2f6c516c95ee_Ads%20Food.jpg");
  background-size: auto 100%;
  opacity: 1;
  z-index: 1;
}
.Bvvwl {
  position: relative;
  height: 46px;
  width: 100%;
  border: medium;
  border-radius: 0px;
}
.Bvvwl::before {
  content: "";
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-image: url("https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/c0388008226b431d9e43567763e33a73_Ads%20Food.jpg");
  background-size: auto 100%;
  opacity: 1;
  z-index: 1;
}
.kjTtth {
  position: relative;
  height: 46px;
  width: 100%;
  border: medium;
  border-radius: 0px;
}
.kjTtth::before {
  content: "";
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-image: url("https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/740ea3d245604b3bbe41d50ec18ca4b0_Ads%20Food.jpg");
  background-size: auto 100%;
  opacity: 1;
  z-index: 1;
}

element {
  height: 48px;

  left: 15px;

  width: 455px;

}
.iJfKXO .timeline-editor-edit-row, .iJfKXO .timeline-editor-action {
  background-image: none !important;

  background-color: rgb(255, 255, 255) !important;

  overflow: visible;

}
.timeline-editor-edit-row {
  background-repeat: no-repeat, repeat;
  background-image: linear-gradient(#191b1d, #191b1d), linear-gradient(90deg, rgba(255, 255, 255, 0.08) 1px, transparent 0);
  display: flex;
  flex-direction: row;
  box-sizing: border-box;
}
@media only screen and (max-width : 480px) {
  .Toastify__toast-container {
    width:100vw;
    padding:0;
    left:env(safe-area-inset-left);
    margin:0
  }
  .Toastify__toast-container--top-left,
  .Toastify__toast-container--top-center,
  .Toastify__toast-container--top-right {
    top:env(safe-area-inset-top);
    transform:translate(0)
  }
  .Toastify__toast-container--bottom-left,
  .Toastify__toast-container--bottom-center,
  .Toastify__toast-container--bottom-right {
    bottom:env(safe-area-inset-bottom);
    transform:translate(0)
  }
  .Toastify__toast-container--rtl {
    right:env(safe-area-inset-right);
    left:initial
  }
}
.Toastify__toast {
  --y: 0;
  position:relative;
  -ms-touch-action:none;
  touch-action:none;
  min-height:var(--toastify-toast-min-height);
  box-sizing:border-box;
  margin-bottom:1rem;
  padding:8px;
  border-radius:var(--toastify-toast-bd-radius);
  box-shadow:0 4px 12px #0000001a;
  display:-ms-flexbox;
  display:flex;
  -ms-flex-pack:justify;
  justify-content:space-between;
  max-height:var(--toastify-toast-max-height);
  font-family:var(--toastify-font-family);
  cursor:default;
  direction:ltr;
  z-index:0;
  overflow:hidden
}
.Toastify__toast--stacked {
  position:absolute;
  width:100%;
  transform:translate3d(0,var(--y),0) scale(var(--s));
  transition:transform .3s
}
.Toastify__toast--stacked[data-collapsed] .Toastify__toast-body,
.Toastify__toast--stacked[data-collapsed] .Toastify__close-button {
  transition:opacity .1s
}
.Toastify__toast--stacked[data-collapsed=false] {
  overflow:visible
}
.Toastify__toast--stacked[data-collapsed=true]:not(:last-child)>* {
  opacity:0
}
.Toastify__toast--stacked:after {
  content:"";
  position:absolute;
  left:0;
  right:0;
  height:calc(var(--g) * 1px);
  bottom:100%
}
.Toastify__toast--stacked[data-pos=top] {
  top:0
}
.Toastify__toast--stacked[data-pos=bot] {
  bottom:0
}
.Toastify__toast--stacked[data-pos=bot].Toastify__toast--stacked:before {
  transform-origin:top
}
.Toastify__toast--stacked[data-pos=top].Toastify__toast--stacked:before {
  transform-origin:bottom
}
.Toastify__toast--stacked:before {
  content:"";
  position:absolute;
  left:0;
  right:0;
  bottom:0;
  height:100%;
  transform:scaleY(3);
  z-index:-1
}
.Toastify__toast--rtl {
  direction:rtl
}
.Toastify__toast--close-on-click {
  cursor:pointer
}
.Toastify__toast-body {
  margin:auto 0;
  -ms-flex:1 1 auto;
  flex:1 1 auto;
  padding:6px;
  display:-ms-flexbox;
  display:flex;
  -ms-flex-align:center;
  align-items:center
}
.Toastify__toast-body>div:last-child {
  word-break:break-word;
  -ms-flex:1;
  flex:1
}
.Toastify__toast-icon {
  -webkit-margin-end:10px;
  margin-inline-end:10px;
  width:20px;
  -ms-flex-negative:0;
  flex-shrink:0;
  display:-ms-flexbox;
  display:flex
}
.Toastify--animate {
  animation-fill-mode:both;
  animation-duration:.5s
}
.Toastify--animate-icon {
  animation-fill-mode:both;
  animation-duration:.3s
}
@media only screen and (max-width : 480px) {
  .Toastify__toast {
    margin-bottom:0;
    border-radius:0
  }
}
.Toastify__toast-theme--dark {
  background:var(--toastify-color-dark);
  color:var(--toastify-text-color-dark)
}
.Toastify__toast-theme--light,
.Toastify__toast-theme--colored.Toastify__toast--default {
  background:var(--toastify-color-light);
  color:var(--toastify-text-color-light)
}
.Toastify__toast-theme--colored.Toastify__toast--info {
  color:var(--toastify-text-color-info);
  background:var(--toastify-color-info)
}
.Toastify__toast-theme--colored.Toastify__toast--success {
  color:var(--toastify-text-color-success);
  background:var(--toastify-color-success)
}
.Toastify__toast-theme--colored.Toastify__toast--warning {
  color:var(--toastify-text-color-warning);
  background:var(--toastify-color-warning)
}
.Toastify__toast-theme--colored.Toastify__toast--error {
  color:var(--toastify-text-color-error);
  background:var(--toastify-color-error)
}
.Toastify__progress-bar-theme--light {
  background:var(--toastify-color-progress-light)
}
.Toastify__progress-bar-theme--dark {
  background:var(--toastify-color-progress-dark)
}
.Toastify__progress-bar--info {
  background:var(--toastify-color-progress-info)
}
.Toastify__progress-bar--success {
  background:var(--toastify-color-progress-success)
}
.Toastify__progress-bar--warning {
  background:var(--toastify-color-progress-warning)
}
.Toastify__progress-bar--error {
  background:var(--toastify-color-progress-error)
}
.Toastify__progress-bar-theme--colored.Toastify__progress-bar--info,
.Toastify__progress-bar-theme--colored.Toastify__progress-bar--success,
.Toastify__progress-bar-theme--colored.Toastify__progress-bar--warning,
.Toastify__progress-bar-theme--colored.Toastify__progress-bar--error {
  background:var(--toastify-color-transparent)
}
.Toastify__close-button {
  color:#fff;
  background:transparent;
  outline:none;
  border:none;
  padding:0;
  cursor:pointer;
  opacity:.7;
  transition:.3s ease;
  -ms-flex-item-align:start;
  align-self:flex-start;
  z-index:1
}
.Toastify__close-button--light {
  color:#000;
  opacity:.3
}
.Toastify__close-button>svg {
  fill:currentColor;
  height:16px;
  width:14px
}
.Toastify__close-button:hover,
.Toastify__close-button:focus {
  opacity:1
}
@keyframes Toastify__trackProgress {
  0% {
    transform:scaleX(1)
  }
  to {
    transform:scaleX(0)
  }
}
.Toastify__progress-bar {
  position:absolute;
  bottom:0;
  left:0;
  width:100%;
  height:100%;
  z-index:var(--toastify-z-index);
  opacity:.7;
  transform-origin:left;
  border-bottom-left-radius:var(--toastify-toast-bd-radius)
}
.Toastify__progress-bar--animated {
  animation:Toastify__trackProgress linear 1 forwards
}
.Toastify__progress-bar--controlled {
  transition:transform .2s
}
.Toastify__progress-bar--rtl {
  right:0;
  left:initial;
  transform-origin:right;
  border-bottom-left-radius:initial;
  border-bottom-right-radius:var(--toastify-toast-bd-radius)
}
.Toastify__progress-bar--wrp {
  position:absolute;
  bottom:0;
  left:0;
  width:100%;
  height:5px;
  border-bottom-left-radius:var(--toastify-toast-bd-radius)
}
.Toastify__progress-bar--wrp[data-hidden=true] {
  opacity:0
}
.Toastify__progress-bar--bg {
  opacity:var(--toastify-color-progress-bgo);
  width:100%;
  height:100%
}
.Toastify__spinner {
  width:20px;
  height:20px;
  box-sizing:border-box;
  border:2px solid;
  border-radius:100%;
  border-color:var(--toastify-spinner-color-empty-area);
  border-right-color:var(--toastify-spinner-color);
  animation:Toastify__spin .65s linear infinite
}
@keyframes Toastify__bounceInRight {
  0%,
  60%,
  75%,
  90%,
  to {
    animation-timing-function:cubic-bezier(.215,.61,.355,1)
  }
  0% {
    opacity:0;
    transform:translate3d(3000px,0,0)
  }
  60% {
    opacity:1;
    transform:translate3d(-25px,0,0)
  }
  75% {
    transform:translate3d(10px,0,0)
  }
  90% {
    transform:translate3d(-5px,0,0)
  }
  to {
    transform:none
  }
}
@keyframes Toastify__bounceOutRight {
  20% {
    opacity:1;
    transform:translate3d(-20px,var(--y),0)
  }
  to {
    opacity:0;
    transform:translate3d(2000px,var(--y),0)
  }
}
@keyframes Toastify__bounceInLeft {
  0%,
  60%,
  75%,
  90%,
  to {
    animation-timing-function:cubic-bezier(.215,.61,.355,1)
  }
  0% {
    opacity:0;
    transform:translate3d(-3000px,0,0)
  }
  60% {
    opacity:1;
    transform:translate3d(25px,0,0)
  }
  75% {
    transform:translate3d(-10px,0,0)
  }
  90% {
    transform:translate3d(5px,0,0)
  }
  to {
    transform:none
  }
}
@keyframes Toastify__bounceOutLeft {
  20% {
    opacity:1;
    transform:translate3d(20px,var(--y),0)
  }
  to {
    opacity:0;
    transform:translate3d(-2000px,var(--y),0)
  }
}
@keyframes Toastify__bounceInUp {
  0%,
  60%,
  75%,
  90%,
  to {
    animation-timing-function:cubic-bezier(.215,.61,.355,1)
  }
  0% {
    opacity:0;
    transform:translate3d(0,3000px,0)
  }
  60% {
    opacity:1;
    transform:translate3d(0,-20px,0)
  }
  75% {
    transform:translate3d(0,10px,0)
  }
  90% {
    transform:translate3d(0,-5px,0)
  }
  to {
    transform:translateZ(0)
  }
}
@keyframes Toastify__bounceOutUp {
  20% {
    transform:translate3d(0,calc(var(--y) - 10px),0)
  }
  40%,
  45% {
    opacity:1;
    transform:translate3d(0,calc(var(--y) + 20px),0)
  }
  to {
    opacity:0;
    transform:translate3d(0,-2000px,0)
  }
}
@keyframes Toastify__bounceInDown {
  0%,
  60%,
  75%,
  90%,
  to {
    animation-timing-function:cubic-bezier(.215,.61,.355,1)
  }
  0% {
    opacity:0;
    transform:translate3d(0,-3000px,0)
  }
  60% {
    opacity:1;
    transform:translate3d(0,25px,0)
  }
  75% {
    transform:translate3d(0,-10px,0)
  }
  90% {
    transform:translate3d(0,5px,0)
  }
  to {
    transform:none
  }
}
@keyframes Toastify__bounceOutDown {
  20% {
    transform:translate3d(0,calc(var(--y) - 10px),0)
  }
  40%,
  45% {
    opacity:1;
    transform:translate3d(0,calc(var(--y) + 20px),0)
  }
  to {
    opacity:0;
    transform:translate3d(0,2000px,0)
  }
}
.Toastify__bounce-enter--top-left,
.Toastify__bounce-enter--bottom-left {
  animation-name:Toastify__bounceInLeft
}
.Toastify__bounce-enter--top-right,
.Toastify__bounce-enter--bottom-right {
  animation-name:Toastify__bounceInRight
}
.Toastify__bounce-enter--top-center {
  animation-name:Toastify__bounceInDown
}
.Toastify__bounce-enter--bottom-center {
  animation-name:Toastify__bounceInUp
}
.Toastify__bounce-exit--top-left,
.Toastify__bounce-exit--bottom-left {
  animation-name:Toastify__bounceOutLeft
}
.Toastify__bounce-exit--top-right,
.Toastify__bounce-exit--bottom-right {
  animation-name:Toastify__bounceOutRight
}
.Toastify__bounce-exit--top-center {
  animation-name:Toastify__bounceOutUp
}
.Toastify__bounce-exit--bottom-center {
  animation-name:Toastify__bounceOutDown
}
@keyframes Toastify__zoomIn {
  0% {
    opacity:0;
    transform:scale3d(.3,.3,.3)
  }
  50% {
    opacity:1
  }
}
@keyframes Toastify__zoomOut {
  0% {
    opacity:1
  }
  50% {
    opacity:0;
    transform:translate3d(0,var(--y),0) scale3d(.3,.3,.3)
  }
  to {
    opacity:0
  }
}
.Toastify__zoom-enter {
  animation-name:Toastify__zoomIn
}
.Toastify__zoom-exit {
  animation-name:Toastify__zoomOut
}
@keyframes Toastify__flipIn {
  0% {
    transform:perspective(400px) rotateX(90deg);
    animation-timing-function:ease-in;
    opacity:0
  }
  40% {
    transform:perspective(400px) rotateX(-20deg);
    animation-timing-function:ease-in
  }
  60% {
    transform:perspective(400px) rotateX(10deg);
    opacity:1
  }
  80% {
    transform:perspective(400px) rotateX(-5deg)
  }
  to {
    transform:perspective(400px)
  }
}
@keyframes Toastify__flipOut {
  0% {
    transform:translate3d(0,var(--y),0) perspective(400px)
  }
  30% {
    transform:translate3d(0,var(--y),0) perspective(400px) rotateX(-20deg);
    opacity:1
  }
  to {
    transform:translate3d(0,var(--y),0) perspective(400px) rotateX(90deg);
    opacity:0
  }
}
.Toastify__flip-enter {
  animation-name:Toastify__flipIn
}
.Toastify__flip-exit {
  animation-name:Toastify__flipOut
}
@keyframes Toastify__slideInRight {
  0% {
    transform:translate3d(110%,0,0);
    visibility:visible
  }
  to {
    transform:translate3d(0,var(--y),0)
  }
}
@keyframes Toastify__slideInLeft {
  0% {
    transform:translate3d(-110%,0,0);
    visibility:visible
  }
  to {
    transform:translate3d(0,var(--y),0)
  }
}
@keyframes Toastify__slideInUp {
  0% {
    transform:translate3d(0,110%,0);
    visibility:visible
  }
  to {
    transform:translate3d(0,var(--y),0)
  }
}
@keyframes Toastify__slideInDown {
  0% {
    transform:translate3d(0,-110%,0);
    visibility:visible
  }
  to {
    transform:translate3d(0,var(--y),0)
  }
}
@keyframes Toastify__slideOutRight {
  0% {
    transform:translate3d(0,var(--y),0)
  }
  to {
    visibility:hidden;
    transform:translate3d(110%,var(--y),0)
  }
}
@keyframes Toastify__slideOutLeft {
  0% {
    transform:translate3d(0,var(--y),0)
  }
  to {
    visibility:hidden;
    transform:translate3d(-110%,var(--y),0)
  }
}
@keyframes Toastify__slideOutDown {
  0% {
    transform:translate3d(0,var(--y),0)
  }
  to {
    visibility:hidden;
    transform:translate3d(0,500px,0)
  }
}
@keyframes Toastify__slideOutUp {
  0% {
    transform:translate3d(0,var(--y),0)
  }
  to {
    visibility:hidden;
    transform:translate3d(0,-500px,0)
  }
}
.Toastify__slide-enter--top-left,
.Toastify__slide-enter--bottom-left {
  animation-name:Toastify__slideInLeft
}
.Toastify__slide-enter--top-right,
.Toastify__slide-enter--bottom-right {
  animation-name:Toastify__slideInRight
}
.Toastify__slide-enter--top-center {
  animation-name:Toastify__slideInDown
}
.Toastify__slide-enter--bottom-center {
  animation-name:Toastify__slideInUp
}
.Toastify__slide-exit--top-left,
.Toastify__slide-exit--bottom-left {
  animation-name:Toastify__slideOutLeft;
  animation-timing-function:ease-in;
  animation-duration:.3s
}
.Toastify__slide-exit--top-right,
.Toastify__slide-exit--bottom-right {
  animation-name:Toastify__slideOutRight;
  animation-timing-function:ease-in;
  animation-duration:.3s
}
.Toastify__slide-exit--top-center {
  animation-name:Toastify__slideOutUp;
  animation-timing-function:ease-in;
  animation-duration:.3s
}
.Toastify__slide-exit--bottom-center {
  animation-name:Toastify__slideOutDown;
  animation-timing-function:ease-in;
  animation-duration:.3s
}
@keyframes Toastify__spin {
  0% {
    transform:rotate(0)
  }
  to {
    transform:rotate(360deg)
  }
}
@keyframes react-loading-skeleton {
  to {
    transform:translate(100%)
  }
}
.react-loading-skeleton {
  --base-color: #ebebeb;
  --highlight-color: #f5f5f5;
  --animation-duration: 1.5s;
  --animation-direction: normal;
  --pseudo-element-display: block;
  background-color:var(--base-color);
  width:100%;
  border-radius:.25rem;
  display:inline-flex;
  line-height:1;
  position:relative;
  -webkit-user-select:none;
  user-select:none;
  overflow:hidden
}
.react-loading-skeleton:after {
  content:" ";
  display:var(--pseudo-element-display);
  position:absolute;
  top:0;
  left:0;
  right:0;
  height:100%;
  background-repeat:no-repeat;
  background-image:linear-gradient(90deg,var(--base-color),var(--highlight-color),var(--base-color));
  transform:translate(-100%);
  animation-name:react-loading-skeleton;
  animation-direction:var(--animation-direction);
  animation-duration:var(--animation-duration);
  animation-timing-function:ease-in-out;
  animation-iteration-count:infinite
}
@media (prefers-reduced-motion) {
  .react-loading-skeleton {
    --pseudo-element-display: none
  }
}


.ebjJCy ._main-items {
  height: var(--height);
  display: flex;
}
.ebjJCy ._selection {
  display: flex;
  flex-direction: column;
  min-height: 400px;
  width: 400px;
  position: relative;
  padding: 0px;
  height: 100%;
}
.ebjJCy, ._selection-head {
  background: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid rgb(233, 233, 239);
  font-size: 14px;
  line-height: 20px;
  font-weight: bold;
  padding: 10px 12px;
}
.ebjJCy ._btn {
  cursor: pointer;
  background: rgb(255, 255, 255);
  outline: none;
  padding: 14px 16px;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 12px;
  border: 1px solid rgb(230, 230, 230);
  border-radius: 12px;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: rgb(107, 59, 244);
  white-space: pre;
}
.ebjJCy ._selection-head ._text-btn {
  padding: 8px;
}
.ebjJCy ._text-btn {
  color: inherit;
  border: medium;
  outline: none;
}

.igGTSJ {
  padding: 28px 12px 12px;
  flex-grow: 1;
  overflow: auto;
}
.KrVLX {
  display: block;
  width: 100%;
  position: relative;
}
.hrfOJW {
  display: inline-block;
  position: relative;
}
.knMDwX {
  display: grid;
  border: 2px solid rgb(107, 59, 244);
  border-radius: 12px;
  padding: 20px;
  box-sizing: border-box;
  width: 100%;
  cursor: pointer;
}
.dwnBcS[data-variant="high-emphasis"] {
  color: #000;
  font-size: 14px;
  font-style: normal;
  font-weight: 600;
  line-height: 215%;
}
.dwnBcS[data-variant="low-emphasis"] {
  color: rgb(134, 134, 143);
  font-size: 12px;
  font-style: normal;
  font-weight: 400;
  line-height: 180%;
}
.knMDwX ._video-box {
  margin-top: 12px;
  display: grid;
  grid-template-columns: min-content 1fr;
  justify-content: center;
  column-gap: 12px;
}
.knMDwX ._video-box ._text {
  color: rgb(50, 50, 55);
  font-size: 14px;
  line-height: 30px;
}


.ebjJCy ._main-items .player {
  position: relative;
  flex-grow: 1;
  min-width:700px;
}
.jAXSTB {
  display: flex;
  justify-content: center;
  height: 60%;
  width: 100%;
  background: rgb(237, 238, 243);
  position: relative;
  padding: 20px;
}
.groHmH {
  position: absolute;
  top: 16px;
  left: 16px;
  display: block;
  z-index: 10;
}
.ebjJCy {
  --header-height: 72px;
  --sticky-top: 24px;
  --height: calc(100dvh - var(--header-height));
  --side-max-height: 100vh;
}

.hrfOJW {
  display: inline-block;
  position: relative;
}
.hRJxJk {
  border-radius: 12px;
  color: white;
  background: black;
  padding: 8px 8px 6px;
  position: relative;
}
.biBzwv {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  padding: 12px;
  position: relative;
}
.cPA-daG {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 12px;
}
.gLwHts {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
}
.ebjJCy ._icon-btn {
  width: 24px;
  height: 24px;
  color: rgb(78, 78, 88);
  padding: 0px;
}
.kguDZY {
  border-radius: 50%;
  height: 32px;
  width: 32px;
  padding: 6px;
  font-size: 20px;
  color: white;
  background-color: rgb(86, 47, 196);
  outline: none;
  border: medium;
}

.bCJxTQ {
  display: flex;
  justify-content: center;
  align-items: center;
  color: rgb(78, 78, 88);
}
.ebjJCy ._text-btn {
  color: inherit;
  padding: 0px;
  border: medium;
  outline: none;
}
.ebjJCy ._btn {
  cursor: pointer;
  background: rgb(255, 255, 255);
  outline: none;
  padding: 14px 16px;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 12px;
  border: 1px solid rgb(230, 230, 230);
  border-radius: 12px;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: rgb(107, 59, 244);
  white-space: pre;
}

.ebjJCy ._text-btn {
  color: inherit;
  padding: 0px;
  border: medium;
  outline: none;
}
.iJfKXO {
  height: calc(30% - 56px);
  width: 100%;
  display: flex;
  position: relative;
}

.timeline-editor {
  height: 600px;
  width: 600px;
  min-height: 32px;
  position: relative;
  font-size: 12px;
  font-family: "PingFang SC";
  background-color: #191b1d;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.iJfKXO .timeline-editor {
  background: white !important;
  color: black !important;
  font-family: "Mulish", sans-serif;
  font-optical-sizing: auto;
  font-style: normal;
}
.timeline-editor-time-area {
  position: relative;
  height: 32px;
  flex: 0 0 auto;
}
.timeline-editor-edit-area {
  flex: 1 1 auto;
  margin-top: 10px;
  overflow: hidden;
  position: relative;
}
.resize-triggers, .resize-triggers > div, .contract-trigger::before {
  content: " ";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  overflow: hidden;
  z-index: -1;
}
.resize-triggers > div {
  background: #eee;
  overflow: auto;
}
.resize-triggers > div {
  background: #eee;
  overflow: auto;
}
.contract-trigger::before {
  width: 200%;
  height: 200%;
}
.timeline-editor-cursor {
  cursor: ew-resize;
  position: absolute;
  top: 32px;
  height: calc(100% - 32px);
  box-sizing: border-box;
  border-left: 1px solid #5297FF;
  border-right: 1px solid #5297FF;
  transform: translateX(-25%) scaleX(0.5);
}
.iJfKXO .timeline-editor-cursor {
  border-left: 1px solid rgb(78, 78, 88) !important;
  border-right: 1px solid rgb(78, 78, 88) !important;
}
.timeline-editor-cursor-top {
  position: absolute;
  top: 0;
  left: 50%;
  transform: translate(-50%, 0) scaleX(2);
  margin: auto;
}
.timeline-editor-cursor-area {
  width: 16px;
  height: 100%;
  cursor: ew-resize;
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
}



.timeline-editor-action {
  position: absolute;
  left: 0;
  top: 0;
  background-color: #2f3134;
}
.timeline-editor-action {
  background-image: none !important;
  background-color: rgb(255, 255, 255) !important;
  overflow: visible;
}
.bOsrMV {
  position: relative;
  user-select: none;
  border: 1px solid rgb(86, 47, 196);
  border-radius: 4px;
  color: rgb(0, 0, 0);
  background: unset;
  height: 100%;
}

.gEKynV::before {
  content: "";
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-image: url("https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/7b7d35dec1f041b58d808fc0f3ea877a_Ads%20Food.jpg");
  background-size: auto 100%;
  opacity: 1;
  z-index: 1;
}


  </style>

<div id="root">

<div class="  sc-ZVgAE ebjJCy">

<div class="_main">
 
<div class="_main-items">
  <div class="_selection">
    <div class="_selection-head">
      <div>Scenes</div>
      <button type="button" class="_btn _text-btn">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16 16L8 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          <path d="M16 8L8 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </button>
    </div>
    <div class="sc-blHHSb sc-glfvzQ hXjtlx igGTSJ">
      <div style="display: grid; row-gap: 30px;">
        <div class="sc-gWijiA KrVLX">
          <div style="width: 100%;" class="sc-bdbhkv hrfOJW">
            <div class="sc-ebYJzh knMDwX">
              <p data-variant="high-emphasis" style="text-align: start; color: black;" class="sc-edsqmr dwnBcS">Scene 1</p>
              <p data-variant="low-emphasis" style="text-align: start; font-size: 14px;" class="sc-edsqmr dwnBcS">00:02</p>
              <div class="_video-box">
                <div class="_video">
                  <img src="https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/7b7d35dec1f041b58d808fc0f3ea877a_Ads%20Food.jpg" alt="Scene Image" width="100px" height="100px" style="border-radius: 12px; border: 1px solid rgb(226, 226, 226);">
                </div>
                <div class="_text">A young boy with brown hair, wearing a red t-shirt, holding a juicy burger with melted cheese and fresh lettuce, ready to take a big bite</div>
              </div>
            </div>
          </div>
        
        </div>


        <div class="sc-gWijiA KrVLX">
          <div style="width: 100%;" class="sc-bdbhkv hrfOJW">
            <div class="sc-ebYJzh knMDwX" style="border: 2px solid;">
              <p data-variant="high-emphasis" style="text-align: start; color: black;" class="sc-edsqmr dwnBcS">Scene 2</p>
              <p data-variant="low-emphasis" style="text-align: start; font-size: 14px;" class="sc-edsqmr dwnBcS">00:04</p>
              <div class="_video-box">
                <div class="_video">
                  <img src="https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/7b7d35dec1f041b58d808fc0f3ea877a_Ads%20Food.jpg" alt="Scene Image" width="100px" height="100px" style="border-radius: 12px; border: 1px solid rgb(226, 226, 226);">
                </div>
                <div class="_text">A young boy with brown hair, wearing a red t-shirt, holding a juicy burger with melted cheese and fresh lettuce, ready to take a big bite</div>
              </div>
            </div>
          </div>
        
        </div>

        <div class="sc-gWijiA khAEbP">
          <div style="width: 100%;" class="sc-bdbhkv hrfOJW">
            <div class="sc-ebYJzh knMDwX" style="border: 2px solid;">
              <p data-variant="high-emphasis" style="text-align: start; color: black;" class="sc-edsqmr dwnBcS">Scene 3</p>
              <p data-variant="low-emphasis" style="text-align: start; font-size: 14px;" class="sc-edsqmr dwnBcS">00:05</p>
              <div class="_video-box">
                <div class="_video">
                  <img src="https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/7b7d35dec1f041b58d808fc0f3ea877a_Ads%20Food.jpg" alt="Scene Image" width="100px" height="100px" style="border-radius: 12px; border: 1px solid rgb(226, 226, 226);">
                </div>
                <div class="_text">A young boy with brown hair, wearing a red t-shirt, holding a juicy burger with melted cheese and fresh lettuce, ready to take a big bite</div>
              </div>
            </div>
          </div>
        
        </div>
       
       
        
      </div>
    </div>
  </div>
  <div class="player">
    <div class="sc-dKpdpM jAXSTB">
      <div class="sc-flDReH groHmH">
        <div class="sc-bdbhkv hrfOJW">
          <button class="sc-cpjgyG hRJxJk">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.6665 8.12533C1.32484 8.12533 1.0415 7.84199 1.0415 7.50033V5.41699C1.0415 3.00866 3.00817 1.04199 5.4165 1.04199H7.49984C7.8415 1.04199 8.12484 1.32533 8.12484 1.66699C8.12484 2.00866 7.8415 2.29199 7.49984 2.29199H5.4165C3.6915 2.29199 2.2915 3.69199 2.2915 5.41699V7.50033C2.2915 7.84199 2.00817 8.12533 1.6665 8.12533Z" stroke-width="2" fill="currentColor"></path>
              <path d="M18.3333 8.12533C17.9917 8.12533 17.7083 7.84199 17.7083 7.50033V5.41699C17.7083 3.69199 16.3083 2.29199 14.5833 2.29199H12.5C12.1583 2.29199 11.875 2.00866 11.875 1.66699C11.875 1.32533 12.1583 1.04199 12.5 1.04199H14.5833C16.9917 1.04199 18.9583 3.00866 18.9583 5.41699V7.50033C18.9583 7.84199 18.675 8.12533 18.3333 8.12533Z" stroke-width="1" fill="currentColor"></path>
              <path d="M14.5835 18.958H13.3335C12.9918 18.958 12.7085 18.6747 12.7085 18.333C12.7085 17.9913 12.9918 17.708 13.3335 17.708H14.5835C16.3085 17.708 17.7085 16.308 17.7085 14.583V13.333C17.7085 12.9913 17.9918 12.708 18.3335 12.708C18.6752 12.708 18.9585 12.9913 18.9585 13.333V14.583C18.9585 16.9913 16.9918 18.958 14.5835 18.958Z" stroke-width="1" fill="currentColor"></path>
              <path d="M7.49984 18.9583H5.4165C3.00817 18.9583 1.0415 16.9917 1.0415 14.5833V12.5C1.0415 12.1583 1.32484 11.875 1.6665 11.875C2.00817 11.875 2.2915 12.1583 2.2915 12.5V14.5833C2.2915 16.3083 3.6915 17.7083 5.4165 17.7083H7.49984C7.8415 17.7083 8.12484 17.9917 8.12484 18.3333C8.12484 18.675 7.8415 18.9583 7.49984 18.9583Z" stroke-width="1" fill="currentColor"></path>
            </svg>
            <div>1:1</div>
          </button>
        </div>
      </div>
      <div style="height: auto; width: 100%; display: flex; place-content: center; position: relative;">
        <div style="position: relative; overflow: hidden; width: 354px; height: 354px; opacity: 1; border-radius: 12px;">
          <div style="width: 354px; height: 354px; display: flex; flex-direction: column; position: absolute; left: 0px; top: 0px; overflow: hidden;">
            <div style="position: absolute; width: 720px; height: 720px; display: flex; transform: scale(0.491667); margin-left: -183px; margin-top: -183px; overflow: hidden;" class="__remotion-player">
              <div style="position: absolute; inset: 0px; width: 100%; height: 100%; display: flex; flex-direction: row; opacity: 1;">
                <div style="position: absolute; inset: 0px; width: 100%; height: 100%; display: flex; flex-direction: column;" class="sc-gtLWhw dGPfRC">
                  <audio preload="auto" src="https://data.zebracat.ai/files/pixabay_music/downloads/winklebomb-boogie-by-brolefilmer-137066.mp3"></audio>
                  <div style="position: absolute; inset: 0px; width: 100%; height: 100%; display: flex; opacity: 1;">
                    <audio preload="auto" src="https://data.zebracat.ai/files/VXBsb2FkLzIwMjQvMTEvMjc0/0/voice_over/c5c8165f39e843b0a2c8e9d09e175131.mp3"></audio>
                  </div>
                  <div style="position: absolute; inset: 0px; width: 100%; height: 100%; display: flex; opacity: 0; pointer-events: none;">
                    <audio preload="auto" src="https://data.zebracat.ai/files/VXBsb2FkLzIwMjQvMTEvMjc0/0/voice_over/1c614101a6944d3488bfd1935a4b1784.mp3"></audio>
                  </div>
                  <div style="position: absolute; inset: 0px; width: 100%; height: 100%; display: flex; opacity: 0; pointer-events: none;">
                    <audio preload="auto" src="https://data.zebracat.ai/files/VXBsb2FkLzIwMjQvMTEvMjc0/0/voice_over/7cc66abacbe8437ead10627e1b360493.mp3"></audio>
                  </div>
                  <div style="position: absolute; inset: 0px; width: 100%; height: 100%; display: flex; flex-direction: column;" class="sc-gtLWhw dGPfRC">
                    <div id="portal"></div>
                    <div style="position: absolute; inset: 0px; width: 100%; height: 100%; display: flex;">
                      <div style="position: absolute; inset: 0px; width: 100%; height: 100%; display: flex;">
                        <div style="position: absolute; inset: 0px; width: 100%; height: 100%; display: flex; flex-direction: column; opacity: 1;">
                          <div style="overflow: hidden; position: relative; width: 100%; height: 100%; filter: blur(30px);">
                            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%) scale(1.4615) translate(0px, -20.9201px) rotate(-0.264376deg);" src="https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/7b7d35dec1f041b58d808fc0f3ea877a_Ads%20Food.jpg">
                          </div>
                          <div style="position: absolute; top: 0px; left: 0px; width: 720px; height: 720px;">
                            <div style="overflow: hidden; position: relative; width: 100%; height: 100%; filter: none;">
                              <img style="width: 100%; height: 100%; object-fit: cover; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%) scale(1.4615) translate(0px, -20.9201px) rotate(-0.264376deg);" src="https://data.zebracat.ai/files/generated_image/Ads Food/2024_11_27/7b7d35dec1f041b58d808fc0f3ea877a_Ads%20Food.jpg">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div style="position: absolute; top: 540px; left: 85px; width: 550px; height: 90px;">
                    <style>
                      @import url(https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap)
                    </style>
                    <div style="font-size: 36px; font-family: Poppins; font-weight: 900; text-align: center; color: rgb(0, 255, 105);" lang="en" class="sc-bpRdAr fWCMel">
                      <div style="text-shadow: rgb(0, 255, 105) 0px 0px 9px, rgb(0, 255, 105) 0px 0px 18px, rgb(0, 255, 105) 0px 0px 27px, rgb(0, 255, 105) 0px 0px 36px, rgb(0, 255, 105) 0px 0px 45px, rgb(0, 255, 105) 0px 0px 36px, rgb(0, 255, 105) 0px 0px 63px; transform: scale(0.95) rotate(-1deg);" class="sc-dFULME etwKyt">Imagine</div>
                    </div>
                  </div>
                  <div class="water-mark" style="position: absolute; flex-direction: column; display: flex; align-items: center; justify-content: center; z-index: 10000; top: 7.5%; left: 20%; transform: translate(-50%, -50%);">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sc-fJAEDJ biBzwv">
      <div id="timeline-menu-apparation-destination"></div>
      <div class="sc-cNfTXI cPA-daG">
        <div class="sc-iBcgGl gLwHts">
          <button type="button" class="transparent-btn">
            <i class="bx bx-volume-full"></i>
          </button>
          <input type="range" min="0" max="100" style="--range-progress: 0%;" class="sc-uYFMi jfppyM" value="0">
        </div>
        <button class="sc-eouHMD kguDZY">
          <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.1665 9.99967L4.6665 3.33301V16.6663L17.1665 9.99967Z" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </button>
        <div>
          <span style="display: inline-block;">00:00:0</span>/ <span style="display: inline-block;">00:22</span>
        </div>
        <div class="sc-brZXgC cjgsGa">|</div>
        <button type="button" class="transparent-btn">
          <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14.8721 22C14.5651 22 14.2767 21.7922 14.193 21.4709C14.0907 21.0931 14.314 20.7057 14.6953 20.6018C18.4721 19.5909 21.1047 16.1143 21.1047 12.1464C21.1047 7.32829 17.2442 3.40765 12.5 3.40765C8.47209 3.40765 5.83023 5.79783 4.59302 7.24327H7.32791C7.7093 7.24327 8.02558 7.56448 8.02558 7.95182C8.02558 8.33916 7.71861 8.66982 7.32791 8.66982H3.20698C3.16047 8.66982 3.07674 8.66037 3.01163 8.64147C2.92791 8.61313 2.85349 8.57534 2.78837 8.52811C2.70465 8.47142 2.63953 8.39584 2.59302 8.31082C2.54651 8.22579 2.5093 8.12187 2.5 8.01795C2.5 7.98961 2.5 7.97071 2.5 7.94237V3.65328C2.5 3.26594 2.81628 2.94473 3.19767 2.94473C3.57907 2.94473 3.89535 3.26594 3.89535 3.65328V5.91119C5.41163 4.25791 8.26744 2 12.5 2C18.0163 2 22.5 6.55361 22.5 12.1559C22.5 16.7662 19.4395 20.8096 15.0488 21.9811C14.993 21.9906 14.9279 22 14.8721 22Z" fill="currentColor"></path>
            <path d="M10.5419 21.5083C10.5252 21.5083 10.5086 21.4995 10.5002 21.4995C9.59938 21.4386 9.04795 21.7208 8.21384 21.3811C7.97195 21.2853 7.80513 21.0326 7.81347 20.7626C7.81347 20.6842 7.83015 20.6058 7.85518 20.5361C7.98029 20.2051 8.35564 20.0396 8.66426 20.1616C9.38993 20.4577 10.149 20.6319 10.9163 20.6929C11.2416 20.7103 11.0002 20.6511 11.0002 20.9995L10.9919 21.0344C10.9752 21.3741 10.8672 21.5083 10.5419 21.5083ZM6.27872 20.1267C6.13692 20.1267 6.00346 20.0745 5.88669 19.9874C5.18604 19.395 4.5688 18.7069 4.06834 17.9403C3.99327 17.8271 3.95156 17.7051 3.95156 17.5745C3.95156 17.3567 4.05165 17.1563 4.22682 17.0344C4.50207 16.834 4.90244 16.9124 5.09429 17.1912C5.09429 17.1999 5.09429 17.1999 5.09429 17.1999C5.10263 17.2086 5.11097 17.226 5.11931 17.2347C5.55304 17.888 6.07853 18.4717 6.67075 18.9595C6.81254 19.0814 6.9043 19.2644 6.9043 19.4647C6.9043 19.6128 6.86259 19.7609 6.77084 19.8828C6.64572 20.0396 6.47056 20.1267 6.27872 20.1267ZM3.4928 15.8759C3.21755 15.8759 2.97566 15.6929 2.90059 15.4229C2.63367 14.5257 3 13.9403 3 12.9995L3.00022 12.4995C3.00856 12.1424 3.15823 12.4996 3.50022 12.4996C3.8422 12.4996 3.75138 12.2957 3.75138 12.6529C3.75138 13.4717 3.86815 14.2731 4.09336 15.0309C4.11004 15.1006 4.11838 15.1616 4.11838 15.2313C4.11838 15.51 3.94322 15.7626 3.67631 15.8497C3.61792 15.8671 3.55953 15.8759 3.4928 15.8759Z" fill="currentColor"></path>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.26336 12.9997V13.0016C3.26336 13.8273 3.37988 14.6446 3.61259 15.4308L3.6147 15.438C3.63368 15.5066 3.69928 15.5657 3.79008 15.5657C3.81452 15.5657 3.83175 15.5631 3.84854 15.5584C3.93266 15.5288 3.98092 15.4512 3.98092 15.3734C3.98092 15.3495 3.97883 15.3281 3.97161 15.2958C3.75633 14.5633 3.64504 13.7902 3.64504 13.0016C3.64504 12.8943 3.55638 12.8013 3.4542 12.8013C3.35479 12.8013 3.2678 12.8848 3.26336 12.9997ZM2.50011 12.9838C2.51267 12.4435 2.92871 12 3.4542 12C3.97797 12 4.4084 12.4518 4.4084 13.0016C4.4084 13.715 4.50962 14.4122 4.70422 15.0704L4.70739 15.0811L4.70998 15.0919C4.73151 15.1823 4.74427 15.2713 4.74427 15.3734C4.74427 15.8071 4.4736 16.1929 4.07186 16.3247L4.0629 16.3277C3.97434 16.3542 3.88553 16.367 3.79008 16.367C3.37835 16.367 3.00234 16.0913 2.88267 15.6654C2.62745 14.802 2.5 13.9056 2.5 13.0016L2.50011 12.9838ZM4.87445 17.3507C4.8119 17.3209 4.73298 17.322 4.68007 17.3607L4.67359 17.3655C4.62162 17.4018 4.5916 17.4597 4.5916 17.5288C4.5916 17.5545 4.59843 17.5885 4.63061 17.6373L4.63216 17.6397C5.06541 18.3067 5.60076 18.9082 6.21071 19.4282C6.26114 19.464 6.30456 19.476 6.33969 19.476C6.39725 19.476 6.44979 19.4525 6.49302 19.4005C6.5158 19.368 6.53053 19.3235 6.53053 19.2676C6.53053 19.2141 6.50615 19.1568 6.45814 19.1142C5.89227 18.645 5.39005 18.0851 4.97445 17.459C4.97061 17.4538 4.96732 17.4492 4.96466 17.4454L4.87445 17.3507ZM4.24678 16.701C4.67335 16.3917 5.2717 16.5132 5.56565 16.9425L5.6374 17.0472V17.0555C6.00401 17.5967 6.44302 18.0811 6.93484 18.4883L6.94116 18.4935C7.15117 18.6751 7.29389 18.9534 7.29389 19.2676C7.29389 19.4817 7.23362 19.7082 7.0902 19.8998L7.08681 19.9043L7.08329 19.9087C6.89823 20.1418 6.63157 20.2772 6.33969 20.2772C6.11712 20.2772 5.91898 20.1943 5.75907 20.0744L5.74971 20.0674L5.74076 20.0598C5.07289 19.4923 4.48235 18.8312 4.00214 18.0922C3.89739 17.9329 3.82824 17.743 3.82824 17.5288C3.82824 17.1987 3.98021 16.8893 4.24678 16.701ZM8.13859 20.3974C8.12927 20.4246 8.12595 20.4474 8.12595 20.4615V20.468L8.12576 20.4745C8.12356 20.5458 8.17176 20.6263 8.24605 20.6559L8.24937 20.6572C8.97605 20.9547 9.74555 21.1376 10.5287 21.1913C10.5361 21.1917 10.5429 21.1923 10.5488 21.193C10.5581 21.194 10.5664 21.1952 10.5733 21.1965C10.6577 21.1825 10.7252 21.1057 10.7295 21.0179L10.7314 20.9791L10.7337 20.9694C10.7177 20.8694 10.6385 20.8015 10.5644 20.7976L10.555 20.797C9.81774 20.7382 9.08674 20.5698 8.3865 20.2829C8.297 20.2483 8.17635 20.3023 8.13859 20.3974ZM7.42742 20.1061C7.61982 19.5945 8.18363 19.3455 8.65797 19.5339L8.66184 19.5355C9.28781 19.7923 9.94385 19.9441 10.6089 19.9976C11.1187 20.0281 11.5 20.4871 11.5 21.0064V21.0557L11.4888 21.1027C11.4426 21.6095 11.0306 22 10.5458 22C10.5109 22 10.4819 21.9955 10.4619 21.9914C10.4577 21.9906 10.4537 21.9897 10.4499 21.9888C9.59743 21.9272 8.7618 21.7269 7.97349 21.4043C7.60785 21.2578 7.3523 20.8772 7.36262 20.455C7.36351 20.328 7.39013 20.2103 7.42507 20.1125L7.42742 20.1061Z" fill="currentColor"></path>
          </svg>
        </button>
        <button type="button" class="transparent-btn">
          <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.5 22.75H9.5C4.07 22.75 1.75 20.43 1.75 15V9C1.75 3.57 4.07 1.25 9.5 1.25H15.5C20.93 1.25 23.25 3.57 23.25 9V15C23.25 20.43 20.93 22.75 15.5 22.75ZM9.5 2.75C4.89 2.75 3.25 4.39 3.25 9V15C3.25 19.61 4.89 21.25 9.5 21.25H15.5C20.11 21.25 21.75 19.61 21.75 15V9C21.75 4.39 20.11 2.75 15.5 2.75H9.5Z" fill="currentColor"></path>
            <path d="M6.49994 18.7504C6.30994 18.7504 6.11994 18.6804 5.96994 18.5304C5.67994 18.2404 5.67994 17.7604 5.96994 17.4704L17.9699 5.47043C18.2599 5.18043 18.7399 5.18043 19.0299 5.47043C19.3199 5.76043 19.3199 6.24043 19.0299 6.53043L7.02994 18.5304C6.87994 18.6804 6.68994 18.7504 6.49994 18.7504Z" fill="currentColor"></path>
            <path d="M18.5 10.75C18.09 10.75 17.75 10.41 17.75 10V6.75H14.5C14.09 6.75 13.75 6.41 13.75 6C13.75 5.59 14.09 5.25 14.5 5.25H18.5C18.91 5.25 19.25 5.59 19.25 6V10C19.25 10.41 18.91 10.75 18.5 10.75Z" fill="currentColor"></path>
            <path d="M10.5 18.75H6.5C6.09 18.75 5.75 18.41 5.75 18V14C5.75 13.59 6.09 13.25 6.5 13.25C6.91 13.25 7.25 13.59 7.25 14V17.25H10.5C10.91 17.25 11.25 17.59 11.25 18C11.25 18.41 10.91 18.75 10.5 18.75Z" fill="currentColor"></path>
          </svg>
        </button>
      </div>
      <div id="timeline-zoom-apparation-destination">
        <div class="sc-bkxhwF bCJxTQ">
          <button type="button" class="_btn _text-btn">
            <svg fill="currentColor" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" transform="matrix(-1, 0, 0, 1, 0, 0)">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path d="M4.356,15.73a8.027,8.027,0,0,0,10.619.659l5.318,5.318a1,1,0,0,0,1.414-1.414l-5.318-5.318a8.031,8.031,0,0,0-.659-10.62A8.043,8.043,0,1,0,4.356,15.73ZM5.77,5.77A6.043,6.043,0,1,1,4,10.043,6.025,6.025,0,0,1,5.77,5.77Zm.273,4.273a1,1,0,0,1,1-1h6a1,1,0,0,1,0,2h-6A1,1,0,0,1,6.043,10.043Z"></path>
              </g>
            </svg>
          </button>
          <input type="range" min="0" max="5" style="--range-progress: 80%;" id="scale" step="0.1" class="sc-uYFMi jfppyM" value="4">
          <button type="button" class="_btn _text-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="matrix(-1, 0, 0, 1, 0, 0)">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path d="M20 20L14.9497 14.9497M14.9497 14.9497C16.2165 13.683 17 11.933 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17C11.933 17 13.683 16.2165 14.9497 14.9497ZM7 10H13M10 7V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </g>
            </svg>
          </button>
        </div>
      </div>
    </div>
  

    <div class="sc-chGqOJ iJfKXO">
    <div style="width: 100%; height: 100%;" class="timeline-editor ">
        <div class="timeline-editor-time-area">
            <div style="overflow: visible; height: 0px; width: 0px;">
                <div aria-label="grid" aria-readonly="true" class="ReactVirtualized__Grid" role="grid" style="box-sizing: border-box; direction: ltr; height: 32px; position: relative; width: 1228px; will-change: transform; overflow: auto hidden;" tabindex="0">
                    <div class="ReactVirtualized__Grid__innerScrollContainer" role="rowgroup" style="width: 1915px; height: 32px; max-width: 1915px; max-height: 32px; overflow: hidden; position: relative;">
                        <div style="height: 32px; left: 0px; position: absolute; top: 0px; width: 15px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:00</span></div>
                        </div>
                        <div style="height: 32px; left: 15px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 20px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 25px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 30px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 35px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 40px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 45px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 50px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 55px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 60px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 65px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 70px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 75px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 80px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 85px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 90px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 95px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 100px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 105px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 110px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:01</span></div>
                        </div>
                        <div style="height: 32px; left: 115px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 120px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 125px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 130px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 135px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 140px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 145px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 150px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 155px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 160px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 165px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 170px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 175px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 180px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 185px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 190px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 195px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 200px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 205px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 210px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:02</span></div>
                        </div>
                        <div style="height: 32px; left: 215px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 220px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 225px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 230px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 235px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 240px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 245px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 250px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 255px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 260px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 265px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 270px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 275px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 280px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 285px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 290px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 295px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 300px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 305px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 310px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:03</span></div>
                        </div>
                        <div style="height: 32px; left: 315px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 320px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 325px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 330px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 335px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 340px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 345px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 350px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 355px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 360px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 365px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 370px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 375px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 380px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 385px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 390px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 395px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 400px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 405px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 410px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:05</span></div>
                        </div>
                        <div style="height: 32px; left: 415px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 420px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 425px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 430px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 435px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 440px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 445px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 450px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 455px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 460px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 465px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 470px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 475px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 480px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 485px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 490px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 495px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 500px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 505px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 510px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:06</span></div>
                        </div>
                        <div style="height: 32px; left: 515px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 520px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 525px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 530px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 535px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 540px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 545px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 550px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 555px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 560px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 565px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 570px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 575px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 580px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 585px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 590px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 595px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 600px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 605px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 610px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:07</span></div>
                        </div>
                        <div style="height: 32px; left: 615px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 620px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 625px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 630px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 635px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 640px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 645px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 650px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 655px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 660px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 665px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 670px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 675px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 680px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 685px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 690px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 695px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 700px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 705px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 710px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:09</span></div>
                        </div>
                        <div style="height: 32px; left: 715px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 720px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 725px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 730px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 735px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 740px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 745px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 750px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 755px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 760px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 765px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 770px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 775px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 780px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 785px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 790px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 795px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 800px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 805px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 810px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:10</span></div>
                        </div>
                        <div style="height: 32px; left: 815px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 820px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 825px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 830px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 835px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 840px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 845px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 850px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 855px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 860px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 865px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 870px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 875px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 880px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 885px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 890px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 895px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 900px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 905px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 910px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:11</span></div>
                        </div>
                        <div style="height: 32px; left: 915px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 920px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 925px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 930px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 935px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 940px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 945px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 950px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 955px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 960px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 965px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 970px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 975px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 980px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 985px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 990px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 995px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1000px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1005px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1010px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:12</span></div>
                        </div>
                        <div style="height: 32px; left: 1015px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1020px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1025px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1030px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1035px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1040px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1045px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1050px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1055px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1060px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1065px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1070px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1075px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1080px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1085px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1090px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1095px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1100px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1105px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1110px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:14</span></div>
                        </div>
                        <div style="height: 32px; left: 1115px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1120px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1125px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1130px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1135px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1140px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1145px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1150px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1155px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1160px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1165px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1170px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1175px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1180px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1185px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1190px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1195px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1200px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1205px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1210px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit timeline-editor-time-unit-big">
                            <div class="timeline-editor-time-unit-scale"><span class="" style="color: black;">00:15</span></div>
                        </div>
                        <div style="height: 32px; left: 1215px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1220px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                        <div style="height: 32px; left: 1225px; position: absolute; top: 0px; width: 5px;" class="timeline-editor-time-unit"></div>
                    </div>
                </div>
                <div style="width: 1228px; height: 32px;" class="timeline-editor-time-area-interact"></div>
            </div>
            <div class="resize-triggers">
                <div class="expand-trigger">
                    <div style="width: 1229px; height: 33px;"></div>
                </div>
                <div class="contract-trigger"></div>
            </div>
        </div>
        <div class="timeline-editor-edit-area" style="position: relative;">
            <div style="overflow: visible; height: 0px; width: 0px;">
                <div aria-label="grid" aria-readonly="true" class="ReactVirtualized__Grid" role="grid" style="box-sizing: border-box; direction: ltr; height: 78px; position: relative; width: 1228px; will-change: transform; overflow: auto;" tabindex="0">
                    <div class="ReactVirtualized__Grid__innerScrollContainer" role="rowgroup" style="width: 1915px; height: 136px; max-width: 1915px; max-height: 136px; overflow: hidden; position: relative;">
                        <div class="timeline-editor-edit-row " style="height: 28px; left: 0px; position: absolute; top: 0px; width: 1915px; background-position-x: 0px, 15px; background-size: 15px, 100px;">
                            <div class="timeline-editor-action" style="height: 28px; left: 15px; width: 47.3077px;" draggable="false" data-width="47.307692307692314" data-left="15">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">Imagine</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 62.3077px; width: 26.8462px;" draggable="false" data-width="26.846153846153847" data-left="62.307692307692314">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">sinking</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 89.1539px; width: 11.6154px;" draggable="false" data-width="11.615384615384613" data-left="89.15384615384616">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">your</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 100.769px; width: 21.3846px;" draggable="false" data-width="21.3846153846154" data-left="100.76923076923077">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">teeth</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 122.154px; width: 16.0769px;" draggable="false" data-width="16.07692307692308" data-left="122.15384615384617">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">into</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 138.231px; width: 9.84615px;" draggable="false" data-width="9.84615384615384" data-left="138.23076923076925">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">the</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 148.077px; width: 46.4615px;" draggable="false" data-width="46.46153846153845" data-left="148.0769230769231">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">juiciest,</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 194.538px; width: 18.6923px;" draggable="false" data-width="18.692307692307708" data-left="194.53846153846155">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">most</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 213.231px; width: 39.3077px;" draggable="false" data-width="39.30769230769232" data-left="213.23076923076925">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">flavorful</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 252.538px; width: 24.1538px;" draggable="false" data-width="24.15384615384616" data-left="252.53846153846158">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">burger</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 276.692px; width: 17.8462px;" draggable="false" data-width="17.84615384615381" data-left="276.69230769230774">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">you've</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 294.538px; width: 20.5385px;" draggable="false" data-width="20.538461538461547" data-left="294.53846153846155">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">ever</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 315.077px; width: 71.4615px;" draggable="false" data-width="71.46153846153851" data-left="315.0769230769231">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">tasted.</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 409.615px; width: 31.2308px;" draggable="false" data-width="31.230769230769226" data-left="409.6153846153847">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">That's</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 440.846px; width: 36.6154px;" draggable="false" data-width="36.615384615384585" data-left="440.8461538461539">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">exactly</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 477.462px; width: 11.6154px;" draggable="false" data-width="11.615384615384642" data-left="477.4615384615385">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">what</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 489.077px; width: 14.3077px;" draggable="false" data-width="14.30769230769232" data-left="489.07692307692315">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">this</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 503.385px; width: 17px;" draggable="false" data-width="17" data-left="503.3846153846155">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">boy</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 520.385px; width: 10.6923px;" draggable="false" data-width="10.692307692307622" data-left="520.3846153846155">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">is</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 531.077px; width: 94.6923px;" draggable="false" data-width="94.69230769230785" data-left="531.0769230769231">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">experiencing-</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 625.769px; width: 26.7692px;" draggable="false" data-width="26.769230769230717" data-left="625.769230769231">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">pure</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 652.538px; width: 25.9231px;" draggable="false" data-width="25.923076923076906" data-left="652.5384615384617">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">burger</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 678.462px; width: 63.3846px;" draggable="false" data-width="63.38461538461536" data-left="678.4615384615386">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">bliss!</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 764.923px; width: 28.6154px;" draggable="false" data-width="28.61538461538464" data-left="764.923076923077">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">Made</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 793.538px; width: 11.5385px;" draggable="false" data-width="11.538461538461547" data-left="793.5384615384617">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">with</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 805.077px; width: 9px;" draggable="false" data-width="8.999999999999886" data-left="805.0769230769232">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">the</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 814.077px; width: 33px;" draggable="false" data-width="33.000000000000114" data-left="814.0769230769231">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">freshest</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 847.077px; width: 44.6923px;" draggable="false" data-width="44.692307692307736" data-left="847.0769230769232">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">ingredients</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 891.769px; width: 11.6154px;" draggable="false" data-width="11.615384615384642" data-left="891.769230769231">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">and</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 903.385px; width: 6.23077px;" draggable="false" data-width="6.2307692307691696" data-left="903.3846153846156">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">a</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 909.615px; width: 26.7692px;" draggable="false" data-width="26.76923076923083" data-left="909.6153846153848">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">secret</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 936.385px; width: 22.3077px;" draggable="false" data-width="22.30769230769215" data-left="936.3846153846156">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">sauce</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 958.692px; width: 17.9231px;" draggable="false" data-width="17.923076923076906" data-left="958.6923076923077">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">that's</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 976.615px; width: 13.3846px;" draggable="false" data-width="13.384615384615586" data-left="976.6153846153846">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">out</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 990px; width: 7.15385px;" draggable="false" data-width="7.153846153846075" data-left="990.0000000000002">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">of</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 997.154px; width: 14.2308px;" draggable="false" data-width="14.230769230769283" data-left="997.1538461538463">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">this</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1011.38px; width: 60.7692px;" draggable="false" data-width="60.7692307692306" data-left="1011.3846153846156">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">world,</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1072.15px; width: 16.0769px;" draggable="false" data-width="16.076923076923322" data-left="1072.1538461538462">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">it's</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1088.23px; width: 5.30769px;" draggable="false" data-width="5.30769230769215" data-left="1088.2307692307695">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">a</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1093.54px; width: 17px;" draggable="false" data-width="17.000000000000227" data-left="1093.5384615384617">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">bite</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1110.54px; width: 8.07692px;" draggable="false" data-width="8.076923076922867" data-left="1110.538461538462">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">of</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1118.62px; width: 36.6154px;" draggable="false" data-width="36.615384615384755" data-left="1118.6153846153848">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">happiness</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1155.23px; width: 10.6923px;" draggable="false" data-width="10.692307692307622" data-left="1155.2307692307695">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">in</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1165.92px; width: 19.6154px;" draggable="false" data-width="19.615384615384528" data-left="1165.9230769230771">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">every</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1185.54px; width: 108.077px;" draggable="false" data-width="108.0769230769231" data-left="1185.5384615384617">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">mouthful.</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1316.69px; width: 28.6154px;" draggable="false" data-width="28.615384615384528" data-left="1316.692307692308">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">Why</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1345.31px; width: 54.4615px;" draggable="false" data-width="54.46153846153834" data-left="1345.3076923076926">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">wait?</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1399.77px; width: 20.5385px;" draggable="false" data-width="20.538461538461434" data-left="1399.769230769231">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">Treat</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1420.31px; width: 25px;" draggable="false" data-width="25.000000000000227" data-left="1420.3076923076924">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">yourself</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1445.31px; width: 7.15385px;" draggable="false" data-width="7.153846153846189" data-left="1445.3076923076926">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">to</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1452.46px; width: 9.76923px;" draggable="false" data-width="9.769230769230717" data-left="1452.4615384615388">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">the</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1462.23px; width: 29.5385px;" draggable="false" data-width="29.538461538461434" data-left="1462.2307692307695">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">ultimate</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1491.77px; width: 24.0769px;" draggable="false" data-width="24.076923076923094" data-left="1491.769230769231">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">burger</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1515.85px; width: 39.3077px;" draggable="false" data-width="39.30769230769215" data-left="1515.846153846154">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">experience</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1555.15px; width: 24.0769px;" draggable="false" data-width="24.076923076923322" data-left="1555.1538461538462">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">today</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1579.23px; width: 13.3846px;" draggable="false" data-width="13.384615384615245" data-left="1579.2307692307695">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">and</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1592.62px; width: 25.0769px;" draggable="false" data-width="25.076923076923094" data-left="1592.6153846153848">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">savor</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1617.69px; width: 8.92308px;" draggable="false" data-width="8.923076923077133" data-left="1617.6923076923078">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">the</div>
                                </div>
                            </div>
                            <div class="timeline-editor-action" style="height: 28px; left: 1626.62px; width: 58px;" draggable="false" data-width="57.99999999999977" data-left="1626.615384615385">
                                <div class="sc-jnUjQj bOsrMV caption-effect">
                                    <div class="caption-child">joy!</div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-editor-edit-row " style="height: 48px; left: 0px; position: absolute; top: 28px; width: 1915px; background-position-x: 0px, 15px; background-size: 15px, 100px;">
                            <div class="timeline-editor-action timeline-editor-action-movable timeline-editor-action-flexible" style="height: 48px; left: 15px; width: 350px;" draggable="false" data-width="350.00000000000006" data-left="15">
                                <div class="sc-gluGTh dPikOc videoEffect"></div>
                                <div class="timeline-editor-action-left-stretch"></div>
                                <div class="timeline-editor-action-right-stretch"></div>
                            </div>
                            <div class="timeline-editor-action timeline-editor-action-movable timeline-editor-action-flexible" style="height: 48px; left: 365px; width: 197.308px;" draggable="false" data-width="197.30769230769232" data-left="365.00000000000006">
                                <div class="sc-gluGTh ftbEit videoEffect"></div>
                                <div class="timeline-editor-action-left-stretch"></div>
                                <div class="timeline-editor-action-right-stretch"></div>
                            </div>
                            <div class="timeline-editor-action timeline-editor-action-movable timeline-editor-action-flexible" style="height: 48px; left: 562.308px; width: 177.654px;" draggable="false" data-width="177.6538461538462" data-left="562.3076923076924">
                                <div class="sc-gluGTh eHkceJ videoEffect"></div>
                                <div class="timeline-editor-action-left-stretch"></div>
                                <div class="timeline-editor-action-right-stretch"></div>
                            </div>
                            <div class="timeline-editor-action timeline-editor-action-movable timeline-editor-action-flexible" style="height: 48px; left: 739.962px; width: 275.885px;" draggable="false" data-width="275.88461538461536" data-left="739.9615384615386">
                                <div class="sc-gluGTh Bvvwl videoEffect"></div>
                                <div class="timeline-editor-action-left-stretch"></div>
                                <div class="timeline-editor-action-right-stretch"></div>
                            </div>
                            <div class="timeline-editor-action timeline-editor-action-movable timeline-editor-action-flexible" style="height: 48px; left: 1015.85px; width: 177.654px;" draggable="false" data-width="177.65384615384608" data-left="1015.8461538461539">
                                <div class="sc-gluGTh kjTtth videoEffect"></div>
                                <div class="timeline-editor-action-left-stretch"></div>
                                <div class="timeline-editor-action-right-stretch"></div>
                            </div>
                            <div class="timeline-editor-action timeline-editor-action-movable timeline-editor-action-flexible" style="height: 48px; left: 1193.5px; width: 275.885px;" draggable="false" data-width="275.8846153846155" data-left="1193.5">
                                <div class="sc-gluGTh cxbuVh videoEffect"></div>
                                <div class="timeline-editor-action-left-stretch"></div>
                                <div class="timeline-editor-action-right-stretch"></div>
                            </div>
                            <div class="timeline-editor-action timeline-editor-action-movable timeline-editor-action-flexible" style="height: 48px; left: 1469.38px; width: 195.5px;" draggable="false" data-width="195.5" data-left="1469.3846153846155">
                                <div class="sc-gluGTh jyofgl videoEffect"></div>
                                <div class="timeline-editor-action-left-stretch"></div>
                                <div class="timeline-editor-action-right-stretch"></div>
                            </div>
                            <div class="timeline-editor-action timeline-editor-action-movable timeline-editor-action-flexible" style="height: 48px; left: 1664.88px; width: 195.5px;" draggable="false" data-width="195.5" data-left="1664.8846153846155">
                                <div class="sc-gluGTh hWRaTV videoEffect"></div>
                                <div class="timeline-editor-action-left-stretch"></div>
                                <div class="timeline-editor-action-right-stretch"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="resize-triggers">
                <div class="expand-trigger">
                    <div style="width: 1229px; height: 39px;"></div>
                </div>
                <div class="contract-trigger"></div>
            </div>
        </div>
        <div class="timeline-editor-cursor" draggable="false" style="width: 3px; left: 15px;" data-width="3" data-left="15">
            <svg class="timeline-editor-cursor-top" width="8" height="12" viewBox="0 0 8 12" fill="none">
                <path d="M0 1C0 0.447715 0.447715 0 1 0H7C7.55228 0 8 0.447715 8 1V9.38197C8 9.76074 7.786 10.107 7.44721 10.2764L4.44721 11.7764C4.16569 11.9172 3.83431 11.9172 3.55279 11.7764L0.552786 10.2764C0.214002 10.107 0 9.76074 0 9.38197V1Z" fill="#5297FF"></path>
            </svg>
            <div class="timeline-editor-cursor-area"></div>
        </div>
    </div>
</div>



    
  </div>
</div>

 </div> 
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












    
@endsection


