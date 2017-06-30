CREATE DATABASE `setlist-fmi`;

CREATE TABLE `videos` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `url` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `email` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
