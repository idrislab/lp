window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

$('form').submit(function (e) {
    $(this).find('input:not(:hidden), select, textarea').each(function () {
        $('<input>').attr({
            type: 'hidden',
            name: 'field_description['+ $(this).attr('name') +']',
            value: $(this).data('description'),
        }).prependTo(this);
    });
    return true;
});
