
function write(player, working_directory){
    var screen = document.getElementById("screen");

    screen.innerHTML = screen.innerHTML + get_player_html(player, working_directory);

}

function get_player_html(player, working_directory)
{
    return '<div class="player_container"><div class="player_title_container"><a class="player_name">'+player.name+'</a></div><div><img class="player_skin" src="https://crafatar.com/renders/body/'+player.id+'"></div><img class="hearts" src="'+working_directory+'Images/Hearts/'+player.healt+'.png"></div>';
}

function get_players_html()
{

}

function write_players()
{

}