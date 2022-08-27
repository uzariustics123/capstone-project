/*
SQLyog Ultimate v13.1.1 (32 bit)
MySQL - 10.4.24-MariaDB : Database - events_management
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`events_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `events_management`;

/*Table structure for table `attendances` */

DROP TABLE IF EXISTS `attendances`;

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_type` varchar(50) NOT NULL,
  `participant_reference_id` int(11) NOT NULL,
  `attendance_timestamp` datetime NOT NULL,
  `event_reference_id` int(11) NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `attendances` */

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(255) NOT NULL,
  `dept_description` varchar(255) NOT NULL,
  `dept_code` varchar(20) NOT NULL,
  `dept_imgurl` varchar(255) DEFAULT NULL,
  `organization_id` int(11) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

/*Data for the table `departments` */

insert  into `departments`(`department_id`,`dept_name`,`dept_description`,`dept_code`,`dept_imgurl`,`organization_id`) values 
(103,'School of Information Communication Technology','123123','123','../assets/uploads/1712647499.png',83),
(104,'School of Teacher Education','Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus exercitationem molestiae itaque, minus inventore aut sunt cum unde totam dicta suscipit ducimus expedita in laborum tenetur ipsum cumque officia ipsa!','ste','../assets/uploads/1552011815.png',83),
(105,'School of Information Communication Technology','Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus exercitationem molestiae itaque, minus inventore aut sunt cum unde totam dicta suscipit ducimus expedita in laborum tenetur ipsum cumque officia ipsa!','123','../assets/uploads/2031963663.jpg',84),
(106,'School of Information Communication Technology','Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus exercitationem molestiae itaque, minus inventore aut sunt cum unde totam dicta suscipit ducimus expedita in laborum tenetur ipsum cumque officia ipsa!','12312','../assets/uploads/1946083028.png',92),
(107,'SBAM','Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus exercitationem molestiae itaque, minus inventore aut sunt cum unde totam dicta suscipit ducimus expedita in laborum tenetur ipsum cumque officia ipsa!','126','../assets/uploads/257235594.png',85);

/*Table structure for table `evaluations` */

DROP TABLE IF EXISTS `evaluations`;

CREATE TABLE `evaluations` (
  `evaluation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_reference_id` int(11) NOT NULL,
  `event_reference_id` int(11) NOT NULL,
  `question_1` varchar(255) NOT NULL,
  `question_2` varchar(255) NOT NULL,
  `question_3` varchar(255) NOT NULL,
  `question_4` varchar(255) NOT NULL,
  `question_5` varchar(255) NOT NULL,
  PRIMARY KEY (`evaluation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `evaluations` */

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_img` varchar(255) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `event_datetime_created` varchar(12) NOT NULL,
  `event_date` varchar(12) NOT NULL,
  `event_attendance_duration` time NOT NULL,
  `event_start_time_am` time NOT NULL,
  `event_end_time_am` time NOT NULL,
  `event_start_time_pm` time DEFAULT NULL,
  `event_end_time_pm` time DEFAULT NULL,
  `event_all_day` varchar(12) NOT NULL,
  `event_status` varchar(255) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`event_id`,`event_name`,`event_description`,`event_location`,`event_img`,`department_id`,`event_datetime_created`,`event_date`,`event_attendance_duration`,`event_start_time_am`,`event_end_time_am`,`event_start_time_pm`,`event_end_time_pm`,`event_all_day`,`event_status`,`publisher_id`) values 
(84,'test event','test','test',NULL,103,'Aug 22,2022','Aug 24, 2022','00:15:00','09:32:00','10:33:00','13:33:00','17:33:00','yes','approved',1416),
(85,'test notif event','1231','123123',NULL,103,'Aug 23,2022','Aug 25, 2022','00:15:00','13:32:00','14:32:00',NULL,NULL,'no','approved',1416),
(86,'admin event','test','test',NULL,103,'Aug 24,2022','Aug 25, 2022','00:15:00','13:47:00','14:47:00','15:47:00','16:47:00','yes','approved',1411);

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_email` varchar(50) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `user_reference_id` int(11) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6291 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members`(`member_id`,`member_email`,`usertype`,`department_id`,`organization_id`,`user_reference_id`) values 
(6256,'clyde@gmail.com','admin',NULL,83,1411),
(6257,'dowadowadidadowadi@gmail.com','member',103,83,1412),
(6258,'luigi.macas@nmsc.edu.ph','member',103,83,1413),
(6259,'gilanver.booc@nmsc.edu.ph','member',103,83,1414),
(6260,'dowadowadidadowadidadowadi@gmail.com','member',103,83,1415),
(6261,'charlestonclydevillaruzdev@gmail.com','organizer',103,83,1416),
(6262,'clyde@gmail.com','admin',NULL,84,1411),
(6263,'dowadowadidadowadi@gmail.com','member',104,83,1412),
(6264,'luigi.macas@nmsc.edu.ph','member',104,83,1413),
(6265,'gilanver.booc@nmsc.edu.ph','member',104,83,1414),
(6266,'dowadowadidadowadidadowadi@gmail.com','member',104,83,1415),
(6267,'charlestonclydevillaruzdev@gmail.com','member',104,83,1416),
(6268,'dowadowadidadowadi@gmail.com','member',105,84,1412),
(6269,'luigi.macas@nmsc.edu.ph','member',105,84,1413),
(6270,'gilanver.booc@nmsc.edu.ph','member',105,84,1414),
(6271,'dowadowadidadowadidadowadi@gmail.com','member',105,84,1415),
(6272,'charlestonclydevillaruzdev@gmail.com','member',105,84,1416),
(6273,'clyde@gmail.com','admin',NULL,85,1411),
(6274,'charlestonclydevillaruzdev@gmail.com','admin',NULL,86,1416),
(6275,'clyde@gmail.com','admin',NULL,87,1411),
(6276,'clyde@gmail.com','admin',NULL,88,1411),
(6277,'clyde@gmail.com','admin',NULL,89,1411),
(6278,'clyde@gmail.com','admin',NULL,90,1411),
(6279,'clyde@gmail.com','admin',NULL,91,1411),
(6280,'clyde@gmail.com','admin',NULL,92,1411),
(6281,'dowadowadidadowadi@gmail.com','member',106,92,1412),
(6282,'luigi.macas@nmsc.edu.ph','member',106,92,1413),
(6283,'gilanver.booc@nmsc.edu.ph','member',106,92,1414),
(6284,'dowadowadidadowadidadowadi@gmail.com','member',106,92,1415),
(6285,'charlestonclydevillaruzdev@gmail.com','member',106,92,1416),
(6286,'dowadowadidadowadi@gmail.com','member',107,85,1412),
(6287,'luigi.macas@nmsc.edu.ph','member',107,85,1413),
(6288,'gilanver.booc@nmsc.edu.ph','member',107,85,1414),
(6289,'dowadowadidadowadidadowadi@gmail.com','member',107,85,1415),
(6290,'charlestonclydevillaruzdev@gmail.com','member',107,85,1416);

/*Table structure for table `organizations` */

DROP TABLE IF EXISTS `organizations`;

CREATE TABLE `organizations` (
  `organization_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(100) NOT NULL,
  `org_description` varchar(255) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `org_imgurl` longblob DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `org_address` varchar(255) DEFAULT NULL,
  `org_admin_id` int(11) NOT NULL,
  PRIMARY KEY (`organization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

/*Data for the table `organizations` */

insert  into `organizations`(`organization_id`,`org_name`,`org_description`,`type`,`org_imgurl`,`date_created`,`org_address`,`org_admin_id`) values 
(83,'Northwestern Mindanao State College','23123',NULL,'../assets/uploads/00mLhspjOQFe0WSN6QmiABiQu6nipP.jpg','2022-08-22','Bagumbang Bonifacio Misamis Occidental',1411),
(84,'Governor Alfonso D. Tan College','131231',NULL,'../assets/uploads/DpqS9P9dDysPtwEQyLAWYckBA7Qezj.png','2022-08-23','Bagumbang Bonifacio Misamis Occidental',1411),
(85,'tes','test',NULL,'../assets/uploads/6qgnQi39rRZf7cMbIIbLMpyEZztWcB.jpg','2022-08-24','test',1411),
(86,'La Salle University','test',NULL,'../assets/uploads/pMJbGSEtOjaBADMHEbBnEXyexcJQjB.png','2022-08-24','Ozamis CIty',1416),
(87,'test','test',NULL,'w','2022-08-25','test',1411),
(88,'Northwestern Mindanao State College','123123123',NULL,'Li4vYXNzZXRzL3VwbG9hZHMvM2NQbzNGdHdQczZJUGtYQ2RINkZxU2pRcmZJNXp1LnBuZw==','2022-08-25','Bagumbang Bonifacio Misamis Occidental',1411),
(89,'Nort123123123nao State College','123123123',NULL,'Li4vYXNzZXRzL3VwbG9hZHMvdDJRZzlEYlpuaEFjaXF5NWhQbVA3TU5aR0MwbkRkLnBuZw==','2022-08-25','Bagumbang Bonifacio Misamis Occidental',1411),
(90,'Governor Alfonso D. Tan College','qweqwe',NULL,NULL,'2022-08-25','qweqwe',1411),
(91,'adsadsasdasd','dasdasd',NULL,'Li4vYXNzZXRzL3VwbG9hZHMvQmRUR0JXeEF6WXcxTHJlUVlINW9IRFVZMnJETFFPLmpwZw==','2022-08-25','asdasdasda',1411),
(92,'qweqwe','qweqweqw',NULL,'../assets/uploads/9txHuiNbTfjtBekmC34nHJcGmnADSI.png','2022-08-25','qweqwe',1411);

/*Table structure for table `participants` */

DROP TABLE IF EXISTS `participants`;

CREATE TABLE `participants` (
  `participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `accesstype` varchar(20) NOT NULL,
  `participant_status` varchar(20) NOT NULL,
  `event_id` int(11) NOT NULL,
  `member_reference_id` int(11) NOT NULL,
  PRIMARY KEY (`participant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=513 DEFAULT CHARSET=utf8mb4;

/*Data for the table `participants` */

insert  into `participants`(`participant_id`,`accesstype`,`participant_status`,`event_id`,`member_reference_id`) values 
(498,'attendee','pending',84,6257),
(499,'attendee','pending',84,6258),
(500,'attendee','pending',84,6259),
(501,'attendee','pending',84,6260),
(502,'attendee','confirmed',84,6261),
(503,'attendee','pending',85,6257),
(504,'attendee','pending',85,6258),
(505,'attendee','pending',85,6259),
(506,'attendee','pending',85,6260),
(507,'attendee','confirmed',85,6261),
(508,'attendee','pending',86,6257),
(509,'attendee','pending',86,6258),
(510,'attendee','pending',86,6259),
(511,'attendee','pending',86,6260),
(512,'attendee','confirmed',86,6261);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photourl` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `registration_status` varchar(255) DEFAULT NULL,
  `temp_pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1417 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`userid`,`firstname`,`lastname`,`email`,`photourl`,`password`,`registration_status`,`temp_pass`) values 
(1411,'Charleston Clyde','Villaruz','clyde@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$Qep1tUw.JJAS5oQdrzbdLeHOzR9tHFLNMGXJqW/3B5CYz0CYZNxMi','registered',NULL),
(1412,'clyde','villaruz','dowadowadidadowadi@gmail.com',NULL,'','pending','S6Ak7vWB'),
(1413,'luigi','macas','luigi.macas@nmsc.edu.ph',NULL,'','pending','D0emaK4b'),
(1414,'gilan','booc','gilanver.booc@nmsc.edu.ph',NULL,'','pending','wGGn50Ue'),
(1415,'Carin','Twidale','dowadowadidadowadidadowadi@gmail.com',NULL,'','pending','0EwZCnpI'),
(1416,'Des','Irlam','charlestonclydevillaruzdev@gmail.com','../assets/uploads/293576905.jpg','$2y$10$RBQCHAsLD.ErqiruGdI1JOUk0/8DeyWgeYZ.WJwtGT.V.GJFW6AL.','registered',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
