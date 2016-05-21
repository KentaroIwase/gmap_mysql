create database gmap_db;
grant all on gmap_db.* to dbuser@localhost identified by 'TGheisHTdk4';

use gmap_db;

create table places (
	id int not null auto_increment primary key,
	place_id int unique,
	place_name varchar(255),
	created datetime,
	modified datetime
);

show tables;
desc places;


LOAD DATA LOCAL INFILE '/home/vagrant/googlemap_php/mysql_import.csv' INTO TABLE places FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' (place_id, place_name);
