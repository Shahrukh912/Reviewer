create database reviewer;

use reviewer;

/* create table user  */
CREATE TABLE user (
username varchar(50) PRIMARY KEY,
password varchar(50)
);

/*--ADMIN registration--*/
INSERT INTO user VALUES("sk","123");


CREATE TABLE `reviewer`.`website` ( 
`id` INT(50) NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(100) NOT NULL , 
`likes` INT(100) NOT NULL , 
`dislikes` INT(100) NOT NULL , 
`url` VARCHAR(40) NOT NULL , 
`rating` INT(10) NOT NULL , 
PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `reviewer`.`review` ( `id` INT(50) NOT NULL , `desciption` TEXT NOT NULL , `name` VARCHAR(100) NOT NULL , `uid` INT(50) NOT NULL ) ENGINE = InnoDB;