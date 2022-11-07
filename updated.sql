/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - emapp_test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`emapp_test` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `emapp_test`;

/*Table structure for table `attendances` */

DROP TABLE IF EXISTS `attendances`;

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_type` varchar(50) NOT NULL,
  `participant_reference_id` int(11) NOT NULL,
  `attendance_timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `event_reference_id` int(11) NOT NULL,
  `attendance_user_id` int(12) NOT NULL,
  `attendance_status` varchar(155) NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;

/*Data for the table `attendances` */

insert  into `attendances`(`attendance_id`,`attendance_type`,`participant_reference_id`,`attendance_timestamp`,`event_reference_id`,`attendance_user_id`,`attendance_status`) values 
(40,'am-in',1073,'2022-09-10 04:00:08',147,1997,'attended'),
(41,'am-in',1070,'2022-09-10 04:00:32',147,1994,'attended'),
(42,'am-in',1072,'2022-09-10 04:01:34',147,1996,'attended'),
(43,'am-out',1070,'2022-09-10 05:28:50',147,1994,'attended'),
(44,'am-in',1122,'2022-09-12 07:12:19',157,2007,'attended'),
(45,'am-in',1123,'2022-09-12 07:13:21',157,2008,'attended'),
(46,'am-in',1124,'2022-09-12 07:14:11',157,2009,'attended'),
(47,'am-in',1125,'2022-09-12 07:14:50',157,2010,'attended'),
(48,'am-out',1126,'2022-09-12 07:16:07',157,2011,'attended'),
(49,'am-out',1127,'2022-09-12 07:16:39',157,2012,'attended'),
(50,'am-out',1127,'2022-09-12 07:16:41',157,2012,'attended'),
(51,'am-in',1129,'2022-09-12 07:29:54',158,2007,'attended'),
(52,'am-in',1130,'2022-09-12 07:30:48',158,2008,'attended'),
(53,'am-in',1131,'2022-09-12 07:31:25',158,2009,'attended'),
(54,'am-in',1132,'2022-09-12 07:32:00',158,2010,'attended'),
(55,'am-in',1133,'2022-09-12 07:32:34',158,2011,'attended'),
(56,'am-in',1134,'2022-09-12 07:33:08',158,2012,'attended'),
(57,'am-in',1135,'2022-09-12 07:33:43',158,2013,'attended'),
(58,'am-out',1129,'2022-09-12 07:54:57',158,2007,'late'),
(59,'am-out',1130,'2022-09-12 07:55:44',158,2008,'attended'),
(60,'am-out',1134,'2022-09-12 07:56:21',158,2012,'attended'),
(61,'am-out',1135,'2022-09-12 07:56:51',158,2013,'attended'),
(62,'am-out',1132,'2022-09-12 07:57:15',158,2010,'attended'),
(63,'am-out',1133,'2022-09-12 07:57:40',158,2011,'attended'),
(64,'am-out',1131,'2022-09-12 07:58:09',158,2009,'attended'),
(65,'pm-in',1129,'2022-09-12 08:14:54',158,2007,'late'),
(66,'pm-in',1130,'2022-09-12 08:15:29',158,2008,'attended'),
(67,'pm-in',1131,'2022-09-12 08:16:09',158,2009,'attended'),
(68,'pm-in',1132,'2022-09-12 08:16:52',158,2010,'attended'),
(69,'pm-in',1133,'2022-09-12 08:17:25',158,2011,'attended'),
(70,'pm-in',1134,'2022-09-12 08:17:51',158,2012,'attended'),
(71,'pm-in',1135,'2022-09-12 08:18:17',158,2013,'attended'),
(72,'pm-out',1129,'2022-09-12 08:27:12',158,2007,'attended'),
(73,'pm-out',1130,'2022-09-12 08:27:39',158,2008,'attended'),
(74,'pm-out',1131,'2022-09-12 08:28:18',158,2009,'attended'),
(75,'pm-out',1132,'2022-09-12 08:28:51',158,2010,'attended'),
(76,'pm-out',1133,'2022-09-12 08:29:26',158,2011,'attended'),
(77,'pm-out',1134,'2022-09-12 08:29:56',158,2012,'attended'),
(78,'pm-out',1135,'2022-09-12 08:30:33',158,2013,'attended'),
(79,'am-in',1160,'2022-09-13 07:09:23',160,2026,'attended'),
(80,'am-in',1176,'2022-09-13 07:27:28',161,2027,'attended'),
(81,'am-in',1177,'2022-09-13 07:28:01',161,2028,'attended');

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
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

/*Data for the table `departments` */

insert  into `departments`(`department_id`,`dept_name`,`dept_description`,`dept_code`,`dept_imgurl`,`organization_id`) values 
(167,'Admin Organization Department','Admin Organization Department Details','admin','https://emapppp.000webhostapp.com/assets/uploads/306105747.jpg',143),
(175,'School of Information and Communication Technology','Lorem ipsum dolor sit amet, consectetur adipiscing elit. ','SICT','https://emapppp.000webhostapp.com/assets/uploads/1542750941.jpg',148),
(176,'School of Education Technology','Lorem ipsum dolor sit amet, consectetur adipiscing elit. ','SET','https://emapppp.000webhostapp.com/assets/uploads/1392513319.jpg',148),
(178,'School of Information Technology ','test description ','SICT','https://firebasestorage.googleapis.com/v0/b/school-event-manager.appspot.com/o/deptImages%2Fdepthimg178.0?alt=media&token=b174443d-1662-4eb8-a4b0-875fc7e95a39',149),
(179,'School of Teacher Education','test','STE','https://firebasestorage.googleapis.com/v0/b/school-event-manager.appspot.com/o/deptImages%2Fdepthimg179.0?alt=media&token=82041602-c2e1-48a1-88cd-4924ea745206',149),
(180,'School of Business administration','test','BSBA','https://emapppp.000webhostapp.com/assets/uploads/1788095180.png',150);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `evaluations` */

insert  into `evaluations`(`evaluation_id`,`user_reference_id`,`event_reference_id`,`question_1`,`question_2`,`question_3`,`question_4`,`question_5`) values 
(15,2013,158,'1','2','2','2','1'),
(16,2007,158,'2','2','1','1','3'),
(17,2008,158,'1','3','2','3','1'),
(18,2012,158,'3','3','2','1','2'),
(19,2010,158,'3','3','2','2','1'),
(20,2011,158,'3','4','3','1','1'),
(21,2009,158,'5','3','4','3','2'),
(22,2026,160,'1','2','3','4','5'),
(23,2027,161,'2','2','1','1','4'),
(24,2028,161,'1','2','1','3','5');

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `event_description` longtext NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_img` varchar(255) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `event_datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `event_date` varchar(12) NOT NULL,
  `event_attendance_duration` int(11) NOT NULL,
  `event_start_time_am` time NOT NULL,
  `event_end_time_am` time NOT NULL,
  `event_start_time_pm` time DEFAULT NULL,
  `event_end_time_pm` time DEFAULT NULL,
  `event_all_day` varchar(12) NOT NULL,
  `event_status` varchar(255) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`event_id`,`event_name`,`event_description`,`event_location`,`event_img`,`department_id`,`event_datetime_created`,`event_date`,`event_attendance_duration`,`event_start_time_am`,`event_end_time_am`,`event_start_time_pm`,`event_end_time_pm`,`event_all_day`,`event_status`,`publisher_id`) values 
(147,'Admin Event Test 1','Admin Event Test 1 Description','Test Venue',NULL,167,'2022-09-10 11:56:43','Sep 10, 2022',30,'12:30:00','13:00:00','14:00:00','15:00:00','yes','approved',1991),
(158,'test','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sed congue est. Suspendisse maximus orci pellentesque turpis gravida commodo. Donec quis enim nec nisl tincidunt dignissim.','Gym',NULL,175,'2022-09-12 15:23:42','Sep 12, 2022',20,'15:45:00','15:50:00','16:25:00','16:26:00','yes','approved',1998),
(159,'SICT Days','test','PE Academic',NULL,178,'2022-09-13 14:55:03','Sep 14, 2022',15,'08:00:00','12:00:00','13:00:00','17:00:00','yes','approved',2021),
(160,'Capstone Defense','test','SICT',NULL,178,'2022-09-13 15:00:35','Sep 13, 2022',30,'15:20:00','16:00:00',NULL,NULL,'no','approved',2014),
(161,'Capstone Defense 2','Test','test',NULL,178,'2022-09-13 15:25:54','Sep 12, 2022',25,'15:30:00','16:30:00',NULL,NULL,'no','approved',2014),
(162,'Capstone Defense 3','test','test',NULL,179,'2022-09-13 15:30:29','Sep 13, 2022',45,'16:00:00','17:00:00',NULL,NULL,'no','approved',2014),
(163,'SICT Days','test','test',NULL,175,'2022-11-06 19:37:03','Nov 08, 2022',15,'20:36:00','21:36:00','22:36:00','23:36:00','yes','approved',1998);

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
) ENGINE=InnoDB AUTO_INCREMENT=7092 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members`(`member_id`,`member_email`,`usertype`,`department_id`,`organization_id`,`user_reference_id`) values 
(6993,'admin1@gmail.com','admin',NULL,143,1991),
(6994,'organizer1@gmail.com','organizer',167,143,1992),
(6995,'organizer2@gmail.com','organizer',167,143,1993),
(6996,'member1@gmail.com','member',167,143,1994),
(6997,'member2@gmail.com','member',167,143,1995),
(6998,'member3@gmail.com','member',167,143,1996),
(6999,'member4@gmail.com','member',167,143,1997),
(7040,'gilanverbooc@gmail.com','admin',NULL,148,1998),
(7055,'fauhufa@dutipiw.zw','organizer',175,148,2007),
(7056,'jebis@jezre.ma','organizer',175,148,2008),
(7057,'vo@legfaw.lt','member',175,148,2009),
(7058,'ud@dafluizu.my','member',175,148,2010),
(7059,'vetkas@zu.mm','member',175,148,2011),
(7060,'nonug@lifzumil.ec','member',175,148,2012),
(7061,'souj@ab.mk','member',175,148,2013),
(7062,'gilanbooc123@gmail.com','admin',NULL,149,2014),
(7063,'amie.bangculot1@nmsc.edu.ph','member',178,149,2015),
(7064,'serge.estanero1@nmsc.edu.ph','member',178,149,2016),
(7065,'janbert.gabicaq@nmsc.edu.ph','member',178,149,2017),
(7066,'luigi.maqcas@nmsc.edu.ph','member',178,149,2018),
(7067,'ryan.maqgusara@nmsc.edu.ph','member',178,149,2019),
(7068,'dhenmarqc.ginos@nmsc.edu.ph','member',178,149,2020),
(7069,'charlestonclydevillaruz@gmail.com','organizer',178,149,2021),
(7070,'gilanbooc123@gmail.com','admin',NULL,150,2014),
(7071,'charlestonclydevillaruz@gmail.com','member',180,150,2021),
(7072,'charlestonclydevillaruz@gmail.com','member',179,149,2021),
(7073,'dowadowadidadowadidadowadi@gmail.com','member',179,149,2022),
(7074,'luigimacas143@gmail.com','member',179,149,2023),
(7075,'reilzebs@gmail.com','member',179,149,2024),
(7076,'dowadowadidadowadidadowadi@gmail.com','member',178,149,2022),
(7077,'luigimacas143@gmail.com','member',178,149,2023),
(7078,'reilzebs@gmail.com','member',178,149,2024),
(7079,'gilanverbooc@gmail.com','member',178,149,1998),
(7080,'charlestonclydevillaruzdev@gmail.com','member',178,149,2025),
(7081,'meynard@nmsc.edu.ph','member',178,149,2026),
(7082,'leslyn.reazol@nmsc.edu.ph','member',178,149,2027),
(7083,'jayrdels@nmsc.edu.ph','member',178,149,2028),
(7084,'meynard@nmsc.edu.ph','member',179,149,2026),
(7085,'jayrdels@nmsc.edu.ph','member',179,149,2028),
(7086,'jayrdels@nmsc.edu.ph','admin',NULL,151,2028),
(7087,' ralita@gmail.com ','member',178,149,2029),
(7088,' jorbox@gmail.com','member',178,149,2030),
(7089,' test@gmail.com','member',178,149,2031),
(7090,' reilzebs@gmail.com','member',178,149,2032),
(7091,' jakzajsja','member',178,149,2033);

/*Table structure for table `organizations` */

DROP TABLE IF EXISTS `organizations`;

CREATE TABLE `organizations` (
  `organization_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(100) DEFAULT NULL,
  `org_description` longtext DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `org_imgurl` longtext DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `org_address` varchar(255) DEFAULT NULL,
  `org_admin_id` int(11) DEFAULT NULL,
  `org_status` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`organization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=latin1;

/*Data for the table `organizations` */

insert  into `organizations`(`organization_id`,`org_name`,`org_description`,`type`,`org_imgurl`,`date_created`,`org_address`,`org_admin_id`,`org_status`) values 
(143,'Admin Organization','Admin Organization Details',NULL,'https://images.unsplash.com/photo-1606327054536-e37e655d4f4a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80','2022-09-10','Admin Organization Address',1991,'approved'),
(148,'Northwestern Mindanao State College of Science and Technology','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis iaculis mauris. Mauris id varius dolor. Curabitur euismod massa eget nisi aliquam cursus. Mauris a ante mi.',NULL,'https://emapppp.000webhostapp.com/assets/uploads/8O6AE3OmpTfZUBLkIrPmM0FdM8Inrs.png','2022-09-12','Labuyo tangub city',1998,'approved'),
(149,'Northwestern Mindanao State College of Science and Technology ','Test description ','School',NULL,'2022-09-13','Labuyo Tangub City ',2014,'approved'),
(150,'Governor Alfonso D tan Collete','test',NULL,'https://images.unsplash.com/photo-1606327054536-e37e655d4f4a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80','2022-09-13','test',2014,'approved'),
(151,'Budol Fight','Kaon',NULL,'https://emapppp.000webhostapp.com/assets/uploads/TtMUj5UnNhe26n9RSH7eICIqFtO3SB.jpg','2022-09-13','New York',2028,'approved');

/*Table structure for table `participants` */

DROP TABLE IF EXISTS `participants`;

CREATE TABLE `participants` (
  `participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `accesstype` varchar(20) NOT NULL,
  `participant_status` varchar(20) NOT NULL,
  `event_id` int(11) NOT NULL,
  `member_reference_id` int(11) NOT NULL,
  PRIMARY KEY (`participant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1191 DEFAULT CHARSET=utf8mb4;

/*Data for the table `participants` */

insert  into `participants`(`participant_id`,`accesstype`,`participant_status`,`event_id`,`member_reference_id`) values 
(1068,'attendee','confirmed',147,6994),
(1069,'attendee','confirmed',147,6995),
(1070,'attendee','confirmed',147,6996),
(1071,'attendee','confirmed',147,6997),
(1072,'attendee','confirmed',147,6998),
(1073,'attendee','confirmed',147,6999),
(1074,'attendee','pending',148,7012),
(1075,'attendance-checker','confirmed',148,7013),
(1076,'attendee','confirmed',148,7014),
(1077,'attendee','pending',148,7015),
(1078,'attendee','pending',148,7016),
(1079,'attendee','pending',148,7017),
(1080,'attendee','pending',148,7018),
(1081,'attendee','confirmed',149,7019),
(1082,'attendance-checker','confirmed',149,7020),
(1083,'attendee','confirmed',149,7021),
(1084,'attendee','pending',149,7022),
(1085,'attendee','pending',149,7023),
(1086,'attendee','pending',149,7024),
(1087,'attendee','pending',149,7025),
(1088,'attendee','confirmed',150,7026),
(1089,'attendance-checker','confirmed',150,7027),
(1090,'attendee','confirmed',150,7028),
(1091,'attendee','confirmed',150,7029),
(1092,'attendee','confirmed',150,7030),
(1093,'attendee','confirmed',150,7031),
(1094,'attendee','confirmed',150,7032),
(1095,'attendee','confirmed',151,7033),
(1096,'attendee','confirmed',151,7034),
(1097,'attendee','confirmed',151,7035),
(1098,'attendee','pending',151,7036),
(1099,'attendee','pending',151,7037),
(1100,'attendee','pending',151,7038),
(1101,'attendee','pending',151,7039),
(1129,'attendee','confirmed',158,7055),
(1130,'attendance-checker','confirmed',158,7056),
(1131,'attendee','confirmed',158,7057),
(1132,'attendee','confirmed',158,7058),
(1133,'attendee','confirmed',158,7059),
(1134,'attendee','confirmed',158,7060),
(1135,'attendee','confirmed',158,7061),
(1136,'attendee','pending',159,7063),
(1137,'attendee','pending',159,7064),
(1138,'attendee','pending',159,7065),
(1139,'attendee','pending',159,7066),
(1140,'attendee','pending',159,7067),
(1141,'attendee','pending',159,7068),
(1142,'attendee','pending',159,7069),
(1143,'attendee','pending',159,7076),
(1144,'attendee','pending',159,7077),
(1145,'attendee','pending',159,7078),
(1146,'attendee','pending',159,7079),
(1147,'attendee','pending',159,7080),
(1148,'attendee','pending',160,7063),
(1149,'attendee','pending',160,7064),
(1150,'attendee','pending',160,7065),
(1151,'attendee','pending',160,7066),
(1152,'attendee','pending',160,7067),
(1153,'attendee','pending',160,7068),
(1154,'attendance-checker','confirmed',160,7069),
(1155,'attendee','pending',160,7076),
(1156,'attendee','pending',160,7077),
(1157,'attendee','pending',160,7078),
(1158,'attendee','pending',160,7079),
(1159,'attendee','pending',160,7080),
(1160,'attendee','confirmed',160,7081),
(1161,'attendee','confirmed',160,7082),
(1162,'attendee','confirmed',160,7083),
(1163,'attendee','pending',161,7063),
(1164,'attendee','pending',161,7064),
(1165,'attendee','pending',161,7065),
(1166,'attendee','pending',161,7066),
(1167,'attendee','pending',161,7067),
(1168,'attendee','pending',161,7068),
(1169,'attendee','pending',161,7069),
(1170,'attendee','pending',161,7076),
(1171,'attendee','pending',161,7077),
(1172,'attendee','pending',161,7078),
(1173,'attendee','pending',161,7079),
(1174,'attendee','pending',161,7080),
(1175,'attendee','confirmed',161,7081),
(1176,'attendee','confirmed',161,7082),
(1177,'attendee','confirmed',161,7083),
(1178,'attendee','pending',162,7072),
(1179,'attendee','pending',162,7073),
(1180,'attendee','pending',162,7074),
(1181,'attendee','pending',162,7075),
(1182,'attendee','confirmed',162,7084),
(1183,'attendee','pending',162,7085),
(1184,'attendee','confirmed',163,7055),
(1185,'attendee','pending',163,7056),
(1186,'attendee','pending',163,7057),
(1187,'attendee','pending',163,7058),
(1188,'attendee','pending',163,7059),
(1189,'attendee','pending',163,7060),
(1190,'attendee','pending',163,7061);

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `question_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `event_reference_id` int(11) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `questions` */

insert  into `questions`(`question_id`,`question_content`,`question_type`,`event_reference_id`) values 
(12,'test','input',0),
(13,'Test','rating',163),
(14,'eval2','input',163),
(15,'eval3','rating',163),
(16,'eval4','rating',163);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photourl` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `registration_status` varchar(255) DEFAULT NULL,
  `temp_pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2035 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`userid`,`firstname`,`lastname`,`email`,`photourl`,`password`,`registration_status`,`temp_pass`) values 
(1,'Super ','Admin','superadmin@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$a7okWTQ.uzlPCJ.aZMA2yeNAYa79xuvNkwGf51E4/dTJcAzDrZgx.','registered',NULL),
(1991,'Admin 1','Admin 1','admin1@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$QOOFuJYMjHTcdj73ADNDhe620fOqCIdp8ENhATCd4UjgiS/PQT.We','registered',NULL),
(1992,'Organizer1','Organizer1','organizer1@gmail.com','https://emapppp.000webhostapp.com/assets/uploads/674795533.jpg','$2y$10$fjPT2R.0KbrqzUFT9Gd1FuZ4q0H2eThNJCnLbWV8RR13OvUDfej0e','registered',NULL),
(1993,'Organizer2','Organizer2','organizer2@gmail.com','https://emapppp.000webhostapp.com/assets/uploads/1748948336.jpg','$2y$10$mXB0PJuFWza5IcZ9SURuCOdE99eup/XNFiENTE887Xn.udTQkojdm','registered',NULL),
(1994,'Member1','Member1','member1@gmail.com','https://emapppp.000webhostapp.com/assets/uploads/770401109.jpg','$2y$10$a7okWTQ.uzlPCJ.aZMA2yeNAYa79xuvNkwGf51E4/dTJcAzDrZgx.','registered',NULL),
(1995,'Member2','Member2','member2@gmail.com','https://emapppp.000webhostapp.com/assets/uploads/669153272.jpg','$2y$10$WVWId2vNQC7OhksY.wzRaOTQYpEbTbr9piaDRnWNokFR4TCwAPAhW','registered',NULL),
(1996,'Member3','Member3','member3@gmail.com','https://emapppp.000webhostapp.com/assets/uploads/1615570003.jpg','$2y$10$r6GgSnvH2IY8QXxXfG166O7zgh60MtbCEhHzrqpxibJiF0YgCxg/K','registered',NULL),
(1997,'Member4','Member4','member4@gmail.com','https://emapppp.000webhostapp.com/assets/uploads/1415320472.jpg','$2y$10$m1lt7wtXyu7XyohLz5CPROJOHRltJyLrvjtw9NamH2t8P51U6hmqO','registered',NULL),
(1998,'Gilan Ver','Booc','gilanverbooc@gmail.com','https://emapppp.000webhostapp.com/assets/uploads/1579626563.jpg','$2y$10$rEB9xsYWcQJx17ypOLV3z.dPm26sbtFh3wgZbh4MCIKXA4KgWXdXK','registered',NULL),
(1999,'Anna Rose','Ruiz','rose@gmail.com','https://emapppp.000webhostapp.com/assets/uploads/565620506.jpeg','$2y$10$Hw8W1eML/KLZAdvzpYhldOwRtLmHNRhp3.plivLreEkLp1kpFz2GS','registered',NULL),
(2000,'Charlie','Fisher','itoupo@hid.uk','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','l36AxcSF'),
(2001,'Billy','Vega','kiwdepu@decubej.mx','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','6jEJX4hp'),
(2002,'Chase','Hunter','tiniho@fob.om','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','YDzWXv4A'),
(2003,'Claudia','Tran','napge@rugezmew.py','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','hFfK85qq'),
(2004,'Brent','Hardy','uw@lidwa.gr','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','bQXWM2Yc'),
(2005,'Rosalie','Medina','dene@di.bv','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','BLjlo0br'),
(2006,'Evelyn','Barnett','iwrito@pogbot.tn','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','cd0cuxJ0'),
(2007,'Clara','Klein','fauhufa@dutipiw.zw','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$6Tb6t6p.L8S/zs4GC.eYO.djA6zh3pxY7iW7puPms1gSs8Agl7s9m','registered',NULL),
(2008,'Micheal','Mendoza','jebis@jezre.ma','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$f52aOSGRb4mGBA4h1CJyyu7QnAx66FN4Dxs7h6lYc7NwAlVK8ssUu','registered',NULL),
(2009,'Fanny','Boyd','vo@legfaw.lt','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$eAR9et2qLBcw9PCSFNfe3.Y9w/a6tkHOFjNhiXbC9X8bUp/wvEe3S','registered',NULL),
(2010,'Mildred','Richards','ud@dafluizu.my','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$s0OX6ACimbEVuHyah82dLOn70tXaYdWrZk61WSDhef0SkFyxdJyA2','registered',NULL),
(2011,'Lulu','Zimmerman','vetkas@zu.mm','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$6Wpnb73NhwPEA3rC5Y5r/.lnzbH1tuFcLzJsfhYPmu6VdTJkSobZi','registered',NULL),
(2012,'Jim','Pope','nonug@lifzumil.ec','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$roJqZR0gW3pRQzTZvhuQF.8t.U5AjuCvBLiCRm4TU4gzf.AAWvuDe','registered',NULL),
(2013,'Ruth','Morgan','souj@ab.mk','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$71YtJ97xMYLOh8h.2ven2.gx/pAfG2IUG3/2R0F7vyaVzgX41BaPC','registered',NULL),
(2014,'gilan','gilanbocc','gilanbooc123@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png','$2y$10$3lhD0hqibFN1Jsc9ZsG8xeYRHt4QpUSQQotHvKFs.64CX1269cT5m','registered',NULL),
(2015,'Amie','Bangculot','amie.bangculot1@nmsc.edu.ph','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','crdyv4'),
(2016,'Serge','Estanero','serge.estanero1@nmsc.edu.ph','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','TeaQ5V'),
(2017,'Janbert','Gabica','janbert.gabicaq@nmsc.edu.ph','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','VD8T3b'),
(2018,'Luigi','Macas','luigi.maqcas@nmsc.edu.ph','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','ReLA0L'),
(2019,'Ryan','Magusara','ryan.maqgusara@nmsc.edu.ph','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','5qfidn'),
(2020,'DhenMarc','Ginos','dhenmarqc.ginos@nmsc.edu.ph','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','VSBrwM'),
(2021,'Charleston Clyde','Villaruz','charlestonclydevillaruz@gmail.com','https://emapppp.000webhostapp.com/assets/uploads/780758168.jpg','$2y$10$.NKC0noNxDj.RmgWV1bMtu3rM2NLfvIljPhypBQlxQRsWf.mLfgvS','registered',NULL),
(2022,'Charleston Clyde','Villaruz','dowadowadidadowadidadowadi@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','xn4o8xZ4'),
(2023,'luigi','Macas','luigimacas143@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','fHkJ9bV7'),
(2024,'rel','zebs','reilzebs@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','xWAl4sQI'),
(2025,'Luigi ','macas','charlestonclydevillaruzdev@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','o9y8NkSW'),
(2026,'Joseph Meynard','Ogdol','meynard@nmsc.edu.ph','https://emapppp.000webhostapp.com/assets/uploads/2113198746.jpg','$2y$10$3ngEoZJ5teKvvQpgLHetGuHawRo3UNYcjvwIb/r.0Puf7S/.0dJ3K','registered',NULL),
(2027,'Leslyn','Reazol','leslyn.reazol@nmsc.edu.ph','https://emapppp.000webhostapp.com/assets/uploads/312750268.jpg','$2y$10$HiLFKEPC.R/8fKauljoNiurRSdqQ.bDnJKXlXdAmag0uEUfcyVeZW','registered',NULL),
(2028,'G-ar','Delosa','jayrdels@nmsc.edu.ph','https://emapppp.000webhostapp.com/assets/uploads/2112168660.jpg','$2y$10$0fEc9iK/JVfVmF8/gnC2SOhh8zaUnc1xSCCGfvyRWoZHDKjcFb5o2','registered',NULL),
(2029,'Raulita Chan',' Konichiwa',' ralita@gmail.com ','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','XyUTiI'),
(2030,'Jorbo',' Hotdog',' jorbox@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','WP7n7N'),
(2031,'King',' Kong',' test@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','SAzDCL'),
(2032,'Borya',' jabol',' reilzebs@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','ohSE2P'),
(2033,'brakatak',' pans',' jakzajsja','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending','GIwBT'),
(2034,'raul','jona','icyflame143@gmail.com','https://cdn-icons-png.flaticon.com/512/892/892781.png',NULL,'pending',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
