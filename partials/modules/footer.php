<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-3">
                    <h3 class="text-left">reach us</h3>
                    <div class="row osm-reach-us">
                        <div>OSMCULT Team</div>
                        <div>Plot No-49/1</div>
                        <div>Bangalore</div>
                    </div>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Follow us on</h3>
                    <ul class="list-inline" style="margin-top:-14px;">
                        <li>
                            <a href="https://www.facebook.com/OSMCult" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/105908706207542267836/about" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/osm_cult" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://in.linkedin.com/in/the-osm-cult-a24a67b7" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-5">
                    <h3 class="text-left">Contact Us</h3>
                    <div ng-controller="formCtrl">
                        <div class="contact-error-msg contct-frm-msg disp-none" id="contact-error-form">There are errors in your submitted form.</div>
                        <div class="text-left contct-frm-msg disp-none" id="contact-success-form">Thanks for giving your feedback.</div>
                        <form name="form" id="contactForm" novalidate>
                            <div class="row control-group">
                                <div class="form-group col-xs-10 controls">
                                    <input type="text" class="form-control contact-form" ng-model="sender.name" name="uName" placeholder="Name" id="uName" required>
                                    <div ng-show="form.$submitted || form.uName.$touched">
                                        <div ng-show="form.uName.$error.required" class="contact-error-msg">Name is required.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-10 controls">
                                    <input type="text" class="form-control contact-form" ng-model="sender.email" name="uEmail"  ng-pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="Email" id="uEmail" required>
                                    <div ng-show="form.$submitted || form.uEmail.$touched">
                                        <div ng-show="form.uEmail.$error.required" class="contact-error-msg">Email-ID is required.</div>
                                        <div ng-show="form.uEmail.$error.email||form.uEmail.$error.pattern" class="contact-error-msg">This is not a valid Email-Id.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-10 controls">
                                    <input type="text" class="form-control contact-form" ng-model="sender.mobile" name="uMNumber"  ng-minlength="10"   ng-maxlength="10" ng-pattern="/^[0-9]*$/" placeholder="Mobile" id="uMobile" required>
                                    <div ng-show="form.$submitted || form.uMNumber.$touched">
                                        <div ng-show="form.uMNumber.$error.required" class="contact-error-msg">Mobile Number is required.</div>
                                        <div ng-show="(!form.uMNumber.$valid ||form.uMNumber.$error.pattern) && !form.uMNumber.$error.required && user.mnumber!=''" class="contact-error-msg">This is not a valid Mobile Number.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-10 controls">
                                    <input type="text" class="form-control contact-form" ng-model="sender.subject" name="uSubject" placeholder="Subject" id="uSubject" required>
                                    <div ng-show="form.$submitted || form.uSubject.$touched">
                                        <div ng-show="form.uSubject.$error.required" class="contact-error-msg">Subject is required.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-10 controls">
                                    <textarea class="form-control" rows="5" name="uMessage" ng-model="sender.message" placeholder="Message" id="uMessage" required></textarea>
                                    <div ng-show="form.$submitted || form.uMessage.$touched">
                                        <div ng-show="form.uMessage.$error.required" class="contact-error-msg">Message is required.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-2 pad-left0">
                                <button type="submit" class="btn btn-success" ng-click="contact_us(sender);">Send</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; OSMCULT Team
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- <script src="js/osm.min.js"></script> -->
<script src="lib/jquery.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="lib/angular.min.js"></script>
<script src="lib/bootstrap.min.js"></script>
<script src="js/osm.js"></script>
<script src="js/osm-lib.js"></script>
<script src="lib/classie.js"></script>
<script src="lib/cbpAnimatedHeader.js"></script>
<script src="lib/freelancer.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>


</body>

</html>
