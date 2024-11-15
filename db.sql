CREATE TABLE IF NOT EXISTS twitter_users
(
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL,
	description TEXT NOT NULL,

	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS users
(
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,

	PRIMARY KEY(id)
);

