<div class="header-for-tab">
    <a class="zmdi zmdi-chevron-left zmdi-hc-fw font-30 back-profile" onclick="common.goFirstPage()"></a>
    <span>
        Login
    </span>
</div>
<form type="POST" id="loginFrm">
        <div class="row-login">
            <div class="row-btn">
            <p id="loginFail" class="hidden">Username or Password is incorrect</p>
            <div class="form-user">
                <span class="zmdi zmdi-account zmdi-hc-fw"></span>
                <input type="text" class="form-ip" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-pass">
                <span class="zmdi zmdi-lock zmdi-hc-fw"></span>
                <input type="password" name="password" id="password" class="form-ip" placeholder="Password">
            </div>
            <a class="forgot-pw" href="/site/form-forgot-password">Forgot password</a>
            <!-- <div class="social-auth-links text-center">
                <a class="facebook" href="/auth/auth?authclient=facebook"><i class="zmdi zmdi-facebook zmdi-hc-fw"></i> Log in with Facebook</a>
            </div> -->
                <button type="button" class="btn-login" onclick="login.doLogin(this);return false;">
					<span class="spinner"></span> Login
				</button>
            </div>
        </div>
</form>

<script type="text/javascript">
    $(document).ready(function()
    {
		$.when(
			$.getScript( '/js/mobile.js' ),
			$.getScript( '/js/login.js' ),
			$.Deferred(function( deferred ){
				$( deferred.resolve );
			})
		).done(function(){
		});
    });
</script>