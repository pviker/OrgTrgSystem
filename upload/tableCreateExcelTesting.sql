CREATE DATABASE `test`;

CREATE TABLE `excel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `eid` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
