jQuery(document).ready(function ($) {
    jQuery('#users a').click(function (e) {
        e.preventDefault();

        const tdElement = jQuery(this).closest('td');
        const tdClass = tdElement.attr('class');

        alert(`Get user by ${tdClass} => ${e.target.text}`);
    });
});
