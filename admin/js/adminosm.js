var adminosm = angular.module('adminosm', []);
adminosm.controller('formCtrl', ['$scope','$http','$filter',function($scope,$http,$filter){
$scope.master 			= {};
$scope.pincodes 		= [];
$scope.test             ="shiv";
    $scope.login_admin_user = function(user){
        var m_data = new FormData();
        var mobile_no = $scope.user.mnumber;
        m_data.append('uEmail',$scope.user.email);
        m_data.append('uPassword',$scope.user.password);
        $.ajax({
            method  : 'POST',
            url     : 'db/login.php',
            data    : m_data,
            processData: false,
            contentType: false
        }).success(function(data) {
            if (!data.success)
                $("#login_form_error").show();
            else{
                console.log(window.location.href);
                window.location.href = window.location.href + 'alljobs.php';
                $("#login_form_error").hide();

            }
        });
        $scope.create_pin = function(addpin){
            console.log("hello");
            // var m_data = new FormData();
            // m_data.append('Pincode',$scope.addpin.pin);
            // m_data.append('location',$scope.addpin.Loc);
            // console.log(m_data);
            // $.ajax({
            //     method  : 'POST',
            //     url     : '../db/create_Pin.php',
            //     data    : m_data,
            //     processData: true,
            //     contentType: true
            // }).success(function(data) {
            //     console.log(data);
            // });
        }
    }
}]);

adminosm.controller('JobsCtrl', ['$scope','$http','$filter',function($scope,$http,$filter){
    $scope.fetch_all_jobs = function() {
                  $.ajax({
                      method  : 'POST',
                      url     : 'db/all_jobs.php',
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
       $scope.check_female = function() {
           if(angular.isDefined($scope.event) && angular.isDefined($scope.event.people) && angular.isDefined($scope.event.female)){
               if(parseInt($scope.event.female) > parseInt($scope.event.people)){
                   return true;
               }
           }
            return false;
       };

       $scope.create_job = function (event) {
           var m_data = new FormData();
           m_data.append('JobType',$scope.event.job_type);
           m_data.append('EName',$scope.event.name);
           m_data.append('EDesc',$scope.event.desc);
           m_data.append('ESMS',$scope.event.sms);
           m_data.append('EAttire',$scope.event.attire);
           m_data.append('EPeople',$scope.event.people);
           m_data.append('EFemale',$scope.event.female);
           var male = $scope.event.people - $scope.event.female;
           m_data.append('EMale',male);
           $.ajax({
               method  : 'POST',
               url     : 'db/create_job.php',
               data    : m_data,
               processData: false,
               contentType: false
           }).success(function(data) {
               console.log(data);
           });
       }
       $scope.set_filter = function(value) {
           console.log(value);
           if(value != 'All'){
               $('.promoter_jobs').hide();
               $('.model_jobs').hide();
               $('.emcess_jobs').hide();
               $('.host_jobs').hide();
               $('.pamphlet_jobs').hide();
               $('.other_profiles_jobs').hide();
               $('.' + value +'_jobs').show();
           } else {
               $('.promoter_jobs').show();
               $('.model_jobs').show();
               $('.emcess_jobs').show();
               $('.host_jobs').show();
               $('.pamphlet_jobs').show();
               $('.other_profiles_jobs').show();
           }
       };
}]);
