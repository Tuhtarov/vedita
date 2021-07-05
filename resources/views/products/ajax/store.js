$(document).ready(function () {
    $('#btn_add_product').on('click', function () {
        var formInput = $('#product_form');

        function getFormData($form) {
            var unindex_array = $form.serializeArray();
            var index_array = {};

            $.map(unindex_array, function (element, i) {
                index_array[element['name']] = element['value'];
            });

            return index_array;
        }

        var dataProduct = getFormData(formInput);
        var newProduct = {
            product: dataProduct
        }

        //отправка данных в метод actionStore, контроллера ProductsController (через url)
        $.ajax({
            url: "products/store",
            method: "POST",
            cache: false,
            data: newProduct,
            beforeSend: function () {
                $('#btn_add_product').prop('disabled', true)
            },
            success: function (result) {
                if (result !== '0') {
                    $("#product_table").find('tbody')
                        .prepend($(
                            '<tr>' +
                                '<td id="product_id">' + result + '</td>' +

                                '<td>' +
                                    '<a href="/products/' + result + '">' + dataProduct.name + '</a>' +
                                '</td>' +

                                '<td>' + dataProduct.article + '</td>' +

                                '<td>' +
                                    '<p id="product_qty">' + dataProduct.quantity + '</p>' +
                                    '<button class="btn_qty_up" id="btn_qty_up">+</button>' +
                                    '<button class="btn_qty_down" id="btn_qty_down">-</button>' +
                                '</td>' +

                                '<td>' + dataProduct.price + '</td>' +

                                '<td>' +
                                    '<button class="btn_hide_row" id="btn_hide_row">Скрыть</button>' +
                                '</td>' +
                            '<tr>'))
                } else {
                    console.log('ошибка = ' + result);
                    alert("Ошибка добавления продукта");
                }
            }
        })
            .done(function () {
                $('#btn_add_product').prop('disabled', false)
            });

        //очистка полей формы от старых значений
        formInput.trigger("reset");
    });
});