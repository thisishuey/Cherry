$(function() {

	// These take care of the default cake alerts when setting up a new project
	$('.cake-error').addClass('alert alert-danger');
	$('.notice').parent().addClass('alert alert-warning');
	$('.notice.success').parent().removeClass('alert-warning').addClass('alert-success');

});
