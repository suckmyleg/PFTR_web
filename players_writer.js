
function write(player){
    var screen = document.getElementById("screen");

    screen.innerHTML = screen.innerHTML + '<div class="player_container"><div class="player_title_container"><a class="player_name">'+player.name+'</a></div><div><img class="player_skin" src="https://crafatar.com/renders/body/'+player.id+'"></div><img class="hearts" src="Images/Hearts/'+player.healt+'.png"></div>';

}