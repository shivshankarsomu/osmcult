<?php include("partials/header.php"); ?>
<div class="container">
  <div class="wrapper" >
    <form name="loginform" ng-controller="formCtrl" class="form-signin" novalidate  method="post" ng-cloak>
        <h2 class="form-signin-heading">Sign In</h2>
         <div class="form-hide error-msg" id="login_form_error" >Invalid username or password.</div>
        <label for="Email" class="text-black text-normal">Email</label>
        <input type="email" class="user_login form-control" ng-model="user.email" name="uEmail" placeholder="Email" required>
        <div ng-show="loginform.$submitted || loginform.uEmail.$touched">
          <span ng-show="loginform.uEmail.$error.required" class="error-msg">Email-ID is required.</span>
        </div>

        <label for="Password">Password</label>
		<input type="password" ng-model="user.password" name="uPassword" class="form-control" placeholder="Password" required>
        <div ng-show="loginform.uPassword.$submitted || loginform.uPassword.$touched">
			<span ng-show="loginform.uPassword.$error.required" class="error-msg">Password is required.</span>
		</div>

      <button class="btn btn-lg btn-primary btn-block login_btn mar-top20" type="submit"  ng-click="login_admin_user(user)" ng-disabled="loginform.$invalid" >Login</button>
    </form>
  </div>
</div>
<?php include("partials/footer.php"); ?>
