SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS News, Permission, Event, Photo, User, Club, Calendar, ClubMember CASCADE;
SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE Club (club_id int NOT NULL AUTO_INCREMENT, name nvarchar(255) NOT NULL, genre nvarchar(50), description text, contact_info nvarchar(255),
	CONSTRAINT pk_club_id PRIMARY KEY (club_id), CHECK (genre in ('placeholder')));

CREATE TABLE Photo (photo_id int NOT NULL AUTO_INCREMENT, photo_path nvarchar(255), is_profile_photo tinyint(1) NOT NULL, club_id int NOT NULL, CONSTRAINT pk_photo_id PRIMARY KEY (photo_id),
  CONSTRAINT photo_fk_club_id FOREIGN KEY (club_id) REFERENCES Club (club_id));

CREATE TABLE Event (event_id int NOT NULL AUTO_INCREMENT, name nvarchar(255) NOT NULL, description text, date DATETIME NOT NULL,
	CONSTRAINT pk_event_id PRIMARY KEY (event_id));

CREATE TABLE Calendar (club_id int NOT NULL AUTO_INCREMENT, event_id int NOT NULL, CONSTRAINT pk_calendar PRIMARY KEY (club_id, event_id),
	CONSTRAINT calendar_fk_club_id FOREIGN KEY (club_id) REFERENCES Club (club_id), CONSTRAINT calendar_fk_event_id FOREIGN KEY (event_id) REFERENCES Event (event_id));

CREATE TABLE Permission (acc_type varchar(50) NOT NULL, access_level varchar(50) NOT NULL, CONSTRAINT pk_acc_type PRIMARY KEY (acc_type),
	CHECK(access_level in ('readonly', 'contribute-only', 'write-maps', 'write-clubs', 'admin')));
	
CREATE TABLE User (user_id int NOT NULL AUTO_INCREMENT, username nvarchar(255) NOT NULL, hash char(64) NOT NULL, salt char(64) NOT NULL,
	acc_type varchar(50) NOT NULL, CONSTRAINT pk_user_id PRIMARY KEY (user_id),
	CONSTRAINT user_fk_acc_type FOREIGN KEY (acc_type) REFERENCES Permission (acc_type));
	
CREATE TABLE ClubMember (user_id int NOT NULL, club_id int NOT NULL, CONSTRAINT pk_user_club_id PRIMARY KEY (user_id, club_id),
	CONSTRAINT clubmember_fk_user_id FOREIGN KEY (user_id) REFERENCES User(user_id), CONSTRAINT clubmember_fk_club_id FOREIGN KEY (club_id) REFERENCES Club (club_id));
		
CREATE TABLE News (news_id int NOT NULL AUTO_INCREMENT, title nvarchar(255) NOT NULL, content text NOT NULL, date DATETIME NOT NULL, CONSTRAINT pk_news_id PRIMARY KEY (news_id));