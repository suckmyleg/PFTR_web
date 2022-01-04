<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../Styles/players_styles.css">
	<link rel="stylesheet" type="text/css" href="../Styles/player_styles.css">
	<link rel="stylesheet" type="text/css" href="../Styles/players_screen_styles.css">
	<script type="text/javascript" src="../Javascript/players_writer.js"></script>
</head>
<body>
	<div id="screen">
		<script>
			for (var i = 0; i <20; i++)
			{
				write(<?php

                include "../tools.php";

                try {$name = $_GET["server"];}
                catch (Exception  $e) {$name = FALSE;}

                try {$match_id = $_GET["q"];}
                catch (Exception  $e) {$match_id = FALSE;}

                echo get_match_players_data($name, $match_id);

				?>, "../");
			}
		</script>
	</div>
</body>
</html>