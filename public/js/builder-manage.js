function pokedexer(id){
  if (id.length == "1") {
    id = "00" + id;
  } else if (id.length == "2") {
    id = "0" + id;
  }
  return id;
}

function togglePokemon(pokemon_id){
  pokemon_id = Number(pokemon_id);
  $('#pokemon-'+pokemon_id).toggleClass('selected');
  $('#pokemon-'+pokemon_id).toggleClass('available');
}

$(window).on('load',function() {

  var team = [];

  if (window.location.pathname == "/builder/manage"){

      let slots = document.getElementsByClassName('slot');
      for (let slot of slots) {
        if (slot.innerHTML != "") {
          $pokemon = pokedexer((slot.lastChild.id).substring(5));
          togglePokemon($pokemon);
          team.push($pokemon);
        } 
      }
      for (let index = 0; index < team.length; index++) {
        
        let slot = '<img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/'+team[index]+'.png" class="img-fluid mx-auto d-block pokemon-slot" id="slot-'+team[index]+'">';
        slots[index].innerHTML = slot;
      }
  }

  // Small mons
  $('body').on('click', '.pokemon-small.available', function(){

    var slots = document.getElementsByClassName('slot');
    var pokemon = pokedexer(this.id.substring(8));
    team = [];

    togglePokemon(pokemon);

    for (let slot of slots) {
      if (slot.innerHTML != "") {
        $pokemon = pokedexer((slot.lastChild.id).substring(5));
        team.push($pokemon);
      } 
    }
    
    if (team.length == 6) {
      togglePokemon(team[5]);
      team[5] = pokemon;
    } else {
      team.push(pokemon);
    }

    
    for (let index = 0; index < team.length; index++) {
      let slot = '<img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/'+team[index]+'.png" class="img-fluid mx-auto d-block pokemon-slot" id="slot-'+team[index]+'">';
      slots[index].innerHTML = slot;
      // if (slots[index].lastChild != null) {
      //   slots[index].lastChild.src = "https://assets.pokemon.com/assets/cms2/img/pokedex/full/"+team[index]+".png";
      //   slots[index].lastChild.id = "slot-"+team[index];
      // } else {
      //   var img = document.createElement("img");
      //   img.src = "https://assets.pokemon.com/assets/cms2/img/pokedex/full/"+team[index]+".png";
      //   img.id = "slot-"+team[index];
      //   img.classList.add('img-fluid','mx-auto','d-block','pokemon-slot');
      //   slots[index].appendChild(img);
      // }
    }

    if (team.length > 0 ) {
      $('#create-team').removeClass('disabled');
      $('#save-team').removeClass('disabled');
    } else {
      $('#create-team').addClass('disabled');
      $('#save-team').addClass('disabled');
    }
    
  })

  // Big mons
  $('body').on('click', '.pokemon-slot', function(){
    $(this).parent().html("");

    var slots = document.getElementsByClassName('slot');
    var pokemon = pokedexer(this.id.substring(5));
    team = [];

    togglePokemon(pokemon);

    for (let slot of slots) {
      if (slot.innerHTML != "") {
        $pokemon = pokedexer((slot.lastChild.id).substring(5));
        team.push($pokemon);
      } 
    }
    
    for (let index = 0; index < slots.length; index++) {
      if (index < team.length) {
        let slot = '<img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/'+team[index]+'.png" class="img-fluid mx-auto d-block pokemon-slot" id="slot-'+team[index]+'">';
        slots[index].innerHTML = slot;
      } else {
        slots[index].innerHTML = "";
      }
    }

    if (team.length > 0 ) {
      $('#create-team').removeClass('disabled');
      $('#save-team').removeClass('disabled');
    } else {
      $('#create-team').addClass('disabled');
      $('#save-team').addClass('disabled');
    }
  })

  // AJAX Create team
  $("#create-team").click(function(e){

    e.preventDefault();
    
    team.forEach(function(element, index, team){
      team[index] = Number(element);
    });

      $.ajax({
        type:'POST',
        url:'/api/builder/create',
        data: {
          "_token": $('meta[name="csrf-token"]').attr('content'),
           "team": team
        },
        success:function(data){
           location.replace('/builder');
        }
     });
    
    
  });

  // AJAX Save team
  $("#save-team").click(function(e){

    e.preventDefault();
    
    team.forEach(function(element, index, team){
      team[index] = Number(element);
    });

    
      $.ajax({
        type:'POST',
        url:'/api/builder/save',
        data: {
          "_token": $('meta[name="csrf-token"]').attr('content'),
            "team": team,
            "team_index": $('#save-team-form input[name="team_index"]').val()
        },
        success:function(data){
            location.replace('/builder');
        }
      });

  });

  // Delete confirmation
  $('#delete-form').submit(function(e){
    if(!confirm("Do you want to delete the team?")){
      e.preventDefault();
    }
  });

});