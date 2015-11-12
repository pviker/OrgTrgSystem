-- OrgTrn System sql creation 

CREATE DATABASE IF NOT EXISTS `orgTrn`; 
use orgTrn; 


CREATE TABLE `employees` (
	`id` INT NOT NULL AUTO_INCREMENT, 
	`first_name` VARCHAR(45) NULL,
	`last_name` VARCHAR(45) NULL,
	`email` VARCHAR(45) NULL,
	`boss email` VARCHAR (45) NULL, 
	`ELevel` INT NOT NULL, 
	PRIMARY KEY (`id`)); 

CREATE TABLE `credentials` (
	`id` INT NULL,
	`username` VARCHAR(45) NULL,
	`password` VARCHAR(45) NULL,
	`admin` BINARY NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`id`) REFERENCES employees(`id`));
	
CREATE TABLE `plans` ( 
	`id` INT NOT NULL,
	`pYear` INT NOT NULL,
	`plan1` VARCHAR(45) NULL, 
	`plan2` VARCHAR(45) NULL, 
	`plan3` VARCHAR(45) NULL, 
	`plan4` VARCHAR(45) NULL,
	`shared` BINARY NOT NULL,
	PRIMARY KEY (`id`,`pYear`),
	FOREIGN KEY (`id`) REFERENCES employees(`id`)); 
	
INSERT INTO employees VALUES 
	('', 'Josh', 'Wilson', 'jw@aol.com' , 'jw@aol.com' , '10'),
	('', 'Paul', 'Wilson', 'pw@aol.com' , 'jw@aol.com' , '9'),
	('', 'Gram', 'Parker', 'gp@aol.com' , 'jw@aol.com' , '9'),
	('', 'Hannah', 'Ganoe', 'hg@aol.com' , 'jw@aol.com' , '9'),
	('', 'Paula', 'Sheehan', 'ps@aol.com' , 'jw@aol.com' , '9'),
	('', 'Javier', 'Pilson', 'jp@aol.com' , 'pw@aol.com' , '8'),
	('', 'Youna', 'Xiong', 'yx@aol.com' , 'ps@aol.com' , '8'),
	('', 'Pilsner', 'Francis', 'fp@aol.com' , 'hg@aol.com' , '8'),
	('', 'Josh', 'Lucas', 'jl@aol.com' , 'gp@aol.com' , '8'),
	('', 'Foodie', 'Critic', 'fc@aol.com' , 'jl@aol.com' , '7'),
	('', 'Pierrie', 'Favre', 'pf@aol.com' , 'jl@aol.com' , '7'),
	('', 'Tyler', 'Shanks', 'ts@aol.com' , 'yx@aol.com' , '6'),
	('', 'Betty', 'Robinson', 'br@aol.com' , 'fc@aol.com' , '6'),
	('', 'Kevin', 'Johnson', 'kj@aol.com' , 'fc@aol.com' , '6'),
	('', 'Scott', 'Dedon', 'sd@aol.com' , 'pf@aol.com' , '6');
	
INSERT INTO credentials values 
	('1', 'jw@aol.com', sha1('password' ), '1' ), 
	('2', 'pw@aol.com', sha1('password' ) , '0' ), 
	('3', 'gp@aol.com', sha1('password' ) , '0' ), 
	('4', 'hg@aol.com', sha1('password' ) , '0' ), 
	('5', 'ps@aol.com', sha1('password' ) , '0' ), 
	('6', 'jp@aol.com', sha1('password' ) , '0' ), 
	('7', 'yx@aol.com',sha1('password' ) , '0' ), 
	('8', 'fp@aol.com',sha1('password' ) , '0' ), 
	('9', 'jl@aol.com',sha1('password' ) , '0' ), 
	('10', 'fc@aol.com', sha1('password' ) , '0' ), 
	('11', 'pf@aol.com', sha1('password' ) , '0' ), 
	('12', 'ts@aol.com', sha1('password' ) , '0' ), 
	('13', 'br@aol.com', sha1('password' ) , '0' ), 
	('14', 'kj@aol.com', sha1('password1' ) , '0' ), 
	('15', 'sd@aol.com',sha1('password2' ) , '0' ); 
	
	