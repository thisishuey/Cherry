var modal = function(args) {
	if (typeof(args) === 'undefined') {
		args = {};
	}
	if (typeof(args.modalTitle) === 'undefined') {
		args.modalTitle = 'Modal Title';
	}
	if (typeof(args.iframe) !== 'undefined') {
		args.body = $('<iframe>', {'width': '100%', 'height': '300', 'frameborder': '0', 'allowtransparency': true, 'src': args.iframe});
	}
	if (typeof(args.modalBody) === 'undefined') {
		args.modalBody = 'Modal Body';
	}
	if (typeof(args.cancelTitle) === 'undefined') {
		args.cancelTitle = 'Cancel';
	}
	if (typeof(args.cancelClass) === 'undefined') {
		args.cancelClass = 'btn btn-default';
	}
	if (typeof(args.confirmTitle) === 'undefined') {
		args.confirmTitle = 'OK';
	}
	if (typeof(args.confirmClass) === 'undefined') {
		args.confirmClass = 'btn btn-success';
	}
	if (typeof(args.confirmCallback) === 'undefined') {
		args.confirmCallback = function() {};
	}

	var $modal = $('<div>', {'class': 'modal fade', 'id': 'myModal', 'tabindex': '-1', 'role': 'dialog', 'aria-labelledby': 'myModalLabel', 'aria-hidden': 'true'});

	var $modalDialog = $('<div>', {'class': 'modal-dialog'});
	$modal.append($modalDialog);

	var $modalContent = $('<div>', {'class': 'modal-content'});
	$modalDialog.append($modalContent);

	var $modalHeader = $('<div>', {'class': 'modal-header'});
	$modalContent.append($modalHeader);

	var $closeButton = $('<button>', {'type': 'button', 'class': 'close', 'data-dismiss': 'modal', 'aria-hidden': 'true', 'html': '&times'});
	$modalHeader.append($closeButton);

	var $modalTitle = $('<h4>', {'class': 'modal-title', 'id': 'myModalLabel', 'html': args.modalTitle});
	$modalHeader.append($modalTitle);

	var $modalBody = $('<div>', {'class': 'modal-body container', 'html': args.modalBody});
	$modalContent.append($modalBody);

	var $modalFooter = $('<div>', {'class': 'modal-footer'});
	$modalContent.append($modalFooter);

	if (args.cancelTitle !== false) {
		var $cancelButton = $('<button>', {'type': 'button', 'class': args.cancelClass, 'data-dismiss': 'modal', 'html': args.cancelTitle});
		$modalFooter.append($cancelButton);
	}

	if (args.confirmTitle !== false) {
		var $confirmButton = $('<button>', {'type': 'button', 'class': args.confirmClass, 'html': args.confirmTitle});
		$modalFooter.append($confirmButton);
		$confirmButton.on('click', function(event) {
			event.preventDefault();
			args.confirmCallback();
			$modal.modal('hide');
		});
	}

	$modal.modal();

	$modal.on('hidden.bs.modal', function(event) {
		var $that = $(this);
		$that.removeData('modal');
		$that.remove();
	});

	return $modal;
};

$(function() {

	// These take care of the default cake alerts when setting up a new project
	$('.cake-error').addClass('alert alert-danger');
	$('.notice').parent().addClass('alert alert-warning');
	$('.error').parent().removeClass('alert-warning').addClass('alert alert-danger');
	$('.notice.success').parent().removeClass('alert-warning').addClass('alert alert-success');

});
