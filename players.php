<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Styles/players_styles.css">
	<link rel="stylesheet" type="text/css" href="Styles/bar.css">
	<link rel="stylesheet" type="text/css" href="Styles/frame.css">
</head>
<body>
	<div id="bar_name">
		<img class="bar_icons" id="icon1" src="Images/Icono/pollo.png">
		PFTR
		<img class="bar_icons" id="icon2" src="Images/Icono/aju.png">
	</div>
	<hr>
	<?php

        try {$match_id = $_GET["m"];}
        catch (Exception  $e) {$match_id = FALSE;}

        if ($match_id)
        {
	        echo '<iframe scrolling="no" src="Screens/players.php?m='.$match_id.'"></iframe>';
        }
        else
        {
            echo '<iframe scrolling="no" src="Screens/players.php"></iframe>';
        }

	?>

</body>
</html>