$(document).ready(function () {
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        // window.location.hash = 'whatever';
        let url = $(this).attr('href');
        $.ajax({
            url: url,
            method: 'GET',
            data: {},
            dataType: 'json',
            success: function (result) {
                if (result.status === 'ok') {
                    $('.postcontent').html(result.listing);
                    let url = window.location.href;
                    window.location.href +=  '?page=2';
                }
            }
        })
    })
});

