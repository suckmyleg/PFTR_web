function get_player_html(player, working_directory)
{
    return '<div id="'+player.id+'" class="player_container"><div class="player_title_container"><a class="player_name">'+player.name+'</a></div><div><img class="player_skin" src="https://crafatar.com/renders/body/'+player.id+'"></div><img class="hearts" src="'+working_directory+'Images/Hearts/'+parseInt(player.health)+'.png"></div>';
}

function write_players(players)
{
    var screen = document.getElementById("screen");

    var new_players = "";

    for(var i = 0; i < players.length; i++)
    {
        var player = players[i];

        var player_div = document.getElementById(player.id);

        if(player.id != "null" && player_div == null)
        {
            new_players += get_player_html(player, "../");
        }
        else
        {
            player_div.getElementsByClassName("hearts").src = +working_directory+"Images/Hearts/"+parseInt(player.health);
        }
    }

    screen.innerHTML += new_players;
}

//https://www.tutorialspoint.com/javascript-sleep-function
function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
}

async function auto_reload(match_id, delay)
{
    while (true)
    {

        reload(match_id, write_players);
        await sleep(delay*1000);
    }
}