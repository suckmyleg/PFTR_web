function get_player_html(player, working_directory)
{
    return '<div id="'+player.id+'" class="player_container"><div class="player_title_container"><a class="player_name">'+player.name+'</a></div><div><img class="player_skin" src="https://crafatar.com/renders/body/'+player.id+'"></div><img class="hearts" id="h'+player.id+'" src="'+working_directory+'Images/Hearts/'+parseInt(player.health)+'.png"></div>';
}

function write_players(players)
{
    const working_directory = "../";

    let new_players = "";

    for(var i = 0; i < players.length; i++)
    {
        let player = players[i];

        let player_div = document.getElementById(player.id);
        if (player.id != "null")
        {
            if(player_div == null)
            {
                new_players += get_player_html(player, working_directory);
            }
            else
            {
                let hearts_src = working_directory + "Images/Hearts/"+parseInt(player.health)+".png";
                document.getElementById("h"+player.id).src = hearts_src;
            }
        }
    }

    if (new_players != "") {document.getElementById("screen").innerHTML += new_players;}
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