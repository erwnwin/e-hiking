$(document).ready(function() {
    $('#pay-button').on('click', function() {

        var initialPayment = $('#initial_payment').val().trim();
        var rentalDuration = $('#rental_duration').val().trim();
        var proofofpayment = $('#proof_of_payment').val().trim();

        if (initialPayment === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Jumlah Pembayaran Awal wajib diisi!'
            });
            return;
        } else if (rentalDuration === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lama / Durasi Sewa wajib diisi!'
            });
            return;
        } else if (proofofpayment === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Bukti Transfer wajib diisi!'
            });
            return;
        }

        $.ajax({
            type: 'POST',
            url: '../cart/pay_initial_payment',
            data: {
                initial_payment: initialPayment,
                rental_duration: rentalDuration,
                proof_of_payment: proofofpayment
            },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: res.message
                    }).then((result) => {
                        // Reload current page (checkout page)
                        location.reload();
                    });
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            }
        });
    });
});
