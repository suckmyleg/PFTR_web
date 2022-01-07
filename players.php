<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Styles/bar.css">
	<link rel="stylesheet" type="text/css" href="Styles/frame.css">
	<script type="text/javascript" src="Javascript/frame.js"></script>
</head>
<body onload="auto_reload_frame('players_frame', 30);">
	<div id="bar_container">
    		<div id="bar">
    			<div id="bar_name">
    				<img class="bar_icons" id="icon1" src="Images/Icono/pollo.png">
    				PFTR
    				<img class="bar_icons" id="icon2" src="Images/Icono/aju.png">
    			</div>
    		</div>
    		<div id="bar_nav">
            			<a href="index.html">Main page</a>
            			<a href="players.html">Match</a>
            			<a href="server.html">Server</a>
            			<a href="info.html">Info</a>
            			<a href="servers.php">Servers</a>
            		</div>
    	</div>
	<?php

        try {$match_id = $_GET["m"];}
        catch (Exception  $e) {$match_id = FALSE;}

        if ($match_id)
        {
	        echo '<div id="players_frame_container"><iframe id="players_frame" scrolling="no" src="Screens/players.php?m='.$match_id.'"></iframe></div>';
        }
        else
        {
            echo '<div id="players_frame_container"><iframe id="players_frame" scrolling="no" src="Screens/players.php"></iframe></div>';
        }

	?>

</body>
</html>