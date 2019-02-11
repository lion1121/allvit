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
                    var elem = document.querySelector('.grid-container');
                    var iso = new Isotope( elem, {
                        // options
                        itemSelector: '.product',
                        layoutMode: 'fitRows'
                    });
                }
            }
        })
    })
});

