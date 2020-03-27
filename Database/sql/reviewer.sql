create database reviewer;

use reviewer;

/* create table user  */
DROP TABLE IF EXISTS `reviewer`.`user`;
CREATE TABLE `reviewer`.`user`(
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(50) NOT NULL,
    `lastname` VARCHAR(50) NOT NULL,
    `gender` VARCHAR(6) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `country` VARCHAR(20) NOT NULL,
    `dob` TIMESTAMP(6) NULL DEFAULT NULL,
    `dtoi` TIMESTAMP(6) on update CURRENT_TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
    `role` VARCHAR(5) NOT NULL,
    `username` VARCHAR(50) NOT NULL UNIQUE KEY,
    `password` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;

/*--ADMIN registration--*/


INSERT INTO `user` (`id`, `firstname`, `lastname`, `gender`, `email`, `country`, `dob`, `dtoi`, `role`, `username`, `password`) VALUES
(4, 'Fatema', 'Khan', 'Female', 'fatemakhan@gmail.com', 'Pakistan', '2001-07-13 18:30:00.000000', '2020-03-27 09:22:04.054744', 'user', 'fatema', '123');



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
