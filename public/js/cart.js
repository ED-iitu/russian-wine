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


function update_count(wine_id, currency_type, page = null, css_class = null) {
    let wine_cart_btn = $('.cart-btn-' + wine_id);
    let wine_count;

    if (css_class) {
        wine_count = $('.' + css_class + '-' + wine_id);
    } else {
        wine_count = $('#wine-' + wine_id);
    }

    if (!wine_count.length) return;

    let currentValue = parseInt(wine_count.val());
    if (isNaN(currentValue) || currentValue < 1) currentValue = 1;

    let qua = currentValue;
    if (currency_type === 'plus') {
        qua += 1;
    } else if (currency_type === 'minus' && currentValue > 1) {
        qua -= 1;
    }

    wine_count.val(qua);

    let price = parseFloat($('.wine_price').val()) || 0;
    let total_price = price * qua;

    $('.wine_show_price').html(total_price + ' <span class="currency">п</span>');

    let wine_cart_text = (page === 'wine-show') ? '<span>Добавить в корзину</span>' : 'В корзину';
    wine_cart_btn
        .removeClass('active')
        .html(wine_cart_text)
        .attr("onclick", "cart_add('" + wine_id + "', '" + qua + "', 'wine'); $(this).addClass('active')");
}

function cart_add(wine_id, qtn, type) {
    var wine_btn = $('.cart-btn-' + wine_id)
    $.ajax({
        url: '/cart/add/' + type + '/' + wine_id + '/' + qtn,
        success: function (data) {
        },
        complete: function () {
            wine_btn.addClass('active');
            wine_btn.text('В корзине');
            cart_table_update()
            countItem();
        }
    });
}
