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

            echo json_encode(get_server_data_id($_GET["s"]));

            ?>, "../");

        </script>
	</div>
</body>
</html>