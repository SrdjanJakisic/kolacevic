$(document).ready(function () {
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

        $.ajax({
            type: "POST",         
            url: "{{route('addToCart')}}",
            data: {
                productId: productId,
                productQty: productQty,
            },
            success: function (response) {
                swal(response.status);
            },
        });
    });

    $(".addToWishlist").on("click", function (e) {
        e.preventDefault();

        var productId = $(this)
            .closest(".product_data")
            .find(".productId")
            .val();

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                productId: productId,
            },
            success: function (response) {
                swal(response.status);
            },
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
                window.location.reload();
                swal("Успешно обрисано!");
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
                window.location.reload();
                swal("Успешно обрисано!");
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

    $(".discount").on("click", function (e) {
        e.preventDefault();

        var discount5 = $(this).closest(".discount_data").find(".discount5").val();
        var total_price = $(this).closest(".discount_data").find(".total_price").val();

        $.ajax({
            type: "POST",
            url: "/discount-five",
            data: {
                discount5: discount5,
                total_price: total_price,
            },
            success: function (response) {
                window.location.reload();
            },
        });
    });
});
