$(document).ready(function () {
    var qtyProduct = 0;
    var idProduct = 0;

    $(document).on("click", '.btn_qty_down', function () {
        idProduct = $(this).closest("tr").find("#product_id").html();
        qtyProduct = $(this).closest("tr").find("#product_qty").html();

        if (qtyProduct === '0') {
            alert("Количество продукта не может быть меньше 0.");
        } else {
            qtyProduct--;
            change(idProduct, qtyProduct);
            $(this).closest("tr").find("#product_qty").html(qtyProduct)
        }
    });

    $(document).on("click", '.btn_qty_up', function () {
        idProduct = $(this).closest("tr").find("#product_id").html();
        qtyProduct = $(this).closest("tr").find("#product_qty").html();
        qtyProduct++;

        change(idProduct, qtyProduct);
        $(this).closest("tr").find("#product_qty").html(qtyProduct)
    });

    function change(id, qty) {
        $.ajax({
            url: "products/change",
            method: "POST",
            data: {
                idProduct: id,
                qtyProduct: qty
            },
            beforeSend: function () {
                $('#btn_qty_up').prop('disabled', true);
                $('#btn_qty_down').prop('disabled', true);
            },
            success: function (result) {
                if (result !== '1') {
                    alert("Ошибка изменения количества продукта!");
                }
            }
        })
            .done(function () {
                $('#btn_qty_up').prop('disabled', false);
                $('#btn_qty_down').prop('disabled', false);
            });
    }

});