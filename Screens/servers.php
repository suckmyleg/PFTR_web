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

            echo get_servers_data();

            ?>, "../");

        </script>
	</div>
</body>
</html>