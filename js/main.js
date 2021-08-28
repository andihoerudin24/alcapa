$('.btn-resi').click(function() {
	var vendor = $('select[name="orders_shipping_method"] option:selected').text();
	var no_resi = $('input[name="orders_resi"]').val();
	$('.checked-vendor').html(vendor);
	$('.checked-resi').html(no_resi);
});