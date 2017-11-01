CREATE TABLE tasks (
	tid INT(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid VARCHAR(128) not null,
    date DATETIME not null,
    task TEXT not null
);