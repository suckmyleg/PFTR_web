<?php

include "tools.php";

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

try {$name = $_GET["server"];}
catch (Exception  $e) {$name = FALSE;}

try {$command = $_GET["command"];}
catch (Exception  $e) {$command = FALSE;}

try {$data = base64_decode($_GET["data"]);}
catch (Exception  $e) {$data = FALSE;}

try {$server_key = $_GET["server_key"];}
catch (Exception  $e) {$server_key = FALSE;}

try {$match_id = $_GET["match_id"];}
catch (Exception  $e) {$match_id = FALSE;}

$permission = verifyserver_keyFromServer($name, $server_key);

$output = "error";
if($command == "create_password")
{
	$output = create_password($name, $server_key);
}

if($command == "host_new_match")
{
	$output = host_new_match($name, $server_key, "", $data);
}

if($command == "reload")
{
	$output = save_to_database($name, $server_key, $match_id, $data);
}

if($command == "create_new_server")
{
	$output = create_new_server();
}
if($command == "match_players_data")
{
    $output = get_match_players_data($match_id);
}

$conn->close();

echo $output;

?>