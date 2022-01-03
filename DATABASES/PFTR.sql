CREATE TABLE `matches` (
  `id` INT(6) PRIMARY KEY AUTO_INCREMENT,
  `server_name` VARCHAR(20),
  `winner` VARCHAR(20),
  `players` VARCHAR(500),
  `max_players` INT(4) DEFAULT 20,
  `players_data` VARCHAR(2000),
  `added` TIMESTAMP DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `servers` (
  `id` INT(6) PRIMARY KEY AUTO_INCREMENT,
  `server_name` VARCHAR(20),
  `server_key` VARCHAR(20),
  `added` TIMESTAMP DEFAULT (CURRENT_TIMESTAMP)
);
