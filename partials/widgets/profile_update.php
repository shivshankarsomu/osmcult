<form class="noo-ajax-register-form form-horizontal" name="form" id="update_form" novalidate  method="post" ng-controller="formCtrl" ng-init="get_profile_data();" style="padding-top:100px;" ng-cloak>
   <div class="form-group text-center noo-ajax-result" style="display: none"></div>
    <label for="name" id="update_error_form" class="col-sm-9 form-label pad-left0 error-msg disp-none">There are errors in the submitted form.</label>
    <label for="name" id="update_success_form" class="alert alert-success disp-none">Your profile information has been successfully updated.</label>
   <div class="form-group row user_login_container">
      <label for="name" class="col-sm-9 text-bold form-label">Name</label>
      <div class="col-sm-9">
         <input type="text" class="user_login form-control" ng-model="user.name" name="uName"  placeholder="Name" required>
         <div ng-show="form.$submitted || form.uName.$touched">
            <div ng-show="form.uName.$error.required" class="error-msg">Name is required.</div>
         </div>
     </div>
      </div>
   <div class="form-group row user_login_container">
      <label for="email" class="col-sm-9 text-bold form-label">Email</label>
      <div class="col-sm-9">
         <input type="email" class="user_login form-control" ng-model="user.email" name="uEmail"  ng-pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="Email">
         <div ng-show="form.$submitted || form.uEmail.$touched">
            <div ng-show="form.uEmail.$error.email||form.uEmail.$error.pattern" class="error-msg">This is not a valid Email-Id.</div>
         </div>
      </div>
   </div>
   <div class="form-group row user_login_container">
      <label for="email" class="col-sm-9 text-bold form-label">Password</label>
      <div class="col-sm-9">
         <input type="password" class="user_login form-control" ng-model="user.password" id="uPassword" name="uPassword"  ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/" placeholder="Password" required>
         <div ng-show="form.$submitted || form.uPassword.$touched">
            <div ng-show="form.uPassword.$error.required" class="error-msg">Password is required.</div>
            <div ng-show="form.uPassword.$error.password||form.uPassword.$error.pattern" class="error-msg">This is not a valid Password.</div>
         </div>
      </div>
   </div>
   <div class="form-group row user_login_container">
      <label for="email" class="col-sm-9 text-bold form-label">Confirm Password</label>
      <div class="col-sm-9">
         <input type="password" class="user_login form-control" ng-model="user.confirm_password" pw-check="uPassword" id="uConfirmpassword" name="uConfirmpassword"  ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/" placeholder="Confirm Password" required>
         <div ng-show="form.$submitted || form.uConfirmpassword.$touched">
             <div ng-show="form.uConfirmpassword.$error.required" class="error-msg">Confirm Password is required.</div>
             <div ng-show="form.uConfirmpassword.$error.pwmatch" class="error-msg">Passwords don't match.</div>
         </div>
      </div>
   </div>
   <div class="form-group row user_login_container">
      <label for="dob" class="col-sm-9 text-bold form-label">Date of Birth</label>
      <div class="col-sm-9" style="position:relative;">
         <input type="text" class="user_login form-control update_dob" onchange="change_date_format()" ui-date ng-model="user.dob"   id="date" name="uDOB" placeholder="Date of Birth">
      </div>
   </div>
   <div class="form-group row user_login_container">
      <label for="gender" class="col-sm-9 text-bold form-label">Gender</label>
      <div class="col-sm-9 text-left">
         <input type="radio" ng-model="user.gender" value="Male"  class="form-label"  name="uGender"><span class="form-radio-txt">Male</span>
         <input type="radio"  ng-model="user.gender" value="Female" name="uGender"><span class="form-radio-txt">Female</span>
         <div ng-show="form.$submitted || form.uGender.$touched">
            <div ng-show="form.uGender.$error.required" class="error-msg">Gender is required.</div>
         </div>
      </div>
   </div>
   <div class="form-group row user_login_container">
      <label for="Pincode" class="col-sm-9 text-bold form-label">Location</label>
      <div class="col-sm-9">
         <div class="form-control-flat">
            <select class="user_role" name="uLocation" ng-model="user.location" required>
               <option value="">-Select-</option>
               <option ng-repeat="pincode in pincodes" value="{{pincode}}" ng-bind="pincode"></option>
            </select>
            <i class="fa fa-caret-down"></i>
         </div>
      </div>
   </div>
   <div class="form-group row user_login_container">
      <label for="Profiles" class="col-sm-9 text-bold form-label">Interested Profiles</label>
      <div class="col-sm-9">
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uPromoters"  ng-model="user.promoters"><span class="form-radio-txt">Promoters</span></label>
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uHostesses" ng-model="user.hostesses"><span class="form-radio-txt">Hostesses</span></label>
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uEmCees" ng-model="user.emcess"><span class="form-radio-txt">EmCees</span></label>
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uPamphlet" ng-model="user.pamphlet"><span class="form-radio-txt">Pamphlet Distributors</span></label>
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uModels" ng-model="user.models"><span class="form-radio-txt">Models</span></label>
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uOtherprofile" ng-model="user.othersprof"><span class="form-radio-txt">Others</span></label>
         <div class="col-sm-9 pad-left0 form-others" ng-show="user.othersprof">
            <input type="text" class="user_login form-control" ng-model="user.other_profile" name="uOTherprofile"  placeholder="Please enter any other skill">
         </div>
      </div>
   </div>
   <div class="form-group row user_login_container">
      <label for="Language" class="col-sm-9 text-bold form-label">Languages known</label>
      <div class="col-sm-9">
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox"  id="uEnglish"  ng-model="user.english"><span class="form-radio-txt">English</span></label>
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uHindi" ng-model="user.hindi"><span class="form-radio-txt">Hindi</span></label>
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uKannada" ng-model="user.kannada"><span class="form-radio-txt">Kannada</span></label>
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uTamil" ng-model="user.tamil"><span class="form-radio-txt">Tamil</span></label>
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uMalayalam" ng-model="user.malayam"><span class="form-radio-txt">Malayalam</span></label>
         <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uOtherlanguage" ng-model="user.others"><span class="form-radio-txt">Others</span></label>
      </div>
   </div>
   <div class="form-group row user_login_container">
      <label for="vehicle" class="col-sm-9 text-bold form-label">Do you Own a 2-Wheeler</label>
      <div class="col-sm-9 text-left">
         <input type="radio" ng-model="user.vehicle" value="yes"  class="form-label"  name="uVehicle"><span class="form-radio-txt">Yes</span>
         <input type="radio"  ng-model="user.vehicle" value="no" name="uVehicle"><span class="form-radio-txt">No</span>
         <div ng-show="form.$submitted || form.uVehicle.$touched">
            <div ng-show="form.uVehicle.$error.required" class="error-msg">Please enter whether you possess a 2-wheeler or not.</div>
         </div>
      </div>
   </div>
   <div class="form-group row user_login_container">
      <label for="laptop" class="col-sm-9 text-bold form-label">Do you have a laptop</label>
      <div class="col-sm-9 text-left">
         <input type="radio" ng-model="user.laptop" value="yes"  class="form-label"  name="uLaptop"><span class="form-radio-txt">Yes</span>
         <input type="radio"  ng-model="user.laptop" value="no" name="uLaptop"><span class="form-radio-txt">No</span>
         <div ng-show="form.$submitted || form.uLaptop.$touched">
            <div ng-show="form.uLaptop.$error.required" class="error-msg">Please enter whether you possess a laptop or not.</div>
         </div>
      </div>
   </div>
   <div class="form-group row user_login_container">
      <div class="col-sm-9">
         <div class="g-recaptcha" data-sitekey="6LepPRcTAAAAANv40rrqC14V_dlYWcf2K­OX­Gvd"></div>
      </div>
   </div>
   <div class="form-group">
      <button type="submit" class="btn btn-primary text-bold" ng-click="update_user(user);">Update</button>
   </div>
</form>
