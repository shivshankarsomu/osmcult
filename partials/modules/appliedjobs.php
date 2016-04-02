<!-- Contact Section -->
<section id="appliedjobs"  >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>APPLIED JOBS</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <ul role="tablist" class="nav nav-tabs osm-nav-tabs">
                    <li class="osm-nav-li  mar-right20  active" role="presentation">
                        <a href="javascript:void(0)" ng-click ="set_applied_filter('all')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="tests" data-toggle="tab" role="tab" >Applied</a>
                    </li>
                    <li class="osm-nav-li  mar-right20" role="presentation">
                        <a href="javascript:void(0)" ng-click ="set_applied_filter(1)" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="tests" data-toggle="tab" role="tab" >Approved</a>
                    </li>
                    <li class="osm-nav-li  mar-right20" role="presentation">
                        <a href="javascript:void(0)" ng-click ="set_applied_filter(0)" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="odis" data-toggle="tab" role="tab">Pending</a>
                    </li>
                    <li class="osm-nav-li  mar-right20" role="presentation">
                        <a href="javascript:void(0)" ng-click ="set_applied_filter(-1)" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="odis" data-toggle="tab" role="tab">Rejected</a>
                    </li>
                </ul>
                <table class="jobs_table" >
                    <tr>
                        <th class="text-bold">Sl.No</th>
                        <th class="text-bold">Job Id</th>
                        <th class="text-bold">Job Name</th>
                        <th class="text-bold">Approved</th>
                   <tr>
                   <tr ng-repeat="job in applied_jobs" class="jobstatus_{{job.status}}">
                       <td ng-bind="$index + 1"></td>
                       <td ng-bind="job.jobid"></td>
                       <td ng-bind="job.jobname"></td>
                       <td ng-if="job.status != 0"><i class="osm-font-18" ng-class="{'fa fa-check':job.status == 1, 'fa fa-times':job.status == -1}"></i></td>
                       <td ng-if="job.status == 0" ng-bind="'!'" class="text-bold osm-font-18"></td>
               </table>
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->

            </div>
        </div>
    </div>
</section>
