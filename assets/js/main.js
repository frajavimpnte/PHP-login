$(document)
// register form
.on("submit", "form.js-register", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val()
	}

	if (dataObj.email.length < 6) {
		_error
			.text("Please enter a valid email address")
			.show();
		return false;
	} else if (dataObj.password.length < 11) {
		_error
			.text("Please enter a passphase that is at least 11 character long.")
			.show();
		return false;
	}

	// Assuming the code gets this far, we can star the ajax process
	
	// This is for DEBUGIN purposes!!!
	//alert('form was submitted');
	//console.log(dataObj);

	//ajax
	$.ajax({
		type: 'POST',
		url: '/ajax/register.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		console.log(data);
		if (data.redirect !== undefined) {
			window.location = data.redirect;
		} else if (data.error !== undefined ) {
			_error
				.text(data.error)
				.show();
		}
		//For DEBUG
		//alert(data.name);
	})
	.fail(function ajaxFailed(e) {
		// This failed
		//console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		//console.log('Always');
	});

	_error.hide();

	return false;
})
// login form
.on("submit", "form.js-login", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val()
	}

	if (dataObj.email.length < 6) {
		_error
			.html("Please enter a valid email address")
			.show();
		return false;
	} else if (dataObj.password.length < 11) {
		_error
			.text("Please enter a passphase that is at least 11 character long.")
			.show();
		return false;
	}

	// Assuming the code gets this far, we can star the ajax process
	
	// This is for DEBUGIN purposes!!!
	//alert('form was submitted');
	//console.log(dataObj);
	
	//ajax
	$.ajax({
		type: 'POST',
		url: '/ajax/login.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		console.log(data);
		if (data.redirect !== undefined) {
			window.location = data.redirect;
		} else if (data.error !== undefined ) {
			_error
				.html(data.error)
				.show();
		}
		//For DEBUG
		//alert(data.name);
	})
	.fail(function ajaxFailed(e) {
		// This failed
		//console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		//console.log('Always');
	});

	_error.hide();

	return false;
})