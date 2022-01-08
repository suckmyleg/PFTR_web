<?php

include "tools.php";

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

function react($name, $command, $data, $server_key, $match_id)
{
    if($command == "reload")
    {
        return save_to_database($name, $server_key, $match_id, $data);
    }
    if($command == "create_password")
    {
        return create_password($name, $server_key);
    }
    if($command == "host_new_match")
    {
        return host_new_match($name, $server_key, "", $data);
    }
    if($command == "create_new_server")
    {
        return create_new_server();
    }
    if($command == "match_players_data")
    {
        return get_match_players_data($match_id);
    }
    if($command == "get_server_data_id")
    {
        return get_server_data_custom_name($name);
    }
    if($command == "get_server_data_custom_name")
    {
        return get_server_data_custom_id($data);
    }
    if($command == "set_server_custom_name")
    {
        return set_server_custom_name($name, $data);
    }
    if($command == "get_delay_request")
    {
        return get_delay_request($name, $match_id);
    }


    if($command == "set_server_custom_name")
    {
        return set_server_custom_name($name, $data);
    }
    if($command == "set_server_custom_name")
    {
        return set_server_custom_name($name, $data);
    }

    return "Uknown command";
}


try {$name = $_GET["server"];}
catch (Exception  $e) {$name = FALSE;}

try {$command = $_GET["command"];}
catch (Exception  $e) {$command = FALSE;}

try {$data = $_GET["data"];}
catch (Exception  $e) {$data = FALSE;}

try {$server_key = $_GET["server_key"];}
catch (Exception  $e) {$server_key = FALSE;}

try {$match_id = $_GET["match_id"];}
catch (Exception  $e) {$match_id = FALSE;}

$permission = verifyserver_keyFromServer($name, $server_key);

echo react($name, $command, $data, $server_key, $match_id);

$conn->close();
?>