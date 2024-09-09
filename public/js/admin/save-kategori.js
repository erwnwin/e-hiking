$(document).ready(function () {
	$('#formKategori').on('submit', function (event) {
		event.preventDefault(); // Mencegah form submit default

		// Tampilkan overlay
		$('#overlayKategori').removeClass('hidden');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Data akan disimpan!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#795548', // Warna coklat untuk tombol konfirmasi
			cancelButtonColor: '#6c757d', // Warna tombol batal
			confirmButtonText: 'Ya, Simpan!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				// Kirim data menggunakan AJAX
				$.ajax({
					url: 'kategori/store',
					type: 'POST',
					data: $(this).serialize(),
					dataType: 'json',
					success: function (response) {
						$('#overlayKategori').addClass('hidden'); // Sembunyikan overlay
						if (response.status === 'success') {
							// Menampilkan pesan sukses setelah data berhasil disimpan
							Swal.fire(
								'Sukses!',
								response.message,
								'success'
							).then(() => {
								$('#modalCreateKategori').modal('hide'); // Menutup modal
								$('#formKategori')[0].reset(); // Reset form
								location.reload();
							});
						} else {
							Swal.fire(
								'Gagal!',
								response.message,
								'error'
							);
						}
					},
					error: function () {
						$('#overlayKategori').addClass('hidden'); // Sembunyikan overlay
						Swal.fire(
							'Error!',
							'Terjadi kesalahan saat menyimpan data.',
							'error'
						);
					}
				});
			} else {
				$('#overlayKategori').addClass('hidden'); // Sembunyikan overlay jika dibatalkan
			}
		});
	});
});
