CREATE DATABASE `setlist-fmi`;

CREATE TABLE `courses` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(255) NOT NULL,
 `description` varchar(1024) DEFAULT NULL,
 `lecturer` varchar(128) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `videos` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `url` varchar(255) NOT NULL,
 `description` varchar(1024),
 `courseID` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 FOREIGN KEY (`courseId`) REFERENCES `courses`(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `email` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
