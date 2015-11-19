-- OrgTrn System sql creation 

CREATE DATABASE IF NOT EXISTS `orgTrn`; 
use orgTrn; 


CREATE TABLE `employees` (
	`id` INT NOT NULL AUTO_INCREMENT, 
	`name` VARCHAR(45) NULL,
	`email` VARCHAR(45) NULL,
	`organization_name` VARCHAR(45) NULL, 
	`role` VARCHAR(45) NULL, 
	`manager_email` VARCHAR (45) NULL, 
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
	`plan` TEXT NULL, 
	`shared` BINARY NOT NULL,
	PRIMARY KEY (`id`,`pYear`),
	FOREIGN KEY (`id`) REFERENCES employees(`id`)); 
	
INSERT INTO employees VALUES 
	('', 'Josh Wilson', 'jw@aol.com' , 'CEO', 'CEO', 'jw@aol.com' ),
	('', 'Paul Wilson', 'pw@aol.com' , 'Software Team' , 'Manager', 'jw@aol.com'),
	('', 'Gram Parker', 'gp@aol.com' , 'Network Team', 'Manager', 'jw@aol.com'),
	('', 'Hannah Ganoe', 'hg@aol.com' , 'Sales' , 'Manager' , 'jw@aol.com'),
	('', 'Paula Sheehan', 'ps@aol.com' , 'Sales', 'Manager' , 'jw@aol.com' ),
	('', 'Javier Pilson', 'jp@aol.com' , 'Software Team', 'Team Lead' , 'pw@aol.com' ),
	('', 'Youna Xiong', 'yx@aol.com' , 'Sales', 'Team Lead' ,'ps@aol.com'),
	('', 'Pilsner Francis', 'fp@aol.com' , 'Sales', 'Team Lead' , 'hg@aol.com' ),
	('', 'Josh Lucas', 'jl@aol.com' , 'Network Team', 'Team Lead', 'gp@aol.com' ),
	('', 'Foodie Critic', 'fc@aol.com' , 'Network Team', 'Employee', 'jl@aol.com'),
	('', 'Pierrie Favre', 'pf@aol.com' , 'Network Team', 'Employee' , 'jl@aol.com'),
	('', 'Tyler Shanks', 'ts@aol.com' , 'Sales', 'Employee', 'yx@aol.com'),
	('', 'Betty Robinson', 'br@aol.com' , 'Sales', 'Employee', 'yx@aol.com'),
	('', 'Kevin Johnson', 'kj@aol.com', 'Software Team', 'Employee', 'jp@aol.com'),
	('', 'Scott Dedon', 'sd@aol.com', 'Software Team', 'Employee', 'jp@aol.com');
	
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
	
	