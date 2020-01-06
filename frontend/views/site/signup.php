<div class="header-for-tab">
    <a class="zmdi zmdi-chevron-left zmdi-hc-fw font-30 back-profile" onclick="common.goFirstPage()"></a>
    <span>
        Sign Up
    </span>
</div>
<div class="row-login" id="signUpPage">
    <div class="row-btn">
        <h2>Create an account with your mobile number</h2>
        <form action="#" method="POST" id="signup-form">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
            <div class="form-fullname">
                <span class="zmdi zmdi-account zmdi-hc-fw"></span>
                <input type="text" class="form-ip" name="fullname" id="fullname" placeholder="Full name">
            </div>
            <div class="form-user">
                <span class="zmdi zmdi-account zmdi-hc-fw"></span>
                <input type="text" class="form-ip" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-dt">
                <span class="zmdi zmdi-phone zmdi-hc-fw"></span>
                <input type="number" class="form-ip" name="phone" id="phone" placeholder="Phone Number">
            </div>
            <div class="form-pass">
                <span class="zmdi zmdi-lock zmdi-hc-fw"></span>
                <input type="password" class="form-ip" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-pass">
                <span class="zmdi zmdi-lock zmdi-hc-fw"></span>
                <input type="password" class="form-ip" id="cfpassword" name="cfpassword" placeholder="Confirm Password">
            </div>
            <div class="form-check">
                <label class="lb-ch cusLblSignUp" for="checkbox" onclick="signup.showTermsAndPrivacy();">By signing up, you're read and agreed with our
                    Terms of Use and Privacy policy
                </label>
                <input id="checkbox" name="termAndPrivacyChb" type="checkbox" class="checkbox checkbox-login float-left">
                
			</div>
            <button type="button" class="btn-signup whiteBg textGreenColor" onclick="signup.saveUser();return false;">Sign Up</button>
            <!-- <p class="or">or</p>
            <div class="social-auth-links text-center">
                <a class="facebook" href="/auth/auth?authclient=facebook"><i class="zmdi zmdi-facebook zmdi-hc-fw"></i> Sign up with Facebook</a>
            </div> -->
        </form>

    </div>
</div>
<div id="termsAndPrivacy" class="hidden">
    <?php include_once("termsAndPrivacy.php") ;?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $.getScript('/js/signup.js', function () {
            signup.validate();
        }, false);
        if (isMobile.isAndroid()) {
            $('#signUpPage').removeClass('row-login');
            $('#signUpPage').addClass('row-login-android');
        }
        
    });
</script>