$(document).ready(function () {
	// Menampilkan modal dan mengatur transaction_id
	$(document).on('click', '[data-toggle="#modalUbahStatus"]', function () {
		var transactionId = $(this).data('transaction-id');
		$('#transaction_id').val(transactionId);
		$('#modalUbahStatus').modal('show');
	});

	// Menangani pengiriman form menggunakan AJAX
	$('#updateStatusForm').on('submit', function (e) {
		e.preventDefault(); // Mencegah pengiriman form yang biasa

		var formData = $(this).serialize(); // Ambil data form

		$.ajax({
			url: '../update-status', // Ganti dengan URL yang sesuai
			type: 'POST',
			data: formData,
			success: function (response) {
				// Mengambil data dari server (misalnya status sukses atau error)
				var responseData = JSON.parse(response);

				if (responseData.status === 'success') {
					$('#modalUbahStatus').modal('hide');
					alert('Status updated successfully');
					location.reload(); // Reload halaman untuk melihat perubahan
				} else {
					alert('Failed to update status');
				}
			},
			error: function () {
				alert('Failed to update status');
			}
		});
	});
});
