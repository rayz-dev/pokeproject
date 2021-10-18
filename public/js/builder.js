$(window).load(function() {

  var team = [];

  // Selected team
  $('body').on('click', '.pokemon-teams .team', function(){

    $('.pokemon-teams .team').removeClass('selected');
    $('.pokemon-teams .team').removeClass('mr-4');
    $(this).addClass('selected');
    $(this).addClass('mr-4');
    $('.buttons a').removeClass('disabled');
    
    $('input[name="selected"]').val($(this).attr('id').substring(5));
  })
});