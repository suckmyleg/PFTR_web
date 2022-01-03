<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "PFTR";
$password = "PFTR_PASSWORD_PFTR";
$db = "pftr";

$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function verifyserver_keyFromServer($name, $server_key)
{
    $server_key_ = getserver_keyFromServer($name);
    if ($server_key){return FALSE;}
	return $server_key_ == $server_key;
}

function getserver_keyFromServer($name)
{
       $sql = "SELECT server_key FROM servers WHERE name='" + $name + "'";
       $result = $conn->query($sql);

       if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
           if($server_key == ""){return FALSE;}
           return $server_key;
         }
       } else {
         return FALSE ;
       }
}

function save_to_database($name, $server_key, $match_id, $content)
{
	if ($permission)
	{
        $sql = "UPDATE matches SET players_data='"+$content+"' WHERE id='" + $match_id + "'";
        if ($conn->query($sql) === TRUE) {
            return "OK";
        } else {
          die("Error updating: " . $conn->error);
        }
	}
	else
	{
		die("Permission denied");
	}
}

function host_new_match($name, $server_key, $players, $max_players)
{
    if ($permission)
    	{
            $sql = "INSERT INTO matches (server_name, winner, players, max_players, players_data)
                   VALUES ('"+$name+"', '', '"+$players+"', '"+$max_players+"', '[]')";

            if ($conn->query($sql) === TRUE)
            {
                return "OK";
            }
            else
            {
                die("Error: " . $sql . "<br>" . $conn->error);
            }
    	}
    	else
    	{
    		die("Permission denied");
    	}
}

function get_players_from_match($name, $server_key, $match_id)
{
        if ($permission)
        {
            $sql = "SELECT players FROM matches WHERE id='" + $match_id + "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $d = $row["players"];
                    if (!$d == "") {$d = $d + ";";}
                    return $d;
                }
            }
            else
            {
                die("Error match doesnt exist");
            }

        }
        else
        {
        	die("Permission denied");
        }

}

function add_player_to_match($name, $match_id, $player)
{
    if ($permission)
    	{
            $sql = "UPDATE matches SET players='"+get_players_from_match($name, $server_key, $match_id)+$content+"' WHERE server_name='" + $name + "'";
            if ($conn->query($sql) === TRUE) {
                return "OK";
            } else {
              die("Error updating: " . $conn->error);
            }
    	}
    	else
    	{
    		die("Permission denied");
    	}
}

function create_new_server()
{
    $name = generateRandomString(20);
    $sql = "INSERT INTO servers (server_name, server_key)
                   VALUES ('"+$name+"', '')";

    if ($conn->query($sql) === TRUE)
    {
        return "OK";
    }
    else
    {
        die("Error: " . $sql . "<br>" . $conn->error);
    }
    return $name;
}

function create_password($name, $server_key)
{
    $new_server_key = generateRandomString(20);
    if ($permission)
    {
        $sql = "UPDATE servers SET server_key='"+$new_server_key+"' WHERE server_name='" + $name + "'";
        if ($conn->query($sql) === TRUE) {
            return "OK";
        } else {
        die("Error updating: " . $conn->error);
        }
        return $new_server_key;
    }
    else
    {
        if(!getserver_keyFromServer($name))
        {
            $sql = "UPDATE servers SET server_key='"+$new_server_key+"' WHERE server_name='" + $name + "'";
                    if ($conn->query($sql) === TRUE) {
                        return "OK";
                    } else {
                    die("Error updating: " . $conn->error);
                    }
            return $new_server_key;
        }
        else
        {
            die("Permission denied");
        }
    }
}
try{
    $name = $_GET["server"];

    $server_key = $_GET["server_key"];

    $command = $_GET["command"];

    $data = $_GET["data"];

    $permission = verifyserver_keyFromServer($name, $server_key);
}
catch{
die("error");}
if($command == "create_password")
{
	$output = create_password($name);
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