<section id="jobs"  ng-controller="JobsCtrl" ng-init="fetch_all_jobs();">
    <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>All Jobs</h2>
            <hr class="star-primary">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11 col-lg-offset-1 text-center">
            <ul role="tablist" class="nav nav-tabs osm-nav-tabs" >
                <li class="osm-nav-li  mar-right20  active" role="presentation">
                    <a href="javascript:void(0)" ng-click ="set_filter('All')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="tests" data-toggle="tab" role="tab" >All Jobs</a>
                </li>
                <li class="osm-nav-li mar-right20 " role="presentation">
                    <a href="javascript:void(0)" ng-click ="set_filter('promoter')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="tests" data-toggle="tab" role="tab" >Promoters</a>
                </li>
                <li class="osm-nav-li mar-right20 " role="presentation">
                    <a href="javascript:void(0)" ng-click ="set_filter('emcess')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="odis" data-toggle="tab" role="tab">Emcess</a>
                </li>
                <li class="osm-nav-li mar-right20 " role="presentation">
                    <a  href="javascript:void(0)" ng-click ="set_filter('host')"  class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="t20s" data-toggle="tab" role="tab">Hostesses</a>
                </li>
                <li class="osm-nav-li mar-right20 " role="presentation">
                    <a  href="javascript:void(0)" ng-click ="set_filter('model')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="t20s" data-toggle="tab" role="tab">Models</a>
                </li>
                <li class="osm-nav-li mar-right20 " role="presentation">
                    <a  href="javascript:void(0)" ng-click ="set_filter('pamphlet')" class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="t20s" data-toggle="tab" role="tab">Pamphlet Distribution</a>
                </li>
                <li class="osm-nav-li mar-right20 " role="presentation">
                    <a  href="javascript:void(0)" ng-click ="set_filter('others')"  class="navtab-ancr osm-font-12" aria-expanded="true" aria-controls="t20s" data-toggle="tab" role="tab">Other Profiles</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-sm-11 col-sm-offset-1">
            <div class="row">
                <div class="col-sm-4 home-jobs-crd osm-bg-white pad0 promoter"  ng-repeat="promoter in all_jobs.promoters">
                    <img src="img/portfolio/promoter.jpg"  class="img-responsive" alt="{{promoter.event_name}}" ng-attr-title="{{promoter.event_name}}">
                    <div class="card-block row ">
                        <div class="text-center text-bold card-user-name" ng-bind="promoter.event_name"></div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event ID:
                        </div>
                        <div class="col-xs-8 crd-row-rght" ng-bind="promoter.event_id"></div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event Type:
                        </div>
                        <div class="col-xs-8 crd-row-rght" >Promoter
                        </div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event Time:
                        </div>
                        <div class="col-xs-8 crd-row-rght" >
                            <i class="fa fa-calendar"></i>
                            <span ng-bind="promoter.event_time* 1000|date:'MMM d, y h:mm a'"></span>
                        </div>

                        <div class="col-xs-12 text-center pad-top15">
                            <a  data-target="#{{promoter.event_id}}" data-toggle="modal"  class="cur-point text-link" >Click for Event Description</a>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary text-bold job-apply-btn job-home disp-none"  href="javascript:void(0)" id="btn_{{promoter.event_id}}" ng-click="apply_job(promoter.event_id,promoter.event_name);">Apply</button>
                        </div>
                        <div class="modal fade col-xs-offset-3 col-xs-6 pad-top80 text-black" tabindex="-1" role="dialog"  id="{{promoter.event_id}}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                                    <h4 class="modal-title">Event Description</h4>
                                </div>
                                <div class="container row" ng-if="promoter.attire !=''">
                                    <div class="col-xs-1 crd-row-rght text-bold">Attire:</div>
                                    <div class="col-xs-11 crd-row-rght job-pad" ng-bind="promoter.attire"></div>
                                </div>
                                <div class="container">
                                    <div class="col-xs-12 crd-row-rght job-pad" ng-bind="promoter.event_desc"></div>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            <div class="col-sm-4 home-jobs-crd osm-bg-white pad0 emcess"  ng-repeat="emcess in all_jobs.emcess">
                    <img height="340" width="340" src="img/portfolio/emcess.jpg" class="img-responsive" alt="{{emcess.event_name}}" ng-attr-title="{{emcess.event_name}}">
                    <div class="card-block row ">
                        <div class="text-center text-bold card-user-name" ng-bind="emcess.event_name"></div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event ID:
                        </div>
                        <div class="col-xs-8 crd-row-rght" ng-bind="emcess.event_id"></div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event Type:
                        </div>
                        <div class="col-xs-8 crd-row-rght" >Emcees
                        </div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event Time:
                        </div>
                        <div class="col-xs-8 crd-row-rght" >
                            <i class="fa fa-calendar"></i>
                            <span ng-bind="emcess.event_time* 1000|date:'MMM d, y h:mm a'"></span>
                        </div>
                        <div class="col-xs-12 text-center pad-top15">
                            <a  data-target="#{{emcess.event_id}}" data-toggle="modal"  class="cur-point text-link">Click for Event Description</a>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary text-bold job-apply-btn job-home disp-none"  href="javascript:void(0)" id="btn_{{emcess.event_id}}" ng-click="apply_job(emcess.event_id,emcess.event_name)">Apply</button>
                        </div>
                        <div class="modal fade disp-none col-xs-offset-3 col-xs-6 pad-top80 text-black" tabindex="-1" role="dialog"  id="{{emcess.event_id}}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                                    <h4 class="modal-title">Event Description</h4>
                                </div>
                                <div class="container row" ng-if="emcess.attire !=''">
                                    <div class="col-xs-1 crd-row-rght text-bold">Attire:</div>
                                    <div class="col-xs-11 crd-row-rght job-pad" ng-bind="emcess.attire"></div>
                                </div>
                                <div class="container">
                                    <div class="col-xs-12 crd-row-rght job-pad" ng-bind="emcess.event_desc"></div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-sm-4 home-jobs-crd osm-bg-white pad0 host"  ng-repeat="host in all_jobs.hostesses">
                    <img src="img/portfolio/host.jpg" class="img-responsive" alt="{{host.event_name}}" ng-attr-title="{{host.event_name}}">
                    <div class="card-block row ">
                        <div class="text-center text-bold card-user-name" ng-bind="host.event_name"></div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event ID:
                        </div>
                        <div class="col-xs-8 crd-row-rght" ng-bind="host.event_id"></div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event Type:
                        </div>
                        <div class="col-xs-8 crd-row-rght" >Hostesses
                        </div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event Time:
                        </div>
                        <div class="col-xs-8 crd-row-rght" >
                            <i class="fa fa-calendar"></i>
                            <span ng-bind="host.event_time* 1000|date:'MMM d, y h:mm a'"></span>
                        </div>
                        <div class="col-xs-12 text-center pad-top15">
                            <a  data-target="#{{host.event_id}}" data-toggle="modal"  class="cur-point text-link">Click for Event Description</a>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary text-bold job-apply-btn job-home disp-none"  href="javascript:void(0)" id="btn_{{host.event_id}}" ng-click="apply_job(host.event_id,host.event_name)">Apply</button>
                        </div>
                        <div class="modal fade disp-none col-xs-offset-3 col-xs-6 pad-top80 text-black" tabindex="-1" role="dialog"  id="{{host.event_id}}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                                    <h4 class="modal-title">Event Description</h4>
                                </div>
                                <div class="container row" ng-if="host.attire !=''">
                                    <div class="col-xs-1 crd-row-rght text-bold">Attire:</div>
                                    <div class="col-xs-11 crd-row-rght job-pad" ng-bind="host.attire"></div>
                                </div>
                                <div class="container">
                                    <div class="col-xs-12 crd-row-rght job-pad" ng-bind="host.event_desc"></div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-sm-4 home-jobs-crd osm-bg-white pad0 model"  ng-repeat="model in all_jobs.models">
                    <img src="img/portfolio/model.jpg" class="img-responsive" alt="{{model.event_name}}" ng-attr-title="{{model.event_name}}">
                    <div class="card-block row ">
                        <div class="text-center text-bold card-user-name" ng-bind="model.event_name"></div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event ID:
                        </div>
                        <div class="col-xs-8 crd-row-rght" ng-bind="model.event_id"></div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event Type:
                        </div>
                        <div class="col-xs-8 crd-row-rght" >Models
                        </div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event Time:
                        </div>
                        <div class="col-xs-8 crd-row-rght" >
                            <i class="fa fa-calendar"></i>
                            <span ng-bind="model.event_time* 1000|date:'MMM d, y h:mm a'"></span>
                        </div>
                        <div class="col-xs-12 text-center pad-top15">
                            <a  data-target="#{{model.event_id}}" data-toggle="modal"  class="cur-point text-link">Click for Event Description</a>
                        </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary text-bold job-apply-btn job-home disp-none"  href="javascript:void(0)" id="btn_{{model.event_id}}" ng-click="apply_job(model.event_id,model.event_name)">Apply</button>
                </div>
                <div class="modal fade disp-none col-xs-offset-3 col-xs-6 pad-top80 text-black" tabindex="-1" role="dialog"  id="{{model.event_id}}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                            <h4 class="modal-title">Event Description</h4>
                        </div>
                        <div class="container row" ng-if="model.attire !=''">
                            <div class="col-xs-1 crd-row-rght text-bold">Attire:</div>
                            <div class="col-xs-11 crd-row-rght job-pad" ng-bind="model.attire"></div>
                        </div>
                        <div class="container">
                            <div class="col-xs-12 crd-row-rght job-pad" ng-bind="model.event_desc"></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-4 home-jobs-crd osm-bg-white pad0 pamphlet"  ng-repeat="pamphlet in all_jobs.pamphlets">
                    <img src="img/portfolio/pamphlet.jpg" class="img-responsive" alt="{{pamphlet.event_name}}" ng-attr-title="{{pamphlet.event_name}}">
                    <div class="card-block row ">
                        <div class="text-center text-bold card-user-name" ng-bind="pamphlet.event_name"></div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event ID:
                        </div>
                        <div class="col-xs-8 crd-row-rght" ng-bind="pamphlet.event_id"></div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event Type:
                        </div>
                        <div class="col-xs-8 crd-row-rght" >Pamphlets Distributors
                        </div>
                        <div class="col-xs-4 crd-row-left text-bold">
                            Event Time:
                        </div>
                        <div class="col-xs-8 crd-row-rght" >
                            <i class="fa fa-calendar"></i>
                            <span ng-bind="pamphlet.event_time* 1000|date:'MMM d, y h:mm a'"></span>
                        </div>
                        <div class="col-xs-12 text-center pad-top15">
                            <a  data-target="#{{pamphlet.event_id}}" data-toggle="modal"  class="cur-point text-link">Click for Event Description</a>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary text-bold job-apply-btn job-home disp-none"  href="javascript:void(0)" id="btn_{{pamphlet.event_id}}" ng-click="apply_job(pamphlet.event_id,pamphlet.event_name)">Apply</button>
                        </div>
                        <div class="modal fade disp-none col-xs-offset-3 col-xs-6 pad-top80 text-black" tabindex="-1" role="dialog"  id="{{pamphlet.event_id}}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                                    <h4 class="modal-title">Event Description</h4>
                                </div>
                                <div class="container row" ng-if="pamphlet.attire !=''">
                                    <div class="col-xs-1 crd-row-rght text-bold">Attire:</div>
                                    <div class="col-xs-11 crd-row-rght job-pad" ng-bind="pamphlet.attire"></div>
                                </div>
                                <div class="container">
                                    <div class="col-xs-12 crd-row-rght job-pad" ng-bind="pamphlet.event_desc"></div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-sm-4 home-jobs-crd osm-bg-white pad0 others"  ng-repeat="others in all_jobs.other_profiles">
                <img src="img/portfolio/others.jpg" class="img-responsive" alt="{{others.event_name}}" ng-attr-title="{{others.event_name}}">
                <div class="card-block row ">
                    <div class="text-center text-bold card-user-name" ng-bind="others.event_name"></div>
                    <div class="col-xs-4 crd-row-left text-bold">
                        Event ID:
                    </div>
                    <div class="col-xs-4 crd-row-left text-bold">
                        Event   Type:
                    </div>
                    <div class="col-xs-8 crd-row-rght" >Other Profile
                    </div>
                    <div class="col-xs-8 crd-row-rght" ng-bind="others.event_id"></div>
                    <div class="col-xs-4 crd-row-left text-bold">
                        Event Time:
                    </div>
                    <div class="col-xs-8 crd-row-rght" >
                        <i class="fa fa-calendar"></i>
                        <span ng-bind="others.event_time* 1000|date:'MMM d, y h:mm a'"></span>
                    </div>
                    <div class="col-xs-12 text-center pad-top15">
                        <a  data-target="#{{others.event_id}}" data-toggle="modal"  class="cur-point text-link">Click for Event Description</a>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary text-bold job-apply-btn job-home disp-none"  href="javascript:void(0)" id="btn_{{others.event_id}}" ng-click="apply_job(others.event_id,others.event_name)">Apply</button>
                    </div>
                    <div class="modal fade disp-none col-xs-offset-3 col-xs-6 pad-top80 text-black" tabindex="-1" role="dialog"  id="{{others.event_id}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                                <h4 class="modal-title">Event Description</h4>
                            </div>
                            <div class="container row" ng-if="others.attire !=''">
                                <div class="col-xs-1 crd-row-rght text-bold">Attire:</div>
                                <div class="col-xs-11 crd-row-rght job-pad" ng-bind="others.attire"></div>
                            </div>
                            <div class="container">
                                <div class="col-xs-12 crd-row-rght job-pad" ng-bind="others.event_desc"></div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</section>
