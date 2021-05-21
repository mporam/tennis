CREATE TABLE `players` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `lawn` int(11) NOT NULL,
  `clay` int(11) NOT NULL,
  `hard` int(11) NOT NULL,
  `rain` int(11) NOT NULL,
  `dry` int(11) NOT NULL,
  `sun` int(11) NOT NULL,
  `snow` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `players` (`id`, `name`, `lawn`, `clay`, `hard`, `rain`, `dry`, `sun`, `snow`)
VALUES
	(1,'Mike',9,9,9,4,8,7,5),
	(2,'London Lucy',7,5,1,9,4,3,8),
	(3,'Estera',1,4,9,3,7,6,2),
	(4,'Alicja',5,6,8,7,4,1,5),
	(5,'Bristol Lucy',6,1,7,5,8,2,4),
	(6,'Saskia',5,6,7,2,9,7,4),
	(7,'Alina',4,8,6,2,7,6,4),
	(8,'Alex',5,8,1,4,7,3,9);
