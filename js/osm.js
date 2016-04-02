var osm = angular.module('osm', []);
osm.directive('pwCheck', [function () {
    return {
      require: 'ngModel',
      link: function (scope, elem, attrs, ctrl) {
        var firstPassword = '#' + attrs.pwCheck;
        elem.add(firstPassword).on('keyup', function () {
          scope.$apply(function () {
            var v = elem.val()===$(firstPassword).val();
            ctrl.$setValidity('pwmatch', v);
          });
        });
      }
    }
  }]);
osm.controller('formCtrl', ['$scope','$http','$filter',function($scope,$http,$filter){
$scope.master 			= {};
$scope.pincodes 		= [];
$scope.test             ="shiv";
    $scope.reset = function() {
           $scope.user = angular.copy($scope.master);
    };

    $scope.contact_us = function(sender) {
        var m_data = new FormData();
        m_data.append('uName',$scope.sender.name);
        m_data.append('uMNumber',$scope.sender.mnumber);
        m_data.append('uEmail',$scope.sender.email);
        m_data.append('uSubject',$scope.sender.subject);
        m_data.append('uMessage',$scope.sender.message);
        $.ajax({
            method  : 'POST',
            url     : 'helpers/mail.php',
            data    : m_data,
            processData: false,
            contentType: false
        }).success(function(data) {
            if (!data.success) {
                $("#contact-success-form").hide();
                $("#contact-error-form").show();
            } else {
                $("#contact-error-form").hide();
                $("#contact-success-form").show();
                $("#contactForm").hide();
            }
        });
    };

    $scope.get_profile_data = function() {
               $.ajax({
                   method  : 'POST',
                   url     : 'db/profile_data.php',
                   processData: false,
                   contentType: false
               }).success(function(data) {
                   if (!data.success) {

                } else {
                    $scope.$apply(function () {
                        $scope.user = {};
                        $scope.pincodes = data.pincode;
                        $scope.user.name                = data.name;
                        $scope.user.email               = data.email;
                        $scope.user.password            = data.password;
                        $scope.user.confirm_password    = data.password;
                        var dob                         = data.dob.split('-');
                        $scope.user.dob                 = dob[1] + '/' + dob[2] + '/' + dob[0];
                        $scope.user.gender              = data.gender;
                        $scope.user.selfie_image        = data.selfie_image;
                        $scope.user.passport_image      = data.passport_image;
                        $scope.user.location            = data.location;
                        $scope.user.promoters           = data.promoters;
                        $scope.user.hostesses           = data.hostesses;
                        $scope.user.emcess              = data.emcess;
                        $scope.user.pamphlet            = data.pamphlet;
                        $scope.user.models              = data.models;
                        $scope.user.othersprof          = data.othersprof;
                        $scope.user.others              = data.others;
                        $scope.user.english             = data.english;
                        $scope.user.hindi               = data.hindi;
                        $scope.user.kannada             = data.kannada;
                        $scope.user.tamil               = data.tamil;
                        $scope.user.malayam             = data.malayam;
                        $scope.user.vehicle             = data.vehicle;
                        $scope.user.laptop              = data.laptop;
                    });

                }
               });

    };

    $scope.referral_code =function (user){
        var m_data = new FormData();
        m_data.append('uCode',$scope.user.referral_code);
        $.ajax({
            method  : 'POST',
            url     : 'db/referral.php',
            data    : m_data,
            processData: false,
            contentType: false
        }).success(function(data) {
            if (!data.success) {
                $("#invalid_code").hide();
                $("#used_code").hide();
                if(data.msg == 'Invalid'){
                    $("#invalid_code").show();
                }
                if(data.msg == 'Used'){
                    $("#used_code").show();
                }
			} else {
                $scope.$apply(function () {
                    $scope.pincodes = data.pincode;
				});
                $("#invalid_code").hide();
                $("#used_code").hide();
                $("#referral-form").hide();
                $("#signup_form").show();

			}
        });
    }
    $scope.signup_user =function (user){
        var m_data = new FormData();
        var selfie_ext = $("#uSelfie").val().split('.').pop().toLowerCase();
        var pp_ext = $("#uPassport").val().split('.').pop().toLowerCase();
        var valid_data = true;
        if(selfie_ext == ""){
            $("#selfie_type_error").show();
            $("#signup_error_form").show();
            valid_data = false;
        }
        if(valid_data){
            $("#selfie_type_error").hide();
            $("#signup_error_form").hide();
            if(pp_ext == ""){
                $("#pp_type_error").show();
                $("#signup_error_form").show();
                valid_data = false;
            }
        }
        if(valid_data){
            $("#pp_type_error").hide();
            $("#signup_error_form").hide();
            if($.inArray(selfie_ext, ['jpg','jpeg','png','gif','bmp']) == -1 && selfie_ext!="") {
                $("#selfie_type_error").show();
                $("#signup_error_form").show();
                valid_data = false;
            }
        }
        if(valid_data){
            $("#selfie_type_error").hide();
            $("#signup_error_form").hide();
            $('#uSelfie').bind('change', function() {
                selfie_size = this.files[0].size/1024;
                if(selfie_size > 500){
                    valid_data = false;
                    $("#signup_error_form").show();
                    $("#selfie_size_error").show();
                }
            });
        }
       if(valid_data){
           $("#selfie_type_error").hide();
           $("#selfie_size_error").hide();
           $("#signup_error_form").hide();
           if($.inArray(pp_ext, ['jpg','jpeg','png','gif','bmp']) == -1) {
               $("#pp_type_error").show();
               $("#signup_error_form").show();
               valid_data = false;
           }
       }
       if(valid_data){
           $("#pp_type_error").hide();
           $("#signup_error_form").hide();
           $('#uPassport').bind('change', function() {
               pp_size = this.files[0].size/1024;
               if(pp_size > 500){
                   valid_data = false;
                   $("#signup_error_form").show();
                   $("#pp_size_error").show();
               }
           });
       }
       if(valid_data){
           $("#signup_error_form").show();
           $("#pp_size_error").show();
           m_data.append('uCode',$scope.user.referral_code);
           m_data.append('uName',$scope.user.name);
           m_data.append('uMNumber',$scope.user.mnumber);
           m_data.append('uEmail',$scope.user.email);
           m_data.append('uPassword',$scope.user.password);
           m_data.append('uDOB',$('#date').val());
           m_data.append('uGender',$scope.user.gender);
           m_data.append('uLocation',$scope.user.location);
           m_data.append('uPromoters',$scope.user.promoters);
           m_data.append('uHostesses',$scope.user.hostesses);
           m_data.append('uEmCees',$scope.user.emcess);
           m_data.append('uSelfie',$('input[name=uSelfie]')[0].files[0]);
           m_data.append('uPassport',$('input[name=uPassport]')[0].files[0]);
           m_data.append('uPamphlet',$scope.user.pamphlet);
           m_data.append('uModels',$scope.user.models);
           m_data.append('uOtherprof',$scope.user.othersprof);
           m_data.append('uOTherprofile',$scope.user.other_profile);
           m_data.append('uEnglish',$scope.user.english);
           m_data.append('uHindi',$scope.user.hindi);
           m_data.append('uKannada',$scope.user.kannada);
           m_data.append('uTamil',$scope.user.tamil);
           m_data.append('uMalayalam',$scope.user.malayam);
           m_data.append('uVehicle',$scope.user.vehicle);
           m_data.append('uLaptop',$scope.user.laptop);
           m_data.append('uTerms',$scope.user.terms);
           $.ajax({
               method  : 'POST',
               url     : 'db/signup.php',
               data    : m_data,
               processData: false,
               contentType: false
           }).success(function(data) {
               if (!data.success) {
                   if(data.msg == ""){
                       $("#signup_error_form").show();
                   }else{
                       $("#signup_error_form").text(data.msg);
                       $("#signup_error_form").show();
                   }
               } else {
                   $("#signup_form").hide();
                   $scope.$apply(function () {
                       $scope.reset();
                   })
                   $("#login-form").show();
               }
           });
       }
    }

    $scope.login_user =function (user){
        var m_data = new FormData();
        var mobile_no = $scope.user.mnumber;
		m_data.append('uMNumber',$scope.user.mnumber);
        m_data.append('uPassword',$scope.user.password);
        $.ajax({
            method  : 'POST',
            url     : 'db/login.php',
            data    : m_data,
            processData: false,
            contentType: false
        }).success(function(data) {
            if (!data.success) {
                $("#login_error_form").show();
			} else {
                $("#login-form").hide();
                $scope.$apply(function () {
                    $scope.reset();
                })
                var obj = [];
                obj.push(mobile_no);
                obj.push(data.name);
                createCookie("login_user",obj,100);
                $("#forms_modal").modal('hide');
                $(".modal-title").text( "Login" );
                read_cookie();
                setTimeout(function(){
                    $(".job-apply-btn").show();
                }, 2000);
			}
        });

    }
    $scope.update_user =function (user){
        var m_data = new FormData();
        var selfie_ext = $("#uSelfie_update").val().split('.').pop().toLowerCase();
        var pp_ext = $("#uPassport_update").val().split('.').pop().toLowerCase();
        var valid_data = true;
        if(selfie_ext == ""){
            $("#update_selfie_type_error").show();
            $("#update_error_form").show();
            valid_data = false;
        }
        if(valid_data){
            $("#update_selfie_type_error").hide();
            $("#update_error_form").hide();
            if(pp_ext == ""){
                $("#update_pp_type_error").show();
                $("#update_error_form").show();
                valid_data = false;
            }
        }
        if(valid_data){
            $("#update_pp_type_error").hide();
            $("#update_error_form").hide();
            if($.inArray(selfie_ext, ['jpg','jpeg','png','gif','bmp']) == -1 && selfie_ext!="") {
                $("#update_selfie_type_error").show();
                $("#update_error_form").show();
                valid_data = false;
            }
        }
        if(valid_data){
            $("#selfie_type_error").hide();
            $("#update_error_form").hide();
            $('#uSelfie_update').bind('change', function() {
                selfie_size = this.files[0].size/1024;
                if(selfie_size > 500){
                    valid_data = false;
                    $("#update_error_form").show();
                    $("#update_selfie_size_error").show();
                }
            });
        }
        if(valid_data){
           $("#update_selfie_type_error").hide();
           $("#update_selfie_size_error").hide();
           $("#update_error_form").hide();
           if($.inArray(pp_ext, ['jpg','jpeg','png','gif','bmp']) == -1) {
               $("#update_pp_type_error").show();
               $("#update_error_form").show();
               valid_data = false;
           }
        }
        if(valid_data){
           $("#update_pp_type_error").hide();
           $("#update_error_form").hide();
           $('#uPassport').bind('change', function() {
               pp_size = this.files[0].size/1024;
               if(pp_size > 500){
                   valid_data = false;
                   $("#update_error_form").show();
                   $("#update_pp_size_error").show();
               }
           });
        }
        if(valid_data){
           $("#update_error_form").show();
           $("#update_pp_size_error").show();
           m_data.append('uCode',$scope.user.referral_code);
           m_data.append('uName',$scope.user.name);
           m_data.append('uMNumber',$scope.user.mnumber);
           m_data.append('uEmail',$scope.user.email);
           m_data.append('uPassword',$scope.user.password);
           m_data.append('uDOB',$('#date').val());
           m_data.append('uGender',$scope.user.gender);
           m_data.append('uLocation',$scope.user.location);
           m_data.append('uPromoters',$scope.user.promoters);
           m_data.append('uHostesses',$scope.user.hostesses);
           m_data.append('uEmCees',$scope.user.emcess);
           m_data.append('uSelfie',$('input[name=uSelfie_update]')[0].files[0])
           m_data.append('uPassport',$('input[name=uPassport_update]')[0].files[0])
           m_data.append('uPamphlet',$scope.user.pamphlet);
           m_data.append('uModels',$scope.user.models);
           m_data.append('uOtherprof',$scope.user.othersprof);
           m_data.append('uOTherprofile',$scope.user.other_profile);
           m_data.append('uEnglish',$scope.user.english);
           m_data.append('uHindi',$scope.user.hindi);
           m_data.append('uKannada',$scope.user.kannada);
           m_data.append('uTamil',$scope.user.tamil);
           m_data.append('uMalayalam',$scope.user.malayam);
           m_data.append('uVehicle',$scope.user.vehicle);
           m_data.append('uLaptop',$scope.user.laptop);
           m_data.append('uTerms',$scope.user.terms);
        $.ajax({
            method  : 'POST',
            url     : 'db/profile_update.php',
            data    : m_data,
            processData: false,
            contentType: false
        }).success(function(data) {
            if (!data.success) {
                $("#update_error_form").show();
			} else {
                    $("#update_error_form").hide();
                $scope.$apply(function () {
                    $scope.reset();
                });
                $("#update_success_form").show();
			}
        });
    }
    }

    function createCookie(name, value, days) {
        var date, expires;
        if (days) {
            date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            expires = "; expires="+date.toGMTString();
        } else {
            expires = "";
        }
       document.cookie = name+"="+value+expires+"; path=/";
   }
   function read_cookie(){
       var cookie_value = get_cookie("login_user");
       if(cookie_value != ""){
           var str = cookie_value.split(',');
           $("#loginusername").text(str[1]);
           $("#SignupBtn").hide();
           $("#SignupBtn").hide();
           $("#loginBtn").hide();
           $("#logoutBtn").show();
           $("#login-user").show();
       }
   }
}]);
osm.controller('JobsCtrl', ['$scope','$http','$filter',function($scope,$http,$filter){
    $scope.all_jobs = {};
    $scope.fetch_all_jobs = function() {
                  $.ajax({
                      method  : 'POST',
                      url     : 'db/job_fetch/all_jobs.php',
                      processData: false,
                      contentType: false
                  }).success(function(data) {
                      if (!data.success) {
                          $scope.$apply(function () {
                              $scope.all_jobs = data;
                          });

                      }
                  });

       };
       $scope.get_prof_page_data = function() {
                  $.ajax({
                      method  : 'POST',
                      url     : 'db/profile_page.php',
                      processData: false,
                      contentType: false
                  }).success(function(data) {
                     $scope.user = data.profile_data;
                     $scope.all_jobs = data.all_jobs;
                     $scope.applied_jobs = data.applied_jobs;
                  });

       };
       $scope.set_filter = function(value) {
           if(value != 'All'){
               $('.promoter').hide();
               $('.model').hide();
               $('.emcess').hide();
               $('.host').hide();
               $('.pamphlet').hide();
               $('.others').hide();
               $('.' + value).show();
           } else {
               $('.promoter').show();
               $('.model').show();
               $('.emcess').show();
               $('.host').show();
               $('.pamphlet').show();
               $('.others').show();
           }
       };

       $scope.set_applied_filter = function(value) {
           if(value != 'all'){
               $(".jobstatus_0" ).hide();
               $(".jobstatus_1" ).hide();
               $(".jobstatus_-1" ).hide();
               $(".jobstatus_" + value).show();
           } else {
               $(".jobstatus_0" ).show();
               $(".jobstatus_1" ).show();
               $(".jobstatus_-1" ).show();
           }
       };
       $scope.apply_job = function(jobid,jobname) {
           var m_data = new FormData();
           m_data.append('jobid',jobid);
           m_data.append('jobname',jobname);
           $.ajax({
               method  : 'POST',
               url     : 'db/apply_job.php',
               data    : m_data,
               processData: false,
               contentType: false
           }).success(function(data) {
               if(data.success){
                   $("#btn_" + jobid).hide();
               } else {
                   alert('You have already applied for the job');
               }
           });

       };

       $scope.applied_jobs = function() {
           $.ajax({
               method  : 'POST',
               url     : 'db/applied_job.php',
               processData: false,
               contentType: false
           }).success(function(data) {
               if(data.success){
                   $scope.$apply(function () {
                       $scope.applied_jobs = data.jobs;
                   });
               }
           });

       };

}]);
