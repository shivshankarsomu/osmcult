<?php include("partials/modules/header.php"); ?>
<?php include("partials/modules/pages_navbar.php"); ?>
    </header>
<!-- Portfolio Grid Section -->
<div id="forms_section" ng-controller="JobsCtrl" ng-init="get_prof_page_data();">
<section id="profile" style="padding-top:215px;"  >
    <div class="container">
        <div class="row">
                    <div class="col-lg-offset-4 col-lg-4 text-center card profile-card" >
  <img class=" img-circle img-responsive img-prfile-card" ng-src="images/{{user.selfie_image}}"  ng-attr-title="{{user.name}}">
  <div class="card-block row ">
    <div class="text-bold card-user-name" ng-bind="user.name"></div>
        <div class="col-xs-4 crd-row-left text-bold">
            Email:
        </div>
        <div class="col-xs-8 crd-row-rght" ng-bind="user.email"></div>
        <div class="col-xs-4 crd-row-left text-bold">
            Date of Birth:
        </div>
        <div class="col-xs-8 crd-row-rght" ng-bind="user.dob"></div>
        <div class="col-xs-4 crd-row-left text-bold">
            Gender:
        </div>
        <div class="col-xs-8 crd-row-rght" ng-bind="user.gender"></div>
        <div class="col-xs-4 crd-row-left text-bold">
            Location:
        </div>
        <div class="col-xs-8 crd-row-rght" ng-bind="user.location"></div>
        <div class="col-xs-12 text-center pad-top15">
            <a  data-target="#forms_modal" data-toggle="modal"  class="cur-point" onclick="show_profile_form();">Edit Profile Information</a>
        </div>
  </div>
</div>
        </div>
    </div>
</section>
<?php include("partials/modules/alljobs.php"); ?>
<?php include("partials/modules/appliedjobs.php"); ?>
</div>
<?php include("partials/modules/footer.php"); ?>
<?php include("partials/widgets/forms_modal.php"); ?>
