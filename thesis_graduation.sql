/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : thesis_graduation

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-23 01:10:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_username` varchar(50) NOT NULL,
  `ad_password` varchar(255) NOT NULL,
  `ad_full_name` varchar(100) DEFAULT NULL,
  `ad_email` varchar(100) DEFAULT NULL,
  `ad_profession` varchar(255) DEFAULT NULL,
  `ad_birthday` date DEFAULT NULL,
  `ad_avatar` tinyint(1) DEFAULT '0',
  `ad_status` tinyint(1) DEFAULT '1',
  `ad_last_active_time` datetime DEFAULT NULL,
  `ad_created_by` int(11) DEFAULT '0',
  `ad_updated_by` int(11) DEFAULT '0',
  `ad_created_time` datetime DEFAULT NULL,
  `ad_updated_time` datetime DEFAULT NULL,
  `ad_group_ids` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '$2y$13$K9vy95X.hgT4Puo/wMjdCuBg73HA114fi9N9NFvoh36eyAYXGljSa', 'Administrator', 'admin@study.edu.vn', '', '0000-00-00', '0', '1', null, '0', '0', null, '2017-03-15 00:23:28', '[\"1\"]');

-- ----------------------------
-- Table structure for admin_action
-- ----------------------------
DROP TABLE IF EXISTS `admin_action`;
CREATE TABLE `admin_action` (
  `ad_action_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_controller_id` int(11) NOT NULL,
  `ad_controller_name` varchar(30) DEFAULT NULL,
  `ad_action_name` varchar(50) DEFAULT NULL,
  `ad_action_updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`ad_action_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_action
-- ----------------------------
INSERT INTO `admin_action` VALUES ('1', '1', 'Admin', 'Index', '2017-03-07 23:35:58');
INSERT INTO `admin_action` VALUES ('2', '1', 'Admin', 'View', '2017-03-07 23:35:58');
INSERT INTO `admin_action` VALUES ('3', '1', 'Admin', 'Create', '2017-03-07 23:35:58');
INSERT INTO `admin_action` VALUES ('4', '1', 'Admin', 'Update', '2017-03-07 23:35:58');
INSERT INTO `admin_action` VALUES ('5', '1', 'Admin', 'Delete', '2017-03-07 23:35:58');
INSERT INTO `admin_action` VALUES ('6', '2', 'AdminGroup', 'Index', '2017-03-07 23:35:58');
INSERT INTO `admin_action` VALUES ('7', '2', 'AdminGroup', 'View', '2017-03-07 23:35:58');
INSERT INTO `admin_action` VALUES ('8', '2', 'AdminGroup', 'Create', '2017-03-07 23:35:58');
INSERT INTO `admin_action` VALUES ('9', '2', 'AdminGroup', 'Update', '2017-03-07 23:35:58');
INSERT INTO `admin_action` VALUES ('10', '2', 'AdminGroup', 'Delete', '2017-03-07 23:35:58');
INSERT INTO `admin_action` VALUES ('11', '3', 'Site', 'Index', '2017-03-07 23:35:59');
INSERT INTO `admin_action` VALUES ('12', '3', 'Site', 'Login', '2017-03-07 23:35:59');
INSERT INTO `admin_action` VALUES ('13', '3', 'Site', 'Logout', '2017-03-07 23:35:59');
INSERT INTO `admin_action` VALUES ('15', '4', 'UpdatePermission', 'UpdateRouter', '2017-03-08 00:04:16');
INSERT INTO `admin_action` VALUES ('16', '5', 'Menu', 'Index', '2017-03-13 23:56:04');
INSERT INTO `admin_action` VALUES ('17', '5', 'Menu', 'View', '2017-03-13 23:56:04');
INSERT INTO `admin_action` VALUES ('18', '5', 'Menu', 'Create', '2017-03-13 23:56:04');
INSERT INTO `admin_action` VALUES ('19', '5', 'Menu', 'Update', '2017-03-13 23:56:04');
INSERT INTO `admin_action` VALUES ('20', '5', 'Menu', 'Delete', '2017-03-13 23:56:04');

-- ----------------------------
-- Table structure for admin_controller
-- ----------------------------
DROP TABLE IF EXISTS `admin_controller`;
CREATE TABLE `admin_controller` (
  `ad_controller_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_controller_name` varchar(30) NOT NULL,
  `ad_controller_description` varchar(255) DEFAULT NULL,
  `ad_controller_updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`ad_controller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_controller
-- ----------------------------
INSERT INTO `admin_controller` VALUES ('1', 'Admin', 'Admin', '2017-03-07 22:56:38');
INSERT INTO `admin_controller` VALUES ('2', 'AdminGroup', 'AdminGroup', '2017-03-07 22:56:38');
INSERT INTO `admin_controller` VALUES ('3', 'Site', 'Site', '2017-03-07 22:56:38');
INSERT INTO `admin_controller` VALUES ('4', 'UpdatePermission', 'UpdatePermission', '2017-03-07 22:56:38');
INSERT INTO `admin_controller` VALUES ('5', 'Menu', 'Menu', '2017-03-13 23:56:04');

-- ----------------------------
-- Table structure for admin_group
-- ----------------------------
DROP TABLE IF EXISTS `admin_group`;
CREATE TABLE `admin_group` (
  `ad_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_group_name` varchar(255) NOT NULL,
  `ad_group_description` varchar(255) DEFAULT NULL,
  `ad_group_action_ids` varchar(255) DEFAULT NULL,
  `ad_group_status` tinyint(1) DEFAULT '0',
  `ad_group_created_time` datetime DEFAULT NULL,
  `ad_group_updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`ad_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_group
-- ----------------------------
INSERT INTO `admin_group` VALUES ('1', 'Administator', 'Quản trị hệ thống, Phát triển hệ thống', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\"]', '1', '2017-03-08 00:33:05', '2017-03-13 23:56:16');

-- ----------------------------
-- Table structure for agreement
-- ----------------------------
DROP TABLE IF EXISTS `agreement`;
CREATE TABLE `agreement` (
  `agreement_id` int(11) NOT NULL AUTO_INCREMENT,
  `agreement_code` varchar(255) NOT NULL,
  `party_id_a` int(11) NOT NULL COMMENT 'he thong',
  `party_id_b` int(11) NOT NULL COMMENT 'don vi cung cap',
  `agreement_signed_date` date NOT NULL,
  `agreement_effective_date` date NOT NULL,
  `agreement_right_id` int(11) DEFAULT NULL,
  `agreement_type_id` int(11) NOT NULL,
  `mg` float DEFAULT '0',
  `agreement_created_time` datetime DEFAULT NULL,
  `agreement_updated_time` datetime DEFAULT NULL,
  `agreement_created_by` int(11) DEFAULT NULL,
  `agreement_updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`agreement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agreement
-- ----------------------------
INSERT INTO `agreement` VALUES ('1', 'Quis odio corrupti aperiam.', '1', '5', '1988-08-22', '2003-05-11', '2', '2', '0', '2017-03-16 01:22:23', '2017-03-16 01:22:23', null, null);
INSERT INTO `agreement` VALUES ('2', 'Numquam fugiat aut quaerat.', '1', '8', '2014-11-30', '2011-01-24', '1', '1', '449822', '2017-03-16 01:22:23', '2017-03-16 01:22:23', null, null);
INSERT INTO `agreement` VALUES ('3', 'Minima nisi modi dolore dignissimos.', '1', '7', '1993-04-09', '1988-01-13', '1', '1', '53702300', '2017-03-16 01:22:23', '2017-03-16 01:22:23', null, null);
INSERT INTO `agreement` VALUES ('4', 'Et soluta quasi molestiae accusamus aut deserunt.', '1', '6', '2005-11-25', '1998-02-14', '1', '2', '0', '2017-03-16 01:22:23', '2017-03-16 01:22:23', null, null);
INSERT INTO `agreement` VALUES ('5', 'Reprehenderit cum rem veniam totam.', '1', '4', '1980-05-23', '2002-08-23', '2', '2', '0', '2017-03-16 01:22:23', '2017-03-16 01:22:23', null, null);

-- ----------------------------
-- Table structure for agreement_addendum
-- ----------------------------
DROP TABLE IF EXISTS `agreement_addendum`;
CREATE TABLE `agreement_addendum` (
  `addendum_id` int(11) NOT NULL AUTO_INCREMENT,
  `agreement_id` int(11) NOT NULL,
  `addendum_number` varchar(255) NOT NULL,
  `addendum_content` text,
  `addendum_created_time` datetime DEFAULT NULL,
  `addendum_updated_time` datetime DEFAULT NULL,
  `addendum_created_by` int(11) DEFAULT NULL,
  `addendum_updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`addendum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agreement_addendum
-- ----------------------------
INSERT INTO `agreement_addendum` VALUES ('1', '2', '300 Stark Cliff Apt. 442', 'Hic earum id minus aut eligendi dolorem fugit eos id ut nobis ipsa unde aliquid quasi dolores aspernatur molestiae non placeat quaerat quia debitis.', '1981-01-01 16:19:16', '1983-11-26 02:45:17', null, null);
INSERT INTO `agreement_addendum` VALUES ('2', '1', '86279 Juwan Pike Apt. 134', 'Aspernatur sed perferendis quasi facere sed eum sit voluptatem cum pariatur consequatur sed suscipit voluptatum magnam illum officia tempora qui corrupti repellendus nihil eius sed omnis quidem ad voluptatem repellat sunt enim labore dignissimos praesentium doloribus consequatur dolores.', '2015-10-21 10:41:15', '1992-11-23 21:39:20', null, null);
INSERT INTO `agreement_addendum` VALUES ('3', '3', '398 Skiles Via Apt. 886', 'Minima sint totam ipsam voluptatem laudantium sit omnis ut architecto numquam autem vitae et tempora voluptatem laboriosam tempora error cumque rerum sit quam aut dicta facilis soluta necessitatibus architecto suscipit in.', '1984-04-28 03:25:52', '1999-12-30 20:51:57', null, null);
INSERT INTO `agreement_addendum` VALUES ('4', '2', '376 Ankunding Mountain Suite 770', 'Illo ut cupiditate neque sapiente et consequuntur vero ut eum consequatur iste a sint voluptas labore quo eum ipsam magni aspernatur est vero et vero quas a blanditiis sequi quia sunt.', '1972-01-13 23:09:36', '1973-03-23 14:40:37', null, null);
INSERT INTO `agreement_addendum` VALUES ('5', '4', '92757 Douglas Haven', 'Eos sapiente sint voluptatem laboriosam aspernatur sit et dolorum tenetur officia et rerum tenetur rem earum culpa voluptas rerum.', '1994-12-18 20:27:03', '2016-12-19 13:55:33', null, null);
INSERT INTO `agreement_addendum` VALUES ('6', '3', '8726 Hammes Rapid', 'Omnis ut quia eos ipsam tempore praesentium mollitia sunt commodi blanditiis impedit eaque et alias quis doloremque accusamus qui culpa et distinctio quae error eius.', '1982-09-23 22:43:29', '2004-10-09 23:21:46', null, null);
INSERT INTO `agreement_addendum` VALUES ('7', '2', '305 Kuhic Fields Apt. 454', 'Sunt mollitia qui voluptas natus ea delectus natus inventore vero et ullam consectetur qui quia non necessitatibus id nisi voluptatem nobis impedit et voluptatem tenetur cum doloremque dolor voluptate ut consequatur sed.', '1978-11-12 23:59:17', '1986-09-26 04:14:12', null, null);
INSERT INTO `agreement_addendum` VALUES ('8', '5', '227 Gorczany Fords', 'Porro suscipit ipsam ut omnis ea exercitationem ut est ipsam et quidem commodi tempore expedita facilis vel asperiores numquam hic voluptatibus.', '2008-02-17 21:35:46', '2001-02-08 12:15:38', null, null);
INSERT INTO `agreement_addendum` VALUES ('9', '5', '81302 Garland Port', 'Ab tempore nemo soluta non expedita dolorem doloremque error voluptate magni dolores est velit nisi et in architecto delectus alias laboriosam voluptate sequi non voluptate.', '1983-01-16 23:33:16', '2005-08-20 22:50:20', null, null);
INSERT INTO `agreement_addendum` VALUES ('10', '4', '5574 Kim Circle', 'Rerum maiores ipsum nesciunt dignissimos ex excepturi ut culpa quam sunt id reprehenderit necessitatibus eum labore voluptate temporibus dolorum et odit animi eum cum vitae et ab odio quisquam consequatur fugit enim non distinctio dolorem.', '2012-05-11 13:11:54', '1999-03-31 22:45:50', null, null);
INSERT INTO `agreement_addendum` VALUES ('11', '4', '3632 Kuhic Drive', 'Nobis labore ipsum sed at dicta et itaque cumque officia nemo nam tempore doloremque debitis qui molestiae ut est est nesciunt qui enim repellat molestiae neque ipsa quisquam aut animi inventore dolor voluptatem excepturi occaecati aliquam sapiente possimus voluptas est.', '1978-10-29 21:01:37', '2009-08-19 13:05:25', null, null);
INSERT INTO `agreement_addendum` VALUES ('12', '2', '4535 Virginie Roads', 'Ipsum porro recusandae qui nisi et quia omnis ad atque numquam est numquam debitis id vero quasi explicabo quo quis voluptatem autem fugit unde eveniet quisquam sint ad qui.', '1996-06-14 18:35:52', '2009-04-21 19:52:42', null, null);
INSERT INTO `agreement_addendum` VALUES ('13', '2', '567 Breitenberg Glens', 'Ad omnis quia voluptatem voluptatibus maxime odit quo alias atque dignissimos eum est minima sed possimus nihil consequatur expedita aut rerum velit autem ut id voluptas.', '1999-07-07 11:38:32', '1971-02-28 14:37:26', null, null);
INSERT INTO `agreement_addendum` VALUES ('14', '5', '4075 Hettie Village', 'Aliquid officia dignissimos nostrum illo harum perspiciatis dolores ea non mollitia blanditiis exercitationem assumenda sed nostrum dolore eos et quaerat ullam ducimus quia est dolorem.', '1975-12-08 04:22:05', '1974-01-06 03:21:43', null, null);
INSERT INTO `agreement_addendum` VALUES ('15', '2', '328 Dewayne Corner', 'Nemo ut ut quo ea voluptas atque cum libero maxime eius repellendus sunt officiis eius odit ipsum pariatur eum enim ut fugit non voluptatem rerum.', '2013-04-07 20:57:05', '1981-09-25 11:36:22', null, null);
INSERT INTO `agreement_addendum` VALUES ('16', '5', '50828 Hintz View Apt. 985', 'Asperiores quibusdam est corrupti commodi iure accusamus voluptate ea omnis delectus ut architecto minus consequuntur porro est omnis facere corrupti qui amet explicabo atque totam est quia itaque saepe iste laboriosam dolor ut quasi.', '1988-07-09 12:56:20', '1984-09-29 10:40:44', null, null);
INSERT INTO `agreement_addendum` VALUES ('17', '1', '195 Champlin Lights', 'Et at dolore et iste sunt et libero consequatur cupiditate perferendis consequatur rerum minima asperiores labore natus quis nihil alias consequatur dolore tenetur soluta eveniet tempore blanditiis sit id harum dolores.', '1973-06-26 03:25:23', '1977-09-22 16:21:35', null, null);
INSERT INTO `agreement_addendum` VALUES ('18', '5', '20113 Schaden Drive Suite 092', 'Labore et quia minima minima sed sapiente explicabo qui ut libero et in fugit voluptatum aliquid praesentium itaque fugiat omnis sint earum ut voluptatem qui impedit laudantium fugit sunt ut sed laboriosam sint eos aut a eligendi consequatur et.', '1974-11-15 21:25:20', '2016-09-15 20:41:47', null, null);
INSERT INTO `agreement_addendum` VALUES ('19', '3', '21280 Moises Forge Suite 315', 'Iste repellat eaque qui minima dolor vel unde qui qui aspernatur tenetur enim porro hic consequatur sed quidem qui dolore rerum temporibus sint rerum incidunt deserunt necessitatibus natus alias accusantium numquam quia quod saepe iusto quia alias rerum autem.', '1998-06-27 21:55:59', '2012-12-04 07:21:24', null, null);
INSERT INTO `agreement_addendum` VALUES ('20', '2', '419 Caleb Shore', 'Odio inventore et necessitatibus aut non necessitatibus et eum repudiandae in a rerum sunt temporibus cum maiores enim doloribus illo voluptas labore cumque consequatur sint tenetur quia sequi qui sed nesciunt libero aspernatur aliquid occaecati nam vel necessitatibus facilis.', '1978-03-08 15:42:26', '2004-02-16 13:34:58', null, null);

-- ----------------------------
-- Table structure for agreement_course_share_rate
-- ----------------------------
DROP TABLE IF EXISTS `agreement_course_share_rate`;
CREATE TABLE `agreement_course_share_rate` (
  `agreement_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `share_rate` int(11) DEFAULT '0',
  PRIMARY KEY (`agreement_id`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agreement_course_share_rate
-- ----------------------------

-- ----------------------------
-- Table structure for agreement_right
-- ----------------------------
DROP TABLE IF EXISTS `agreement_right`;
CREATE TABLE `agreement_right` (
  `agreement_right_id` int(11) NOT NULL AUTO_INCREMENT,
  `agreement_right_name` varchar(255) NOT NULL,
  `agreement_right_description` text,
  PRIMARY KEY (`agreement_right_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agreement_right
-- ----------------------------
INSERT INTO `agreement_right` VALUES ('1', 'Quyền tác giả', 'Quyền tác giả');
INSERT INTO `agreement_right` VALUES ('2', 'Quyền liên quan', 'Quyền liên quan');

-- ----------------------------
-- Table structure for agreement_type
-- ----------------------------
DROP TABLE IF EXISTS `agreement_type`;
CREATE TABLE `agreement_type` (
  `agreement_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `agreement_type_name` varchar(255) NOT NULL,
  `agreement_type_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`agreement_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agreement_type
-- ----------------------------
INSERT INTO `agreement_type` VALUES ('1', 'HĐ mua đứt', 'Hợp đồng này mua đứt bài giảng của đối tác, không cần trả đối soát.');
INSERT INTO `agreement_type` VALUES ('2', 'HĐ hợp tác', 'Hợp đồng hợp tác nội dung, trả đối soát cho đối tác.');

-- ----------------------------
-- Table structure for class_level
-- ----------------------------
DROP TABLE IF EXISTS `class_level`;
CREATE TABLE `class_level` (
  `class_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_level_name` varchar(255) NOT NULL,
  PRIMARY KEY (`class_level_id`),
  KEY `class_level_name_idx` (`class_level_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class_level
-- ----------------------------
INSERT INTO `class_level` VALUES ('1', '1');
INSERT INTO `class_level` VALUES ('10', '10');
INSERT INTO `class_level` VALUES ('11', '11');
INSERT INTO `class_level` VALUES ('12', '12');
INSERT INTO `class_level` VALUES ('2', '2');
INSERT INTO `class_level` VALUES ('3', '3');
INSERT INTO `class_level` VALUES ('4', '4');
INSERT INTO `class_level` VALUES ('5', '5');
INSERT INTO `class_level` VALUES ('6', '6');
INSERT INTO `class_level` VALUES ('7', '7');
INSERT INTO `class_level` VALUES ('8', '8');
INSERT INTO `class_level` VALUES ('9', '9');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `course_description` text,
  `party_id` int(11) NOT NULL COMMENT 'don vi cung cap noi dung',
  `course_type_id` int(11) NOT NULL,
  `course_price` int(11) DEFAULT '0',
  `course_signed_to_date` date DEFAULT NULL,
  `course_start_date` date DEFAULT NULL,
  `course_end_date` date DEFAULT NULL,
  `course_subject_id` int(11) DEFAULT NULL,
  `course_status` tinyint(1) DEFAULT '1' COMMENT '1: active, 0: deactive',
  `course_right_id` int(5) DEFAULT NULL,
  `class_level_id` int(11) NOT NULL,
  `course_created_time` datetime DEFAULT NULL,
  `course_updated_time` datetime DEFAULT NULL,
  `course_created_by` varchar(255) DEFAULT NULL,
  `course_updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------

-- ----------------------------
-- Table structure for course_right
-- ----------------------------
DROP TABLE IF EXISTS `course_right`;
CREATE TABLE `course_right` (
  `course_right_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_right_name` varchar(255) NOT NULL,
  `course_right_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`course_right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course_right
-- ----------------------------

-- ----------------------------
-- Table structure for course_type
-- ----------------------------
DROP TABLE IF EXISTS `course_type`;
CREATE TABLE `course_type` (
  `course_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_type_name` varchar(255) NOT NULL,
  `course_type_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`course_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course_type
-- ----------------------------

-- ----------------------------
-- Table structure for import_file
-- ----------------------------
DROP TABLE IF EXISTS `import_file`;
CREATE TABLE `import_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '1: da xu ly, 0: chua xu ly',
  `type` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT '0',
  `updated_by` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of import_file
-- ----------------------------
INSERT INTO `import_file` VALUES ('1', 'avatar_icon_backend', '0', 'agreement_addendum', '2017-03-20 22:57:38', '2017-03-20 22:57:38', '1', '1');

-- ----------------------------
-- Table structure for lession_course
-- ----------------------------
DROP TABLE IF EXISTS `lession_course`;
CREATE TABLE `lession_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link_video` varchar(255) DEFAULT NULL,
  `time_length` int(11) DEFAULT '0',
  `sort` tinyint(5) DEFAULT '1',
  `number_view` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1' COMMENT '1: active, 0: deactive',
  `free` tinyint(1) DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lession_course
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `module` int(1) NOT NULL DEFAULT '1' COMMENT '1: backend, 2: frontend',
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT '1' COMMENT '1: visible, 0: hide',
  `status` tinyint(1) DEFAULT '1' COMMENT '1: active, 0: deactive',
  `sort` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '0', 'Cấu hình hệ thống', '1', 'menu/index', 'cog', '1', '1', null, '2017-03-14 21:57:14', '2017-03-14 21:57:17');
INSERT INTO `menu` VALUES ('2', '1', 'Quản lý người dùng', '1', 'admin/index', 'user-circle', '1', '1', '2', '2017-03-14 21:59:04', '2017-03-14 21:59:07');
INSERT INTO `menu` VALUES ('3', '1', 'Menu hệ thống', '1', 'menu/index', 'bars', '1', '1', '3', '2017-03-14 22:00:31', '2017-03-14 22:00:33');
INSERT INTO `menu` VALUES ('4', '1', 'Nhóm quyền quản trị', '1', 'admin-group/index', 'users', '1', '1', '1', '2017-03-15 00:14:23', '2017-03-15 00:14:25');
INSERT INTO `menu` VALUES ('5', '0', 'Quản lý hợp đồng', '1', 'agreement/index', 'sticky-note', '1', '1', null, '2017-03-15 00:25:20', '2017-03-15 00:25:23');
INSERT INTO `menu` VALUES ('6', '5', 'Loại hợp đồng', '1', 'agreement-type/index', 'tags', '1', '1', '2', '2017-03-15 00:26:29', '2017-03-15 00:26:32');
INSERT INTO `menu` VALUES ('7', '5', 'Hợp đồng', '1', 'agreement/index', 'newspaper-o', '1', '1', '1', '2017-03-15 00:29:13', '2017-03-15 00:29:16');
INSERT INTO `menu` VALUES ('8', '5', 'Quyền hợp đồng', '1', 'agreement-right/index', 'book', '1', '1', '3', '2017-03-15 23:29:55', '2017-03-15 23:29:57');
INSERT INTO `menu` VALUES ('9', '0', 'Đối tượng, chủ thể', '1', 'party/index', 'user-secret ', '1', '1', null, '2017-03-15 23:46:17', '2017-03-15 23:46:19');
INSERT INTO `menu` VALUES ('10', '9', 'Loại đối tượng', '1', 'party-type/index', 'address-card', '1', '1', '1', '2017-03-15 23:47:13', '2017-03-15 23:47:15');
INSERT INTO `menu` VALUES ('11', '9', 'Đối tượng', '1', 'party/index', 'user-plus', '1', '1', '2', '2017-03-15 23:47:51', '2017-03-15 23:47:54');
INSERT INTO `menu` VALUES ('12', '0', 'Quản lý đề thi, câu hỏi', '1', 'quiz/index', 'graduation-cap', '1', '1', null, '2017-03-22 23:41:15', '2017-03-22 23:41:18');
INSERT INTO `menu` VALUES ('13', '12', 'Môn học', '1', 'subject/index', 'id-card', '1', '1', '1', '2017-03-22 23:42:06', '2017-03-22 23:42:09');
INSERT INTO `menu` VALUES ('14', '12', 'Trình độ lớp ', '1', 'class-level/index', 'ravelry ', '1', '1', '2', '2017-03-22 23:42:47', '2017-03-22 23:42:50');
INSERT INTO `menu` VALUES ('15', '12', 'Quản lý câu hỏi', '1', 'question/index', 'telegram', '1', '1', '3', '2017-03-22 23:43:44', '2017-03-22 23:43:47');
INSERT INTO `menu` VALUES ('16', '12', 'Loại đề thi', '1', 'quiz-type/index', 'podcast', '1', '1', '4', '2017-03-22 23:44:25', '2017-03-22 23:44:27');
INSERT INTO `menu` VALUES ('17', '12', 'Quản lý đề thi', '1', 'quiz/index', 'newspaper-o', '1', '1', '5', '2017-03-22 23:45:19', '2017-03-22 23:45:23');
INSERT INTO `menu` VALUES ('18', '0', 'Quản lý học sinh, giáo viên', '1', 'student/index', 'users', '1', '1', null, '2017-03-23 00:24:49', '2017-03-23 00:24:51');
INSERT INTO `menu` VALUES ('19', '18', 'Quản lý giáo viên', '1', 'teacher/index', 'tree', '1', '1', '1', '2017-03-23 00:25:27', '2017-03-23 00:25:28');
INSERT INTO `menu` VALUES ('20', '18', 'Quản lý học sinh', '1', 'student/index', 'universal-access', '1', '1', '2', '2017-03-23 00:26:02', '2017-03-23 00:26:04');
INSERT INTO `menu` VALUES ('21', '0', 'Quản lý gói học tập', '1', 'package/index', 'space-shuttle ', '1', '1', null, '2017-03-23 00:51:05', '2017-03-23 00:51:07');

-- ----------------------------
-- Table structure for package
-- ----------------------------
DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_name` varchar(255) NOT NULL,
  `pk_code` varchar(255) NOT NULL,
  `pk_description` varchar(255) DEFAULT NULL,
  `pk_price` decimal(10,0) DEFAULT '0',
  `pk_status` tinyint(1) DEFAULT '1' COMMENT '1: active, 0: deactive',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of package
-- ----------------------------
INSERT INTO `package` VALUES ('1', 'Gói ngày', 'PAG_DAY', 'Làm tất cả các đề thi (trừ VIP) trong ngày', '5000', '1');
INSERT INTO `package` VALUES ('2', 'Gói tuần', 'PAG_WEEK', 'Làm tất cả các đề thi (trừ VIP) trong tuần', '15000', '1');
INSERT INTO `package` VALUES ('3', 'Gói tháng', 'PAG_MONTH', 'Làm tất cả các đề thi (trừ VIP) trong tháng', '30000', '1');
INSERT INTO `package` VALUES ('4', 'Gói VIP10', 'PAG_VIP10', 'Làm tất cả các đề thi trong 10 ngày', '20000', '1');
INSERT INTO `package` VALUES ('5', 'Gói VIP 30', 'PAG_VIP30', 'Làm tất cả các đề thi  trong 30 ngày', '40000', '1');
INSERT INTO `package` VALUES ('6', 'Gói VIP 365', 'PAG_VIP365', 'Làm tất cả các đề thi  trong 1 năm', '200000', '1');

-- ----------------------------
-- Table structure for party
-- ----------------------------
DROP TABLE IF EXISTS `party`;
CREATE TABLE `party` (
  `party_id` int(11) NOT NULL AUTO_INCREMENT,
  `party_type_id` int(11) NOT NULL,
  `party_name` varchar(255) NOT NULL,
  `party_rep_title` varchar(255) DEFAULT NULL COMMENT 'nguoi dai dien',
  `party_address` varchar(255) DEFAULT NULL,
  `party_tax_code` varchar(255) DEFAULT NULL,
  `party_phone` varchar(255) DEFAULT NULL,
  `party_created_time` datetime DEFAULT NULL,
  `party_updated_time` datetime DEFAULT NULL,
  `party_created_by` int(11) DEFAULT '0',
  `party_updated_by` int(11) DEFAULT '0',
  PRIMARY KEY (`party_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of party
-- ----------------------------
INSERT INTO `party` VALUES ('1', '2', 'Hệ thống Study.EDU', 'TVB', 'Hà Nội', '111111111', '+84909929229', '2017-03-16 00:42:26', '2017-03-16 00:42:29', '0', '0');
INSERT INTO `party` VALUES ('2', '1', 'Dr. Miles Ritchie Sr.', 'Green Schmidt', '37951 Hank Summit Apt. 862\nKreigerhaven, WI 33322-9734', '1959175(9)', '807.747.7478', '1984-01-24 11:04:41', '2006-04-22 04:00:33', '0', '0');
INSERT INTO `party` VALUES ('3', '1', 'Prof. Elmore Tillman IV', 'Justyn Von', '1227 Ondricka Knolls\nWinonaton, VT 05395', '202083621(9)', '621.505.1303 x70975', '1999-01-07 20:20:04', '1997-12-21 12:09:35', '0', '0');
INSERT INTO `party` VALUES ('4', '1', 'Prof. Gianni Anderson I', 'Mrs. Karianne Ferry', '11407 Lexus Path Apt. 039\nLake Colt, OH 53460-6615', '159303(9)', '+1-510-690-2425', '1999-03-24 17:49:48', '2007-04-09 01:19:57', '0', '0');
INSERT INTO `party` VALUES ('5', '1', 'Isabel Moore', 'Burnice Wolf', '28343 Edward Union\nLuettgenmouth, OR 13234-1894', '2342(9)', '+1-861-416-8934', '1995-01-08 10:30:28', '1975-08-17 02:44:03', '0', '0');
INSERT INTO `party` VALUES ('6', '1', 'Roger Lynch', 'Lisette Von', '25134 Gutkowski Mission Suite 751\nPort Joaquinside, NC 96856-1406', '7987895(9)', '+1.915.386.6502', '2004-12-22 23:57:42', '1999-02-22 03:21:00', '0', '0');
INSERT INTO `party` VALUES ('7', '1', 'Ceasar Yundt', 'Walker Wilderman', '234 Runte Trail\nMorissetteburgh, AR 60551-3789', '1(9)', '+12728329370', '1989-04-27 21:48:21', '1991-11-14 05:25:13', '0', '0');
INSERT INTO `party` VALUES ('8', '1', 'Pierre Schmeler', 'Markus Reynolds', '848 Selina Keys Apt. 431\nPort Arthur, PA 25464', '50259911(9)', '(852) 816-8527 x096', '1988-01-31 15:05:56', '1974-06-28 23:02:48', '0', '0');
INSERT INTO `party` VALUES ('9', '1', 'Dr. Jarret Krajcik I', 'Dr. Eldridge Dickens', '7149 White Centers Suite 286\nLake Carytown, NV 49379', '165967(9)', '390.851.8184', '1984-02-22 13:49:15', '2007-03-28 11:24:59', '0', '0');
INSERT INTO `party` VALUES ('10', '1', 'Danny Windler III', 'Virginie Lang', '259 Kelley Trace\nSouth Daisyhaven, MI 94981', '986(9)', '+1-776-943-9701', '1998-04-07 03:21:38', '1980-03-15 02:52:07', '0', '0');
INSERT INTO `party` VALUES ('11', '1', 'Rocio Kiehn DVM', 'Maximus Cartwright III', '8658 McGlynn Ports\nWest Micah, MN 26825-8973', '96114(9)', '225.757.0973 x414', '2011-12-24 15:10:23', '1982-12-14 01:25:31', '0', '0');

-- ----------------------------
-- Table structure for party_type
-- ----------------------------
DROP TABLE IF EXISTS `party_type`;
CREATE TABLE `party_type` (
  `party_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `party_type_name` varchar(255) NOT NULL,
  `party_type_description` varchar(255) DEFAULT NULL,
  `party_type_created_time` datetime DEFAULT NULL,
  `party_type_updated_time` datetime DEFAULT NULL,
  `party_type_created_by` int(11) DEFAULT NULL,
  `party_type_updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`party_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of party_type
-- ----------------------------
INSERT INTO `party_type` VALUES ('1', 'Đơn vị cung cấp ND', 'Đơn vị cung cấp ND', '2017-03-16 00:05:22', '2017-03-16 00:05:22', '1', '1');
INSERT INTO `party_type` VALUES ('2', 'Đơn vị phân phối ND', 'Đơn vị phân phối ND', '2017-03-16 00:05:48', '2017-03-16 00:05:48', '1', '1');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_content` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1: active, 0: deactive',
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of question
-- ----------------------------

-- ----------------------------
-- Table structure for question_answer
-- ----------------------------
DROP TABLE IF EXISTS `question_answer`;
CREATE TABLE `question_answer` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `question_content` varchar(500) DEFAULT NULL,
  `ans_content` varchar(255) DEFAULT NULL,
  `is_true` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: true, 0: false',
  PRIMARY KEY (`ans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of question_answer
-- ----------------------------

-- ----------------------------
-- Table structure for quiz
-- ----------------------------
DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(255) NOT NULL,
  `quiz_description` varchar(255) DEFAULT NULL,
  `quiz_type_id` int(11) NOT NULL DEFAULT '0' COMMENT 'tự do',
  `quiz_level` enum('hard','normal','easy') DEFAULT 'normal',
  `subject_id` int(11) DEFAULT NULL,
  `class_level_id` int(11) DEFAULT NULL,
  `question_ids` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1: active, 0: inactive',
  `price` decimal(10,0) DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of quiz
-- ----------------------------

-- ----------------------------
-- Table structure for quiz_type
-- ----------------------------
DROP TABLE IF EXISTS `quiz_type`;
CREATE TABLE `quiz_type` (
  `quiz_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_type_name` varchar(255) DEFAULT NULL,
  `quiz_type_description` varchar(255) DEFAULT NULL,
  `number_quiz` int(11) DEFAULT '0',
  PRIMARY KEY (`quiz_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of quiz_type
-- ----------------------------
INSERT INTO `quiz_type` VALUES ('1', 'Kiểm tra 15 phút ', 'Kiểm tra 15 phút ', '0');
INSERT INTO `quiz_type` VALUES ('2', 'Kiểm tra 1 tiết', 'Kiểm tra 1 tiết', '0');
INSERT INTO `quiz_type` VALUES ('3', 'Kiểm tra học kỳ', 'Kiểm tra học kỳ', '0');
INSERT INTO `quiz_type` VALUES ('4', 'Luyện thi ĐH, CĐ', 'Luyện thi ĐH, CĐ', '0');
INSERT INTO `quiz_type` VALUES ('5', 'Thi thử Tốt nghiệp', 'Thi thử Tốt nghiệp', '0');
INSERT INTO `quiz_type` VALUES ('6', 'Thi thử ĐH, CĐ ', 'Thi thử ĐH, CĐ ', '0');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `std_id` int(11) NOT NULL AUTO_INCREMENT,
  `std_username` varchar(50) NOT NULL,
  `std_password` varchar(255) NOT NULL,
  `std_full_name` varchar(100) NOT NULL,
  `std_phone` varchar(30) DEFAULT NULL,
  `std_birthday` varchar(50) DEFAULT NULL,
  `std_school_name` varchar(100) DEFAULT NULL,
  `std_balance` int(11) DEFAULT '0',
  `std_status` tinyint(1) DEFAULT '1' COMMENT '1: active, 0: deactive',
  `std_created_time` datetime DEFAULT NULL,
  `std_updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`std_id`),
  KEY `idx_login` (`std_username`,`std_password`,`std_status`),
  KEY `idx_phone` (`std_phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------

-- ----------------------------
-- Table structure for student_course
-- ----------------------------
DROP TABLE IF EXISTS `student_course`;
CREATE TABLE `student_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_signed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`course_id`,`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student_course
-- ----------------------------

-- ----------------------------
-- Table structure for subject
-- ----------------------------
DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) NOT NULL,
  `subject_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subject
-- ----------------------------
INSERT INTO `subject` VALUES ('1', 'Toán', null);
INSERT INTO `subject` VALUES ('2', 'Vật Lý', null);
INSERT INTO `subject` VALUES ('3', 'Hóa Học', null);
INSERT INTO `subject` VALUES ('4', 'Sinh Học', null);
INSERT INTO `subject` VALUES ('5', 'Ngữ Văn', null);
INSERT INTO `subject` VALUES ('6', 'Lịch Sử', null);
INSERT INTO `subject` VALUES ('7', 'Địa Lý', null);
INSERT INTO `subject` VALUES ('8', 'Tiếng Anh', null);

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `tch_id` int(11) NOT NULL,
  `tch_username` varchar(255) DEFAULT NULL,
  `tch_password` varchar(255) DEFAULT NULL,
  `tch_name` varchar(255) NOT NULL,
  `tch_gender` tinyint(1) DEFAULT '1' COMMENT '1: nam, 0: nu',
  `tch_intro` text,
  `tch_work_place` varchar(255) DEFAULT NULL,
  `tch_degree` varchar(255) DEFAULT NULL,
  `tch_email` varchar(255) DEFAULT NULL,
  `tch_status` tinyint(1) DEFAULT '1' COMMENT '1: active, 0: deactive',
  `tch_created_time` datetime DEFAULT NULL,
  `tch_updated_time` datetime DEFAULT NULL,
  `tch_created_by` int(11) DEFAULT NULL,
  `tch_updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`tch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL COMMENT 'subscribe',
  `package_id` int(11) DEFAULT '0' COMMENT '0: le',
  `price` decimal(10,0) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_action` (`action`),
  KEY `idx_package_id` (`package_id`),
  KEY `idx_student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transaction
-- ----------------------------

-- ----------------------------
-- Table structure for video_record
-- ----------------------------
DROP TABLE IF EXISTS `video_record`;
CREATE TABLE `video_record` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `lession_id` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of video_record
-- ----------------------------
