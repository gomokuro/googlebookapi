
$(function(){
    $('#book-search-btn').click(function(){
        $.ajax({
            url:"/index/search/"+encodeURIComponent($('#search-word').val()),
        }).done(function(result) {
            $('#result-area').html(result);
            $.ajax({
                url:"/index/get-word-area"
            }).done(function(result){
                $('#search-word-area').html(result);
            })
        })
        return false;
    });
    $('#search-word-area .btn-word').on('click', function(){
        $.ajax({
            url:"/index/search-history/"+encodeURIComponent($(this).data('word')),
        }).done(function(result) {
            $('#result-area').html(result);
        });;
        return false;
    });
    
});
