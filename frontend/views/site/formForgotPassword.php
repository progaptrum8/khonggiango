<div class="header-for-tab">
	<a class="zmdi zmdi-chevron-left zmdi-hc-fw font-30 back-profile" href="/site/login"></a>
	<span>
		Find your account
	</span>
</div>
<form type="POST" id="frmForgotPassword">
	<div class="row-login row-middle">
		<div class="row-btn">
		<p id="errForSubmit" class="frmMessage error hidden">Enter your phone number</p>
		<p id="infoForSubmit" class="active-otp frmMessage hidden">Please confirm your indentity with your OTP</p>
		<div class="form-dt active-forgot">
			<span class="zmdi zmdi-phone zmdi-hc-fw"></span>
			<input type="text" class="form-ip" name="phone" id="phone" value="" placeholder="Phone number">
		</div>
		<div class="form-pass active-otp hidden">
			<span class="zmdi zmdi-lock zmdi-hc-fw"></span>
			<input type="text" class="form-ip" name="otp_code" id="otp_code" maxlength="6" onkeyup="login.onActiveButton();" placeholder="OTP">
		</div>
		<button type="button" class="btn-login active-forgot" id="btnSendSMS" onclick="login.onSendForgotPassword(this); return false;">Get Code</button>
		<button type="button" class="btn-login active-otp hidden" id="btnConfirmOTP" onclick="login.onSubmitOTP(); return false;">Next</button>
		</div>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function()
	{
		$.when(
			$.getScript( "/js/moment.js" ),
			$.getScript( "/js/utils/api-url.js" ),
			$.getScript( '/js/login.js' ),
			$.Deferred(function( deferred ){
				$( deferred.resolve );
			})
		).done(function(){
		});
	});
</script>