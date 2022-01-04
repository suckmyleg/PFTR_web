
function write(server, working_directory){
    var screen = document.getElementById("screen");

    screen.innerHTML = screen.innerHTML + get_server_html(server, working_directory);

}

function get_server_html(server, working_directory)
{
    return server.server_name;
}

function get_servers_html(servers, working_directory)
{
    var result = "";

    for(var i = 0; i < servers.length; i++)
    {
        result += get_server_html(servers[i], working_directory);
    }
    return result;
}

function write_servers(servers, working_directory)
{
    var screen = document.getElementById("screen");

    screen.innerHTML = screen.innerHTML + get_servers_html(servers, working_directory);
}