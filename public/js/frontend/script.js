$(document).ready(function() {
	if ($("#listing_table").length > 0)
	{
		var table = $('#listing_table').DataTable();
		$('#search_data_table').on('keyup', function () {
			table.search(this.value).draw();
		});

		setTimeout(function() {
			$('#listing_table').wrap('<div class="table-responsive non-border-table"></div>');
		}, 0);
	}

	$('.toggle_btn').click(function(){
		$('.side-user-dashboard').toggleClass('show-menu');
	});

	$(".submit_verif_btn").click(function(){
		// if ($("#city").val() != city_from_latlong)
		// {
		// 	alert('Your current city does not match with city you entered.');
		// }
		// else
		// {
			var parent_form = $(this).parents('form');
			if (parent_form.find('#verif_agree_btn').prop('checked'))
			{
				parent_form.submit();
			}
			else
			{
				parent_form.find(".tnc_err").remove();

				var err_html = '<div class="alert alert-danger mt-4 tnc_err">\
									<span class="login_error"><small>Please agree to terms and conditions before proceeding.</small></span>\
								</div>';

				$("#verif_agree_btn").closest('div').after(err_html);
			}
		// }
	});


	/* Pranav */
	/* $(".submit_verification_btn").click(function()
	{
		var parent_form = $(this).parents('form');

		var first_name = parent_form.find("input[name=first_name]").val();
		var last_name = parent_form.find("input[name=last_name]").val();
		var email = parent_form.find("input[name=email]").val();
		var phone = parent_form.find("input[name=phone]").val();

		var pid = parent_form.find("input[name=pid]").val();

		var age = parent_form.find('#age').prop('checked');
		var sex = parent_form.find('#sex').prop('checked');
		var location = parent_form.find('#location').prop('checked');

		/*if (age == false && sex == false && location == false)
		{
			alert('Please select atleast one checkbox');
		}
		else
		{
			// if (parent_form.find('#verif_agree_btn').prop('checked'))
			// {
				parent_form.submit();
			// }
			// else
			// {
			// 	parent_form.find(".tnc_err").remove();

			// 	var err_html = '<div class="alert alert-danger mt-4 tnc_err">\
			// 						<span class="login_error"><small>Please agree to terms and conditions before proceeding.</small></span>\
			// 					</div>';

			// 	$("#verif_agree_btn").closest('div').after(err_html);
			// }
		}
	});*/



/* Lalit start  Here */
	$("#2-post").find(".send_verif_request").click(function() {
		var first_name = $("#2-post").find('input[name=first_name]').val();
		var last_name = $("#2-post").find("input[name=last_name]").val();
		var email =  $("#2-post").find("input[name=email]").val();
		var phone =  $("#2-post").find("input[name=phone]").val();
		var age = $("#2-post").find('#age:checked').length;
		var sex = $("#2-post").find('#sex:checked').length;
		var location = $("#2-post").find('#location:checked').length;
		var letters = /^[A-Za-z]+$/;
		var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		var phoneno = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  		var country_code = phone.slice(0, 1);
  		
		if (!first_name.match(letters))
		{
			$(".validation-errors").html("Please enter valid first name.");
			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
		}

		if (!last_name.match(letters))
		{
			$(".validation-errors").html("Please enter valid last name.");
			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
		}

		if (!email.match(validEmail))
		{
			$(".validation-errors").html("Please enter valid email.");
			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
		}

		if (!phone.match(phoneno))
		{
			$(".validation-errors").html("Please enter valid phone number.");
			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
		}

		if(country_code != '+')
  		{
  			$(".validation-errors").html("Please enter mobile number with country code.");
			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
  		}

		if(age == 0 && sex == 0 && location == 0)
  		{
  			$(".validation-errors").html("Please check atleast one checkbox.");  			
  			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
  		}
		
		$("#2-post").find(".verify_user_form").submit();

	});

	$("#1-post").find(".send_verif_request").click(function() {
		var first_name = $("#1-post").find('input[name=first_name]').val();
		var last_name = $("#1-post").find("input[name=last_name]").val();
		var email =  $("#1-post").find("input[name=email]").val();
		var phone =  $("#1-post").find("input[name=phone]").val();		
		var letters = /^[A-Za-z]+$/;
		var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		var phoneno = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  		var country_code = phone.slice(0, 1);  		
  		
		if (!first_name.match(letters))
		{
			$(".validation-errors").html("Please enter valid first name.");
			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
		}

		if (!last_name.match(letters))
		{
			$(".validation-errors").html("Please enter valid last name.");
			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
		}

		if (!email.match(validEmail))
		{
			$(".validation-errors").html("Please enter valid email address.");
			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
		}

		if (!phone.match(phoneno))
		{
			$(".validation-errors").html("Please enter valid phone number.");
			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
		}

		if(country_code != '+')
  		{
  			$(".validation-errors").html("Please enter mobile number with country code.");
			setTimeout(function(){ $(".validation-errors").html(""); }, 5000);
			return false;
  		}
		
		$("#1-post").find(".verify_user_form").submit();

	});
/**************** Lalit end  ***********/

});

function save_account_settings(ele)
{
	var ftp = $(ele).closest("form").find(".ftp").val();
	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: iBASEURL + "/account-settings",
		data: {"form_data": $(ele).closest("form").serialize(), "_token": $("input[name=_token]").val()},
		success: function(result) {
			$(ele).closest("form").find(".err-alrt").removeClass("d-none");

			$(ele).closest("form").find(".alert").removeClass("alert-danger alert-success");
			var cls = result.status == 0 ? 'alert-danger' : 'alert-success';
			$(ele).closest("form").find(".alert").addClass(cls);
			
			$(ele).closest("form").find("small").html(result.message);
			if (result.status == 1 && ftp == 2) {
				$(ele).closest("form")[0].reset();
			}
		}
	});
}

$('.category_select').on('change', function()
{
	window.location.href = this.value;
});

function verify_city()
{
	if (true) {}
}