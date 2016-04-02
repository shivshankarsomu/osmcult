<div class="modal fade" tabindex="-1" role="dialog"  id="forms_modal" >
   <div class="modal-dialog osm-refer-modal">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            <h4 class="modal-title">Sign Up</h4>
         </div>
         <div class="modal-body" ng-controller="formCtrl" id="formCenter">
            <form name="referral_form"  novalidate id="referral-form" method="post">
               <div class="form-group row">
                  <label for="referral_code" class="col-xs-12 text-bold">Referral Code</label>
                  <div class="col-xs-12">
                     <input type="text" class="user_login form-control"  ng-model="user.referral_code" name="uCode" placeholder="Referral" required>
                     <div ng-show="referral_form.$submitted || referral_form.uCode.$touched">
                        <div ng-show="referral_form.uCode.$error.required" class="error-msg">Referral Code is required.</div>
                     </div>
                     <div id="invalid_code" class="error-msg disp-none">Invalid Referral Code.</div>
                     <div id="used_code" class="error-msg disp-none">Referral Code is already been used.</div>
                  </div>

               </div>
               <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary text-bold"  ng-click="referral_code(user);">Submit</button>
               </div>
            </form>
            <form name="signup_form" id="signup_form"  enctype="multipart/form-data" novalidate  method="post">
                <label for="name" id="signup_error_form" class="col-xs-12 error-msg disp-none">There are errors in the submitted form.</label>
               <div class="form-group row user_login_container">
                  <label for="name" class="col-xs-12 text-bold form-label">Name</label>
                  <div class="col-xs-12">

                     <input type="text" class="user_login form-control" ng-model="user.name" name="uName"  placeholder="Name" required>
                     <div ng-show="signup_form.$submitted || signup_form.uName.$touched">
                        <div ng-show="signup_form.uName.$error.required" class="error-msg">Name is required.</div>
                     </div>
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <label for="name" class="col-xs-12 text-bold form-label">Mobile</label>
                  <div class="col-xs-12">
                     <input type="text" ng-model="user.mnumber" name="uMNumber" class="user_login form-control"   ng-minlength="10"   ng-maxlength="10" ng-pattern="/^[0-9]*$/" placeholder="Mobile Number" required>
                     <div ng-show="signup_form.$submitted || signup_form.uMNumber.$touched">
                        <div ng-show="signup_form.uMNumber.$error.required" class="error-msg">Mobile Number is required.</div>
                        <div ng-show="(!signup_form.uMNumber.$valid ||signup_form.uMNumber.$error.pattern) && !signup_form.uMNumber.$error.required && user.mnumber!=''" class="error-msg">This is not a valid Mobile Number.</div>
                     </div>
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <label for="email" class="col-xs-12 text-bold form-label">Email</label>
                  <div class="col-xs-12">
                     <input type="email" class="user_login form-control" ng-model="user.email" name="uEmail"  ng-pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="Email">
                     <div ng-show="signup_form.$submitted || signup_form.uEmail.$touched">
                        <div ng-show="signup_form.uEmail.$error.email||signup_form.uEmail.$error.pattern" class="error-msg">This is not a valid Email-Id.</div>
                     </div>
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <label for="email" class="col-xs-12 text-bold form-label">Password</label>
                  <div class="col-xs-12">
                     <input type="password" class="user_login form-control" ng-model="user.password" id="uPassword" name="uPassword"  ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/" placeholder="Password" required>
                     <div ng-show="signup_form.$submitted || signup_form.uPassword.$touched">
                        <div ng-show="signup_form.uPassword.$error.required" class="error-msg">Password is required.</div>
                        <div ng-show="signup_form.uPassword.$error.password||signup_form.uPassword.$error.pattern" class="error-msg">This is not a valid Password.</div>
                     </div>
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <label for="email" class="col-xs-12 text-bold form-label">Confirm Password</label>
                  <div class="col-xs-12">
                     <input type="password" class="user_login form-control" ng-model="user.confirm_password" pw-check="uPassword" id="uConfirmpassword" name="uConfirmpassword"  ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/" placeholder="Confirm Password" required>
                     <div ng-show="signup_form.$submitted || signup_form.uConfirmpassword.$touched">
                         <div ng-show="signup_form.uConfirmpassword.$error.required" class="error-msg">Confirm Password is required.</div>
                         <div ng-show="signup_form.uConfirmpassword.$error.pwmatch" class="error-msg">Passwords don't match.</div>
                     </div>
                  </div>
               </div>
                <div class="form-group row user_login_container">
					<div>
						<label for="Upload" class="col-xs-12 text-bold form-label">Selfie Image</label>
					</div>
					<div class="col-xs-12">
						<input type="file"  class="upload" id="uSelfie"  name="uSelfie"   placeholder="(jpg,png,gif,bmp)"></input>
                        <div id="selfie_type_error" class="error-msg disp-none">Please upload the image of correct format(jpg,png,gif,bmp)</div>
                        <div id="selfie_size_error" class="error-msg disp-none">Please upload image less than 500K</div>
					</div>
				</div>
                <div class="form-group row user_login_container">
                    <div>
                        <label for="Upload" class="col-xs-12 text-bold form-label">Passport Size Photo</label>
                    </div>
                    <div class="col-xs-12">
                        <input type="file"  class="upload" id="uPassport"  name="uPassport"   placeholder="(jpg,png,gif,bmp)"></input>
                        <div id="pp_type_error" class="error-msg disp-none">Please upload the image of correct format(jpg,png,gif,bmp)</div>
                        <div id="pp_size_error" class="error-msg disp-none">Please upload image less than 500K</div>
                    </div>
                </div>
               <div class="form-group row user_login_container">
                  <label for="dob" class="col-xs-12 text-bold form-label">Date of Birth</label>
                  <div class="col-xs-12" id="sandbox-container" style="position:relative;">
                      <input type="text" class="user_login form-control" ng-model="user.dob"   id="date" name="uDOB" placeholder="Date of Birth">
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <label for="gender" class="col-xs-12 text-bold form-label">Gender</label>
                  <div class="col-xs-12 text-left">
                     <input type="radio" ng-model="user.gender" value="Male"  class="form-label"  name="uGender"><span class="form-radio-txt">Male</span>
                     <input type="radio"  ng-model="user.gender" value="Female" name="uGender"><span class="form-radio-txt">Female</span>
                     <div ng-show="signup_form.$submitted || signup_form.uGender.$touched">
                        <div ng-show="signup_form.uGender.$error.required" class="error-msg">Gender is required.</div>
                     </div>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Pincode" class="col-xs-12 text-bold form-label">Location</label>
                  <div class="col-xs-12">
                        <select class="form-control" name="uLocation" ng-model="user.location" required>
                           <option value="">-Select-</option>
                           <option ng-repeat="pincode in pincodes" value="{{pincode}}" ng-bind="pincode"></option>
                        </select>
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <label for="Profiles" class="col-xs-12 text-bold form-label">Interested Profiles</label>
                  <div class="col-xs-12">
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uPromoters"  ng-model="user.promoters"><span class="form-radio-txt">Promoters</span></label>
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uHostesses" ng-model="user.hostesses"><span class="form-radio-txt">Hostesses</span></label>
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uEmCees" ng-model="user.emcess"><span class="form-radio-txt">EmCees</span></label>
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uPamphlet" ng-model="user.pamphlet"><span class="form-radio-txt">Pamphlet Distributors</span></label>
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uModels" ng-model="user.models"><span class="form-radio-txt">Models</span></label>
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uOtherprofile" ng-model="user.othersprof"><span class="form-radio-txt">Others</span></label>
                     <div class="col-xs-12 pad-left0 form-others" ng-show="user.othersprof">
                        <input type="text" class="user_login form-control" ng-model="user.other_profile" name="uOTherprofile"  placeholder="Please enter any other skill">
                     </div>
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <label for="Language" class="col-xs-12 text-bold form-label">Languages known</label>
                  <div class="col-xs-12">
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox"  id="uEnglish"  ng-model="user.english"><span class="form-radio-txt">English</span></label>
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uHindi" ng-model="user.hindi"><span class="form-radio-txt">Hindi</span></label>
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uKannada" ng-model="user.kannada"><span class="form-radio-txt">Kannada</span></label>
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uTamil" ng-model="user.tamil"><span class="form-radio-txt">Tamil</span></label>
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uMalayalam" ng-model="user.malayam"><span class="form-radio-txt">Malayalam</span></label>
                     <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uOtherlanguage" ng-model="user.others"><span class="form-radio-txt">Others</span></label>
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <label for="vehicle" class="col-xs-12 text-bold form-label">Do you Own a 2-Wheeler</label>
                  <div class="col-xs-12 text-left">
                     <input type="radio" ng-model="user.vehicle" value="yes"  class="form-label"  name="uVehicle"><span class="form-radio-txt">Yes</span>
                     <input type="radio"  ng-model="user.vehicle" value="no" name="uVehicle"><span class="form-radio-txt">No</span>
                     <div ng-show="signup_form.$submitted || signup_form.uVehicle.$touched">
                        <div ng-show="signup_form.uVehicle.$error.required" class="error-msg">Please enter whether you possess a 2-wheeler or not.</div>
                     </div>
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <label for="laptop" class="col-xs-12 text-bold form-label">Do you have a laptop</label>
                  <div class="col-xs-12 text-left">
                     <input type="radio" ng-model="user.laptop" value="yes"  class="form-label"  name="uLaptop"><span class="form-radio-txt">Yes</span>
                     <input type="radio"  ng-model="user.laptop" value="no" name="uLaptop"><span class="form-radio-txt">No</span>
                     <div ng-show="signup_form.$submitted || signup_form.uLaptop.$touched">
                        <div ng-show="signup_form.uLaptop.$error.required" class="error-msg">Please enter whether you possess a laptop or not.</div>
                     </div>
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <div class="col-xs-12">
                     <label class="col-sm-12 pad-left0 text-left"><input type="checkbox"  id="uTerms"  ng-model="user.terms" required><span class="form-radio-txt">Please accept the terms and conditions</span></label>
                  </div>
               </div>
               <div class="form-group row user_login_container">
                  <div class="col-xs-12">
                     <div class="g-recaptcha" data-sitekey="6LepPRcTAAAAANv40rrqC14V_dlYWcf2K­OX­Gvd"></div>
                  </div>
               </div>
               <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary text-bold" onclick="change_date_format();" ng-click="signup_user(user);">Sign Up</button>
               </div>
            </form>
            <form class="noo-ajax-register-form form-horizontal disp-none" name="loginform" id="login-form" novalidate  method="post">
              <div class="form-group text-center noo-ajax-result" style="display: none"></div>
               <label for="name" id="login_error_form"class="col-xs-12 form-label pad-left0 error-msg disp-none">There are errors in the submitted form.</label>
              <div class="form-group row user_login_container">
                 <label for="name" class="col-xs-12 text-bold form-label">Mobile</label>
                 <div class="col-xs-12">
                    <input type="text" ng-model="user.mnumber" name="uMNumber" class="user_login form-control"   ng-minlength="10"   ng-maxlength="15" ng-pattern="/^[- +()]*[0-9][- +()0-9]*$/" placeholder="Mobile Number" required>
                    <div ng-show="loginform.$submitted || loginform.uMNumber.$touched">
                       <div ng-show="loginform.uMNumber.$error.required" class="error-msg">Mobile Number is required.</div>
                       <div ng-show="(!loginform.uMNumber.$valid ||loginform.uMNumber.$error.pattern) && !loginform.uMNumber.$error.required" class="error-msg">This is not a valid Mobile Number.</div>
                    </div>
                 </div>
              </div>
              <div class="form-group row user_login_container">
                 <label for="email" class="col-xs-12 text-bold form-label">Password</label>
                 <div class="col-xs-12">
                    <input type="password" class="user_login form-control" ng-model="user.password" id="uPassword" name="uPassword"  ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/" placeholder="Password" required ng-required>
                    <div ng-show="loginform.$submitted || loginform.uPassword.$touched">
                       <div ng-show="loginform.uPassword.$error.required" class="error-msg">Password is required.</div>
                       <div ng-show="loginform.uPassword.$error.password||loginform.uPassword.$error.pattern" class="error-msg">This is not a valid Password.</div>
                    </div>
                 </div>
              </div>
              <div class="form-group text-center">
                 <button type="submit" class="btn btn-primary text-bold" ng-click="login_user(user);">Login</button>
              </div>
           </form>

           <form name="update_form" id="update-form"  enctype="multipart/form-data" novalidate  method="post" class="disp-none">
               <label for="name" id="signup_error_form" class="col-xs-12 error-msg disp-none">There are errors in the submitted form.</label>
              <div class="form-group row user_login_container">
                 <label for="name" class="col-xs-12 text-bold form-label">Name</label>
                 <div class="col-xs-12">
                    <input type="text" class="user_login form-control" ng-model="user.name" name="uName"  placeholder="Name" required>
                    <div ng-show="update_form.$submitted || update_form.uName.$touched">
                       <div ng-show="update_form.uName.$error.required" class="error-msg">Name is required.</div>
                    </div>
                 </div>
              </div>
              <div class="form-group row user_login_container">
                 <label for="email" class="col-xs-12 text-bold form-label">Email</label>
                 <div class="col-xs-12">
                    <input type="email" class="user_login form-control" ng-model="user.email" name="uEmail"  ng-pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="Email">
                    <div ng-show="update_form.$submitted || update_form.uEmail.$touched">
                       <div ng-show="update_form.uEmail.$error.email||update_form.uEmail.$error.pattern" class="error-msg">This is not a valid Email-Id.</div>
                    </div>
                 </div>
              </div>
              <div class="form-group row user_login_container">
                 <label for="email" class="col-xs-12 text-bold form-label">Password</label>
                 <div class="col-xs-12">
                    <input type="password" class="user_login form-control" ng-model="user.password" id="uPassword" name="uPassword"  ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/" placeholder="Password" required>
                    <div ng-show="update_form.$submitted || update_form.uPassword.$touched">
                       <div ng-show="update_form.uPassword.$error.required" class="error-msg">Password is required.</div>
                       <div ng-show="update_form.uPassword.$error.password||update_form.uPassword.$error.pattern" class="error-msg">This is not a valid Password.</div>
                    </div>
                 </div>
              </div>
              <div class="form-group row user_login_container">
                 <label for="email" class="col-xs-12 text-bold form-label">Confirm Password</label>
                 <div class="col-xs-12">
                    <input type="password" class="user_login form-control" ng-model="user.confirm_password" pw-check="uPassword" id="uConfirmpassword" name="uConfirmpassword"  ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/" placeholder="Confirm Password" required>
                    <div ng-show="update_form.$submitted || update_form.uConfirmpassword.$touched">
                        <div ng-show="update_form.uConfirmpassword.$error.required" class="error-msg">Confirm Password is required.</div>
                        <div ng-show="update_form.uConfirmpassword.$error.pwmatch" class="error-msg">Passwords don't match.</div>
                    </div>
                 </div>
              </div>
               <div class="form-group row user_login_container">
                   <div>
                       <label for="Upload" class="col-xs-12 text-bold form-label">Selfie Image</label>
                   </div>
                   <div class="col-xs-12">
                       <input type="file"  class="upload" id="uSelfie_update"  name="uSelfie_update"   placeholder="(jpg,png,gif,bmp)"></input>
                       <div id="update_selfie_type_error" class="error-msg disp-none">Please upload the image of correct format(jpg,png,gif,bmp)</div>
                       <div id="update_selfie_size_error" class="error-msg disp-none">Please upload image less than 500K</div>
                   </div>
               </div>
               <div class="form-group row user_login_container">
                   <div>
                       <label for="Upload" class="col-xs-12 text-bold form-label">Passport Size Photo</label>
                   </div>
                   <div class="col-xs-12">
                       <input type="file"  class="upload" id="uPassport_update"  name="uPassport_update"   placeholder="(jpg,png,gif,bmp)"></input>
                       <div id="update_pp_type_error" class="error-msg disp-none">Please upload the image of correct format(jpg,png,gif,bmp)</div>
                       <div id="update_pp_size_error" class="error-msg disp-none">Please upload image less than 500K</div>
                   </div>
               </div>
               <div class="form-group row user_login_container">
                  <label for="dob" class="col-xs-12 text-bold form-label">Date of Birth</label>
                  <div class="col-xs-12" id="sandbox-container" style="position:relative;">
                      <input type="text" class="user_login form-control" ng-model="user.dob"   id="date" name="uDOB" placeholder="Date of Birth">
                  </div>
               </div>
              <div class="form-group row user_login_container">
                 <label for="gender" class="col-xs-12 text-bold form-label">Gender</label>
                 <div class="col-xs-12 text-left">
                    <input type="radio" ng-model="user.gender" value="Male"  class="form-label"  name="uGender"><span class="form-radio-txt">Male</span>
                    <input type="radio"  ng-model="user.gender" value="Female" name="uGender"><span class="form-radio-txt">Female</span>
                    <div ng-show="update_form.$submitted || update_form.uGender.$touched">
                       <div ng-show="update_form.uGender.$error.required" class="error-msg">Gender is required.</div>
                    </div>
                 </div>
              </div>
              <div class="form-group row">
                 <label for="Pincode" class="col-xs-12 text-bold form-label">Location</label>
                 <div class="col-xs-12">
                       <select class="form-control" name="uLocation" ng-model="user.location" required>
                          <option value="">-Select-</option>
                          <option ng-repeat="pincode in pincodes" value="{{pincode}}" ng-bind="pincode"></option>
                       </select>
                 </div>
              </div>
              <div class="form-group row user_login_container">
                 <label for="Profiles" class="col-xs-12 text-bold form-label">Interested Profiles</label>
                 <div class="col-xs-12">
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uPromoters"  ng-model="user.promoters"><span class="form-radio-txt">Promoters</span></label>
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uHostesses" ng-model="user.hostesses"><span class="form-radio-txt">Hostesses</span></label>
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uEmCees" ng-model="user.emcess"><span class="form-radio-txt">EmCees</span></label>
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uPamphlet" ng-model="user.pamphlet"><span class="form-radio-txt">Pamphlet Distributors</span></label>
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uModels" ng-model="user.models"><span class="form-radio-txt">Models</span></label>
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" name="uOtherprofile" ng-model="user.othersprof"><span class="form-radio-txt">Others</span></label>
                    <div class="col-xs-12 pad-left0 form-others" ng-show="user.othersprof">
                       <input type="text" class="user_login form-control" ng-model="user.other_profile" name="uOTherprofile"  placeholder="Please enter any other skill">
                    </div>
                 </div>
              </div>
              <div class="form-group row user_login_container">
                 <label for="Language" class="col-xs-12 text-bold form-label">Languages known</label>
                 <div class="col-xs-12">
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox"  id="uEnglish"  ng-model="user.english"><span class="form-radio-txt">English</span></label>
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uHindi" ng-model="user.hindi"><span class="form-radio-txt">Hindi</span></label>
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uKannada" ng-model="user.kannada"><span class="form-radio-txt">Kannada</span></label>
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uTamil" ng-model="user.tamil"><span class="form-radio-txt">Tamil</span></label>
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uMalayalam" ng-model="user.malayam"><span class="form-radio-txt">Malayalam</span></label>
                    <label class="col-sm-6 pad-left0 text-left"><input type="checkbox" id="uOtherlanguage" ng-model="user.others"><span class="form-radio-txt">Others</span></label>
                 </div>
              </div>
              <div class="form-group row user_login_container">
                 <label for="vehicle" class="col-xs-12 text-bold form-label">Do you Own a 2-Wheeler</label>
                 <div class="col-xs-12 text-left">
                    <input type="radio" ng-model="user.vehicle" value="yes"  class="form-label"  name="uVehicle"><span class="form-radio-txt">Yes</span>
                    <input type="radio"  ng-model="user.vehicle" value="no" name="uVehicle"><span class="form-radio-txt">No</span>
                    <div ng-show="update_form.$submitted || update_form.uVehicle.$touched">
                       <div ng-show="update_form.uVehicle.$error.required" class="error-msg">Please enter whether you possess a 2-wheeler or not.</div>
                    </div>
                 </div>
              </div>
              <div class="form-group row user_login_container">
                 <label for="laptop" class="col-xs-12 text-bold form-label">Do you have a laptop</label>
                 <div class="col-xs-12 text-left">
                    <input type="radio" ng-model="user.laptop" value="yes"  class="form-label"  name="uLaptop"><span class="form-radio-txt">Yes</span>
                    <input type="radio"  ng-model="user.laptop" value="no" name="uLaptop"><span class="form-radio-txt">No</span>
                    <div ng-show="update_form.$submitted || update_form.uLaptop.$touched">
                       <div ng-show="update_form.uLaptop.$error.required" class="error-msg">Please enter whether you possess a laptop or not.</div>
                    </div>
                 </div>
              </div>
              <div class="form-group row user_login_container">
                 <div class="col-xs-12">
                    <label class="col-sm-12 pad-left0 text-left"><input type="checkbox"  id="uTerms"  ng-model="user.terms" required><span class="form-radio-txt">Please accept the terms and conditions</span></label>
                 </div>
              </div>
              <div class="form-group row user_login_container">
                 <div class="col-xs-12">
                    <div class="g-recaptcha" data-sitekey="6LepPRcTAAAAANv40rrqC14V_dlYWcf2K­OX­Gvd"></div>
                 </div>
              </div>
              <div class="form-group text-center">
                 <button type="submit" class="btn btn-primary text-bold" ng-click="update_user(user);">Update</button>
              </div>
           </form>
         </div>
      </div>
   </div>
</div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
$('#sandbox-container input').datepicker({
});
</script>
