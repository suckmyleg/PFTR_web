# PFTR_web
Pagina web para ver la partida en directo

## Map
- Search_bar
- - [Players](https://github.com/suckmyleg/PFTR_web/blob/main/players.html) - List of players on a match [Finished]
- - [Server](https://github.com/suckmyleg/PFTR_web/blob/main/server.html) - Server info [Unfinished]
- - [Info](https://github.com/suckmyleg/PFTR_web/blob/main/info.html) - Server and players info [Unfinished]
#
- Url
- - [Server](https://github.com/suckmyleg/PFTR_web/blob/main/server.php) - Server info [Unfinished]
- - [Inscription](https://github.com/suckmyleg/PFTR_web/blob/main/inscription.php) - Log into the match [Unfinished]
#
- Other
- - [Main](https://github.com/suckmyleg/PFTR_web/blob/main/index.html) - Main page [Unfinished]
- - [Servers](https://github.com/suckmyleg/PFTR_web/blob/main/servers.php) - All servers [Unfinished]

# API
[Api](https://github.com/suckmyleg/PFTR_web/blob/main/api.php) - Make request to sql

### Commands
|command_name|returns|name|server_key|match_id|data|
|---|----|--------|--------|--------|-------------|
|reload|200|X|X|X|X|
|create_password|server_key|X|X|||
|host_new_match|match_id|X|X||X|
|create_new_server|name|||||
|match_players_data|players_data|||X||
|get_server_data_id|server_data|X||||
|get_server_data_custom_name|server_data||||X|
|set_server_custom_name|200|X|||X|
|get_delay_request|delay|X||X||


### Args

|Arg|Type|Default|
|---|----|--------|
|name|string|FALSE|
|server_key|string|FALSE|
|match_id|string|FALSE|
|data|base64|FALSE|



