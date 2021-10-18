$(window).load(function() {

    var team = [];
    var url = "https://mypokeproject.herokuapp.com/images/content/";

    // Selected team
    $('body').on('click', '#config-container .avatar-extra-small', function(){

        $('.avatar-extra-small').removeClass('selected');
        $(this).addClass('selected');
        $('#avatar').attr('value',$(this).attr('id').substring(7));
        $('#config-container #current-avatar').attr('src',url+"avatar-"+$(this).attr('id').substring(7)+".png");

    })
});