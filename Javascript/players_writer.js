function getStatus(player)
{
    if(player.lives == 0) return "Dead";
    if(player.status == "true") return "Online";
    return "Offline";
}

function getStatusColor(player)
{
    if(player.lives == 0) return "red";
    if(player.status == "true") return "green";
    return "grey";
}

function getFilter(status)
{
    var filter = "grayscale(0%)";
    if (status == "Offline") filter = "grayscale(100%)";
    if (status == "Dead") filter = "grayscale(100%) brightness(40%) sepia(100%) hue-rotate(-50deg) saturate(600%) contrast(0.8)";
    return filter
}

function get_player_html(player, working_directory)
{
    return '<div id="'+player.id+'" style="display:inline-block;">'+
        '<div class="player_container">'+
            	'<div class="player_display">'+
            		'<div class="player_name_container">'+
                        '<a class="player_name">'+
            				player.name+
                        '</a>'+
                    '</div>'+
            		'<div class="player_status_container">'+
            			'<a id="'+player.id+'_status" style="color:'+getStatusColor(player)+';">'+
                            getStatus(player)+
            			'</a>'+
            		'</div>'+
            		'<div>'+
            			'<img class="player_skin" id="'+player.id+'_skin" style="filter: '+getFilter(getStatus(player))+';" src="https://crafatar.com/renders/body/'+player.id+'">'+
            		'</div>'+
            		'<img class="hearts" id="'+player.id+'_hearts" src="'+working_directory+'Images/Hearts/'+parseInt(player.health)+'.png">'+
            	'</div>'+
            	'<div class="player_estadistics">'+
            		'<p>Lives: <a id="'+player.id+'_lives">'+player.lives+'</a></p>'+
            		'<p>Kills: <a id="'+player.id+'_kills">'+player.number_kills+'</a></p>'+
            		'<p>Exp: <a id="'+player.id+'_exp">'+player.exp_level+'</a></p>'+
            		'<p>Hp: <a id="'+player.id+'_hp">'+parseInt(player.health*100)/100+'</a></p>'+
            		'<p>Time: <a id="'+player.id+'_playing">'+parseInt(player.time_playing/100)+'</a>s</p>'+
            		'<div style="height:140px;display:inline-block;"></div>'+
            	'</div>'+
            '</div>'+
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
                let status = getStatus(player);
                let hearts_image = document.getElementById(player.id+"_hearts");
                let player_kills = document.getElementById(player.id+"_kills");
                let player_exp = document.getElementById(player.id+"_exp");
                let player_playing = document.getElementById(player.id+"_playing");
                let player_hp = document.getElementById(player.id+"_hp");
                let player_status = document.getElementById(player.id+"_status");
                let player_lives = document.getElementById(player.id+"lives");

                if (player_kills.innerHTML != player.number_kills) player_kills.innerHTML = player.number_kills;
                if (player_exp.innerHTML != player.exp_level) player_exp.innerHTML = player.exp_level;
                if (player_playing.innerHTML != player.time_playing/100) player_playing.innerHTML = parseInt(player.time_playing/100);
                if (player_status.innerHTML != status)
                {
                    player_status.innerHTML = status;
                    player_status.style.color = getStatusColor(player);
                    document.getElementById(player.id+"_skin").style.filter = getFilter(status);
                }
                if (player_hp.innerHTML != parseInt(player.health*100)/100)
                {
                    player_hp.innerHTML = parseInt(player.health*100)/100;
                    hearts_image.src = hearts_src;
                }
            }
        }
    }

    if (new_players != "") document.getElementById("screen").innerHTML += new_players;
}

function show_stadistics(player_id="")
{
    document.getElementById(player_id+"_estadistics");
}

//https://www.tutorialspoint.com/javascript-sleep-function
function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
}

function write_server_data(server_data)
{

}

function write_match_data(match_data)
{
    if(match_data.pvp == "true") document.getElementById("pvp_display").style.display = "block";
    else  document.getElementById("pvp_display").style.display = "none";
}

function setup_data(data)
{
    write_players(data.players);
    write_match_data(data.match_data);
    write_server_data(data.server_data);
}

async function auto_reload(match_id, delay)
{
    while (true)
    {
        reload(match_id, setup_data);
        await sleep(delay*1000);
    }
}