// function update_count(wine_id, currency_type, page = null, css_class = null) {
//     var wine_cart_btn = $('.cart-btn-' + wine_id),
//
//         wine_count = $('#wine-' + wine_id),
//         currency_symbol = (currency_type == 'minus') ? -1 : 1,
//         qua = parseInt(wine_count.val()) + currency_symbol,
//         price = $('.wine_price').val(),
//         wine_cart_text = 'В корзину';
//     if (css_class) {
//         wine_count = $('.' + css_class + '-' + wine_id);
//     }
//     if (qua > 0) {
//         $('.wine_show_price').html(price * qua + ' <span class="currency">п</span>')
//         wine_count.val(qua)
//         wine_cart_btn.attr("onclick", "cart_add('" + wine_id + "', '" + qua + "', 'wine'); $(this).addClass('active')");
//         if (page == 'wine-show') {
//             wine_cart_text = '<span>Добавить в корзину</span>'
//         }
//         wine_cart_btn.removeClass('active');
//         wine_cart_btn.html(wine_cart_text);
//     }
// }

function update_count(wine_id, currency_type, page = null) {
    var container = event.target.closest('.prod_quantity'); // родительский div
    var wine_count = $(container).find('.quantity');        // находим input по классу

    var wine_cart_btn = $('.cart-btn-' + wine_id);
    var currency_symbol = (currency_type == 'minus') ? -1 : 1;
    var qua = parseInt(wine_count.val()) || 0;
    var price = parseFloat($('.wine_price').val()) || 0;
    var wine_cart_text = 'В корзину';

    qua += currency_symbol;

    if (qua > 0) {
        $('.wine_show_price').html((price * qua) + ' <span class="currency">п</span>');
        wine_count.val(qua);
        wine_cart_btn.attr("onclick", "cart_add('" + wine_id + "', '" + qua + "', 'wine'); $(this).addClass('active')");
        if (page == 'wine-show') {
            wine_cart_text = '<span>Добавить в корзину</span>';
        }
        wine_cart_btn.removeClass('active');
        wine_cart_btn.html(wine_cart_text);
    }
}

function cart_add(wine_id, qtn, type) {
    var wine_btn = $('.cart-btn-' + wine_id)
    $.ajax({
        url: '/cart/add/' + type + '/' + wine_id + '/' + qtn,
        success: function (data) {
        },
        complete: function () {
            wine_btn.addClass('active');
            wine_btn.text('Удалить');
            cart_table_update()
            countItem();
        }
    });
}

function cart_button_click(wine_id, qtn, type) {
    var btn = $('.cart-btn-' + wine_id); // ищем кнопку по id товара

    if ($(btn).hasClass('active')) {
        // Удаляем
        cart_remove_from_button(wine_id, qtn, type);
        btn.removeClass('active').find('span').text('В корзину');
    } else {
        // Добавляем
        cart_add(wine_id, qtn, type);
        btn.addClass('active').find('span').text('Удалить');
    }
}
