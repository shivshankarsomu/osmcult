function show_login_form(){
    $("#referral-form").hide();
    $("#signup_form").hide();
    $("#login-form").show();
    $("#update-form").text( "Login" );
}
function show_profile_form(){
    $("#referral-form").hide();
    $("#signup_form").hide();
    $("#login-form").hide();
    $("#update-form").show();
    $(".modal-title").text( "Profile Update" );
}

function change_date_format(){
    var date_parts = $('#date').val().split('/');
    $('#date').val(date_parts[1] + "/" + date_parts[0] + "/" + date_parts[2]);
}
function show_signup_form(){
    $("#referral-form").show();
    $("#signup_form").hide();
    $("#login-form").hide();
    $(".job-apply-btn").show();
    $(".modal-title").text( "Sign Up" );
}
 function logout_user(){
     $.ajax({
           method  : 'POST',
           url     : 'db/logout.php',
           processData: false,
           contentType: false
       }).success(function(data) {
           if (data.success) {
               delete_cookie("login_user","abc",100);
               $("#login-user").hide();
               $("#SignupBtn").show();
               $("#loginBtn").show();
               $("#logoutBtn").hide();
           }
       })
}


function read_cookie(){
    var cookie_value = get_cookie("login_user");

    if(cookie_value != ""){
        var str = cookie_value.split(',');
        $("#loginusername").text(str[1]);
        $("#SignupBtn").hide();
        $("#loginBtn").hide();
        $("#login-user").show();
        $("#logoutBtn").show();
        if(window.location.href.toLowerCase().indexOf('profile') !=-1){
            angular.element("#formCenter").scope().get_profile_data();
        }
        setTimeout(function(){
            $(".job-apply-btn").show();
        }, 3000);
    }
}
function get_cookie(cookiename) {
  var cookiestring=RegExp(""+cookiename+"[^;]+").exec(document.cookie);
  return unescape(!!cookiestring ? cookiestring.toString().replace(/^[^=]+./,"") : "");
 }
function delete_cookie(name, value, days) {
    var date, expires;
    if (days) {
        date = new Date();
        date.setTime(date.getTime()-(days*24*60*60*1000));
        expires = "; expires="+date.toGMTString();
    } else {
        expires = "";
    }
   document.cookie = name+"="+value+expires+"; path=/";
}
$(document).ready(function(){
    read_cookie();
});
