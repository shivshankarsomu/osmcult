<?php include("partials/header.php"); ?>
<?php include("partials/nav_bar.php"); ?>
<div class="row" style="position:relative;">
   <div ng-controller="JobsCtrl" ng-init ="fetch_all_jobs()" style="min-height:1000px;">
      <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12" style="padding-top:100px;padding-left:120px;">
         <ul role="tablist" class="nav nav-tabs osm-nav-bar">
             <li class="mar-right20 active nav-tab" role="presentation">
                 <a href="javascript:void(0)" ng-click ="set_filter('All')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="tests" data-toggle="tab" role="tab" >All Jobs</a>
             </li>
             <li class="mar-right20" role="presentation">
                 <a href="javascript:void(0)" ng-click ="set_filter('promoter')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="tests" data-toggle="tab" role="tab" >Promoters</a>
             </li>
             <li class="mar-right20" role="presentation">
                 <a href="javascript:void(0)" ng-click ="set_filter('emcess')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="odis" data-toggle="tab" role="tab">Emcess</a>
             </li>
             <li class="mar-right20" role="presentation">
                 <a  href="javascript:void(0)" ng-click ="set_filter('host')"  class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="t20s" data-toggle="tab" role="tab">Hostesses</a>
             </li>
             <li class="mar-right20" role="presentation">
                 <a  href="javascript:void(0)" ng-click ="set_filter('model')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="t20s" data-toggle="tab" role="tab">Models</a>
             </li>
             <li class="mar-right20" role="presentation">
                 <a  href="javascript:void(0)" ng-click ="set_filter('pamphlet')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="t20s" data-toggle="tab" role="tab">Pamphlet Distribution</a>
             </li>
             <li class="mar-right20" role="presentation">
                 <a  href="javascript:void(0)" ng-click ="set_filter('other_profiles')"  class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="t20s" data-toggle="tab" role="tab">Other Profiles</a>
             </li>
         </ul>
         <table class="jobs_table">
             <tr>
                 <th class="text-bold">Job Id</th>
                 <th class="text-bold">Job Name</th>
                 <th class="text-bold">Event Time</th>
                 <th class="text-bold">No. of People</th>
                 <th class="text-bold">Male</th>
                 <th class="text-bold">Female</th>
            <tr>
            <tr ng-repeat="job in all_jobs.promoters" class="promoter_jobs">
                <td ><a ng-href="job_detail.php?{{job.event_id}}" class ="job_id" ng-bind="job.event_id"></a></td>
                <td ng-bind="job.event_name"></td>
                <td ng-bind="job.event_time*1000|date:'medium'"></td>
                <td ng-bind="job.no_of_persons_required"></td>
                <td ng-bind="job.no_of_male_required"></td>
                <td ng-bind="job.no_of_female_required"></td>
            </tr>
            <tr ng-repeat="job in all_jobs.emcess" class="emcess_jobs">
                <td ><a ng-href="job_detail.php?{{job.event_id}}" class ="job_id" ng-bind="job.event_id"></a></td>
                <td ng-bind="job.event_name"></td>
                <td ng-bind="job.event_time*1000|date:'medium'"></td>
                <td ng-bind="job.no_of_persons_required"></td>
                <td ng-bind="job.no_of_male_required"></td>
                <td ng-bind="job.no_of_female_required"></td>
            </tr>
            <tr ng-repeat="job in all_jobs.hostesses" class="host_jobs">
                <td ><a ng-href="job_detail.php?{{job.event_id}}" class ="job_id" ng-bind="job.event_id"></a></td>
                <td ng-bind="job.event_name"></td>
                <td ng-bind="job.event_time*1000|date:'medium'"></td>
                <td ng-bind="job.no_of_persons_required"></td>
                <td ng-bind="job.no_of_male_required"></td>
                <td ng-bind="job.no_of_female_required"></td>
            </tr>
            <tr ng-repeat="job in all_jobs.models" class="model_jobs">
                <td ><a ng-href="job_detail.php?{{job.event_id}}" class ="job_id" ng-bind="job.event_id"></a></td>
                <td ng-bind="job.event_name"></td>
                <td ng-bind="job.event_time*1000|date:'medium'"></td>
                <td ng-bind="job.no_of_persons_required"></td>
                <td ng-bind="job.no_of_male_required"></td>
                <td ng-bind="job.no_of_female_required"></td>
            </tr>
            <tr ng-repeat="job in all_jobs.pamphlets" class="pamphlet_jobs">
                <td ><a ng-href="job_detail.php?{{job.event_id}}" class ="job_id" ng-bind="job.event_id"></a></td>
                <td ng-bind="job.event_name"></td>
                <td ng-bind="job.event_time*1000|date:'medium'"></td>
                <td ng-bind="job.no_of_persons_required"></td>
                <td ng-bind="job.no_of_male_required"></td>
                <td ng-bind="job.no_of_female_required"></td>
            </tr>
            <tr ng-repeat="job in all_jobs.other_profiles" class="other_profiles_jobs">
                <td ><a ng-href="job_detail.php?{{job.event_id}}" class ="job_id" ng-bind="job.event_id"></a></td>
                <td ng-bind="job.event_name"></td>
                <td ng-bind="job.event_time*1000|date:'medium'"></td>
                <td ng-bind="job.no_of_persons_required"></td>
                <td ng-bind="job.no_of_male_required"></td>
                <td ng-bind="job.no_of_female_required"></td>
            </tr>
        </table>
   </div>
   </div>
</div>
<?php include("partials/footer.php"); ?>
