$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault();

        $('#btnLogin').prop('disabled', true).html('Login proses....');

        $.ajax({
            url: 'login/authenticate',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    // Redirect to dashboard or desired page on successful login
                    $('#btnLogin').prop('disabled', false).html('Login');

                    window.location.href = 'dashboard';
                } else {
                    // Handle different error messages
                    if (response.message == 'Alamat Email belum diaktivasi') {
                        // SweetAlert for inactive email
                        $('#btnLogin').prop('disabled', false).html('Login');
                        Swal.fire({
                            icon: 'warning',
                            title: 'Opsss',
                            text: 'Alamat Email belum diaktivasi. Silakan cek email Anda untuk aktivasi.',
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: 'Oke'
                        });
                    } else {
                        // SweetAlert for other errors
                        $('#btnLogin').prop('disabled', false).html('Login');
                        Swal.fire({
                            icon: 'error',
                            title: 'Opsss',
                            text: response.message,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: 'Oke'
                        });
                    }
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'AJAX Error',
                    text: 'Terjadi kesalahan saat menghubungi server.'
                });
            }
        });
    });
});
