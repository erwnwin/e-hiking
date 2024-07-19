$(document).ready(function() {
    $('#nik').on('input', function() {
        var inputValue = $(this).val();
        var isValid = /^\d{0,16}$/.test(inputValue); // Regex untuk memeriksa apakah hanya digit dan maksimal 16 karakter
    
        if (!isValid) {
            // Tampilkan pesan error
            $('#nikError').text('Input hanya boleh berupa angka dan maksimal 16 digit').addClass('text-danger');
            
            // Hapus karakter non-digit dari input
            $(this).val(inputValue.replace(/[^\d]/g, ''));
        } else {
            $('#nikError').text('').removeClass('text-danger');
        }
    });

    $('#no_hp_wa').on('input', function() {
        var inputValue = $(this).val();
        var isValid = /^\d{0,16}$/.test(inputValue); // Regex untuk memeriksa apakah hanya digit dan maksimal 16 karakter
    
        if (!isValid) {
            // Tampilkan pesan error
            $('#noHPError').text('Input hanya boleh berupa angka dan maksimal 16 digit').addClass('text-danger');
            
            // Hapus karakter non-digit dari input
            $(this).val(inputValue.replace(/[^\d]/g, ''));
        } else {
            $('#noHPError').text('').removeClass('text-danger');
        }
    });


    $('#email').on('input', function() {
        var email = $(this).val();
        var isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email); // Regex untuk validasi email

        if (!isValid) {
            $('#emailInfo').text('Alamat email tidak valid').addClass('text-danger');
        } else {
            $('#emailInfo').text('').removeClass('text-danger text-small');
        }
    });

    $('#password, #confirm_password').on('input', function() {
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();

        if (password !== confirm_password && confirm_password.length > 0) {
            $('#confirmPasswordInfo').text('Konfirmasi password tidak sesuai').addClass('text-danger');
        } else {
            $('#confirmPasswordInfo').text('').removeClass('text-danger');
        }
    });

    $('#formRegister').validate({
        
        rules: {
            nama_pelanggan: {
                required: true
            },
            nik: {
                required: true,
                digits: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
            confirm_password: {
                required: true,
                equalTo: '#password'
            },
            pekerjaan: {
                required: true
            },
            alamat: {
                required: true
            },
            no_hp_wa: {
                required: true,
                digits: true
            }
        },
        messages: {
            nama_pelanggan: {
                required: 'Nama Pelanggan wajib diisi'
            },
            nik: {
                required: 'NIK wajib diisi',
                digits: 'NIK hanya boleh berisi angka'
            },
            email: {
                required: 'Alamat Email wajib diisi',
                email: 'Alamat Email tidak valid'
            },
            password: {
                required: 'Password wajib diisi',
            },
            confirm_password: {
                required: 'Konfirmasi Password wajib diisi',
                equalTo: 'Konfirmasi password harus sama dengan password'
            },
            pekerjaan: {
                required: 'Pekerjaan/Profesi wajib diisi'
            },
            alamat: {
                required: 'Alamat wajib diisi'
            },
            no_hp_wa: {
                required: 'No HP/WA wajib diisi',
                digits: 'No HP/WA hanya boleh berisi angka'
            }
        },
        errorPlacement: function(error, element) {
          
        },
        submitHandler: function(form) {

            $('#btnBuatAkun').prop('disabled', true).html('Proses Buat Akun....');

            $.ajax({
                url: 'register/act',
                type: 'POST',
                dataType: 'json',
                data: $('#formRegister').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        $('#btnBuatAkun').prop('disabled', false).html('Buat Akun');
                        Swal.fire({
                            icon: 'success',
                            title: 'Registrasi Berhasil!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            // Redirect ke halaman login setelah registrasi berhasil
                            window.location.href = response.redirect;
                        });
                    } else {
                        $('#btnBuatAkun').prop('disabled', false).html('Buat Akun');
                        Swal.fire({
                            icon: 'error',
                            title: 'Registrasi Gagal!',
                            text: response.message
                        });
                    }
                }
            });
        }
    });
});