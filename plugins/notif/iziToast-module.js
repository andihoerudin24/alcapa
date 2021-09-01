function notif_success(message) {
	iziToast.success({
	    title: '',
	    message: message,
	});
}

function notif_failed(message) {
	iziToast.error({
	    title: '',
	    message: message,
	});
}