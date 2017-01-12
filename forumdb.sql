-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2017 at 06:53 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`account_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `type` int(11) DEFAULT '0',
  `avatar` varchar(90) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `email`, `username`, `password`, `gender`, `type`, `avatar`) VALUES
(1, 'blackwidow@yahoo.com', 'RoboMachine750', 'colt45', 'Undefined', 1, 'admin/user-avatar/admin.jpg'),
(8, 'galaxy@yahoo.com', 'galaxy45', 'milkyway', 'male', 0, 'admin/user-avatar/galaxy45.jpg'),
(9, 'lilly@yahoo.com', 'lillyRider400', 'motorider', 'female', 0, 'admin/user-avatar/lillyRider400.jpg'),
(10, 'qwenna@yahoo.com', 'gill34black', 'black', 'male', 0, 'admin/user-avatar/gill34black.jpg'),
(11, 'toramigz@gmail.com', 'migzYoung', 'young', 'female', 0, 'admin/user-avatar/migzYoung.jpg'),
(12, 'mrhassantaurak@gmail.com', 'hazan2017', '123456', 'male', 1, 'admin/user-avatar/hazan2017.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `discussion_id` int(11) DEFAULT NULL,
`answer_id` int(11) NOT NULL,
  `explanation` text,
  `actual_code` text,
  `resources` text,
  `added_by` varchar(45) NOT NULL,
  `time_added` datetime DEFAULT NULL,
  `votes_counter` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`discussion_id`, `answer_id`, `explanation`, `actual_code`, `resources`, `added_by`, `time_added`, `votes_counter`) VALUES
(4, 11, 'It is very simple to create a C++ program without using a do while or while statement,\njust use a simple loop called for loop. See the code below as a sample loop statement.', '#include <iostream>\nusing namespace std;\n\nint main(){\n     int counter = 0;\n     int size = 10;\n     for (int i=0; i<size; i++) {\n          counter++;\n          cout << counter;\n          cout << endl;\n     }\n     return 0;\n}', NULL, 'RoboMachine750', '2016-11-15 13:25:20', 0),
(32, 14, 'C++ has a way to format the real numbers, you should memorize this three lines of code. Add this code before you output the real number.', 'setf(ios::fixed);\nsetf(ios:showpoint);\nprecision(2);', NULL, 'RoboMachine750', '2016-11-27 08:30:10', 0),
(3, 18, 'It is so simple man, just be sure to follow the syntax of C++ language then everything will be alright. Now if you read nothing about it, then try the link below - it will bring you to a website full of C++ syntax tutorial.', '#include <iostream>\nusing namespace std;\nint main() {\n    cout << "Hello World!";\n    return 0;\n}', NULL, 'RoboMachine750', '2016-12-04 14:34:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `answer_id` int(11) DEFAULT NULL,
`comments_id` int(11) NOT NULL,
  `comments` text,
  `added_by` varchar(45) NOT NULL,
  `time_added` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`answer_id`, `comments_id`, `comments`, `added_by`, `time_added`) VALUES
(11, 7, 'Comments is not working.', 'galaxy45', NULL),
(11, 8, 'What going on here???????????/', 'galaxy45', NULL),
(11, 9, 'Hahaha . . ', 'galaxy45', NULL),
(11, 10, 'Hala  . .nag work na siya...', 'galaxy45', NULL),
(11, 11, 'askdlh fsldah lksdha lkfahsdl kfa', 'galaxy45', NULL),
(11, 12, 'ssss', 'galaxy45', NULL),
(11, 13, '', 'galaxy45', NULL),
(11, 14, '', 'galaxy45', NULL),
(11, 15, '', 'galaxy45', NULL),
(11, 16, ' asd asd fasd f ds fasd fsad f', 'galaxy45', NULL),
(11, 17, 'sd kk ksad k kkfsadk ksdf kasdkf askd faks fnka snflas nflasn fks nfks akdhf ks fkasf kashk fhkash flka sfwf', 'lillyRider400', NULL),
(11, 18, ' klasd kaslf lafkj asklj faklj kajsn flkajsh lkjash knaskd nasknd fksjnf lkasjh lkasj lkasd lfkasjd lfkasd', 'lillyRider400', NULL),
(14, 19, '', 'lillyRider400', NULL),
(14, 20, 'askljh akd hlkah fa f F AF', 'lillyRider400', NULL),
(14, 21, 'skald khsal kjhflasd khflkashdf lhasd f', 'lillyRider400', NULL),
(14, 22, 'lsdakj fl;as j;allsssssssssssssssssssssssssss', 'lillyRider400', NULL),
(14, 23, 'sa ', 'lillyRider400', NULL),
(14, 24, ' sdf fff', 'RoboMachine750', NULL),
(14, 26, 'nanan n na  a', 'RoboMachine750', NULL),
(14, 37, 'tyiweqyiyiy y oqwye oiywqoie yiowu yetioqwyotyioqytoiqw tq tqttqt', 'RoboMachine750', '2016-12-02 23:32:06'),
(18, 38, 'Ok. maybe I will start learning C++ language.', 'lillyRider400', '2016-12-04 16:00:31'),
(18, 39, 'It so basic, but I cannot write a good data struct project. Still a lot to learn. Thanks for the resources.', 'lillyRider400', '2016-12-04 16:03:12'),
(18, 40, 'An old yet great language.', 'galaxy45', '2016-12-04 16:06:34'),
(18, 41, 'Yeah ! such an old language.', 'lillyRider400', '2016-12-04 09:17:02'),
(11, 42, 'ok', 'lillyRider400', '2016-12-04 09:19:32'),
(18, 43, 'Hey guys, is there another nice sites/resources regarding the topic?', 'lillyRider400', '2016-12-04 09:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE IF NOT EXISTS `discussion` (
  `topic_id` int(11) DEFAULT NULL,
`discussion_id` int(11) NOT NULL,
  `discussion` varchar(1024) NOT NULL,
  `explanation` varchar(1024) DEFAULT NULL,
  `actual_code` varchar(2048) DEFAULT NULL,
  `added_by` varchar(45) NOT NULL,
  `time_added` datetime DEFAULT NULL,
  `views_counter` int(11) DEFAULT '0',
  `answers_counter` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`topic_id`, `discussion_id`, `discussion`, `explanation`, `actual_code`, `added_by`, `time_added`, `views_counter`, `answers_counter`) VALUES
(1, 3, 'How to write a simple C++ code that will print Hello World?', 'I have given a task in a class to write a Hello World program in C++ platform. \nI have a code here, but it seems not working - please someone help me.                                                ', '#inlcude <iostream.hd>\nusing namespace std;\n\nint main() {\n     print.this(Hello World!!!!!!!!!!!!!!!!!);\n     return\n}                                                ', 'RoboMachine750', '2016-11-08 09:17:23', 10, 1),
(1, 4, 'How to make a loop program in C++ without using do while or while statement?', '                                                ', '                                                ', 'RoboMachine750', '2016-11-12 00:57:06', 7, 1),
(7, 31, 'How to get the value of the checkbox input in HTML?', 'I have a current web project where I used a checkbox as trigger toggler to show something and hide something. But I find it hard to get/retrieve the value of the checkbox itself. I try this code but didnt work.', '$("#checkbox-id").val();', 'RoboMachine750', '2016-11-19 11:30:06', 5, 0),
(1, 32, 'How do you format real numbers or double numbers in C++?', 'I have a code that uses a double number variable, everything is fine except that I want to format the output into two decimal only. Example instead of 50.124902e09, it should be 50.12.', '<#include iostream>;\nusing namespace std;\nint main() {\n     double price;\n     int count;\n     double tax = 7.5625;\n     double total = 0.0;\n     cout << "Enter the price: ";\n     cin >> price;\n     cout << "How many did you buy? ";\n     cin >> count;\n     for (int i=0; i<count; i++) {\n           total = total + price;\n           total = total + tax;\n     }\n     cout << "The total expenses is: ";\n     cout << total;\n}\n', 'lillyRider400', '2016-11-27 08:23:40', 29, 1),
(4, 33, 'I have a problem in updating a column(s) within a single table using triggers. ', '', '', 'migzYoung', '2016-12-09 09:11:53', 11, 0),
(2, 34, 'How to access a variable from different script?', '', '', 'hazan2017', '2017-01-12 08:18:33', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `answer_id` int(11) DEFAULT NULL,
`resources_id` int(11) NOT NULL,
  `website` varchar(90) DEFAULT NULL,
  `title` varchar(90) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`answer_id`, `resources_id`, `website`, `title`) VALUES
(11, 9, ' www.codestarter.com', 'Starter Programmer Examples'),
(11, 10, 'www.codecpp.com', 'C++ language for starters'),
(18, 12, 'www.devcpptutorial.com', 'Write C++ Code Now');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
`topic_id` int(11) NOT NULL,
  `topic` varchar(45) NOT NULL,
  `added_by` varchar(45) NOT NULL,
  `time_added` datetime DEFAULT NULL,
  `discussion_counter` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic`, `added_by`, `time_added`, `discussion_counter`) VALUES
(1, 'C++', 'admin', '2016-11-06 13:55:36', 0),
(2, 'C#', 'admin', '2016-11-06 13:55:36', 0),
(3, 'Java', 'admin', '2016-11-06 13:55:36', 0),
(4, 'MySql', 'admin', '2016-11-06 13:55:36', 0),
(5, 'PHP', 'admin', '2016-11-06 13:55:36', 0),
(6, 'Javascript', 'admin', '2016-11-06 13:55:36', 0),
(7, 'HTML', 'admin', '2016-11-17 11:27:29', 0),
(8, 'Python', 'admin', '2017-01-12 08:15:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`account_id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`answer_id`), ADD KEY `fk_discussion_id` (`discussion_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comments_id`), ADD KEY `fk_answer_id2` (`answer_id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
 ADD PRIMARY KEY (`discussion_id`), ADD KEY `fk_topic_id` (`topic_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
 ADD PRIMARY KEY (`resources_id`), ADD KEY `fk_answer_id` (`answer_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
 ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
MODIFY `discussion_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
MODIFY `resources_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
ADD CONSTRAINT `fk_discussion_id` FOREIGN KEY (`discussion_id`) REFERENCES `discussion` (`discussion_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `fk_answer_id2` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`);

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
ADD CONSTRAINT `fk_topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
ADD CONSTRAINT `fk_answer_id` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
