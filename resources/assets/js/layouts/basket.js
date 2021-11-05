/*
$(document).ready(function () {
    $('.js-ajax-basket').on('submit', function (e) {
        e.preventDefault();
        const form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            //magic
            data: form.serialize(),
            success: function (response) {
                $('.js-products-item').each(function () {
                   $(this)
                    if ($(this).data('id') in response.data.products) {
                        if (+$(this).data('count') !== +response.data.products[$(this).data('id')]) {
                            $(this).find('.js-count-badge').text(response.data.products[$(this).data('id')]);
                            $(this).data('count', response.data.products[$(this).data('id')]);
                        }
                    } else {
                        $(this).remove();
                        if (!$('.js-products-item').length) {
                            $('.js-full-price').remove()
                        }
                    }
                });
                console.log(response);
            },
            error: function (xhr) {
              const response = JSON.parse(xhr.responseText);
                console.log(response);
            },
        });
    });
});
*/
