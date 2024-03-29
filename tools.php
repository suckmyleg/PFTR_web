<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

$servername = "localhost";
$username = "PFTR";
$password = "PFTR_PASSWORD_PFTR";
$db = "pftr";

$conn = new mysqli($servername, $username, $password, $db);

$permission = FALSE;

if (!$conn) {
  die("501");
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
    if (!$server_key){return FALSE;}
	return $server_key_ == $server_key;
}

function getserver_keyFromServer($name)
{
    global $conn;
    $sql = "SELECT server_key FROM servers WHERE server_name='" . $name . "'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
        $server_key = $row["server_key"];
       if($server_key == ""){return FALSE;}
       return $server_key;
     }
   } else {
     return FALSE ;
   }
}

function save_to_database($name, $server_key, $match_id, $data)
{
    global $conn;
    global $permission;
	if ($permission)
	{
        $sql = "UPDATE matches SET players_data='".$data."', last_reload='".date("Y:m:d H:i:s")."' WHERE id='" .$match_id ."'";
        if ($conn->query($sql) === TRUE) {
            return "200";
        } else {
          die("500");
        }
	}
	else
	{
		die("403");
	}
}

function host_new_match($name, $server_key, $players, $max_players)
{
    global $conn;
    global $permission;
    if ($permission)
    	{
            $sql = "INSERT INTO matches (server_name, winner, players, max_players, players_data)
                   VALUES ('".$name."', '', '".$players."', '".base64_decode($max_players)."', '[]')";

            if ($conn->query($sql) === TRUE)
            {
                return $conn->insert_id;
            }
            else
            {
                die("500");
            }
    	}
    	else
    	{
    		die("403");
    	}
}

function get_match_data($match_id)
{
    global $conn;

    $sql = "SELECT players_data FROM matches WHERE id=" . $match_id . "";

    $result = $conn->query($sql);

    if (!empty($result) && $result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            return base64_decode($row["players_data"]);
        }
    }
    else
    {
        die("404");
    }

}

function get_server_data_id($name)
{
    global $conn;
    $sql = "SELECT server_data FROM servers WHERE server_name='".$name."'";
    $result = $conn->query($sql);

    if (!empty($result) && $result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            return $row;
        }
    }
    else
    {
        die("500");
    }
}

function get_delay_request($name, $match_id)
{
    return "500";
}

function get_server_data_custom_name($data)
{
    global $conn;
    $sql = "SELECT server_data FROM servers WHERE server_custom_name='".base64_decode($data)."'";
    $result = $conn->query($sql);

    if (!empty($result) && $result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            return $row;
        }
    }
    else
    {
        die("500");
    }
}

function get_servers_data()
{
    global $conn;
    $sql = "SELECT server_data FROM servers";
    $result = $conn->query($sql);

    $results = array();

    if (!empty($result) && $result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            array_push($results, $row);
        }
       return $results;
    }
    else
    {
        die("500");
    }
}

function set_server_custom_name($name, $data)
{
    global $conn;
    global $permission;
    if ($permission)
    {
        $sql = "UPDATE servers SET server_custom_name='".base64_decode($data)."' WHERE id='".$match_id."'";
        $result = $conn->query($sql);

        if ($conn->query($sql) === TRUE) {
            return "200";
        } else {
          die("500");
        }
    }
    else
    {
        die("403");
    }


}

function get_players_from_match($name, $server_key, $match_id)
{
    global $conn;
    global $permission;
        if ($permission)
        {
            $sql = "SELECT players FROM matches WHERE id='" . $match_id . "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $d = $row["players"];
                    if (!$d == "") {$d = $d . ";";}
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
        	die("403");
        }

}

function add_player_to_match($name, $match_id, $player)
{
    global $conn;
    global $permission;
    if ($permission)
    	{
            $sql = "UPDATE matches SET players='".get_players_from_match($name, $server_key, $match_id).$content."' WHERE server_name='" . $name . "'";
            if ($conn->query($sql) === TRUE) {
                return "200";
            } else {
              die("500");
            }
    	}
    	else
    	{
    		die("403");
    	}
}

function create_new_server()
{
    global $conn;
    $name = generateRandomString(20);
    $sql = "INSERT INTO servers (server_name, server_key)
                   VALUES ('".$name."', '')";

    if ($conn->query($sql) === TRUE)
    {
        return $name;
    }
    else
    {
        die("500");
    }
    return $name;
}

function create_password($name, $server_key)
{
    global $conn;
    global $permission;
    $new_server_key = generateRandomString(20);
    if ($permission)
    {
        $sql = "UPDATE servers SET server_key='".$new_server_key."' WHERE server_name='" . $name . "'";
        if ($conn->query($sql) === TRUE) {
            return $new_server_key;
        } else {
        die("500");
        }
        return $new_server_key;
    }
    else
    {
        if(!getserver_keyFromServer($name))
        {
            $sql = "UPDATE servers SET server_key='".$new_server_key."' WHERE server_name='" . $name . "'";
                    if ($conn->query($sql) === TRUE) {
                        return $new_server_key;
                    } else {
                    die("500");
                    }
            return $new_server_key;
        }
        else
        {
            die("403");
        }
    }
}

function set_permission($name, $server_key)
{
    global $permission;
    $permission = verifyserver_keyFromServer($name, $server_key);
}

?>