<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../Javascript/servers_writer.js"></script>
</head>
<body>
	<div id="screen">
		<script>

            write_servers(<?php

            include "../tools.php";

            try {$name = $_GET["server"];}
            catch (Exception  $e) {$name = FALSE;}

            try {$match_id = $_GET["q"];}
            catch (Exception  $e) {$match_id = FALSE;}

            echo get_match_players_data($name, $match_id);

            ?>, "../");

        </script>
	</div>
</body>
</html>