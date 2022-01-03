<?php

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
	return getKeyFromServer($name) == $key;
}

function getKeyFromServer($name)
{
	
}

function save_to_database($name, $key, $content)
{
	if (verifyKeyFromServer($name, $key))
	{

		return "Saved";
	}
	else
	{
		return "Permission denied";
	}
}

function host_new_match()
{

}

function host_new_server($name)
{

	return generateRandomString(20);
}

$name = $_GET["server"];

$key = $_GET["key"];

$command = $_GET["command"];

$data = $_GET["data"];

if($command == "host_new_server")
{
	$output = host_new_server($name);
}
if($command == "host_new_match")
{
	$output = "";
}
if($command == "reload")
{
	$output = save_to_database($name, $key, $data);
}

?>