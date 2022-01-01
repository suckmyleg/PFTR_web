
function write(player){
    var screen = document.getElementById("screen");

    screen.innerHTML = '<div class="player_container"><div class="player_title_container"><a class="player_name">'+player.name+'</a></div><div><img class="imag" src="MIMIKYUG.png"></div><img class="imag" src="Images/Hearts/'+player.healt+'.png"></div>';

}