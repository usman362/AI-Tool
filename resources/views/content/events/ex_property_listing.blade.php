@extends('layouts/layoutMaster')

@section('title', 'Event - List')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
@endsection

@section('vendor-script')
   <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/wizard-ex-property-listing.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    
    
    @endsection

@section('content')

  <!--hee-->
  <div class="container-xxl flex-grow-1 container-p-y">
            
            <h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Wizard examples /</span> Property Listing
</h4>

<!-- Property Listing Wizard -->
<div id="wizard-property-listing" class="bs-stepper vertical mt-2 linear">
  <div class="bs-stepper-header">
    <div class="step active" data-target="#personal-details">
      <button type="button" class="step-trigger" aria-selected="true">
        <span class="bs-stepper-circle">
          <i class="bx bx-user"></i>
        </span>
        <span class="bs-stepper-label">
          <span class="bs-stepper-title">Personal Details</span>
          <span class="bs-stepper-subtitle">Your Name/Email</span>
        </span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#property-details">
      <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
        <span class="bs-stepper-circle">
          <i class="bx bx-home"></i>
        </span>
        <span class="bs-stepper-label">
          <span class="bs-stepper-title">Property Details</span>
          <span class="bs-stepper-subtitle">Property Type</span>
        </span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#property-features">
      <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
        <span class="bs-stepper-circle">
          <i class="bx bx-star"></i>
        </span>
        <span class="bs-stepper-label">
          <span class="bs-stepper-title">Property Features</span>
          <span class="bs-stepper-subtitle">Bedrooms/Floor No</span>
        </span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#property-area">
      <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
        <span class="bs-stepper-circle">
          <i class="bx bx-map"></i>
        </span>
        <span class="bs-stepper-label">
          <span class="bs-stepper-title">Property Area</span>
          <span class="bs-stepper-subtitle">Covered Area</span>
        </span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#price-details">
      <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
        <span class="bs-stepper-circle">
          <i class="bx bx-dollar"></i>
        </span>
        <span class="bs-stepper-label">
          <span class="bs-stepper-title">Price Details</span>
          <span class="bs-stepper-subtitle">Expected Price</span>
        </span>
      </button>
    </div>
  </div>
  <div class="bs-stepper-content">
    <form id="wizard-property-listing-form" onsubmit="return false">

      <!-- Personal Details -->
      <div id="personal-details" class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
        <div class="row g-3">
          <div class="col-12">
            <div class="row">
            
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-icon">
                  <label class="form-check-label custom-option-content" for="customRadioOwner">
                    <span class="custom-option-body">
                      <i class="bx bx-crown"></i>
                      <span class="custom-option-title"> I am the Owner </span>
                      <small>Submit property as an Individual. Lease, Rent or Sell at the best price.</small>
                    </span>
                    <input name="plUserType" class="form-check-input" type="radio" value="2" id="customRadioOwner">
                  </label>
                </div>
              </div>
            
            </div>
          </div>
          <div class="col-sm-6 fv-plugins-icon-container">
            <label class="form-label" for="plFirstName">First Name</label>
            <input type="text" id="plFirstName" name="plFirstName" class="form-control" placeholder="John">
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
          <div class="col-sm-6 fv-plugins-icon-container">
            <label class="form-label" for="plLastName">Last Name</label>
            <input type="text" id="plLastName" name="plLastName" class="form-control" placeholder="Doe">
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
          <div class="col-sm-6">
            <label class="form-label" for="plUserName">Username</label>
            <input type="text" id="plUserName" name="plUserName" class="form-control" placeholder="john.doe">
          </div>
          <div class="col-sm-6 form-password-toggle">
            <label class="form-label" for="plPassWord">Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="plPassWord" class="form-control" name="plPassWord" placeholder="············" aria-describedby="passwordToggler">
              <span id="passwordToggler" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="plEmail">Email</label>
            <input type="text" id="plEmail" name="plEmail" class="form-control" placeholder="john.doe@example.com">
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="plContact">Contact</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text">US (+1)</span>
              <input type="text" id="plContact" name="plContact" class="form-control contact-number-mask" placeholder="202 555 0111">
            </div>
          </div>
          <div class="col-12 d-flex justify-content-between">
            <button class="btn btn-label-secondary btn-prev" disabled=""> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
              <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
          </div>
        </div>
      </div>

      <!-- Property Details -->
      <div id="property-details" class="content fv-plugins-bootstrap5 fv-plugins-framework">
        <div class="row g-3">
          <div class="col-12">
            <div class="row">
              <div class="col-xl mb-xl-0 mb-2">
                <div class="form-check custom-option custom-option-icon checked">
                  <label class="form-check-label custom-option-content" for="customRadioSell">
                    <span class="custom-option-body">
                      <i class="bx bx-home"></i>
                      <span class="custom-option-title">Sale the property</span>
                      <small>Post your property for sale.<br> Unlimited free listing.</small>
                    </span>
                    <input name="plPropertySaleRent" class="form-check-input" type="radio" value="1" id="customRadioSell" checked="">
                  </label>
                </div>
              </div>
              <div class="col-xl mb-xl-0 mb-2">
                <div class="form-check custom-option custom-option-icon">
                  <label class="form-check-label custom-option-content" for="customRadioRent">
                    <span class="custom-option-body">
                      <i class="bx bx-wallet"></i>
                      <span class="custom-option-title">Rent the property</span>
                      <small>Post your property for rent.<br> Unlimited free listing.</small>
                    </span>
                    <input name="plPropertySaleRent" class="form-check-input" type="radio" value="2" id="customRadioRent">
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 fv-plugins-icon-container">
            <label class="form-label" for="plPropertyType">Property Type</label>
            <div class="position-relative"><select id="plPropertyType" name="plPropertyType" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="plPropertyType" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="4">Select Property Type</option>
              <option value="10002">Flat/ Apartment</option>
              <option value="10001">Residential House</option>
              <option value="10017">Villa</option>
              <option value="10003">Builder Floor Apartment</option>
              <option value="10000">Residential Land/ Plot</option>
              <option value="10021">Penthouse</option>
              <option value="10022">Studio Apartment</option>
            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-plPropertyType-container"><span class="select2-selection__rendered" id="select2-plPropertyType-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select property type</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
          <div class="col-sm-6 fv-plugins-icon-container">
            <label class="form-label" for="plZipCode">Zip Code</label>
            <input type="number" id="plZipCode" name="plZipCode" class="form-control" placeholder="99950">
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
          <div class="col-sm-6">
            <label class="form-label" for="plCountry">Country</label>
            <div class="position-relative"><select id="plCountry" name="plCountry" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="plCountry" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="2">Select</option>
              <option value="Australia">Australia</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Belarus">Belarus</option>
              <option value="Brazil">Brazil</option>
              <option value="Canada">Canada</option>
              <option value="China">China</option>
              <option value="France">France</option>
              <option value="Germany">Germany</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Japan">Japan</option>
              <option value="Korea">Korea, Republic of</option>
              <option value="Mexico">Mexico</option>
              <option value="Philippines">Philippines</option>
              <option value="Russia">Russian Federation</option>
              <option value="South Africa">South Africa</option>
              <option value="Thailand">Thailand</option>
              <option value="Turkey">Turkey</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-plCountry-container"><span class="select2-selection__rendered" id="select2-plCountry-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="plState">State</label>
            <input type="text" id="plState" name="plState" class="form-control" placeholder="California">
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="plCity">City</label>
            <input type="text" id="plCity" name="plCity" class="form-control" placeholder="Los Angeles">
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="plLandmark">Landmark</label>
            <input type="text" id="plLandmark" name="plLandmark" class="form-control" placeholder="Nr. Hard Rock Cafe">
          </div>
          <div class="col-lg-12">
            <label class="form-label" for="plAddress">Address</label>
            <textarea id="plAddress" name="plAddress" class="form-control" rows="2" placeholder="12, Business Park"></textarea>
          </div>
          <div class="col-12 d-flex justify-content-between">
            <button class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
          </div>
        </div>
      </div>

      <!-- Property Features -->
      <div id="property-features" class="content fv-plugins-bootstrap5 fv-plugins-framework">
        <div class="row g-3">
          <div class="col-sm-6">
            <label class="form-label d-block" for="plBedrooms">Bedrooms</label>
            <input type="number" id="plBedrooms" name="plBedrooms" class="form-control" placeholder="3">
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="plFloorNo">Floor No</label>
            <input type="number" id="plFloorNo" name="plFloorNo" class="form-control" placeholder="12">
          </div>
          <div class="col-sm-6">
            <label class="form-label d-block" for="plBathrooms">Bathrooms</label>
            <input type="number" id="plBathrooms" name="plBathrooms" class="form-control" placeholder="4">
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="plFurnishedStatus">Furnished Status</label>
            <select id="plFurnishedStatus" name="plFurnishedStatus" class="form-select">
              <option selected="" disabled="" value="">Select furnished status </option>
              <option value="1">Fully furnished</option>
              <option value="2">Furnished</option>
              <option value="3">Semi furnished</option>
              <option value="4">Unfurnished</option>
            </select>
          </div>
          <div class="col-lg-12">
            <label class="form-label" for="plFurnishingDetails">Furnishing Details</label>
            <tags class="tagify  form-control" tabindex="-1">
            <tag title="Fridge" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="Fridge"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div><span class="tagify__tag-text">Fridge</span></div></tag><tag title="AC" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="AC"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div><span class="tagify__tag-text">AC</span></div></tag><tag title="TV" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="TV"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div><span class="tagify__tag-text">TV</span></div></tag><tag title="WiFi" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="WiFi"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div><span class="tagify__tag-text">WiFi</span></div></tag><span contenteditable="" tabindex="0" data-placeholder="select options" aria-placeholder="select options" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                ​
        </tags><input id="plFurnishingDetails" name="plFurnishingDetails" class="form-control" placeholder="select options" value="Fridge, AC, TV, WiFi" tabindex="-1">
          </div>
          <div class="col-sm-6">
            <label class="form-label">Is there any common area?</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plCommonAreaRadio" id="plCommonAreaRadioYes" checked="">
              <label class="form-check-label" for="plCommonAreaRadioYes">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plCommonAreaRadio" id="plCommonAreaRadioNo">
              <label class="form-check-label" for="plCommonAreaRadioNo">No</label>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label">Is there any attached balcony?</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plAttachedBalconyRadio" id="plAttachedBalconyRadioYes" checked="">
              <label class="form-check-label" for="plAttachedBalconyRadioYes">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plAttachedBalconyRadio" id="plAttachedBalconyRadioNo">
              <label class="form-check-label" for="plAttachedBalconyRadioNo">No</label>
            </div>
          </div>
          <div class="col-12 d-flex justify-content-between">
            <button class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
          </div>
        </div>
      </div>

      <!-- Property Area -->
      <div id="property-area" class="content fv-plugins-bootstrap5 fv-plugins-framework">
        <div class="row g-3">
          <div class="col-sm-6">
            <label class="form-label d-block" for="plTotalArea">Total Area</label>
            <div class="input-group input-group-merge">
              <input type="number" class="form-control" id="plTotalArea" name="plTotalArea" placeholder="1000" aria-describedby="pl-total-area">
              <span class="input-group-text" id="pl-total-area">sq-ft</span>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label d-block" for="plCarpetArea">Carpet Area</label>
            <div class="input-group input-group-merge">
              <input type="number" class="form-control" id="plCarpetArea" name="plCarpetArea" placeholder="800" aria-describedby="pl-carpet-area">
              <span class="input-group-text" id="pl-carpet-area">sq-ft</span>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label d-block" for="plPlotArea">Plot Area</label>
            <div class="input-group input-group-merge">
              <input type="number" class="form-control" id="plPlotArea" name="plPlotArea" placeholder="800" aria-describedby="pl-plot-area">
              <span class="input-group-text" id="pl-plot-area">sq-yd</span>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label d-block" for="plAvailableFrom">Available From</label>
            <input type="text" id="plAvailableFrom" name="plAvailableFrom" class="form-control flatpickr flatpickr-input" placeholder="YYYY-MM-DD" readonly="readonly">
          </div>
          <div class="col-sm-6">
            <label class="form-label">Possession Status</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plPossessionStatus" id="plUnderConstruction" checked="">
              <label class="form-check-label" for="plUnderConstruction">Under Construction</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plPossessionStatus" id="plReadyToMoveRadio">
              <label class="form-check-label" for="plReadyToMoveRadio">Ready to Move</label>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label">Transaction Type</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plTransectionType" id="plNewProperty" checked="">
              <label class="form-check-label" for="plNewProperty">New Property</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plTransectionType" id="plResaleProperty">
              <label class="form-check-label" for="plResaleProperty">Resale</label>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label">Is Property Facing Main Road?</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plRoadFacingRadio" id="plRoadFacingRadioYes" checked="">
              <label class="form-check-label" for="plRoadFacingRadioYes">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plRoadFacingRadio" id="plRoadFacingRadioNo">
              <label class="form-check-label" for="plRoadFacingRadioNo">No</label>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label">Gated Colony?</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plGatedColonyRadio" id="plGatedColonyRadioYes" checked="">
              <label class="form-check-label" for="plGatedColonyRadioYes">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plGatedColonyRadio" id="plGatedColonyRadioNo">
              <label class="form-check-label" for="plGatedColonyRadioNo">No</label>
            </div>
          </div>
          <div class="col-12 d-flex justify-content-between">
            <button class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
          </div>
        </div>
      </div>

      <!-- Price Details -->
      <div id="price-details" class="content fv-plugins-bootstrap5 fv-plugins-framework">
        <div class="row g-3">
          <div class="col-sm-6">
            <label class="form-label d-block" for="plExpeactedPrice">Expected Price</label>
            <div class="input-group input-group-merge">
              <input type="number" class="form-control" id="plExpeactedPrice" name="plExpeactedPrice" placeholder="25,000" aria-describedby="pl-expeacted-price">
              <span class="input-group-text" id="pl-expeacted-price">$</span>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label d-block" for="plPriceSqft">Price per Sqft</label>
            <div class="input-group input-group-merge">
              <input type="number" class="form-control" id="plPriceSqft" name="plPriceSqft" placeholder="500" aria-describedby="pl-price-sqft">
              <span class="input-group-text" id="pl-price-sqft">$</span>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label d-block" for="plMaintenenceCharge">Maintenance Charge</label>
            <div class="input-group input-group-merge">
              <input type="number" class="form-control" id="plMaintenenceCharge" name="plMaintenenceCharge" placeholder="50" aria-describedby="pl-mentenence-charge">
              <span class="input-group-text" id="pl-mentenence-charge">$</span>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="plMaintenencePer">Maintenance</label>
            <select id="plMaintenencePer" name="plMaintenencePer" class="form-select">
              <option value="1" selected="">Monthly</option>
              <option value="2">Quarterly</option>
              <option value="3">Yearly</option>
              <option value="3">One-time</option>
              <option value="3">Per sqft. Monthly</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label class="form-label d-block" for="plBookingAmount">Booking/Token Amount</label>
            <div class="input-group input-group-merge">
              <input type="number" class="form-control" id="plBookingAmount" name="plBookingAmount" placeholder="250" aria-describedby="pl-booking-amount">
              <span class="input-group-text" id="pl-booking-amount">$</span>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label d-block" for="plOtherAmount">Other Amount</label>
            <div class="input-group input-group-merge">
              <input type="number" class="form-control" id="plOtherAmount" name="plOtherAmount" placeholder="500" aria-describedby="pl-other-amount">
              <span class="input-group-text" id="pl-other-amount">$</span>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label">Show Price as</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plShowPriceRadio" id="plNagotiablePrice" checked="">
              <label class="form-check-label" for="plNagotiablePrice">Negotiable</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="plShowPriceRadio" id="plCallForPrice">
              <label class="form-check-label" for="plCallForPrice">Call for Price</label>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label">Price includes</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="plCarParking" id="plCarParking">
              <label class="form-check-label" for="plCarParking">Car Parking</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="plClubMembership" id="plClubMembership">
              <label class="form-check-label" for="plClubMembership">Club Membership</label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="plOtherCharges" id="plOtherCharges">
              <label class="form-check-label" for="plOtherCharges">Stamp Duty &amp; Registration charges excluded.</label>
            </div>
          </div>
          <div class="col-12 d-flex justify-content-between">
            <button class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
            <button class="btn btn-success btn-submit btn-next">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!--/ Property Listing Wizard -->

          </div>
  
  <!--heee-->
        
        
        
            <div class="content-backdrop fade"></div>
        </div>

    <script>
        function delete_service(el) {
            let link = $(el).data('id');
            $('.deleted-modal').modal('show');
            $('#delete_form').attr('action', link);
        }
    </script>


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
    <script>
        function drpzone_init() {
            dropZoneInitFunctions.forEach(callback => callback());
        }
    </script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>
@endsection
@endsection