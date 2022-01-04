<?php

using "tools.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

try
{
    $name = $_GET["server"];

    $server_key = $_GET["server_key"];

    $command = $_GET["command"];

    $data = $_GET["data"];

    $match_id = $_GET["match_id"];

    $permission = verifyserver_keyFromServer($name, $server_key);
}
catch (Exception  $e)
{
    die("error" . $e);
}


$output = "error";
if($command == "create_password")
{
	$output = create_password($name, $server_key);
}

if($command == "host_new_match")
{
	$output = host_new_match($name, $server_key, $players, $max_players);
}

if($command == "reload")
{
	$output = save_to_database($name, $server_key, $match_id, $data);
}

if($command == "create_new_server")
{
	$output = create_new_server();
}

$conn->close();

echo $output;

?>