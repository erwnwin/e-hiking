// assets/js/lupa_password.js

$(document).ready(function() {
    $('#formLupaPassword').submit(function(e) {
        e.preventDefault();

        $('#btnLupaPass').prop('disabled', true).html('Proses Kirim Link....');

        $.ajax({
            url: 'lupa-password/kirim-link-reset',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    $('#btnLupaPass').prop('disabled', false).html('Reset Password');

                    Swal.fire({
                        icon: 'success',
                        title: 'Email Reset Telah Terkirim',
                        text: response.message
                    });

                    $('#email').val('');
                } else {
                    $('#btnLupaPass').prop('disabled', false).html('Reset Password');

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                $('#btnLupaPass').prop('disabled', false).html('Reset Password');

                Swal.fire({
                    icon: 'error',
                    title: 'AJAX Error',
                    text: 'Terjadi kesalahan saat menghubungi server.'
                });
            }
        });
    });
});
