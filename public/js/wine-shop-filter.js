/*  POPOVER JS*/

tippy('.tippyTooltip', {
    content(reference) {
        const id = reference.getAttribute('data-template');
        const template = document.getElementById(id);
        return template.innerHTML;
    },
    trigger: 'click',
    allowHTML: true,
    theme: 'light-border',
    interactive: true,
    hideOnClick: true,
    maxWidth: 'none',
    offset: [0, 10],
    placement: 'right',
});

$(window).on('hashchange', function () {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            wine_filter_search(page);
        }
    }
});
/*  POPOVER JS END*/
window.onpageshow = function (event) {
    var url_parameters = window.location.search;
    if (url_parameters.length === 0) clear_for_load()
};
$(document).ready(function () {

    var url_parameters = window.location.search;
    if (url_parameters.length === 0) clear_for_load()
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();

        $('li').removeClass('active');
        $(this).parent('li').addClass('active');

        var page = $(this).attr('href').split('page=')[1];
        var filter = $('#searching-form').serialize()
        wine_filter_search(filter, page)

    });


});

function url_breadcrumb_checked() {
    var urls = getUrlVars()
    for (let i = 0; i < urls.length; i++) {
        $('input[name="' + urls[i].name + '"]').filter(function () {
            if (this.value === urls[i].value) {
                $(this).prop('checked', true)
            }
        })
    }
}

function getUrlVars() {
    var in_url = [];
    var in_url_str = window.location.search.replace('?', '').split('&');
    $.each(in_url_str, function (key, val) {
        var v = val.split('=');
        var test = {'name': v[0], 'value': v[1]}
        in_url.push(test)
    });
    return in_url;
}

function wine_filter_search(filter, page = 1) {
    var ajax_url = '?' + filter + '&page=' + page
    setupPage();
    history.pushState(ajax_url, document.title, ajax_url);
    onpopstate = function (event) {
        setupPage(event.state);
    }

    function setupPage() {
        document.links[0].href = ''
        document.links[0].href = ajax_url;
    }

    $.ajax(
        {
            url: ajax_url,
            type: "get",
            datatype: "html"
        }).done(function (data) {
        $("#wine_list_block").empty().html(data);

        // location.hash = page;
    }).error(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR)
        console.log(ajaxOptions)
        console.log(thrownError)
    });
    filter_breadcrumb()
    //scroll_up()

}

const main_breadcrumb = '<li><a href="/">Главная</a></li><li><a href="wine-shop">Вино</a></li>\n' +
    '<li id="search_title" style="display: none"></li>';

function filter_breadcrumb() {
    var forms_filter = $('#searching-form').serializeArray(),
        href,
        title,
        breadcrumb,
        title_breadcrumb,
        filter_breadcrumb = [],
        breadcrumb_class = $('.breadcrumb'),
        form_filter_dict = {},
        form_filter_array = [];
    for (let i = 0; i < forms_filter.length; i++) {
        if (forms_filter[i].value) {
            form_filter_dict = {'name': forms_filter[i].name, 'value': forms_filter[i].value}
            if (!form_filter_array.some(e => e.name == forms_filter[i].name)) {
                form_filter_array.push(form_filter_dict)
                if (forms_filter[i].name == 'title') {
                    href = 'title=' + forms_filter[i].value
                    title = forms_filter[i].value
                    title_breadcrumb = '<a href="?' + href + '">' + title + '</a>'
                } else {
                    href = forms_filter[i].name + '=' + forms_filter[i].value
                    title = $(":checkbox[name='" + forms_filter[i].name + "']:checked").next('label').text();
                    title = title.replace(/\r?\n/g, "").split("  ")
                    var new_title_array = [];
                    for (let k = 0; k < title.length; k++) {
                        if (new_title_array[k] == ' ') {
                            delete new_title_array[k];
                        } else {
                            if (new_title_array.indexOf(title[k]) === -1 && title[k] != '') {
                                new_title_array.push(title[k]);
                            }
                        }
                    }
                    for (let k = 0; k < new_title_array.length; k++) {
                        breadcrumb = '<li><a href="?' + href + '">' + new_title_array[k] + '</a></li>'
                        filter_breadcrumb.push(breadcrumb)
                    }

                }
            }
        }
    }
    document.getElementById('breadcrumb').innerHTML = ''
    breadcrumb_class.append(main_breadcrumb)
    document.getElementById('search_title').innerHTML = ''
    if (title_breadcrumb) {
        breadcrumb_class.show()
        breadcrumb_class.append(title_breadcrumb)
    } else {
        $('#search_title').hide()
    }
    if (filter_breadcrumb.length > 0) {
        breadcrumb_class.append(filter_breadcrumb)
    }

}


function clear_filter() {
    $("input[type=checkbox]").prop('checked', false)
    $('.custom-select-trigger').text('по умолчанию')
    $('#inputState').find('option:not(:first)').remove();
    var filter = $('#searching-form').serialize()
    wine_filter_search(filter, '')
    $("input[name=title]").val('')
    scroll_up()
}

function clear_for_load() {
    $("input[type=checkbox]").prop('checked', false)
    $("input[name=title]").val('')
}

$('#search-main').on('keyup', function () {
    var filter = $('#searching-form').serialize()
    wine_filter_search(filter)
})
$(".form-check-input").change(function () {
    var filter = $('#searching-form').serialize()
    scroll_up()
    wine_filter_search(filter)
});

$(".form-check-input-mobile").change(function () {
    var filter = $('#searching-form-mobile').serialize()
    scroll_up()
    wine_filter_search(filter)
});

$("select[name='price_sort']").change(function () {
    var filter = $('#searching-form').serialize()
    scroll_up()
    wine_filter_search(filter)
});

function collapse_click(type) {
    $("#collapse-" + type).on("hide.bs.collapse", function () {
        $('.no-letter-' + type).show();

        $('#btnCollapse-' + type).html('<span>Посмотреть все</span>' +
            '<img src="/image/arrow-down.svg" alt="" class="collapseIcon">'
        );
    });
    $("#collapse-" + type).on("show.bs.collapse", function () {
        $('.no-letter-' + type).hide();
        $('#btnCollapse-' + type).html('<span>Закрыть</span>' +
            '<img src="/image/arrow-up.svg" alt="" class="collapseIcon">'
        );

    });
}

$('.no_letter').on('click', function () {
    var id = $(this).attr('id');
    if ($('input[id="' + id + '"]').is(':checked')) {
        id = id.replace('mob', 'letter');
        $('input[id="' + id + '"]').prop('checked', true)
    } else {
        id = id.replace('mob', 'letter');
        $('input[id="' + id + '"]').prop('checked', false)
    }

})
$('.letter_collapse').on('click', function () {
    var id = $(this).attr('id');
    if ($('input[id="' + id + '"]').is(':checked')) {
        id = id.replace('letter', 'mob');
        $('input[id="' + id + '"]').prop('checked', true)
    } else {
        id = id.replace('letter', 'mob');
        $('input[id="' + id + '"]').prop('checked', false)
    }
})


$(".custom-select").each(function () {
    var classes = $(this).attr("class"),
        id = $(this).attr("id"),
        name = $(this).attr("name");
    var template = '<div class="' + classes + '">';
    template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
    template += '<div class="custom-options">';
    $(this).find("option").each(function () {
        if ($(this).attr("value")) {
            template += '<span class="custom-option" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
        } else {
            template += '<span class="custom-option" data-value="">по умолчанию</span>';
        }
    });
    template += '</div></div>';
    $(this).wrap('<div class="custom-select-wrapper"></div>');
    $(this).hide();
    $(this).after(template);
});
$(".custom-option:first-of-type").hover(function () {
    $(this).parents(".custom-options").addClass("option-hover");
}, function () {
    $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function () {
    $('html').one('click', function () {
        $(".custom-select").removeClass("opened");
    });
    $(this).parents(".custom-select").toggleClass("opened");
    event.stopPropagation();
});
$(".iconSort").on("click", function () {
    $('html').one('click', function () {
        $(".custom-select").removeClass("opened");
    });
    $(".custom-select").toggleClass("opened");
    event.stopPropagation();
});

$(".custom-option").on("click", function () {
    $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
    $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
    $(this).addClass("selection");
    $(this).parents(".custom-select").removeClass("opened");
    $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
    var filter = $('#searching-form').serialize()
    wine_filter_search(filter)
});

function search(type, search_type = null) {
    let search_input, filter, inputs, label_text, i;
    search_input = document.getElementById("search-main-" + type);
    filter = search_input.value.toUpperCase();
    let input_type = type.replace('-mob', '')
    inputs = $('input[name="' + input_type + '[]"]').map((i, el) => $(el).val()).get();
    let main_type = type
    if (search_type == 'mobile') {
        main_type +='-full-'
    }
    for (i = 0; i < inputs.length; i++) {
        label_text = $("label[for='shop-" + main_type + inputs[i] + "']").text()
        if (label_text.toUpperCase().indexOf(filter) > -1) {
            $("#form-" + type + "-" + inputs[i]).show()
        } else {
            $("#form-" + type + "-" + inputs[i]).hide()
        }
    }
    if (search_type == 'mobile') {
        if (filter.length === 0) {
            $('#collapse-' + input_type + '-overlay').removeClass('show')
            $('#btnCollapse-' + input_type + '-overlay').show()
            $('.letter-title').show()
            $(".no-letter-"+ input_type+ "-overlay").show()
        } else {
            $('#collapse-' + input_type + '-overlay').addClass('show')
            $('#btnCollapse-' + input_type + '-overlay').hide()
            $('.letter-title').hide()
            $(".no-letter-"+ input_type+ "-overlay").hide()

        }
    } else {
        if (filter.length === 0) {
            $('#collapse-' + type).removeClass('show')
            $('#btnCollapse-' + type).show()
        } else {
            $('#collapse-' + type).addClass('show')
            $('#btnCollapse-' + type).hide()
        }
    }

}


