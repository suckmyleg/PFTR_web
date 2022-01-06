function get_player_html(player, working_directory)
{
    return '<divid="'+player.id+'">'+
        '<div class="player_container">'+
            	'<div class="player_display">'+
            		'<div class="player_title_container">'+
            			'<a class="player_name">'+
            				player.name+
            			'</a>'+
            		'</div>'+
            		'<div>'+
            			'<img class="player_skin" src="https://crafatar.com/renders/body/'+player.id+'">'+
            		'</div>'+
            		'<img class="hearts" id="'+player.id+'_hearts" src="'+working_directory+'Images/Hearts/'+parseInt(player.health)+'.png">'+
            	'</div>'+
            	'<div class="player_estadistics">'+
            		'<p>Kills: <a id="'+player.id+'_kills">'+player.number_kills+'</a></p>'+
            		'<p>Exp_level: <a id="'+player.id+'_exp">'+player.exp_level+'</a></p>'+
            		'<p>Playing: <a id="'+player.id+'_playing">'+player.time_playing+'</a></p>'+
            		'<p>Hp: <a id="'+player.id+'_hp">'+player.health+'</a></p>'+
            		'<div style="height:200px;display:inline-block;"></div>'+
            	'</div>'+
            '</div>'
        '</div>';
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
                document.getElementById(player.id+"_hearts").src = hearts_src;
                document.getElementById(player.id+"_kills").src = player.number_kills;
                document.getElementById(player.id+"_exp").src = player.exp_level;
                document.getElementById(player.id+"_playing").src = player.time_playing;
                document.getElementById(player.id+"_hp").src = player.health;
            }
        }
    }

    if (new_players != "") {document.getElementById("screen").innerHTML += new_players;}
}

function show_stadistics(player_id="")
{
    document.getElementById(player_id+"_estadistics");
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