
drop database if exists geometrija; 
create database geometrija;
use geometrija;

CREATE TABLE IF NOT EXISTS `barve` (
  `barvaID` int(11) NOT NULL,
  `barva` char(20) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`barvaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;


INSERT INTO `barve` (`barvaID`, `barva`) VALUES
(1, 'bela'),
(2, 'modra');

commit;
CREATE TABLE IF NOT EXISTS `tocke2d` (
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `barvaID` int(11) NOT NULL,
  PRIMARY KEY (`x`,`y`),
  KEY `barvaID` (`barvaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;


INSERT INTO `tocke2d` (`x`, `y`, `barvaID`) VALUES
(4, 4, 1),
(1, 4, 2),
(12, 23, 2),
(13, 10, 2);
commit;
ALTER TABLE `tocke2d`
  ADD CONSTRAINT `tocke2d_ibfk_1` FOREIGN KEY (`barvaID`) REFERENCES `barve` (`barvaID`);


drop database if exists geometrija1; 
create database geometrija1;
use geometrija1;


CREATE TABLE IF NOT EXISTS `tocke2d` (
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `barva` varchar(6) NOT NULL,
  PRIMARY KEY (`x`,`y`)
);


INSERT INTO `tocke2d` (`x`, `y`, `barva`) VALUES
(4, 4, 'ff0000'),
(1, 4, 'ff0000'),
(12, 23, '00ff00'),
(123, 23, '00ff00'),
(12, 123,  '0000ff'),
(13, -100, '0000ff');
commit;
