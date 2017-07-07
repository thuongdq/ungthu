count = $('section').find('.more').find('li').length;
if (count > 0) {
    remain = count - Math.floor(count / 6) * 6;
    if (remain > 0) {
        for (i = 0; i < (6 - remain); i++) {
            $('section').find('.more').append("<li>&nbsp;</li>");
        }
    }
}