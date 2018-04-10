$(document).ready(function() {
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });

    $('button[data-toggle="collapse"]').on('click', function () {

        $(this).find('span').toggleClass('glyphicon-chevron-down');
        $(this).find('span').toggleClass('glyphicon-chevron-up');
    });
});