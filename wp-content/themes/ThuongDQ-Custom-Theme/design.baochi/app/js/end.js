// $('#content-slider-top').bxSlider({
//     minSlides: 1,
//     maxSlides: 8,
//     slideWidth: 190,
//     slideMargin: 10
// });


// $('[id^="slider-list-post-category"]').bxSlider({
//     minSlides: 1,
//     maxSlides: 10,
//     slideWidth: 176,
//     slideMargin: 10
// });

// $('#slider-list-post-special').bxSlider({
//     minSlides: 1,
//     maxSlides: 8,
//     slideWidth: 140,
//     slideMargin: 7
// });

// $(window).resize(function() {
//     load_slide();
// });

// $(window).load(function() {
//     load_slide();
// });


// function load_slide() {
//     width_custom = 0;
//     if ($(document).width() > 500) {
//         width_custom = 240;
//     }
//     if ($(document).width() > 768) {
//         width_custom = 240;
//     }
//     if ($(document).width() > 1030) {
//         width_custom = 190;
//     }

//     $('#content-slider-top').bxSlider({
//         minSlides: 2,
//         maxSlides: 8,
//         slideWidth: width_custom,
//         slideMargin: 10
//     });
// }


$('[id^="slider"]').bxSlider({
    minSlides: 1,
    maxSlides: 10,
    slideWidth: 236,
    slideMargin: 15
});

$('[id^="cSlider"]').bxSlider({
    minSlides: 1,
    maxSlides: 10,
    slideWidth: 236,
    slideMargin: 50
});

$('[id^="dSlider"]').bxSlider({
    minSlides: 1,
    maxSlides: 10,
    slideWidth: 172,
    slideMargin: 17
});

$('[id^="vSlider"]').bxSlider({
    minSlides: 1,
    maxSlides: 10,
    slideWidth: 201,
    slideMargin: 11
});



var current_page = Number(loadmore_params.item_current);
jQuery(function($) {
    $('.loadmore').click(function() {
        current_page = Number(current_page) + Number(6)
        var button = $(this);
        var data = {
            action: 'ajax_loadmore_data',
            item_current: current_page,
            current_category: loadmore_params.current_category
        };

        $.ajax({
            url: loadmore_params.ajaxurl, // AJAX handler
            data: data,
            type: 'POST',
            beforeSend: function(xhr) {
                button.text('Đang tải...'); // change the button text, you can also add a preloader image
            },
            success: function(result) {
                // alert(loadmore_params.current_category);
                if (result) {
                    button.text('Xem thêm'); // insert new posts
                    $('#content-new').append(result);
                    if (current_page > loadmore_params.item_max)
                        button.remove(); // if last page, remove the button
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });
});