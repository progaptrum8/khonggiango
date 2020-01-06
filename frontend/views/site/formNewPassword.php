<div class="header-for-tab">
	<a class="zmdi zmdi-chevron-left zmdi-hc-fw font-30 back-profile" href="/site/form-forgot-password"></a>
	<span>
		Change password
	</span>
</div>
<form type="POST" id="frmNewPassword">
	<div class="row-login row-middle">
		<div class="row-btn">
			<p id="messageForSubmit" class="error frmMessage <?php echo $txtMessage != null ? '' : 'hidden'; ?>"><?php echo $txtMessage; ?></p>
			<div class="form-pass active-forgot">
				<span class="zmdi zmdi-lock zmdi-hc-fw"></span>
				<input type="text" class="form-ip" name="password" id="password" placeholder="New password" <?php echo $txtMessage != null ? 'disabled' : ''; ?>>
			</div>
			<div class="form-pass active-otp">
				<span class="zmdi zmdi-lock zmdi-hc-fw"></span>
				<input type="text" class="form-ip" name="confirm_password" id="confirm_password" placeholder="Confirm password" <?php echo $txtMessage != null ? 'disabled' : ''; ?>>
				<input type="hidden" id="userId" name="userId" value="<?php echo $userId; ?>">
			</div>

			<button type="button" class="btn-login" id="btnSendSMS" onclick="login.onSaveNewPassword(); return false;" <?php echo $txtMessage != null ? 'disabled' : ''; ?>>Change password</button>
		</div>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function()
	{
		$.when(
			$.getScript( "/js/utils/api-url.js" ),
			$.getScript( '/js/login.js' ),
			$.Deferred(function( deferred ){
				$( deferred.resolve );
			})
		).done(function(){
		});
	});
</script>