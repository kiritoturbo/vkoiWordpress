jQuery(document).ready(function($) {

    $('#overlaysearch').on('click', function(){
        $('#overlaysearch').css('display', 'none');
        $('#search-results').css('display', 'none');
    });
    $('#overlaysearch2').on('click', function(){
        $('#overlaysearch2').css('display', 'none');
        $('#search-result-mobile').css('display', 'none');
    });


    var typingTimer;
    var doneTypingInterval = 200;
    $('#search-input').on('keyup', function() {
        clearTimeout(typingTimer);
        $('span#key-text').text($('#search-input').val());
        // console.log($('span#key-text'));
        $('.key-text-all').text($('#search-input').val());
        if ($('#search-input').val()) {
            typingTimer = setTimeout(doSearch, doneTypingInterval);
        }
    });

    $('#search-input-mobile').on('keyup', function() {
        clearTimeout(typingTimer);
        $('span#key-text').text($('#search-input-mobile').val());
        $('.key-text-all').text($('#search-input-mobile').val());
        if ($('#search-input-mobile').val()) {
            typingTimer = setTimeout(doSearchMobile, doneTypingInterval);
        }
    });
    function doSearch() {
        var searchKeyword = $('#search-input').val();
        var data = {
            action: 'my_ajax_search',
            search_keyword: searchKeyword
        };
        $.ajax({
            url: myAjax.ajaxurl,
            type: 'GET',
            data: data,
            success: function(response) {
                $('#search-results').html(response);
                $('#search-results').css('display', 'block');
                $('#overlaysearch').css('display', 'block');
                $('span#key-text').text(searchKeyword);
                $('.key-text-all').text(searchKeyword);
            }
        });
    }
    function doSearchMobile() {
        var searchKeyword = $('#search-input-mobile').val();

        var data = {
            action: 'my_ajax_search',
            search_keyword: searchKeyword
        };

        $.ajax({
            url: myAjax.ajaxurl,
            type: 'GET',
            data: data,
            success: function(response) {
                $('#search-result-mobile').html(response);
                $('#search-result-mobile').css('display', 'block');
                $('#overlaysearch2').css('display', 'block');
                $('span#key-text').text(searchKeyword);
                $('.key-text-all').text(searchKeyword);
            }
        });
    }
});