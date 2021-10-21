$(window).load(function() {
    // Loading
    $('.pokemon-container').ready(function(){
        $('.loading').css('display','none');
        $('.animation-hide').css('display','flex');
    });
    
    // Stat calc
    $('.vertical-stat').each(function() {
        var height = $(this).attr("stat-value");
        var color = $(this).attr("stat-color");
        $(this).css('height',`${height}px`);
        $(this).css('background-color', color);
    });

    $('.horizontal-stat').each(function() {
        var width = $(this).attr("stat-value");
        var color = $(this).attr("stat-color");
        $(this).css('height','8px');
        $(this).css('width',`${width}px`);
        $(this).css('background-color', color);
    });
})