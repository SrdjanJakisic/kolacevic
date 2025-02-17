$(document).ready(function () {

    loadcart();
    loadwishlist();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".addToCartBtn").on("click", function (e) {
        e.preventDefault();

        var productId = $(this)
            .closest(".product_data")
            .find(".productId")
            .val();
        var productQty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();

        var url = $(this).attr('data-url');

        $.ajax({
            type: "POST",
            url: url,
            data: {
                productId: productId,
                productQty: productQty,
            },
            success: function (response) {
                swal(response.status);
                loadcart();
            },

        });
    });

    $(".addToWishlist").on("click", function (e) {
        e.preventDefault();

        var productId = $(this)
            .closest(".product_data")
            .find(".productId")
            .val();

        var url = $(this).attr('data-url');

        $.ajax({
            method: "POST",
            url: url,
            data: {
                productId: productId,
            },
            success: function (response) {
                swal(response.status);
                loadwishlist();
            }
        });
    });

    $(".increment-btn").on("click", function (e) {
        e.preventDefault();

        var inc_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });

    $(".decrement-btn").on("click", function (e) {
        e.preventDefault();

        var dec_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });

    $(".delete-cart-item").on("click", function (e) {
        e.preventDefault();

        var productId = $(this)
            .closest(".product_data")
            .find(".productId")
            .val();
        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                productId: productId,
            },
            success: function (response) {
                $.ajax({
                    type:"GET",
                    url: "cart",
                    success: function(response) {
                        $("body").html(response);
                        swal("Успешно обрисано!");
                    }
                })
            },
        });
    });

    $(".remove-wishlist-item").on("click", function () {
        var productId = $(this)
            .closest(".product_data")
            .find(".productId")
            .val();
        $.ajax({
            type: "POST",
            url: "delete-wishlist-item",
            data: {
                productId: productId,
            },
            success: function (response) {
                $.ajax({
                    type:"GET",
                    url: "wishlist",
                    success: function(response) {
                        $("body").html(response);
                        swal("Успешно обрисано!");
                    }
                })
            },
        });
    });

    $(".changeQty").on("click", function (e) {
        e.preventDefault();

        var productId = $(this)
            .closest(".product_data")
            .find(".productId")
            .val();
        var prodQty = $(this).closest(".product_data").find(".qty-input").val();
        data = {
            productId: productId,
            productQty: prodQty,
        };

        $.ajax({
            type: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            },
        });
    });

    function loadcart()
    {
        $.ajax({
            method: "GET",
            url: window.routes.cartRoute,
            success: function (response) {
                $('.cart-count').html('')
                $('.cart-count').html(response.count)
                console.log(response.count)
            }
        })
    }
    function loadwishlist() {
        $.ajax({
            method: "GET",
            url: window.routes.wishlistRoute,
            success: function (response) {
                $('.wishlist-count').html('')
                $('.wishlist-count').html(response.count)
                console.log(response.count)
            }
        })
    }
})
