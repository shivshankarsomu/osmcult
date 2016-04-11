<?php include("partials/header.php"); ?>
<?php include("partials/nav_bar.php"); ?>
<div class="row margin0" style="position:relative;">
   <div ng-controller="formCtrl" style="padding-top:100px;" class="col-xs-6 col-xs-offset-3">
	<form name="pincode_form"  novalidate id="referral-form" method="post">
		<div class="row">
			<h3 class="pad-left0">Add Pincode</h3>
			<div class="alert alert-success disp-none" id="pincode_success">Pincode added successfully</div>
			<div class="alert alert-danger disp-none" id="pincode_error"></div>
			<div class="col-lg-12 pad-left0">
				<label for="PIN" class="text-bold form-label">Pincode </label>
			</div>
			<div class="col-lg-12 pad-left0">
				<div class="col-lg-7 pad-left0">
					<input ng-model="addpin.pin" type="text" name="uPincode" class="form-control addPin" placeholder="Pincode"  ng-minlength="6"   ng-maxlength="6" ng-pattern="/^[0-9]*$/"  required>
					<div ng-show="pincode_form.$submitted || pincode_form.uPincode.$touched">
					   <div ng-show="pincode_form.uPincode.$error.required" class="error-msg">Pincode is required.</div>
					   <div ng-show="(!pincode_form.uPincode.$valid ||pincode_form.uPincode.$error.pattern) && !pincode_form.uPincode.$error.required && addpin.pin!=''" class="error-msg">This is not a valid Pincode.</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 pad-left0 form-others">
				<label for=location class="text-bold form-label">Location </label>
			</div>
			<div class="col-lg-12 pad-left0 ">
				<div class="col-lg-7 pad-left0">
					<input ng-model="addpin.location" type="text" name="uLocation" class="form-control addPin" placeholder="Location" required>
					<div ng-show="pincode_form.$submitted || pincode_form.uLocation.$touched">
					   <div ng-show="pincode_form.uLocation.$error.required" class="error-msg">Location is required.</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 pad-left0 form-others">
				<button type="submit" class="btn btn-primary text-bold" ng-click="insert_pin(addpin);">Submit</button>
			</div>
	</form>
</div>
</div>
</div>
<?php include("partials/footer.php"); ?>
