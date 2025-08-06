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
    const wine_count = document.getElementById(`wine-${wine_id}`);
    if (!wine_count) return;

    let current = parseInt(wine_count.value);
    if (isNaN(current) || current < 1) current = 1;

    let newCount = currency_type === 'plus' ? current + 1 : current - 1;
    if (newCount < 1) newCount = 1;

    wine_count.value = newCount;

    const priceInput = document.querySelector(`.wine_price-${wine_id}`);
    const price = parseFloat(priceInput?.value || 0);

    const total = price * newCount;

    const priceContainer = document.querySelector(`.wine_show_price-${wine_id}`);
    if (priceContainer) {
        priceContainer.innerHTML = `${total} <span class="currency">п</span>`;
    }

    const btn = document.querySelector(`.cart-btn-${wine_id}`);
    if (btn) {
        btn.classList.remove('active');
        btn.innerHTML = page === 'wine-show' ? '<span>Добавить в корзину</span>' : 'В корзину';
        btn.setAttribute('onclick', `cart_add('${wine_id}', '${newCount}', 'wine'); $(this).addClass('active')`);
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
            wine_btn.text('В корзине');
            cart_table_update()
            countItem();
        }
    });
}
