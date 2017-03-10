SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `Sales`;
CREATE TABLE IF NOT EXISTS `Sales` (
  `ItemId` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `ContactInfo` varchar(200) NOT NULL,
  `Price` int(11) NOT NULL,
  `College` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `SellDate` date NOT NULL,
  `SellerId` int(11) NOT NULL,
  PRIMARY KEY (`ItemId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;