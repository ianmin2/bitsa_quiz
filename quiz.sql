-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2014 at 08:27 PM
-- Server version: 5.6.14
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quiz`
--
CREATE DATABASE IF NOT EXISTS `quiz` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `quiz`;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `team` bigint(255) NOT NULL,
  `question` bigint(255) NOT NULL,
  `score` decimal(65,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `history`
--

TRUNCATE TABLE `history`;
-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `team` bigint(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Truncate table before insert `players`
--

TRUNCATE TABLE `players`;
--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `team`, `gender`) VALUES
(1, 'Lydia Ngoma', 2, ' f'),
(2, 'Anemutsa Marunze', 2, ' f'),
(3, 'Kelvin Kaputo', 2, ' m'),
(4, 'Abraham Mulondiwa', 2, ' m'),
(5, 'Sangu Ngoma', 2, ' m'),
(6, 'Eliah Gondwe', 3, 'm '),
(7, 'Vuka Kaunda', 3, 'm'),
(8, 'Tony Kamanga', 3, 'm'),
(9, 'Nathan Mukela', 3, 'm'),
(10, 'Y Komana', 3, 'm'),
(11, ' Tshepo Sihlongonyane', 4, ' m'),
(12, ' Jigna Suthar', 4, 'f'),
(13, ' Brian Mecha', 4, 'm'),
(14, ' Oluchi Ibeleme', 4, 'f'),
(15, ' Emil Kitua', 4, 'm'),
(16, ' Shadrack Kobimbo', 1, 'm'),
(17, ' Josiane Majou', 1, 'f'),
(18, ' Naomi Kirui', 1, 'f'),
(19, ' Daniel Njue', 1, 'm'),
(20, ' Cliff Ombiru', 1, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `done` int(1) NOT NULL,
  `points` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='The Questions Table' AUTO_INCREMENT=133 ;

--
-- Truncate table before insert `questions`
--

TRUNCATE TABLE `questions`;
--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category`, `question`, `answer`, `done`, `points`) VALUES
(1, 'g_knowledge', 'In which year was Microsoft windows xp operating system released?', ' 2001 ', 0, 10),
(2, 'g_knowledge', 'Which operating system Preceded Microsoft Windows xp?', ' Windows 2000 (2000) / Windows ME (2000) ', 0, 10),
(3, 'technical', 'What does GUI and CLI stand for?', 'graphical user interface ', 0, 10),
(4, 'g_knowledge', 'Which Oparating system succeeded Microsoft Xp?', 'vista ', 0, 10),
(5, 'g_knowledge', 'Which year was Windows Vitsa released?', 'January 30 2007', 0, 10),
(6, 'g_knowledge', 'Which operating succeeded UNIX?', 'Linux ', 0, 10),
(7, 'g_knowledge', 'In which year was Linux released?', '1991 ', 0, 10),
(8, 'g_knowledge', 'In which year Nokia integrate Windows operating system into its mobile devices?', ' October 2010 ', 0, 10),
(9, 'g_knowledge', 'How much did Microsoft by Nokia Company for?', '7.2 Billion ', 0, 10),
(10, 'g_knowledge', 'What is the latest windows tablet?', ' ?Surface Pro', 0, 10),
(11, 'g_knowledge', 'In which year was the first Windows tablet released?', '2002 ', 0, 10),
(12, 'g_knowledge', 'When was the first Apple Ipad released?', ' april 3 2010 ', 0, 10),
(13, 'g_knowledge', 'What is the latest Apple Ipad called?', ' ipad air 2 ', 0, 10),
(14, 'g_knowledge', 'State two differences between an Apple Ipad mini and the Ipad?', ' size > processor ', 0, 10),
(15, 'g_knowledge', 'In which year was the first Apple Ipod released?', ' 2001 ', 0, 10),
(16, 'g_knowledge', 'What is the largest size (memory) of an Apple Ipod?', '64GB ', 0, 10),
(17, 'g_knowledge', 'Which Samsung galaxy preceded the S3?', ' S2 ', 0, 10),
(18, 'g_knowledge', 'In which year was Samsung galaxy S3 released?', ' 2012 ', 0, 10),
(19, 'g_knowledge', 'State 2 differences between the S5 and S4?', 'S5 is water resistant and it is running on Android kitkat ', 0, 10),
(20, 'trending', 'Where is the Sony headquarters based?', ' Minato-Tokyo ', 0, 10),
(21, 'trending', 'What is the latest released Sony mobile device?', ' Xperia Z3 ', 0, 10),
(22, 'trending', 'What is the latest released Nokia device?', ' Nokia Lumia 830 ', 0, 10),
(23, 'trending', 'Which Nokia mobile Phone has a 41 mega pixel camera?', ' Nokia Lumia 1020 ', 0, 10),
(24, 'trending', 'When was Nokia Lumia 1020 Released?', ' January 2014 ', 0, 10),
(25, 'g_knowledge', 'In which year was the first Blackberry released?', '2007 ', 0, 10),
(26, 'trending', 'What is the latest released Blackberry mobile device?', ' BlackBerry Q20 ', 0, 10),
(27, 'g_knowledge', 'What is a Blackberry tablet called?', ' BlackBerry PlayBook ', 0, 10),
(28, 'g_knowledge', 'Name one feature Blackberry device have been known for till recently?', 'BBM ', 0, 10),
(29, 'trending', 'Where the headquarters of LG located?', ' Seoul-Korea ', 0, 10),
(30, 'g_knowledge', 'What does LG stand for?', ' Life''s Good ', 0, 10),
(31, 'g_knowledge', 'What does IBM stand for?', ' International Business Machines ', 0, 10),
(32, 'g_knowledge', 'In which year was IBM founded?', ' 1911 ', 0, 10),
(33, 'g_knowledge', 'In which year was Yahoo founded?', ' January 1994 ', 0, 10),
(34, 'trending', 'Where is Yahoo headquarters located?', ' Sunnyvale-California ', 0, 10),
(35, 'g_knowledge', 'In which year was Myspace Social Network Company founded?', ' created in 1999 and launched publically in August 2003', 0, 10),
(36, 'trending', 'Where is Myspace Social Network Company located?', ' Beverly Hills-California ', 0, 10),
(37, 'g_knowledge', 'In which year was HTC Corporation Mobile phone Network Company founded?', ' 1997 ', 0, 10),
(38, 'g_knowledge', 'Name one HTC mobile device and when it was released?', 'March 25 2014 ', 0, 10),
(39, 'g_knowledge', 'Name one Motorola mobile device and when it was released?', ' November 6 2009 motorola droid ', 0, 10),
(40, 'trending', 'Where is Dell headquarters located?', ' Round Rock-Texas ', 0, 10),
(41, 'trending', 'Where is Acer Inc. Electronics Company located?', ' New Taipei-Taiwan ', 0, 10),
(42, 'trending', 'How much did it cost Apple to buy Beats Audio?', ' $3B ', 0, 10),
(43, 'trending', 'Who was the Designer/owner of Beats Audio?', ' rapper and hip hop producer Dr. Dre ', 0, 10),
(44, 'g_knowledge', 'Who much did it cost Facebook to buy WhatsApp?', ' $19 Billion ', 0, 10),
(45, 'g_knowledge', 'How much did it cost google to buy Motorola?', ' $12.5B ', 0, 10),
(46, 'baraton', 'Which graduating class donated the UEAB Wi-Fi?', ' 2011 ', 0, 10),
(47, 'baraton', 'Name 5 UEAB ITS Support staff?', ' ', 0, 10),
(48, 'networking', 'Name one layer 3 networking device?', ' Router ', 0, 10),
(49, 'networking', 'Name one layer 2 networking device?', ' NIC Switch ', 0, 10),
(50, 'g_knowledge', 'What does the abbreviation Hp stand for?', ' Hewlett-Packard  ', 0, 10),
(51, 'it_history', 'What was the first computer mouse made of?', ' Wood ', 0, 10),
(52, 'trending', 'Where is nokia HQ?', ' Espoo-Finland  ', 0, 10),
(53, 'trending', 'Where is Samsung HQ?', ' Seoul-South Korea ', 0, 10),
(54, 'g_knowledge', 'What dose ROM stand for?', ' Read Only Memory ', 0, 10),
(55, 'trending', 'Where is Apple HQ?', ' Cupertino-California ', 0, 10),
(56, 'g_knowledge', 'What does PDF mean?', ' Portable Document Format ', 0, 10),
(57, 'technical', 'Name 3 input devices?', ' Keyboard Mouse Scanner ', 0, 10),
(58, 'g_knowledge', 'What is the name of the first Apple Phone?', ' iPhone 1G  ', 0, 10),
(59, 'g_knowledge', 'Name 3 web browser?', ' Chrome Firefox Opera ', 0, 10),
(60, 'g_knowledge', 'Name 7 mobile phone brands?', ' Nokia Samsung Sony Apple LG ', 0, 10),
(61, 'g_knowledge', 'Name 5 social networks?', ' Facebook Twitter G+ Badoo  Instagram ', 0, 10),
(62, 'technical', 'What dose Png mean?', ' Portable Network Graphics', 0, 10),
(63, 'baraton', 'Name 3 department chairs Of isc department (current/former)?', ' Prof Idowu Dr. Ndiege Mr Onsongo', 0, 10),
(64, 'baraton', 'Name five lecturers from isc department?', ' Mr Ruguri Mr Mayaka Mr Onsongo Mr Ochola Mr Omambia', 0, 10),
(65, 'baraton', 'What is the name of the bitsa club chairman/president?', ' Chifamba Emmanuel', 0, 10),
(66, 'technical', 'Name 3 output devices?', ' Printer Monitor Speakers', 0, 10),
(67, 'technical', 'What does RAM stands for?', ' Random Access Memory', 0, 10),
(68, 'baraton', 'Network administrator of UEAB?', ' Anthony Gichatha', 0, 10),
(69, 'technical', 'What is a hyperlink?', ' It is a reference to a document on the WEB', 0, 10),
(70, 'technical', 'Mean of the term LCD?', ' Liquid-crystal display', 0, 10),
(71, ' technical', 'Name 2 type of printers?', ' Laser Inkjet Bubblejet Dot-matrix', 0, 0),
(72, 'g_knowledge', 'IBM computer division was sold to which Japanese company?', ' Lenovo ', 0, 10),
(73, 'g_knowledge', 'When was IBM sold to Lenovo?', ' 2005 ', 0, 10),
(74, 'g_knowledge', 'Name 5 computer brands?', ' hp acer toshiba ', 0, 10),
(75, 'networking', 'How many layers does the OSI model have?', ' 7', 0, 10),
(76, 'technical', 'What does mean OSI?', ' Open System Interconnection', 0, 10),
(77, 'technical', 'Difference between microprocessor and microcontroller?', ' microprocessor has only CPU', 0, 10),
(78, 'g_knowledge', 'What gender(s) are the CEO of IBM and YAHOO?', ' Female ', 0, 10),
(79, 'g_knowledge', 'What does BITSA stand for? ', 'Baraton information Technolgy Student Association', 0, 10),
(80, 'software', 'Two Facebook languages ', ' PHP &  JavaScript', 0, 10),
(81, 'it_history', 'Name two Google founders ', ' Larry Page and Sergey Brin', 0, 10),
(82, 'it_history', 'Name the Apple founders ', ' Steve Jobs > Ronald Wayne > Steve Wozniak', 0, 10),
(83, 'baraton', 'Name 5 students in the IT department', 'g_knowledge', 0, 0),
(84, 'g_knowledge', 'What does the word "GPS" stand for? ', 'Global Positioning System', 0, 10),
(85, 'technical', 'What does "URL" stand for? ', 'Universal Resource Locator', 0, 10),
(86, 'technical', 'What is the difference between URL & URI? ', ' ', 0, 10),
(87, 'trending', 'What is the LATEST IP protocl? ', 'IPV6', 0, 10),
(88, 'g_knowledge', 'What is the maximum range of bluetooth? ', '10 metres', 0, 10),
(89, 'software', 'What is the difference between application and system software? ', '', 0, 10),
(90, 'g_knowledge', 'Name 3 linux distributions? ', 'Mint > Fedora > Ubuntu', 0, 10),
(91, 'technical', 'How many bits does the IPV6 protocol use? ', 'IPv6 uses a 128-bit address', 0, 10),
(92, 'g_knowledge', 'Name four mainstream web browsers. ', 'Mozilla Firefox > Internet explorer > Opera > Google Chrome > Safari', 0, 10),
(93, 'g_knowledge', 'Name 3 document formats. ', 'text>pdf>powerpoint', 0, 10),
(94, 'technical', 'What is a firewall used for? ', 'The idea of a firewall is to close off the ports (services) you''re not using.', 0, 10),
(95, 'software', 'What is a "TROJAN" in computing? ', 'Trojans are malicious programs that perform actions that have not been authorized by the user', 0, 10),
(96, 'software', 'How many layers does the OSI layer have? ', '7', 0, 10),
(97, 'g_knowledge', 'how many bytes does 1024 bits make? ', '128 bytes', 0, 10),
(98, 'g_knowledge', 'Name 3 mainstream online selling applications/ websites. ', 'Amazon > e-Bay > ', 0, 10),
(99, 'g_knowledge', 'Where are the "IBM" reseaarch labs in kenya? ', 'Address: Langata-Nairobi', 0, 10),
(100, 'it_history', 'What operating system was Nokia running on before windows 8? ', 'Symbian', 0, 0),
(101, 'trending', 'What is the "I-hub"? ', ' an Innovation hub and hacker space in Nairobi that was started in March 2010 by Erik Hersman', 0, 10),
(102, 'software', 'What is the latest release of the windows operating software? ', 'windows 8.1', 0, 10),
(103, 'software', 'What is the latest release of the mac?', ' OSX YOSEMITE', 0, 10),
(104, 'technical', 'What is the difference between "Internet" and "www"? ', ' ', 0, 10),
(105, 'trending', 'Where are the Headquaters of Microsoft? ', ' redmond washington ', 0, 10),
(106, 'it_history', 'When was "Facebook" created and by whom? ', 'February 4 2004 by Mark Zuckerberg ', 0, 10),
(107, 'technical', 'The W3c protocol behind friendship chat on facebook', ' F.O.F ', 0, 10),
(108, 'g_knowledge', 'Who recently bought WHATSAPP & for how much?', ' facebook and 19 Billion ', 0, 10),
(109, 'technical', 'Which multi-billion company owns JAVA?', ' ORACLE ', 0, 10),
(110, 'g_knowledge', 'When was the first I-Phone released?', ' 2001 ', 0, 10),
(111, 'technical', 'Name 3 OSI layers ', 'Physical > data link > Network ', 0, 10),
(112, 'g_knowledge', 'List 6 GOOGLE apps ', 'drive > plus >playstore > music > classroom > Youtube ', 0, 10),
(113, 'g_knowledge', 'LIst 5 mobile O/S ', 'android > windows phone >symbian > blackberry OS and IOS ', 0, 10),
(114, 'g_knowledge', 'Name the first hand held cellphone', ' 1983 Motorola ', 0, 10),
(115, 'software', 'What is a cookie in IT? ', 'a small piece of data sent from a website and stored in a users ', 0, 10),
(116, 'technical', 'What is the difference between UNIX & LINUX? ', 'Different kernel > Different System Design > Different historic period ', 0, 10),
(117, 'it_history', 'Who invented UNIX? ', 'Kenneth Thompson and Dennis Ritchie ', 0, 10),
(118, 'it_history', 'Who developed LINUX? ', 'Linus Torvalds ', 0, 10),
(119, 'trending', 'When was the first ATM in Somalia launched? ', 'October 7 2014 ', 0, 10),
(120, 'it_history', 'When was the first laptop made? ', 'Osborne ', 0, 10),
(121, 'it_history', 'What is the first O/S? ', 'UNIX ', 0, 10),
(122, 'g_knowledge', 'Who owns X-BOX? ', 'Microsoft ', 0, 10),
(123, 'it_history', 'Who is the CEO of GOOGLE? ', 'Larry Page ', 0, 10),
(124, 'g_knowledge', 'Name 2 hall of fame games? ', ' super mario>pacman ', 0, 10),
(125, 'g_knowledge', 'What does ISC stand for? ', 'Information Systems and Computing ', 0, 10),
(126, 'g_knowledge', 'Name the 3 majors in the IT department of Baraton? ', 'Networking>software>BBIT ', 0, 10),
(127, 'g_knowledge', 'Name 2 minors in the IT department ', 'management information system>computer science ', 0, 10),
(128, 'g_knowledge', 'Servers are computers that provide resources to other computers connected to? ', 'A Network ', 0, 10),
(129, 'g_knowledge', 'What does HTTP stand for? ', 'Hypertext Transfer Protocol ', 0, 10),
(130, 'g_knowledge', 'What does IP stand for? ', 'Internet Protocol ', 0, 10),
(131, 'it_history', 'The internet research was funded by? ', 'the U.S. Defense Advanced Research Projects Agency (DARPA) ', 0, 10),
(132, 'technical', '___________ is approximately 1Billion bytes? ', '1024MB / 1GB ', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `team` bigint(255) NOT NULL,
  `score` decimal(65,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `scores`
--

TRUNCATE TABLE `scores`;
-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `slogan` varchar(20) NOT NULL,
  `on` int(1) NOT NULL,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='The teams Table' AUTO_INCREMENT=5 ;

--
-- Truncate table before insert `teams`
--

TRUNCATE TABLE `teams`;
--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `slogan`, `on`, `color`) VALUES
(1, 'Team 1', ' Slogan', 1, ' red'),
(2, 'Team 2', ' Slogan', 1, 'purple'),
(3, 'Team 3', ' Slogan', 1, 'brown'),
(4, 'Team 4', ' Slogan', 1, ' green');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
