jQuery(document).ready(function ($) {
    jQuery('#users a').click(function (e) {
        e.preventDefault();

        const tdElement = jQuery(this).closest('td');
        const fieldName = tdElement.attr('class');

        const { action, url } = ajaxObject;

        jQuery.ajax({
            url,
            type: 'POST',
            data: {
                action,
                data: {
                    fieldName,
                    fieldValue: e.target.text,
                },
            },
            success: function (response) {
                alert(JSON.stringify(response));
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            },
        });
    });
});
