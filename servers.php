<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Styles/bar.css">
	<link rel="stylesheet" type="text/css" href="Styles/frame.css">
	<link rel="stylesheet" type="text/css" href="Styles/general.css">
	<script type="text/javascript" src="Javascript/bar.js"></script>
</head>
<body>
	<div id="bar_container">
    		<div id="bar">
    			<div id="bar_name">
    				<img class="bar_icons" id="icon1" src="Images/Icono/pollo.png">
    				PFTR
    				<img class="bar_icons" id="icon2" src="Images/Icono/aju.png">
    			</div>
    		</div>
    		<button onclick="swtich_bar_visibility();" id="bar_nav_button_displayer"><img src="Images/Nav_Icons/more.png"></button>
    	</div>
    	<div id="bar_nav_vertical">
    		<ul>
    			<li><a href="index.html">Main page</a></li>
    			<li><a href="players.html">Match</a></li>
    			<li><a href="server.html">Server</a></li>
    			<li><a href="info.html">Info</a></li>
    			<li><a class="active" href="servers.php">Servers</a></li>
    		</ul>
    	</div>
	<?php
	    echo '<div id="servers_frame_container"><iframe id="servers_frame" scrolling="no" src="Screens/servers.php"></iframe></div>';
	?>
</body>
</html>