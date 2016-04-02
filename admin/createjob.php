<?php include("partials/header.php"); ?>
<?php include("partials/nav_bar.php"); ?>
<div class="row margin0" style="position:relative;">
   <div ng-controller="JobsCtrl" style="padding-top:100px;" class="col-xs-6 col-xs-offset-3" ng-init="event.job_type = 'Promoter'">
       <form name="create_form" id="create-form" novalidate  method="post">
           <label for="name" id="create_error_form" class="col-xs-12 error-msg disp-none">There are errors in the submitted form.</label>
           <div class="form-group row">
              <label for="Pincode" class="col-xs-12 text-bold form-label">Job Type</label>
              <div class="col-xs-12">
                    <select class="form-control" name="uLocation" ng-model="event.job_type" required>
                       <option value="Promoter">Promoter</option>
                       <option value="Emcesss">Emcesss</option>
                       <option value="Hostesses">Hostesses</option>
                       <option value="Models">Models</option>
                       <option value="Pamphlets">Pamphlets</option>
                       <option value="others">Others Profiles</option>
                    </select>
              </div>
           </div>

           <div class="form-group row user_login_container">
             <label for="name" class="col-xs-12 text-bold form-label">Event Name</label>
             <div class="col-xs-12">
                <input type="text" class="user_login form-control" ng-model="event.name" name="uName"  placeholder="Event Name" required>
                <div ng-show="create_form.$submitted || create_form.uName.$touched">
                   <div ng-show="create_form.uName.$error.required" class="error-msg">Event Name is required.</div>
                </div>
             </div>
          </div>
          <div class="form-group row user_login_container">
            <label for="name" class="col-xs-12 text-bold form-label">Event Description</label>
            <div class="col-xs-12">
               <textarea type="text" class="user_login form-control" ng-model="event.desc" name="uDesc"  placeholder="Event Description" required></textarea>
               <div ng-show="create_form.$submitted || create_form.uDesc.$touched">
                  <div ng-show="create_form.uDesc.$error.required" class="error-msg">Event Description is required.</div>
               </div>
            </div>
         </div>
         <div class="form-group row user_login_container">
           <label for="name" class="col-xs-12 text-bold form-label">SMS Description</label>
           <div class="col-xs-12">
              <textarea type="text" class="user_login form-control" ng-model="event.sms" name="uSMS"  placeholder="Event Description less than 120 characters"  ng-maxlength="160" required></textarea>
              <div ng-show="create_form.$submitted || create_form.uSMS.$touched">
                 <div ng-show="create_form.uSMS.$error.required" class="error-msg">SMS Description is required.</div>
                     <div ng-show="(!create_form.uSMS.$valid) && !create_form.uSMS.$error.required && event.sms!=''" class="error-msg">Please enter the description less than 120 characters</div>
              </div>
           </div>
        </div>
         <div class="form-group row user_login_container">
           <label for="name" class="col-xs-12 text-bold form-label">Attire</label>
           <div class="col-xs-12">
              <textarea type="text" class="user_login form-control" ng-model="event.attire" name="uAttire"  placeholder="Attire" required></textarea>
           </div>
        </div>
        <div class="form-group row user_login_container">
           <label for="dob" class="col-xs-12 text-bold form-label">Event Date</label>
           <div class="col-xs-12" id="sandbox-container" style="position:relative;">
               <input type="text" class="user_login form-control" ng-model="event.date"   id="date" name="uDate" placeholder="Date of Event">
           </div>
        </div>
        <div class="form-group row user_login_container">
          <label for="name" class="col-xs-12 text-bold form-label">No of People required</label>
          <div class="col-xs-12">
              <input type="text" class="user_login form-control" ng-model="event.people" name="uPeople"  ng-pattern="/^[0-9]*$/" placeholder="Event Name" required>
              <div ng-show="create_form.$submitted || create_form.uPeople.$touched">
                 <div ng-show="create_form.uPeople.$error.required" class="error-msg">No of People required.</div>
                 <div ng-show="create_form.uPeople.$error.pattern && !create_form.uPeople.$error.required" class="error-msg">This is not a valid Number.</div>
              </div>
          </div>
       </div>
       <div class="form-group row user_login_container">
         <label for="name" class="col-xs-12 text-bold form-label">No of Female required</label>
         <div class="col-xs-12">
             <input type="text" class="user_login form-control" ng-change="check_female();" ng-model="event.female" name="uFemale"  ng-pattern="/^[0-9]*$/" placeholder="Event Name" required>
             <div ng-show="create_form.$submitted || create_form.uFemale.$touched">
                <div ng-show="create_form.uFemale.$error.required" class="error-msg">No of Female required.</div>
                <div ng-show="create_form.uFemale.$error.pattern && !create_form.uFemale.$error.required" class="error-msg">This is not a valid Number.</div>
             </div>
             <div ng-show="check_female();" class="error-msg">No of Females cannot be greater cannot be greater than total number of people</div>
         </div>
      </div>
       <div class="form-group text-center">
         <button type="submit" class="btn btn-primary text-bold" ng-click="create_job(event);">Submit</button>
        </div>
       </form>
   </div>
</div>
<?php include("partials/footer.php"); ?>
