@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/modal-edit-user.js')}}"></script>
<script src="{{asset('assets/js/modal-enable-otp.js')}}"></script>
<script src="{{asset('assets/js/app-user-view.js')}}"></script>
<script src="{{asset('assets/js/app-user-view-security.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">User / View /</span> Security
</h4>
<div class="row">
  <!-- User Sidebar -->
 <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- User Card -->
   <div class="card mb-4">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">
            <img style="border-radius:100%" class="img-fluid my-4" src="https://yekbun.hellodev.site/public//assets/img/avatars/10.png" height="110" width="110" alt="User avatar">
            <div class="user-info text-center">
              <h4 class="mb-2"><img height="20px" src="https://yekbun.hellodev.site/public//assets/img/medal-ribbon.jpeg"> Alex Smith</h4>
               <p class="mb-2"><img height="20px" src="https://yekbun.hellodev.site/public//assets/img/germany-flag-png.png"> Rojava Qamishlo <img height="20px" src="https://yekbun.hellodev.site/public//assets/img/germany-flag-png.png"> Hannover</p>
                 <b><p class="mb-2 ">Standard User</p></b>
                  <span>User Id:123456778</span>
            </div>
          </div>
        </div>
      
        <h5 class="pb-2 border-bottom mb-4">Details</h5>
        <div class="info-container">
          <ul class="list-unstyled">
            <li class="mb-3">
              <span class="fw-bold me-2">Status:</span>
              <br>
              <span>Married</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Email:</span>
                  <br>
              <span>User Id:123456778</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Phone Number:</span>
                  <br>
                <span>User Id:123456778</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Member Since:</span>
                  <br>
              <span>12.10.2023</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Country</span>
                  <br>
              <span>Germany</span>
            </li>
            
           
           
          </ul>
          <!--<div class="d-flex justify-content-center pt-3">-->
          <!--  <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser" data-bs-toggle="modal">Edit</a>-->
          <!--  <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>-->
          <!--</div>-->
        </div>
      </div>
    </div>
   
  </div>
  <!--/ User Sidebar -->


  <!-- User Content -->
  <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
    <!-- User Pills -->
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link " href="javascript:void(0);"><i class="bx bx-user me-1"></i>Follower</a></li>
      <!--<li class="nav-item"><a class="nav-link" href="{{url('app/user/view/security')}}"><i class="bx bx-detail me-1"></i>Post</a></li>-->
      <li class="nav-item"><a class="nav-link" href="{{url('app/user/view/billing')}}"><i class="bx bx-video me-1"></i>Videos</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('app/user/view/notifications')}}"><i class="bx bx-bell me-1"></i>Activity</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('app/user/view/connections')}}"><i class="bx bx-map-pin me-1"></i>Location</a></li>
    </ul>
    <!--/ User Pills -->

    <!-- Change Password -->
    <div class="card mb-4">
      <h5 class="card-header">Change Password</h5>
      <div class="card-body">
        <form id="formChangePassword" method="POST" onsubmit="return false">
          <div class="alert alert-warning" role="alert">
            <h6 class="alert-heading fw-bold mb-1">Ensure that these requirements are met</h6>
            <span>Minimum 8 characters long, uppercase & symbol</span>
          </div>
          <div class="row">
            <div class="mb-3 col-12 col-sm-6 form-password-toggle">
              <label class="form-label" for="newPassword">New Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="mb-3 col-12 col-sm-6 form-password-toggle">
              <label class="form-label" for="confirmPassword">Confirm New Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary me-2">Change Password</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--/ Change Password -->

    <!-- Two-steps verification -->
    <div class="card mb-4">
      <div class="card-header">
        <h5 class="card-title mb-2">Two-steps verification</h5>
        <span class="card-subtitle">Keep your account secure with authentication step.</span>
      </div>
      <div class="card-body">
        <h6>SMS</h6>
        <div class="d-flex justify-content-between border-bottom mb-4 pb-2">
          <span>+1(968) 945-8832</span>
          <div class="action-icons">
            <a href="javascript:;" class="text-body me-1" data-bs-target="#enableOTP" data-bs-toggle="modal"><i class="bx bx-edit"></i></a>
            <a href="javascript:;" class="text-body"><i class="bx bx-trash-alt"></i></a>
          </div>
        </div>
        <p class="mb-0">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.
          <a href="javascript:void(0);" class="text-body">Learn more.</a>
        </p>
      </div>
    </div>
    <!--/ Two-steps verification -->

    <!-- Recent Devices -->
    <div class="card mb-4">
      <h5 class="card-header">Recent Devices</h5>
      <div class="table-responsive">
        <table class="table border-top">
          <thead>
            <tr>
              <th class="text-truncate">Browser</th>
              <th class="text-truncate">Device</th>
              <th class="text-truncate">Location</th>
              <th class="text-truncate">Recent Activities</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-truncate"><i class='bx bxl-windows text-info me-3'></i> <span class="fw-semibold">Chrome on Windows</span></td>
              <td class="text-truncate">HP Spectre 360</td>
              <td class="text-truncate">Switzerland</td>
              <td class="text-truncate">10, July 2021 20:07</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bx-mobile-alt text-danger me-3'></i> <span class="fw-semibold">Chrome on iPhone</span></td>
              <td class="text-truncate">iPhone 12x</td>
              <td class="text-truncate">Australia</td>
              <td class="text-truncate">13, July 2021 10:10</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bxl-android text-success me-3'></i> <span class="fw-semibold">Chrome on Android</span></td>
              <td class="text-truncate">Oneplus 9 Pro</td>
              <td class="text-truncate">Dubai</td>
              <td class="text-truncate">14, July 2021 15:15</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bxl-apple me-3'></i> <span class="fw-semibold">Chrome on MacOS</span></td>
              <td class="text-truncate">Apple iMac</td>
              <td class="text-truncate">India</td>
              <td class="text-truncate">16, July 2021 16:17</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bxl-windows text-info me-3'></i> <span class="fw-semibold">Chrome on Windows</span></td>
              <td class="text-truncate">HP Spectre 360</td>
              <td class="text-truncate">Switzerland</td>
              <td class="text-truncate">20, July 2021 21:01</td>
            </tr>
            <tr>
              <td class="text-truncate border-bottom-0"><i class='bx bxl-android text-success me-3'></i> <span class="fw-semibold">Chrome on Android</span></td>
              <td class="text-truncate border-bottom-0">Oneplus 9 Pro</td>
              <td class="text-truncate border-bottom-0">Dubai</td>
              <td class="text-truncate border-bottom-0">21, July 2021 12:22</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Recent Devices -->
  </div>
  <!--/ User Content -->
</div>

<!-- Modals -->
@include('_partials/_modals/modal-edit-user')
@include('_partials/_modals/modal-enable-otp')
@include('_partials/_modals/modal-upgrade-plan')
<!-- /Modals -->

@endsection