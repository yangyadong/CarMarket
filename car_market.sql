# Host: localhost  (Version: 5.6.12-log)
# Date: 2015-12-15 21:37:23
# Generator: MySQL-Front 5.3  (Build 4.263)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "administrator"
#

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '工号',
  `name` char(10) NOT NULL DEFAULT '' COMMENT '管理员',
  `password` char(32) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e' COMMENT '密码',
  `position` varchar(10) NOT NULL DEFAULT '' COMMENT '职位',
  `status` tinyint(1) DEFAULT '0' COMMENT '0正常1禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员';

#
# Data for table "administrator"
#

INSERT INTO `administrator` VALUES (1,201514110,'admin','e10adc3949ba59abbe56e057f20f883e','总经理',0),(2,201514111,'nice','e10adc3949ba59abbe56e057f20f883e','部门经理',1),(3,1433043887,'hello','e10adc3949ba59abbe56e057f20f883e','员工',0),(4,1433067074,'word','e10adc3949ba59abbe56e057f20f883e','部门经理',0);

#
# Structure for table "administrator_new"
#

DROP TABLE IF EXISTS `administrator_new`;
CREATE TABLE `administrator_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '工号',
  `name` char(10) NOT NULL DEFAULT '' COMMENT '管理员',
  `password` char(32) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e' COMMENT '密码',
  `position` varchar(10) NOT NULL DEFAULT '' COMMENT '职位',
  `status` tinyint(1) DEFAULT '0' COMMENT '0正常1禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='管理员表(新)';

#
# Data for table "administrator_new"
#

INSERT INTO `administrator_new` VALUES (6,1433944582,'afaf','e10adc3949ba59abbe56e057f20f883e','3',0);

#
# Structure for table "comment"
#

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pre` char(16) DEFAULT NULL COMMENT '评价人',
  `car` char(20) DEFAULT NULL COMMENT '评价物',
  `comment` text COMMENT '评价',
  `time` int(11) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='评论';

#
# Data for table "comment"
#

INSERT INTO `comment` VALUES (1,'123@qq.com','宝马S2','宝马S2',1431173417),(20,'123@qq.com','宝马E3','阿道夫',1431176526),(21,'123@qq.com','宝马E3','阿道夫',1431177848),(23,'123@qq.com','宝马E3','阿道夫',1431177942),(25,'123@qq.com','宝马S2','宝',1431227324),(26,'123@qq.com','宝马E3','dffasfd ',1431241318);

#
# Structure for table "competence"
#

DROP TABLE IF EXISTS `competence`;
CREATE TABLE `competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_num` int(11) unsigned DEFAULT NULL COMMENT '工号',
  `position` varchar(10) DEFAULT NULL COMMENT '职位',
  `name` char(10) DEFAULT NULL COMMENT '姓名',
  `competence` text COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='权限';

#
# Data for table "competence"
#

INSERT INTO `competence` VALUES (1,201514110,'总经理','admin','1-1,1-2,1-3,2-1,2-2,2-3,3-1,3-2,3-3,4-1,4-2,4-3,5-1,5-2'),(2,201514111,'部门经理','nice','1-1,1-2,2-1,2-2,2-3,3-3,4-1,'),(3,1433043887,'员工','hello','2-3,4-2,5-1,'),(4,1433067074,'部门经理','word','1-1,1-2,1-3,2-1,2-3,4-2,');

#
# Structure for table "competence_new"
#

DROP TABLE IF EXISTS `competence_new`;
CREATE TABLE `competence_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引',
  `position` varchar(10) DEFAULT NULL COMMENT '职位',
  `competence` text COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='权限(新)';

#
# Data for table "competence_new"
#

INSERT INTO `competence_new` VALUES (1,'总经理','1-1,1-2,1-3,2-1,2-2,'),(2,'总经理','1-1,1-2,1-3,2-1,2-2,'),(3,'撒旦法师','2-2,3-1,'),(4,'撒旦法师','2-2,3-1,'),(5,'faf','1-1,2-1,');

#
# Structure for table "show_car"
#

DROP TABLE IF EXISTS `show_car`;
CREATE TABLE `show_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) DEFAULT NULL COMMENT '图片',
  `effect` char(15) DEFAULT NULL COMMENT '类型',
  `price` int(3) unsigned DEFAULT NULL COMMENT '价格',
  `intro` text COMMENT '简介',
  `type` varchar(20) DEFAULT NULL COMMENT '车型',
  `car_num` int(3) unsigned DEFAULT '0' COMMENT '存货',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常1下架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

#
# Data for table "show_car"
#

INSERT INTO `show_car` VALUES (1,'Images/show1.jpg','showList',NULL,'测试宝马新X6对方身上的发生大法师打发发送到发送到发送到发送到发动风飒飒大都是法师打发士大夫阿斯顿发反反复复反复反复反复反复反复反复发反反复复反复士大夫撒地方上的发生大发发生的',NULL,NULL,0),(2,'Images/show2.jpg','showList',NULL,NULL,NULL,NULL,0),(3,'Images/show3.jpg','showList',NULL,NULL,NULL,NULL,0),(4,'Images/show4.jpg','showList',NULL,NULL,NULL,NULL,0),(5,'Images/show5.jpg','showList',NULL,NULL,NULL,NULL,0),(6,'Images/baoma1.jpg','宝马',47,'测试宝马新X6','宝马X1',120,1),(7,'Images/baoma2.jpg','宝马',78,'用科技升华动感 评测宝马新X5 xDrive 50i','宝马x2',255,0),(8,'Images/baoma3.jpg','宝马',32,'全面蜕变 易车网评测宝马1系116i都市版','宝马X3',189,0),(9,'Images/baoma4.jpg','宝马',41,'测试宝马X4 xDrive 35i 我只是长得像X6','宝马S1',176,0),(10,'Images/baoma5.jpg','宝马',53,'竞争力大幅提升 试驾宝马全新3系','宝马S2',10,0),(11,'Images/baoma6.jpg','宝马',46,'Z者无疆 易车网评测宝马新Z4 sDrive 3.0i','宝马S3',110,0),(12,'Images/baoma7.jpg','宝马',37,'在传承经典中寻求创新 测试宝马3系GT','宝马E1',145,0),(13,'Images/baoma8.jpg','宝马',48,'诠释特立独行 评测宝马5系Gran Turismo','宝马E2',211,0),(14,'Images/baoma9.jpg','宝马',39,'抢占眼球仅需25秒 测宝马435i敞篷豪华型','宝马E3',204,0),(15,'Images/benchi1.jpg','奔驰',405,'重新定义豪华车标准 评测全新奔驰S500L','奔驰ML1',186,0),(16,'Images/benchi2.jpg','奔驰',42,'测奔驰CLA 260 4MATIC 优雅与性能兼备','奔驰ML2',197,0),(17,'Images/benchi3.jpg','奔驰',43,'评测奔驰ML400 换装3.0T/动力性能再升级','奔驰ML3',213,0),(18,'Images/benchi4.jpg','奔驰',54,'评测奔驰A260运动型 动力强/价偏高','奔驰X1',163,0),(19,'Images/benchi5.jpg','奔驰',45,'纯粹的家用轿车 评测全新一代奔驰B200','奔驰X2',198,0),(20,'Images/benchi6.jpg','奔驰',46,'绅士运动家 深度评测奔驰E 350 COUPE轿车','奔驰X3',141,0),(21,'Images/benchi7.jpg','奔驰',37,'测奔驰CLA 260 4MATIC 优雅与性能兼备','奔驰E1',89,0),(22,'Images/benchi8.jpg','奔驰',38,'城市里的陆上游艇 测试奔驰CLS猎装版','奔驰E2',127,0),(23,'Images/benchi9.jpg','奔驰',29,'空间奢侈 乘坐舒适 测试奔驰R350 4MATIC','奔驰E3',143,0),(24,'Images/laoshilaishi1.jpg','劳斯莱斯',200,'劳斯莱斯幻影是一款超豪华车型，外观经典豪华','幻影',12,0),(25,'Images/laoshilaishi2.jpg','劳斯莱斯',120,'英国绅士的休闲装 试驾劳斯莱斯魅影','魅影',18,0),(26,'Images/laoshilaishi3.jpg','劳斯莱斯',235,'无人能懂','贵族',18,0),(27,'Uploads/2015-06-07/5573dd33ee766.jpg','啊打发士大夫',4522,'撒旦法师的','大师傅',0,1),(28,'Uploads/2015-06-07/5573e58c0c611.jpg','sd',45,'sdf','sdf',0,1),(29,'Uploads/2015-06-07/5573e77db3699.jpg','asd',45,'sdf','dsf',0,1),(30,'Uploads/2015-06-07/5573e873c47c6.jpg','fgh',45,'fd','fgh',0,1),(31,'Uploads/2015-06-07/5573e8e9d7f90.jpg','dfg',45,'fg','gf',0,1),(32,'Uploads/2015-06-07/5573e9098c76f.jpg','dfg',23,'dfg','dfg',0,1),(33,'Uploads/2015-06-07/5573e9fb38b2e.jpg','asdf',32,'asdf','asdf',0,1),(34,'Uploads/2015-06-07/5573ea39ea3ee.jpg','sd',23,'fds','sd',0,1),(35,'Uploads/2015-06-07/5573eb2379cdc.jpg','afsd',12,'sdaf','asdf',0,1),(36,'Uploads/2015-06-07/5573eb746a858.jpg','sdf',324,'sdf','sdf',0,1),(37,'Uploads/2015-06-07/5573ec2f11076.png','asdf',23,'sdf','sadf',0,1),(38,'Uploads/2015-06-07/5573ec73a857b.jpg','dsf',234,'sdf','sdf',0,1),(39,'Uploads/2015-06-07/5573ecaa40a55.jpg','dsf',234,'sdf','sdfsfd',0,1);

#
# Structure for table "user_info"
#

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` char(20) NOT NULL DEFAULT '' COMMENT '账户',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `status` bit(1) NOT NULL DEFAULT b'1' COMMENT '0正常1禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='用户';

#
# Data for table "user_info"
#

INSERT INTO `user_info` VALUES (1,'1234@qq.com','202cb962ac59075b964b07152d234b70',b'1'),(2,'12345@qq.com','827ccb0eea8a706c4c34a16891f84e7b',b'1'),(3,'123456@qq.com','e10adc3949ba59abbe56e057f20f883e',b'1'),(4,'12345678910@qq.com','e10adc3949ba59abbe56e057f20f883e',b'1'),(5,'123@qq.com','202cb962ac59075b964b07152d234b70',b'1'),(6,'eqe@qq.com','7815696ecbf1c96e6894b779456d330e',b'1'),(7,'123456789@qq.com','7815696ecbf1c96e6894b779456d330e',b'1'),(8,'1125269680@qq.com','202cb962ac59075b964b07152d234b70',b'1'),(9,'11252691680@qq.com','202cb962ac59075b964b07152d234b70',b'1'),(10,'11252680@qq.com','202cb962ac59075b964b07152d234b70',b'1'),(11,'1125260@qq.com','202cb962ac59075b964b07152d234b70',b'1'),(12,'112526@qq.com','202cb962ac59075b964b07152d234b70',b'1'),(13,'1125267@qq.com','202cb962ac59075b964b07152d234b70',b'1');
