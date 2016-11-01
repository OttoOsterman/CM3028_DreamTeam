DROP TABLE IF EXISTS Media, Location CASCADE;

CREATE TABLE Location (location_id int NOT NULL, latitude DECIMAL(9,6) NOT NULL, longitude DECIMAL(9,6) NOT NULL, name nvarchar(255) NOT NULL,
	description text, CONSTRAINT pk_location_id PRIMARY KEY (location_id));
	
CREATE TABLE Media (media_id int NOT NULL, media_path varchar(50) NOT NULL, type varchar(25) NOT NULL, location_id int NOT NULL,
	CONSTRAINT pk_media_id PRIMARY KEY (media_id), CONSTRAINT fk_location_id FOREIGN KEY (location_id) REFERENCES Location(location_id));