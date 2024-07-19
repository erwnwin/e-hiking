$(document).ready(function() {
    loadCartItems();

    $('.add-to-cart-form-detail').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'cart/add_to_cart',
            data: formData,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    Swal.fire('Success', res.message, 'success');
                    loadCartItems();
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            }
        });
    });

    function loadCartItems() {
        $.ajax({
            url: 'cart/get_cart_items',
            success: function(response) {
                $('#cart-items').html(response);
            }
        });
    }

    $(document).on('click', '.remove-cart-item', function() {
        var cartId = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: 'cart/remove_from_cart',
            data: {
                cart_id: cartId
            },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    Swal.fire('Success', res.message, 'success');
                    loadCartItems();
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            }
        });
    });

    $('#checkout-button').on('click', function() {
        window.location.href = 'form-penyewaan/checkout';
    });


    

});

