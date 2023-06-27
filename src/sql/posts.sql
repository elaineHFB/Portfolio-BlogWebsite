-- http://localhost/phpMyAdmin5/
-- Add S to differ sql variable with other
CREATE TABLE posts (
	SPOSTID int NOT NULL AUTO_INCREMENT,
	Stitle varchar(200),
	Spost varchar(500),
	Stime TIMESTAMP,
	PRIMARY KEY (SPOSTID)
);

INSERT INTO posts (Stitle, Spost, Stime)
VALUES ('The first post', 'for testing', CURRENT_TIMESTAMP)