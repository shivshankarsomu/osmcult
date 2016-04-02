<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php#page-top">OSMCULT</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="index.php#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="index.php#page-top">Home</a>
                </li>
                <li class="page-scroll">
                    <a href="#profile">Profile</a>
                </li>
                <li class="page-scroll">
                    <a href="#jobs">All Jobs</a>
                </li>
                <li class="page-scroll">
                    <a href="#appliedjobs">Applied Jobs</a>
                </li>
                <li class="page-scroll" ng-cloak>
                    <a class="cur-point" data-target="#forms_modal" data-toggle="modal"  id="loginBtn" onclick="show_login_form();"><i class="fa fa-sign-in"></i><span class="form-radio-txt">Login</span></a>
                </li>
                <li class="page-scroll" ng-cloak>
                    <a class="cur-point" data-target="#forms_modal" data-toggle="modal"  id="SignupBtn" onclick="show_signup_form();"><i class="fa fa-key"></i><span class="form-radio-txt">Register</span></a>
                </li>
                <li class="page-scroll disp-none" ng-cloak >
                    <a href="profile.php" id="login-user" style="display:none;"><i class="fa fa-user"></i><span id="loginusername" class="form-radio-txt"></span>'s<span class="form-radio-txt">Dashboard</span></a>
                </li>
                <li class="page-scroll disp-none" ng-cloak>
                    <a class="cur-point" id="logoutBtn" onclick="logout_user();"style="display:none;">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
