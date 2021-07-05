$(document).ready(function () {
    $(document).on("click", ".btn_hide_row", function () {
        $(this).closest("tr").hide();
        var idCurrentProduct = $(this).closest("tr").find("#product_id").html();

        $.ajax({
            url: "products/hide",
            method: "POST",
            data: {
                idProduct: idCurrentProduct
            },
            beforeSend: function () {
                $('#btn_hide_row').prop('disabled', true);
            },
            success: function (result) {
                if (result !== '1') {
                    alert("Ошибка сокрытия записи");
                }
            }
        })
            .done(function () {
                $('#btn_add_product').prop('disabled', false)
            });
    });
});
