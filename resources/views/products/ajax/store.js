$(document).ready(function () {
    $('#btn_add_product').on('click', function () {
        var formInput = $('#product');

        function getFormData($form) {
            var unindex_array = $form.serializeArray();
            var index_array = {};

            $.map(unindex_array, function (element, i) {
                index_array[element['name']] = element['value'];
            });

            return index_array;
        }

        var dataFromForm = getFormData(formInput);
        var newProduct = {
            product: dataFromForm
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
                if(result === '1') {
                    alert("Продукт успешно добавлен");
                } else {
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