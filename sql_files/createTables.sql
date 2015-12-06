
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `organization_name` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `manager_email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;


CREATE TABLE `credentials2` (
  `id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `admin` binary(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `credentials2_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `pYear` int(11) NOT NULL,
  `plan` text,
  `shared` binary(1) NOT NULL,
  PRIMARY KEY (`id`,`pYear`),
  CONSTRAINT `plans_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

