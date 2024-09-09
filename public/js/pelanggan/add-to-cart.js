$(document).ready(function () {

	$('.add-to-cart-form-two').on('submit', function (e) {
		e.preventDefault();
		var formData = $(this).serialize();

		$.ajax({
			type: 'POST',
			url: '../../cart/add_to_cart',
			data: formData,
			success: function (response) {
				var res = JSON.parse(response);
				if (res.status == 'success') {
					Swal.fire('Success', res.message, 'success').then(() => {
						window.location.href = res.redirect;
					});
					loadCartItems();
				} else {
					Swal.fire('Error', res.message, 'error');
				}
			}
		});
	});

});
