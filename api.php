<?php

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

function verifyKeyFromServer($name, $key)
{
    $key_ =getKeyFromServer($name);
    if ($key){return FALSE;}
	return $key_ == $key;
}

function getKeyFromServer($name)
{
       $sql = "SELECT key FROM servers WHERE name='" + $name + "'";
       $result = $conn->query($sql);

       if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
           if($key == ""){return FALSE;}
           return $key;
         }
       } else {
         return FALSE ;
       }
}

function save_to_database($name, $key, $match_id, $content)
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

function host_new_match($name, $key, $players, $max_players)
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

function get_players_from_match($name, $key, $match_id)
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
            $sql = "UPDATE matches SET players='"+get_players_from_match($name, $key, $match_id)+$content+"' WHERE server_name='" + $name + "'";
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
    $sql = "INSERT INTO servers (server_name, key)
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

function create_password($name, $key)
{
    $new_key = generateRandomString(20);
    if ($permission)
    {
        $sql = "UPDATE servers SET key='"+$new_key+"' WHERE server_name='" + $name + "'";
        if ($conn->query($sql) === TRUE) {
            return "OK";
        } else {
        die("Error updating: " . $conn->error);
        }
        return $new_key;
    }
    else
    {
        if(!getKeyFromServer($name)
        {
            $sql = "UPDATE servers SET key='"+$new_key+"' WHERE server_name='" + $name + "'";
                    if ($conn->query($sql) === TRUE) {
                        return "OK";
                    } else {
                    die("Error updating: " . $conn->error);
                    }
            return $new_key;
        }
        else
        {
            die("Permission denied");
        }
    }
}

$name = $_GET["server"];

$key = $_GET["key"];

$command = $_GET["command"];

$data = $_GET["data"];

$permission = verifyKeyFromServer($name, $key);

if($command == "create_password")
{
	$output = create_password($name);
}

if($command == "host_new_match")
{
	$output = host_new_match($name, $key, $players, $max_players);
}

if($command == "reload")
{
	$output = save_to_database($name, $key, $match_id, $data);
}

if($command == "create_new_server")
{
	$output = create_new_server();
}

$conn->close();

echo $output;

?>