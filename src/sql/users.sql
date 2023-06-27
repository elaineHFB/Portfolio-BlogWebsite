-- http://localhost/phpMyAdmin5/
CREATE TABLE users (
	ID int NOT NULL AUTO_INCREMENT,
	username varchar(15),
	email varchar(50),
	password varchar(15),
	PRIMARY KEY (ID)
);

INSERT INTO users (username, email, password)
VALUES ('test', 'test@qmul.com', '123')