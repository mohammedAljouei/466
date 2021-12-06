$(function() {

	function checkEndDate()
	{

		var date1 = $('#finishdate').val();
		date1 = date1.split("-");
var newDate1 = new Date( date1[2], date1[1] - 1, date1[0]);
var dateNum1 = newDate1.getTime();



		var date2 = $('#startdate').val();
		date2 = date2.split("-");
		var newDate2 = new Date( date2[2], date2[1] - 1, date2[0]);
		var dateNum2 = newDate2.getTime();


	var a = (((((dateNum1 - dateNum2) * 0.001) / 60) / 60) /24) ;
	if (a != $('#duration').val()) {
		alert('finish date does not match the duration of the task');
		return false;
		
	}else{
		return true;
	}
		
	
	}


	// Get the form.
	var form = $('#contact-form');

	// Get the messages div.
	var formMessages = $('.form-message');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();
		if (checkEndDate()) {
				var formData = $(form).serialize();

		
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');

			$(formMessages).text(response);

			$('#contact-form input,#contact-form textarea').val('');
		})
		.fail(function(data) {
			$(formMessages).removeClass('success');
			$(formMessages).addClass('error');

			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});
		}


	
	});

});
