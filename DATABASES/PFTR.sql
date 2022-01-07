CREATE TABLE `matches` (
  `id` INT(6) PRIMARY KEY AUTO_INCREMENT,
  `server_name` VARCHAR(20),
  `winner` VARCHAR(20),
  `players` VARCHAR(500),
  `max_players` INT(4) DEFAULT 20,
  `players_data` VARCHAR(6000),
  `last_reload` TIMESTAMP,
  `added` TIMESTAMP DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `servers` (
  `id` INT(6) PRIMARY KEY AUTO_INCREMENT,
  `server_name` VARCHAR(20),
  `server_custom_name` VARCHAR(20),
  `server_data` VARCHAR(500),
  `server_key` VARCHAR(20),
  `last_reload` TIMESTAMP DEFAULT (CURRENT_TIMESTAMP),
  `added` TIMESTAMP DEFAULT (CURRENT_TIMESTAMP)
);
