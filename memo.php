create database googlemap_db;
grant all on googlemap_db.* to dbuser@localhost identified by 'REkdEiww4';

use googlemap_db;

create table places (
	id int not null auto_increment primary key,
	lat float,
	lng float,
	name varchar(255),
	created datetime,
	modified datetime
);

show tables;
desc places;


LOAD DATA LOCAL INFILE '/home/vagrant/gmap_mysql/places_import.csv' INTO TABLE places FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 1 LINES;
