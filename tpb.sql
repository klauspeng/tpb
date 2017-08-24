# Host: 127.0.0.1  (Version: 5.7.19)
# Date: 2017-08-24 11:25:18
# Generator: MySQL-Front 5.3  (Build 4.57)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tpb_article"
#

DROP TABLE IF EXISTS `tpb_article`;
CREATE TABLE `tpb_article` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(8) unsigned DEFAULT '0' COMMENT '类型',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `intro` varchar(255) DEFAULT NULL COMMENT '简介',
  `content` mediumtext COMMENT '内容',
  `raw` varchar(255) DEFAULT NULL COMMENT 'github链接',
  `is_raw` tinyint(1) unsigned DEFAULT '0' COMMENT '是否是raw',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  `update_time` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章表';

#
# Data for table "tpb_article"
#


#
# Structure for table "tpb_article_type"
#

DROP TABLE IF EXISTS `tpb_article_type`;
CREATE TABLE `tpb_article_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类别ID',
  `pid` int(11) DEFAULT NULL COMMENT '父级ID',
  `name` char(10) DEFAULT NULL COMMENT '分类名称',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='文章分类';

#
# Data for table "tpb_article_type"
#

INSERT INTO `tpb_article_type` VALUES (1,0,'php',NULL),(2,0,'mysql',NULL),(3,0,'java',NULL),(4,0,'centos',NULL),(5,1,'thinkphp',NULL),(6,1,'redis',NULL),(7,1,'yaf',NULL),(8,2,'insert',NULL);
