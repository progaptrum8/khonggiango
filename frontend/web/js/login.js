var login = {
	expireTime: null,
	button: null,
	offset: null,
	countTime: null,
	validate: function() {
		$("#loginFrm").validate({
			rules:
			{
				username :
				{
					required : true,
					maxlength : 255
				},
				password : {
					required : true,
					minlength : 6,
					maxlength : 16
				},
			}
		});

		$("#frmForgotPassword").validate({
			rules:
			{
				phone :
				{
					required : true,
					minlength: 8,
					maxlength: 16,
				}
			}
		});

		$("#frmNewPassword").validate({
			rules:
			{
				password :
				{
					required : true,
					minlength : 6,
					maxlength : 16
				},
				confirm_password:
				{
					required : true,
					minlength : 6,
					maxlength : 16,
					equalTo: "#password"
				}
			}
		});
	},
	doLogin: function(element) {
		login.validate();

		if ($("#loginFrm").valid())
		{
			$(element).attr('disabled', true);

			$.ajax({
				type : 'POST',
				data : $('#loginFrm').serialize(),
				url : '/auth/login',
				cache : false,
				success: function (dataReturn)
				{
					var objData = JSON.parse(dataReturn);
					if (objData['status'] == "success")
					{
						Mobile.loginForMobile(objData.idUser);

						// for update idUser on mobile
						setTimeout(() => {
							if (objData['isAnswerPreference'] == 0 || objData['isAnswerPreference']==null) // not answer preference
								window.location.href = "/preference/first-page-preference";
							else
								window.location.href = "/site/home";
						}, 500);
					}
					else
					{
						$(element).removeAttr('disabled');
						$("#loginFail").html(objData['message']);
						$("#loginFail").removeClass('hidden');
					}
				},
				error: function () {
					$(element).removeAttr('disabled');
					$("#loginFail").html('Error! Try again');
					$("#loginFail").removeClass('hidden');
				}
			});
		}
	},
	onSendForgotPassword: function(button)
	{
		login.validate();

		if ($("#frmForgotPassword").valid())
		{
			$('#errForSubmit').removeClass('hidden').addClass('hidden');

			$.ajax({
				type: ApiUrl.sendSMSForgotPassword.type,
				url: ApiUrl.sendSMSForgotPassword.url,
				data: $('#frmForgotPassword').serialize(),
				cache : false,
				success: function(response)
				{
					if (response.status == 'success')
					{
						$('#btnConfirmOTP').attr('disabled', true);
						$('.active-otp').removeClass('hidden');
						$('.active-forgot').addClass('hidden');

						var data = response.data;
						login.expireTime = data.expireTime;
						login.offset = data.offset;
						login.button = $('#btnConfirmOTP');
						login.setCountTimeOTP();

						login.countTime = setInterval(function(){
							login.setCountTimeOTP();
						 }, 500);

						return;
					}

					if (response.status == 'error')
					{
						$('#errForSubmit').text(response.message).removeClass('hidden');
						return;
					}

					console.log(response.message);
				}
			});
		}
	},
	setCountTimeOTP: function()
	{
		var button = login.button, expireTime = login.expireTime, offset = login.offset;

		var currentTime = moment.utc().utcOffset(Number(offset)).format('YYYY-MM-DD HH:mm:ss');
		expireTime = moment(expireTime).valueOf();
		var diff = moment.duration(moment(expireTime).diff(moment(currentTime)));

		var minutes = diff.minutes();
		var seconds = diff.seconds();

		if (minutes< 10)
		{
			minutes = ['0', minutes].join('');
		}

		if (seconds < 10)
		{
			seconds = ['0', seconds].join('');
		}

		diff = [minutes, seconds].join(':');

		if (minutes == 0 && seconds == 0)
		{
			$('.active-forgot').removeClass('hidden');
			$('.active-otp').addClass('hidden');

			clearInterval(login.countTime);

			return;
		}

		$(button).html(['Expired (', diff, ')'].join(''));
	},
	onActiveButton: function()
	{
		var otpValue = $('#otp_code').val();

		if (otpValue.length == 6)
		{
			clearInterval(login.countTime);
			login.countTime = null;
			$(login.button).removeAttr('disabled').text('Next');
		}
		else
		{
			if (!login.countTime)
			{
				login.countTime = setInterval(function(){
					login.setCountTimeOTP();
				}, 500);
			}

			$(login.button).attr('disabled', true);
		}
	},
	onSubmitOTP: function()
	{
		$('#errForSubmit').removeClass('hidden').addClass('hidden');

		$.ajax({
			type: ApiUrl.checkOTPCode.type,
			url: ApiUrl.checkOTPCode.url,
			data: $('#frmForgotPassword').serialize(),
			cache : false,
			success: function(response)
			{
				if (response.status == 'success')
				{
					var otp = $('#otp_code').val();
					window.location.href= '/site/form-new-password?code=' + otp;
					return;
				}

				if (response.status == 'error')
				{
					$('#infoForSubmit').html(response.message);
					return;
				}

				console.log(response.message);
			}
		});
	},
	onSaveNewPassword: function()
	{
		login.validate();

		if (!$("#frmNewPassword").valid())
		{
			return;
		}

		$('#messageForSubmit').removeClass('error');

		$.ajax({
			type: ApiUrl.saveNewPassword.type,
			url: ApiUrl.saveNewPassword.url,
			data: $('#frmNewPassword').serialize(),
			cache : false,
			success: function(response)
			{
				if (response.status == 'success')
				{
					$('#messageForSubmit').removeClass('error hidden').text('Password changed!');

					setTimeout(() => {
						window.location.href= '/site/login';
					}, 1000);
					return;
				}

				if (response.status == 'error')
				{
					$('#messageForSubmit').removeClass('hidden').addClass('error').text(response.message);
					return;
				}

				console.log(response.message);
			}
		});
	}
};