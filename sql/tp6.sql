/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : tp6

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 14/11/2020 13:26:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`  (
  `article_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `category_id` bigint(20) NOT NULL COMMENT '分类ID',
  `user_id` bigint(20) NOT NULL COMMENT '作者用户ID',
  `article_title` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章标题',
  `article_cover` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章封面',
  `article_type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '文章类型（1 图文，2 视图）',
  `article_imgs` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章图片列表',
  `is_source` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '原创类型（1 原创，2 转载）',
  `source` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文章来源',
  `is_top` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '是否置顶（0 置顶，1 不置顶）',
  `video_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '视频时长',
  `keyword` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '关键词',
  `outline` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章摘要',
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章内容',
  `see_count` bigint(20) NOT NULL DEFAULT 0 COMMENT '文章浏览次数',
  `desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文章描述',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '文章状态（0正常，1禁用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`article_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES (1, 1, 17, '喜讯：保山学院在2020年“浪潮杯”云南省大学生计算机设计大赛中获佳绩', 'uploads/images/admin/10/30/aec7d06e6a3a1527.jpg', '1', 'uploads/images/admin/10/30/aec7d06e6a3a1527.jpg,uploads/images/admin/11/01/70bea7f55709050b.jpg,uploads/images/admin/10/30/aec7d06e6a3a1528.jpg', '0', '保山学院', '1', NULL, NULL, '近日，由云南省大学生计算机设计大赛组委会主办，云南省高校计算机教学研究会、云南工商学院承办，浪潮集团赞助的2020年“浪潮杯”云南省大学生计算机设计大赛暨第13届中国大学生计算机设计大赛云南赛区竞赛决赛圆满落幕。', '<p style=\"font-size: 16px;\">近日，由云南省大学生计算机设计大赛组委会主办，云南省高校计算机教学研究会、云南工商学院承办，浪潮集团赞助的2020年“浪潮杯”云南省大学生计算机设计大赛暨第13届中国大学生计算机设计大赛云南赛区竞赛决赛圆满落幕。受疫情影响，本次决赛采用腾讯会议“云答辩”方式进行。经过专家网络初审，参赛选手线上展示、讲解与问答，专家复审，会议终评等层层筛选、激烈角逐后，我校信息学院12个参赛作品获奖，其中一等奖3项、二等奖4项、三等奖5项，取得参赛以来的最好成绩，一等奖数量位居全省参赛院校第一。</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/10/30/aec7d06e6a3a1527.jpg\" />\r\n<p style=\"font-size: 16px;\">本次大赛属于全国高等学校一类竞赛，学校领导高度重视，教务处统筹协调，信息学院精心组织、积极动员师生参与、通力配合完成，旨在提高学生计算机应用能力，培养学生信息素养及团队合作意识，增强学生创新意识和创造力，加强教学实践，提高计算机教学质量，充分展现学生良好的综合素质和精神风貌，以及我校良好的育人成果。</p>\r\n<p style=\"font-size: 16px;\">据悉，竞赛内容分为14个单元，全省高校共有582件作品参赛，其中本科组352件、高职高专组230件；共评出本科组一等奖15项，二等奖53项，三等奖81项。</p>\r\n<br/>\r\n<p style=\"font-size: 16px;text-align: center;font-weight: 600;\">保山学院2020年“浪潮杯”云南省大学生计算机设计大赛获奖名单（本科组）</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/10/30/aec7d06e6a3a1528.jpg\" />', 715, NULL, '0', NULL, NULL, NULL, '2020-10-29 16:43:52', '2020-11-08 16:47:07');
INSERT INTO `article` VALUES (2, 1, 17, '信息学院软件开发中心介绍', 'uploads/images/admin/11/01/f744ae6905ca6ea5.jpg', '1', 'uploads/images/admin/11/01/f744ae6905ca6ea5.jpg,uploads/images/admin/11/01/4ee157cb4982d1f0.jpg,uploads/images/admin/11/01/5f0deb7ec0459696.jpg', '1', NULL, '0', NULL, NULL, '软件开发中心成立于2018年9月，是以对软件开发感兴趣的学生群体为主的工作室。以项目驱动的方式培养学生的专业动手能力，主要技术方向为移动应用开发、图像识别算法和树莓派等。前期主要是以信息学院教师和团队技术人员共同培养学生。', '<p>软件开发中心成立于2018年9月，是以对软件开发感兴趣的学生群体为主的工作室。以项目驱动的方式培养学生的专业动手能力，主要技术方向为移动应用开发、图像识别算法和树莓派等。前期主要是以信息学院教师和团队技术人员共同培养学生。</p>\r\n<br/>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/f744ae6905ca6ea5.jpg\" />\r\n<br/>\r\n<p>在通过前面重重考核之后将正式成为<b>软件开发中心</b>团队的一员。老师将会根据不同学生的能力以及优势分配不同的技术发展方向，每个方向依旧设有阶段性考核和成果汇报。当技术基础牢固后，老师会为团队寻找项目资源，项目所得劳务费支付给该项目的开发人员。如果在团队内长时间跟不上其他人的进度，且学习态度差的成员将会被<a style=\"color:red\">踢出团队</a>。</p>\r\n<p>实验室还将提供优质免费的技术学习资料，有开发经验的成员将会分享开发经验及开发技术指导。</p>\r\n<p>团队秉承诚信、规范、高效的工作原则，用技术赢得市场，以创意服务取得信誉，竭诚为广大客户提供优质、高效、快捷的软件服务。面向未来，坚持自主创新。</p>\r\n<p>团队专注于市场<a style=\"color:red\">前沿</a>的开发技术，以高效、严谨的开发规范，不断学习的精神，为<b>保山市乃至周边城市</b>的软件产业提供优质的服务。</p>\r\n<p>通过长期对一部分学生的培养，让学生能够达到B/S架构软件和移动端APP的开发水平。提高学生的就业竞争力，以及为学生的创新创业提供孵化平台。同时能够为保山学院的信息化建设提供一定的人力和技术保障。当实验室成员达到一定数量时，能够为保山当地政府及企业提供软件开发和网络建设的服务。</p><p>团队各成员技术领域不同，根据自身学习兴趣选择。</p>\r\n<p>开发方向以UI设计、移动应用开发（APP、小程序、公众号）、WEB开发（PC网站、手机网站）、图形图像识别及硬件编程（树莓派）为主。</p>', 117, NULL, '0', NULL, NULL, NULL, '2020-10-29 16:43:52', '2020-11-11 17:48:14');
INSERT INTO `article` VALUES (3, 1, 17, '近年来，软件开发中心取得的成果', 'uploads/images/admin/11/01/70bea7f55709050b.jpg', '1', 'uploads/images/admin/11/01/70bea7f55709050b.jpg,uploads/images/admin/11/01/4745b9897a9c29c4.png,uploads/images/admin/11/01/aec7d06e6a3a1528.jpg', '1', NULL, '0', NULL, '大赛,竞赛,比赛,成果,获奖,技术', '近年来，软件开发中心取得的成果', '<p>2020年9月12日，由共青团云南省委、中共云南省委教育工委、云南省科学技术协会、中国科学院昆明分院、云南省社会科学院、云南省学生联合会、中国电信股份有限公司云南分公司共同主办，曲靖师范学院承办的第九届“挑战杯”云南省大学生创业计划竞赛终审在昆明举行。在本次“挑战杯”比赛中，团队一项作品《智慧校园综合服务平台》获省级铜奖。</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/765af13df23572be.png\" />\r\n<p style=\"text-align: center;font-size: 13px;color: #666;\">图片来源：保山学院官网</p>\r\n<br/>\r\n<p>2020年09月05日，由云南省教育厅主办的第六届中国“互联网+”大学生创新创业大赛云南赛区决赛在云南经济管理学院落下帷幕。在本次大赛中，团队一项作品《基于树莓派的智能农业管理系统》获省级铜奖。</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/4745b9897a9c29c4.png\" />\r\n<p style=\"text-align: center;font-size: 13px;color: #666;\">图片来源：保山学院官网</p>\r\n<br/>\r\n<p>2020年08月，团队1项作品获2020年（第13届）“浪潮杯”中国大学生计算机设计大赛三等奖</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/70bea7f55709050b.jpg\" />\r\n<p style=\"text-align: center;font-size: 13px;color: #666;\">国赛三等奖《享物--一站式资源开放共享平台》</p>\r\n<br/>\r\n<p>2020年06月，在2020年“浪潮杯”云南省大学生计算机设计大赛中，团队3件作品获奖，其中一等奖1项，三等奖2项。</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/06/1c2a9d8b8e050732.jpg\" />\r\n<p style=\"text-align: center;font-size: 13px;color: #666;\">省赛一等奖《享物--一站式资源开放共享平台》</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/06/5dcd8633918b8169.jpg\" />\r\n<p style=\"text-align: center;font-size: 13px;color: #666;\">省赛三等奖《智慧课堂》</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/06/c08573254a164eea.jpg\" />\r\n<p style=\"text-align: center;font-size: 13px;color: #666;\">省赛三等奖《基于树莓派的智能植物养殖系统》</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/aec7d06e6a3a1528.jpg\" />\r\n<p style=\"text-align: center;font-size: 13px;color: #666;\">图片来源：保山学院官网</p>\r\n<br/>', 113, NULL, '0', NULL, NULL, NULL, '2020-10-29 16:43:52', '2020-11-11 13:16:30');
INSERT INTO `article` VALUES (4, 1, 17, '软件开发中心科研项目及学术研究情况', 'uploads/images/admin/11/01/83f2c63a18ac6fc8.jpg', '1', 'uploads/images/admin/11/01/83f2c63a18ac6fc8.jpg,uploads/images/admin/11/01/d5ba5168a5e24c83.jpg,uploads/images/admin/11/01/c472ea237495ac15.jpg', '1', NULL, '0', '', '科研,项目,成果', '软件开发中心现有科研项目3项，其中保山学院校级大学生科研项目2项，其中保山学院校级创新创业科研项目1项。在申请科研项目6项。已发表学术论文2项。', '<p>软件开发中心现有科研项目3项，其中保山学院校级大学生科研项目2项，其中保山学院校级创新创业科研项目1项。在申请科研项目6项。已发表学术论文2项。</p>\r\n<br/>\r\n<p style=\"font-weight: 1000;font-size: 20px;\">一、校级大学生科研项目（2项）</p>\r\n<p>1、《基于智能数据分析的实验作业管理系统》</p>\r\n<p>2、《动态科研项目管理与预警系统的设计与实现》</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/26b10fb7b4ecd774.png\" />\r\n<p style=\"text-align: center;font-size: 13px;color: #666;\">图片来源：保山学院科研处</p>\r\n<br/>\r\n<p style=\"font-weight: 1000;font-size: 20px;\">二、校级创新创业科研项目（1项）</p>\r\n<p>1、《基于微信小程序的智慧校园考勤管理平台的研究与设计》</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/c84d959a7bbf23c6.jpg\" />\r\n<p style=\"text-align: center;font-size: 13px;color: #666;\">图片来源：保山学院创新创业学院</p>\r\n<br/>\r\n<p style=\"font-weight: 1000;font-size: 20px;\">三、学术论文（2项）</p>\r\n<p>1、《基于卷积神经网络的图像分类模型研究》</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/d5ba5168a5e24c83.jpg\" />\r\n<p>2、《基于opencv的人脸识别技术研究》</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/c472ea237495ac15.jpg\" />\r\n<br/>\r\n<p style=\"font-weight: 1000;font-size: 20px;\">一、在申请校级大学生科研项目（6项）</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/83f2c63a18ac6fc8.jpg\" />\r\n<p style=\"text-align: center;font-size: 13px;color: #666;\">图片来源：保山学院科研处</p>\r\n<br/>', 72, NULL, '0', NULL, NULL, NULL, '2020-10-29 16:43:52', '2020-11-09 09:32:26');
INSERT INTO `article` VALUES (5, 1, 17, '保山酷奇科技有限责任公司', 'uploads/images/admin/11/01/de077915e664522a.jpg', '1', 'uploads/images/admin/11/01/de077915e664522a.jpg,uploads/images/admin/11/01/d9c5c589deb938ae.jpg,uploads/images/admin/11/01/eb2e7de5327c2159.jpg', '1', NULL, '0', NULL, '软件,酷奇', '保山酷奇科技责任公司于2020年06月29日成立，公司法人：张兴林（原软件开发中心第一届成员），地址位于保山学院创新创业孵化基地107-108室。经营范围：基础软件开发；应用软件开发；支撑软件开发；互联网接入及相关服务；互联网生活服务平台；信息系统集成服务；运行维护服务；信息处理和存储支持服务。', '<p>保山酷奇科技责任公司于2020年06月29日成立，公司法人：张兴林（原软件开发中心第一届成员），地址位于保山学院创新创业孵化基地107-108室。经营范围：基础软件开发；应用软件开发；支撑软件开发；互联网接入及相关服务；互联网生活服务平台；信息系统集成服务；运行维护服务；信息处理和存储支持服务。（依法须经批准的项目，经相关部门批准后方可开展经营活动）</p>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/de077915e664522a.jpg\" />\r\n<span style=\"text-align: center;font-size: 13px;color: #666;\">公司地址：保山学院创新创业孵化基地107-108室</span>\r\n<br/>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/d9c5c589deb938ae.jpg\" />\r\n<br/>\r\n<img style=\"width: 100%;\" src=\"%HW_BASEURL%uploads/images/admin/11/01/eb2e7de5327c2159.jpg\" />', 17, NULL, '0', NULL, NULL, NULL, '2020-11-01 17:03:09', '2020-11-08 16:46:45');

-- ----------------------------
-- Table structure for article_category
-- ----------------------------
DROP TABLE IF EXISTS `article_category`;
CREATE TABLE `article_category`  (
  `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '类别ID',
  `parent_id` bigint(20) NULL DEFAULT 0 COMMENT '父级ID',
  `category_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '类别名称',
  `category_sort` bigint(20) NOT NULL DEFAULT 0 COMMENT '分类显示顺序',
  `category_type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '系统内置（0是，1否）',
  `desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '类别描述',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '类别状态（0正常，1禁用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章类别表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article_category
-- ----------------------------
INSERT INTO `article_category` VALUES (1, 0, '团队新闻', 1, '0', NULL, '0', NULL, NULL, NULL, '2020-10-29 15:59:04', '2020-10-29 21:34:42');
INSERT INTO `article_category` VALUES (2, 0, '公告通知', 2, '0', NULL, '0', NULL, NULL, NULL, '2020-10-29 15:59:23', '2020-10-29 15:59:23');
INSERT INTO `article_category` VALUES (3, 0, '技术交流', 3, '0', NULL, '0', NULL, NULL, NULL, '2020-10-29 15:59:39', '2020-10-29 15:59:39');
INSERT INTO `article_category` VALUES (4, 0, '研究成果', 4, '0', NULL, '0', NULL, NULL, NULL, '2020-10-29 16:00:01', '2020-10-29 16:00:01');
INSERT INTO `article_category` VALUES (5, 0, '专题聚焦', 5, '0', NULL, '0', NULL, NULL, NULL, '2020-10-29 16:00:15', '2020-10-29 16:00:15');

-- ----------------------------
-- Table structure for article_comment
-- ----------------------------
DROP TABLE IF EXISTS `article_comment`;
CREATE TABLE `article_comment`  (
  `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `article_id` bigint(20) NOT NULL COMMENT '文章ID',
  `parent_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '父级ID',
  `user_id` bigint(20) NOT NULL COMMENT '用户ID',
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '评论内容',
  `desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '评论描述',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '评论状态（0正常，1禁用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`comment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章评论表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article_comment
-- ----------------------------
INSERT INTO `article_comment` VALUES (9, 1, 0, 17, '喜讯：保山学院在2020年“浪潮杯”云南省大学生计算机设计大赛中获佳绩', NULL, '0', NULL, NULL, NULL, '2020-10-31 00:05:51', '2020-11-08 15:45:12');
INSERT INTO `article_comment` VALUES (13, 3, 0, 17, '欢迎加入信息学院软件开发中心！', NULL, '0', NULL, NULL, NULL, '2020-11-01 16:07:55', '2020-11-08 15:45:10');
INSERT INTO `article_comment` VALUES (14, 1, 0, 17, '欢迎加入软件开发中心', NULL, '0', NULL, NULL, NULL, '2020-11-01 17:16:52', '2020-11-08 15:45:09');
INSERT INTO `article_comment` VALUES (16, 2, 0, 18, '哇哦', NULL, '0', NULL, NULL, NULL, '2020-11-08 15:03:36', '2020-11-08 15:03:36');
INSERT INTO `article_comment` VALUES (17, 2, 0, 18, '哇哦', NULL, '0', NULL, NULL, NULL, '2020-11-08 15:05:08', '2020-11-08 15:05:08');
INSERT INTO `article_comment` VALUES (18, 2, 0, 22, '嘿嘿', NULL, '0', NULL, NULL, NULL, '2020-11-08 19:10:10', '2020-11-08 19:10:10');

-- ----------------------------
-- Table structure for article_like
-- ----------------------------
DROP TABLE IF EXISTS `article_like`;
CREATE TABLE `article_like`  (
  `like_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '操作ID',
  `article_id` bigint(20) NULL DEFAULT NULL COMMENT '文章ID',
  `comment_id` bigint(20) NULL DEFAULT NULL COMMENT '评论ID',
  `user_id` bigint(20) NOT NULL COMMENT '用户ID',
  `type` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '操作类型（1 文章收藏，2 文章点赞，3 评论点赞）',
  `desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '操作描述',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '操作状态（0正常，1禁用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`like_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章操作记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article_like
-- ----------------------------
INSERT INTO `article_like` VALUES (41, 2, NULL, 18, '2', NULL, '0', NULL, NULL, NULL, '2020-11-08 15:03:22', '2020-11-08 15:03:22');
INSERT INTO `article_like` VALUES (42, 2, NULL, 17, '2', NULL, '0', NULL, NULL, NULL, '2020-11-08 15:52:59', '2020-11-08 15:52:59');
INSERT INTO `article_like` VALUES (43, NULL, 17, 22, '3', NULL, '0', NULL, NULL, NULL, '2020-11-08 16:46:16', '2020-11-08 16:46:16');
INSERT INTO `article_like` VALUES (44, NULL, 17, 17, '3', NULL, '0', NULL, NULL, NULL, '2020-11-08 18:54:14', '2020-11-08 18:54:14');
INSERT INTO `article_like` VALUES (45, 2, NULL, 22, '1', NULL, '0', NULL, NULL, NULL, '2020-11-08 19:10:31', '2020-11-08 19:10:31');
INSERT INTO `article_like` VALUES (46, 4, NULL, 17, '2', NULL, '0', NULL, NULL, NULL, '2020-11-09 09:33:05', '2020-11-09 09:33:05');
INSERT INTO `article_like` VALUES (47, 3, NULL, 17, '2', NULL, '0', NULL, NULL, NULL, '2020-11-09 12:44:41', '2020-11-09 12:44:41');
INSERT INTO `article_like` VALUES (48, 3, NULL, 17, '1', NULL, '0', NULL, NULL, NULL, '2020-11-09 12:44:44', '2020-11-09 12:44:44');
INSERT INTO `article_like` VALUES (49, 2, NULL, 17, '1', NULL, '0', NULL, NULL, NULL, '2020-11-09 12:45:14', '2020-11-09 12:45:14');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `start_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `end_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (20200425083446, 'WxUser', '2020-08-17 19:17:47', '2020-08-17 19:17:47', 0);
INSERT INTO `migrations` VALUES (20200425095224, 'SystemConfig', '2020-04-25 17:54:48', '2020-04-25 17:54:48', 0);
INSERT INTO `migrations` VALUES (20200429124309, 'SystemResources', '2020-08-17 20:18:01', '2020-08-17 20:18:01', 0);
INSERT INTO `migrations` VALUES (20200817113350, 'SystemAd', '2020-08-17 20:18:01', '2020-08-17 20:18:02', 0);
INSERT INTO `migrations` VALUES (20200925090831, 'RecruitConfig', '2020-09-25 18:37:27', '2020-09-25 18:37:28', 0);
INSERT INTO `migrations` VALUES (20200926110211, 'SystemMenu', '2020-10-06 13:43:23', '2020-10-06 13:43:24', 0);
INSERT INTO `migrations` VALUES (20200926112332, 'SystemRole', '2020-09-26 21:25:25', '2020-09-26 21:25:26', 0);
INSERT INTO `migrations` VALUES (20200926113729, 'SystemRoleMenu', '2020-09-27 14:38:54', '2020-09-27 14:38:55', 0);
INSERT INTO `migrations` VALUES (20200926113742, 'SystemUserRole', '2020-09-27 14:38:55', '2020-09-27 14:38:55', 0);
INSERT INTO `migrations` VALUES (20200926130635, 'SystemOperLog', '2020-09-27 14:38:56', '2020-09-27 14:38:56', 0);
INSERT INTO `migrations` VALUES (20200927064448, 'SystemUser', '2020-09-27 14:59:43', '2020-09-27 14:59:44', 0);
INSERT INTO `migrations` VALUES (20200927070751, 'SystemLogin', '2020-09-27 15:52:05', '2020-09-27 15:52:06', 0);
INSERT INTO `migrations` VALUES (20200927071803, 'SystemDictType', '2020-09-27 15:52:06', '2020-09-27 15:52:06', 0);
INSERT INTO `migrations` VALUES (20200927071812, 'SystemDictData', '2020-09-27 15:52:06', '2020-09-27 15:52:07', 0);
INSERT INTO `migrations` VALUES (20200927080003, 'SystemDept', '2020-09-27 16:11:16', '2020-09-27 16:11:17', 0);
INSERT INTO `migrations` VALUES (20200927080025, 'SystemRoleDept', '2020-09-27 16:11:17', '2020-09-27 16:11:17', 0);
INSERT INTO `migrations` VALUES (20201002021724, 'User', '2020-10-02 11:06:37', '2020-10-02 11:06:38', 0);
INSERT INTO `migrations` VALUES (20201002023507, 'RecruitList', '2020-10-24 20:08:35', '2020-10-24 20:08:35', 0);
INSERT INTO `migrations` VALUES (20201002054441, 'SystemEmailLog', '2020-10-02 14:03:22', '2020-10-02 14:03:22', 0);
INSERT INTO `migrations` VALUES (20201012105825, 'SystemProfession', '2020-10-12 19:47:20', '2020-10-12 19:47:21', 0);
INSERT INTO `migrations` VALUES (20201012105831, 'SystemClasses', '2020-10-12 19:47:21', '2020-10-12 19:47:21', 0);
INSERT INTO `migrations` VALUES (20201017053351, 'SystemProtocol', '2020-10-17 13:45:36', '2020-10-17 13:45:36', 0);
INSERT INTO `migrations` VALUES (20201026021051, 'SystemDemoCategory', '2020-10-26 10:40:34', '2020-10-26 10:40:35', 0);
INSERT INTO `migrations` VALUES (20201026021111, 'SystemDemo', '2020-10-26 10:36:30', '2020-10-26 10:36:31', 0);
INSERT INTO `migrations` VALUES (20201028132713, 'Article', '2020-10-29 15:41:43', '2020-10-29 15:41:43', 0);
INSERT INTO `migrations` VALUES (20201029063337, 'ArticleComment', '2020-10-29 15:41:43', '2020-10-29 15:41:44', 0);
INSERT INTO `migrations` VALUES (20201029063611, 'ArticleLike', '2020-10-29 15:41:44', '2020-10-29 15:41:44', 0);
INSERT INTO `migrations` VALUES (20201029065122, 'ArticleCategory', '2020-10-29 15:58:33', '2020-10-29 15:58:34', 0);

-- ----------------------------
-- Table structure for recruit_config
-- ----------------------------
DROP TABLE IF EXISTS `recruit_config`;
CREATE TABLE `recruit_config`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '系统状态（0开放，1关闭）',
  `cover` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '封面',
  `code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邀请码',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `address` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '地点',
  `begin_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '起始时间',
  `end_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '截止时间',
  `grade` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '开放年级',
  `class` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '开放班级',
  `func` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '活动方式活动方式（1线上，2线下，3线上&线下）',
  `contact` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '联系方式',
  `content` varchar(800) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容简介',
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图文介绍（详情信息）',
  `schedule` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '活动日程',
  `close_tip` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '未开放提示',
  `note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '注意事项',
  `type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1' COMMENT '类型（0默认配置，1现有配置）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '招新系统配置表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of recruit_config
-- ----------------------------
INSERT INTO `recruit_config` VALUES (1, '1', 'uploads/images/admin/10/16/78cca0113a0e66c3.jpg', '', '保山学院·软件开发中心2020年度招新', '保山学院软件开发中心', '1601553600', '1601568000', '[2020]', '2020级网络工程班、2020级教育技术学班、2020级计算机科学与技术班、2020级数字媒体班', '3', 'your phone', '你骄傲的飞远 我栖息的夏天。听不见的宣言 重复过很多年，北纬线的思念被季风吹远。', '<p>软件开发中心2020年度招新</p><p>招新啦！招新啦！招新啦！</p><img src=\"%HW_BASEURL%uploads/images/admin/10/16/89c685f9fee35e11.jpg\" /><p>你说青涩最搭初恋，如小雪落下海岸线。第五个季节某一天上演，我们有相遇的时间。你说空瓶适合许愿，在风暖月光的地点。第十三月你就如期出现，海之角也不再遥远。<a style=\"color:red\">你骄傲的飞远 我栖息的夏天，听不见的宣言 重复过很多年，北纬线的思念被季风吹远。</a>吹远默念的侧脸，吹远鸣唱的诗篇。</p><p>你骄傲的飞远 我栖息的叶片，去不同的世界 却从不曾告别，沧海月的想念羽化我昨天，在我成熟的笑脸，你却未看过一眼。你说空瓶适合许愿，在风暖月光的地点，第十三月你就如期出现。海之角也不再遥远，你骄傲的飞远 我栖息的夏天。听不见的宣言 重复过很多年，北纬线的思念被季风吹远，吹远默念的侧脸。吹远鸣唱的诗篇，你骄傲的飞远 我栖息的叶片，去不同的世界 却从不曾告别。沧海月的想念羽化我昨天，在我成熟的笑脸，你却未看过一眼。<a style=\"color:green\">你骄傲的飞远 我栖息的夏天。</a>听不见的宣言 重复过很多年，北纬线的思念被季风吹远。吹远默念的侧脸，吹远鸣唱的诗篇，你骄傲的飞远 我栖息的叶片。去不同的世界 却从不曾告别，沧海月的想念羽化我昨天，在我成熟的笑脸，你却未看过一眼。</p>', '<p>2020年09月01日，报名开始</p><p>2020年09月08日，截止报名</p>', '系统暂未开放', '<p>注意事项</p>', '0', '2020-09-25 18:48:52', '2020-11-14 13:10:08');
INSERT INTO `recruit_config` VALUES (2, '0', 'uploads/images/admin/10/16/78cca0113a0e66c3.jpg', 'Du94uk', '保山学院·软件开发中心2020年度招新', '软件开发中心(慧源楼B104)', '1604793600', '1605398400', '2020', '2020级网络工程班,2020级计算机科学与技术班,2020级数字媒体技术班,2020级数据分析与大数据技术班', '3', '【QQ】your qq', '信息学院软件开发中心招新啦~', '<img style=\"width:100%\"  src=\"%HW_BASEURL%uploads/images/admin/10/16/89c685f9fee35e11.jpg\" />\r\n<p>一、实验室简介</p>\r\n<p>软件开发中心成立于2018年9月，是以对软件开发感兴趣的学生群体为主的软件工作室。</p>\r\n<p>软件开发中心以项目驱动方式培养学生的专业动手能力，主要技术方向为Web开发、移动端开发何服务器运维等技术。在软件开发中心成立初期，于校企合作单位“铭远信息科技有限公”达成合作，由信息学院教师和公司技术人员共同培养学生。</p>\r\n<p>二、培养目标</p>\r\n<p>在软件工程实验室建设初期，通过长期对于一部分学生的培养，让学生能够达到B/S架构软件和移动端APP的开发水平。提高学生的就业竞争力，以及为学生的创业创新提供孵化平台。同时能够为保山学院的信息化建设提供--定的人力和技术保障。当实验室成员达到一定数量时，能够为保山当地政府及企业提供软件开发和网络建设服务。</p>\r\n<p>三、培养计划\r\n<p>指导教师为部分校内教师和校外聘请的技术人员。学生的培养模式采用阶段性考核制，教师按照学习路线分阶段给学生布置学习任务并设置考核期限，学生利用课余时间到实验室进行上机学习，每到考核期限将对学生进行技术考核。考核通过进行下阶段的学习，不通过者将留在原阶段。每一个阶段都通过的学员由指导教师指导实际项目开发。</p>\r\n', '<p>1、线上报名开始（2020年11月08日）</p><p>2、线上截止报名（2020年11月15日）</p><p>3、参加线下招新宣讲会（2020年11月15日）</p><p>4、初选（2个月）</p><p>5、复试</p><p>6、复试通过后成为正式成员</p>', '系统暂未开放', '<p>1.报名成功后,请立即加入QQ群（进群后请立即修改备注）；</p><p>2.如果报名过程中遇到任何系统问题，请及时联系管理员；</p><p>3.如若报名信息有误，请联系管理员修改；</p><p〉4.只有报名成功后并加入QQ群，才视为有效报名；</p><p>5.管理员QQ：2021652599。</p>', '1', '2020-09-25 18:48:52', '2020-11-14 13:10:21');

-- ----------------------------
-- Table structure for recruit_list
-- ----------------------------
DROP TABLE IF EXISTS `recruit_list`;
CREATE TABLE `recruit_list`  (
  `recruit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '报名ID',
  `uid` bigint(20) NOT NULL COMMENT '用户ID',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '姓名',
  `sex` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '性别（0未知，1男，2女）',
  `grade` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '年级',
  `profession` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '专业',
  `class` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '班级',
  `committee` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '是否班委',
  `union` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '是否学生会',
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '学号',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '联系电话',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '电子邮箱',
  `qq` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'QQ号',
  `math_grades` int(3) NULL DEFAULT NULL COMMENT '高考数学成绩',
  `english_grades` int(3) NULL DEFAULT NULL COMMENT '高考英语成绩',
  `complex_grades` int(3) NULL DEFAULT NULL COMMENT '高考综合成绩（理综/文综）',
  `student_type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '高中分科（1理科，2文科，3不分科）',
  `hoppy` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '个人爱好',
  `push_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '内推码',
  `desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '个人介绍',
  `level` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '成员状态（0正式成员，1待审核，2待考核，3考核中，4不合格（出局）',
  `year` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '招新代码（年号）',
  `ip` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0.0.0.0' COMMENT '提交IP',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`recruit_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '报名表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of recruit_list
-- ----------------------------
INSERT INTO `recruit_list` VALUES (10, 17, 'your name', '1', '2020', '网络工程', '2020级网络工程班', '1', '1', '2009051062', 'your phone', 'your email', NULL, 100, 100, 100, '1', '测试', '', '测试', '1', '2020', '', NULL, NULL, NULL, NULL, '2020-11-08 20:13:47', '2020-11-14 13:09:27');

-- ----------------------------
-- Table structure for system_classes
-- ----------------------------
DROP TABLE IF EXISTS `system_classes`;
CREATE TABLE `system_classes`  (
  `class_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '班级ID',
  `class_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班级名称',
  `profession_id` bigint(20) NOT NULL COMMENT '所属专业',
  `class_grade` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '所属年级',
  `class_abbr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班级简称',
  `class_sort` bigint(20) NOT NULL DEFAULT 0 COMMENT '班级显示顺序',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '班级状态（0正常，1禁用）',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`class_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '班级表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_classes
-- ----------------------------
INSERT INTO `system_classes` VALUES (1, '2018级网络工程班', 1, '2018', '18网工', 1, '0', '', NULL, NULL, NULL, '2020-10-13 10:26:26', '2020-10-13 14:49:31');
INSERT INTO `system_classes` VALUES (2, '2018级计算机科学与技术班', 2, '2018', '18计本', 2, '0', '', NULL, NULL, NULL, '2020-10-13 15:26:45', '2020-10-13 15:40:09');
INSERT INTO `system_classes` VALUES (3, '2018级教育技术学班', 3, '2018', '18教本', 3, '0', '', NULL, NULL, NULL, '2020-10-13 15:27:37', '2020-10-13 15:27:37');
INSERT INTO `system_classes` VALUES (4, '2019级网络工程班', 1, '2019', '19网工', 4, '0', '', NULL, NULL, NULL, '2020-10-13 15:28:27', '2020-10-13 15:28:27');
INSERT INTO `system_classes` VALUES (5, '2019级计算机科学与技术班', 2, '2019', '19计科', 5, '0', '', NULL, NULL, NULL, '2020-10-13 15:29:12', '2020-10-13 15:29:12');
INSERT INTO `system_classes` VALUES (6, '2019级数字媒体技术班', 4, '2019', '19数媒', 6, '0', '', NULL, NULL, NULL, '2020-10-13 15:30:04', '2020-10-13 15:30:04');
INSERT INTO `system_classes` VALUES (7, '2019级数据科学与大数据技术班', 5, '2019', '19大数据', 7, '0', '', NULL, NULL, NULL, '2020-10-13 15:31:07', '2020-11-08 18:57:52');
INSERT INTO `system_classes` VALUES (8, '2020级网络工程班', 1, '2020', '20网工', 8, '0', '', NULL, NULL, NULL, '2020-10-13 15:32:16', '2020-10-13 15:32:16');
INSERT INTO `system_classes` VALUES (9, '2020级计算机科学与技术班', 2, '2020', '20计科', 9, '0', '', NULL, NULL, NULL, '2020-10-13 15:32:56', '2020-10-13 15:32:56');
INSERT INTO `system_classes` VALUES (10, '2020级数字媒体技术班', 4, '2020', '20数媒', 10, '0', '', NULL, NULL, NULL, '2020-10-13 15:33:37', '2020-10-13 15:33:37');
INSERT INTO `system_classes` VALUES (11, '2020级数据科学与大数据技术班', 5, '2020', '20大数据', 11, '0', '', NULL, NULL, NULL, '2020-10-13 15:34:26', '2020-11-08 18:58:16');
INSERT INTO `system_classes` VALUES (12, '2017级网络工程', 1, '2017', '17网工', 12, '0', '', NULL, NULL, NULL, '2020-10-13 15:35:38', '2020-10-13 15:43:54');
INSERT INTO `system_classes` VALUES (13, '2017级计算机科学与技术班', 2, '2017', '17计科', 13, '0', '', NULL, NULL, NULL, '2020-10-13 15:36:29', '2020-10-13 15:44:10');
INSERT INTO `system_classes` VALUES (14, '2017级教育技术学班', 3, '2017', '17教本', 14, '0', '', NULL, NULL, NULL, '2020-10-13 15:37:24', '2020-10-13 15:42:11');
INSERT INTO `system_classes` VALUES (15, '2016级计算机科学与技术一班', 2, '2016', '16计本一班', 15, '0', '', NULL, NULL, NULL, '2020-10-13 15:38:01', '2020-10-13 15:41:32');
INSERT INTO `system_classes` VALUES (16, '2016级计算机科学与技术二班', 2, '2016', '16计本二班', 16, '0', '', NULL, NULL, NULL, '2020-10-13 15:38:57', '2020-10-13 15:41:23');
INSERT INTO `system_classes` VALUES (17, '2016级教育技术学班', 3, '2016', '16教本', 17, '0', '', NULL, NULL, NULL, '2020-10-13 15:39:36', '2020-10-13 15:41:09');

-- ----------------------------
-- Table structure for system_config
-- ----------------------------
DROP TABLE IF EXISTS `system_config`;
CREATE TABLE `system_config`  (
  `config_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '参数配置ID',
  `config_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '参数名称',
  `config_key` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '参数键名',
  `config_value` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '参数键值',
  `config_type` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'N' COMMENT '系统内置（Y是，N否）',
  `encrypt` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1' COMMENT '参数加密（0加密，1不加密）',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '参数状态（0正常，1停用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`config_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统参数配置表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_config
-- ----------------------------
INSERT INTO `system_config` VALUES (1, '小程序AppId（旧）', 'history_appid', '123456', 'Y', '0', '0', NULL, NULL, '小程序唯一凭证，即 AppID，可在「微信公众平台 - 设置 - 开发设置」页中获得。（需要已经成为开发者，且帐号没有异常状态）', '2020-04-25 17:56:38', '2020-09-30 21:17:41');
INSERT INTO `system_config` VALUES (2, '小程序AppSecret（旧）', 'history_app_secret', '123456', 'Y', '0', '0', NULL, NULL, '小程序唯一凭证密钥，即 AppSecret，获取方式同 appid', '2020-04-25 17:57:08', '2020-09-30 21:17:42');
INSERT INTO `system_config` VALUES (3, '小程序AppId', 'appid', '123456', 'Y', '0', '0', NULL, NULL, '小程序唯一凭证，即 AppID，可在「微信公众平台 - 设置 - 开发设置」页中获得。（需要已经成为开发者，且帐号没有异常状态）', '2020-04-25 17:56:38', '2020-09-30 21:17:44');
INSERT INTO `system_config` VALUES (4, '小程序AppSecret', 'app_secret', '123456', 'Y', '0', '0', NULL, NULL, '小程序唯一凭证密钥，即 AppSecret，获取方式同 appid', '2020-04-25 17:57:08', '2020-09-30 21:17:46');
INSERT INTO `system_config` VALUES (5, '网站状态', 'web_status', '0', 'Y', '1', '0', NULL, NULL, '网站状态（用于网站维护,0 开放，1维护）', '2020-04-25 17:57:54', '2020-10-06 10:41:50');
INSERT INTO `system_config` VALUES (6, '邮箱SMTP服务状态', 'emai:is_smtp', '0', 'Y', '1', '0', NULL, NULL, '使用SMTP服务（0正常，1停用）', '2020-09-30 21:04:33', '2020-09-30 21:29:38');
INSERT INTO `system_config` VALUES (7, '邮箱编码格式', 'email:char_set ', 'utf8', 'Y', '1', '0', NULL, NULL, '编码格式为utf8，不设置编码的话，中文会出现乱码', '2020-09-30 21:05:29', '2020-09-30 21:27:57');
INSERT INTO `system_config` VALUES (8, '邮箱SMTP服务器地址', 'email:host', 'your url', 'Y', '1', '0', NULL, NULL, '发送方的SMTP服务器地址', '2020-09-30 21:06:50', '2020-11-14 13:12:53');
INSERT INTO `system_config` VALUES (9, '邮箱身份验证', 'email:smtp_auth', '0', 'Y', '1', '0', NULL, NULL, '是否使用身份验证（0正常，1停用）', '2020-09-30 21:07:46', '2020-09-30 21:29:36');
INSERT INTO `system_config` VALUES (10, '发信邮箱', 'email:username', 'your email', 'Y', '1', '0', NULL, NULL, '发信邮箱', '2020-09-30 21:09:49', '2020-11-14 13:10:55');
INSERT INTO `system_config` VALUES (11, '邮箱SMTP密码或授权码', 'email:password', 'your smtp', 'Y', '0', '0', NULL, NULL, 'SMTP密码或授权码', '2020-09-30 21:10:38', '2020-11-14 13:11:04');
INSERT INTO `system_config` VALUES (12, '邮箱协议方式', 'email:smtp_secure', 'ssl', 'Y', '1', '0', NULL, NULL, '本体可以暂时使用tls,更新外网使用ssl协议方式', '2020-09-30 21:15:56', '2020-09-30 21:28:09');
INSERT INTO `system_config` VALUES (13, '邮箱的ssl协议方式端口号', 'email:port', '465', 'Y', '1', '0', NULL, NULL, '邮箱的ssl协议方式端口号是465/587', '2020-09-30 21:17:20', '2020-09-30 21:28:14');
INSERT INTO `system_config` VALUES (14, '邮箱发件人名称', 'email:from_name', 'your name', 'Y', '1', '0', NULL, NULL, '设置发件人信息，如邮件格式说明中的发件人', '2020-09-30 21:18:44', '2020-11-14 13:11:09');
INSERT INTO `system_config` VALUES (15, '收件人回复邮箱', 'email:reply_to', 'your email', 'Y', '1', '0', NULL, NULL, '收件人收到地址后回复给哪个邮箱', '2020-09-30 21:20:32', '2020-11-14 13:11:12');
INSERT INTO `system_config` VALUES (16, '是否开启邮箱html格式', 'email:is_html', '0', 'Y', '1', '0', NULL, NULL, '\r\n支持html格式内容（如果想在邮件内定义超链接等html代码，就要开始此选项）\r\n支持html格式内容（如果想在邮件内定义超链接等html代码，就要开始此选项）\r\n', '2020-10-01 09:08:19', '2020-10-01 10:39:36');
INSERT INTO `system_config` VALUES (17, '账户注册成功邮件标题', 'email:register:title', '欢迎您加入', 'Y', '1', '0', NULL, NULL, '账户注册成功邮件标题', '2020-10-01 10:37:57', '2020-11-14 13:13:33');
INSERT INTO `system_config` VALUES (18, '邮件中团队名称', 'email:base:team', 'your name', 'Y', '1', '0', NULL, NULL, '邮件中团队名称', '2020-10-01 10:38:34', '2020-11-14 13:13:40');
INSERT INTO `system_config` VALUES (19, '邮件中顶部LOGO', 'email:base:logo_top', '', 'Y', '1', '0', NULL, NULL, '邮件中顶部LOGO', '2020-10-01 10:39:29', '2020-11-14 13:13:03');
INSERT INTO `system_config` VALUES (20, '邮件中底部LOGO', 'email:base:logo_bottom', '', 'Y', '1', '0', NULL, NULL, '邮件中底部LOGO', '2020-10-01 10:39:29', '2020-11-14 13:13:04');
INSERT INTO `system_config` VALUES (21, '邮件中帮助文档地址', 'email:base:help', '', 'Y', '1', '0', NULL, NULL, '邮件中帮助文档地址', '2020-10-01 10:41:20', '2020-11-14 13:13:07');
INSERT INTO `system_config` VALUES (22, '邮件中联系电话', 'email:base:phone', '400-123-321', 'Y', '1', '0', NULL, NULL, '邮件中联系电话', '2020-10-01 10:42:30', '2020-10-01 10:45:06');
INSERT INTO `system_config` VALUES (23, '邮件中联系邮箱', 'email:base:email', 'your email', 'Y', '1', '0', NULL, NULL, '邮件中联系邮箱', '2020-10-01 10:43:19', '2020-11-14 13:11:28');
INSERT INTO `system_config` VALUES (24, '邮件中官网地址', 'email:base:url', '', 'Y', '1', '0', NULL, NULL, '邮件中官网地址', '2020-10-01 10:43:58', '2020-11-14 13:13:12');
INSERT INTO `system_config` VALUES (25, '邮件中登录地址', 'email:base:login', '', 'Y', '1', '0', NULL, NULL, '邮件中登录地址', '2020-10-01 10:43:58', '2020-11-14 13:13:17');
INSERT INTO `system_config` VALUES (26, '邮件中团队全称', 'email:base:team_all', '123', 'Y', '1', '0', NULL, NULL, '邮箱中团队全称', '2020-10-01 10:59:00', '2020-11-14 13:13:15');
INSERT INTO `system_config` VALUES (27, '账户注册验证邮件标题', 'email:activate:title', '456', 'Y', '1', '0', NULL, NULL, '账户注册验证邮件标题', '2020-10-01 10:37:57', '2020-11-14 13:13:21');
INSERT INTO `system_config` VALUES (28, '账户注册验证地址', 'email:activate:url', '', 'Y', '1', '0', NULL, NULL, '账户注册验证地址', '2020-10-01 18:44:23', '2020-11-14 13:13:19');
INSERT INTO `system_config` VALUES (29, '注册邀请码', 'code', '123456', 'Y', '1', '0', NULL, NULL, '用户注册邀请码', '2020-10-02 12:57:03', '2020-11-14 13:13:25');
INSERT INTO `system_config` VALUES (30, '自定义DCloud短信API', 'dcloud:sms_api', 'your url', 'Y', '1', '0', NULL, NULL, NULL, '2020-10-21 22:12:33', '2020-11-14 13:11:44');
INSERT INTO `system_config` VALUES (31, '顶象风控AppId', 'dingxiang:appid', 'your appid', 'Y', '0', '0', NULL, NULL, '顶象风控应用凭证', '2020-10-21 22:12:33', '2020-11-14 13:11:51');
INSERT INTO `system_config` VALUES (32, '顶象风控AppSecret', 'dingxiang:app_secret', 'your secret', 'Y', '0', '0', NULL, NULL, '顶象风控应用凭证秘钥', '2020-10-21 22:12:33', '2020-11-14 13:11:57');
INSERT INTO `system_config` VALUES (33, '阿里云AccessKeyID', 'aliyun:accesskeyid', 'your appid', 'Y', '0', '0', NULL, NULL, NULL, '2020-11-05 12:20:51', '2020-11-14 13:12:02');
INSERT INTO `system_config` VALUES (34, '阿里云AccessKeySecret', 'aliyun:accesskey_secret', 'your secret', 'Y', '0', '0', NULL, NULL, NULL, '2020-11-05 12:21:31', '2020-11-14 13:12:08');
INSERT INTO `system_config` VALUES (35, '阿里云短信模板ID', 'aliyun:sms:template_code', 'your id', 'Y', '1', '0', NULL, NULL, NULL, '2020-11-05 12:33:34', '2020-11-14 13:12:13');
INSERT INTO `system_config` VALUES (36, '阿里云短信签名名称', 'aliyun:sms:sign_name', 'your sign', 'Y', '1', '0', NULL, NULL, NULL, '2020-11-05 12:34:02', '2020-11-14 13:12:17');
INSERT INTO `system_config` VALUES (37, '自定义DCloud短信AccessKeyID', 'dcloud:accesskeyid', 'your appid', 'Y', '0', '0', NULL, NULL, NULL, '2020-11-05 22:36:05', '2020-11-14 13:12:25');
INSERT INTO `system_config` VALUES (38, '自定义DCloud短信AccessKeySecret', 'dcloud:accesskey_secret', 'your secret', 'Y', '0', '0', NULL, NULL, NULL, '2020-11-05 22:37:19', '2020-11-14 13:12:33');
INSERT INTO `system_config` VALUES (39, '阿里云短信状态', 'aliyun:sms:status', '0', 'Y', '1', '0', NULL, NULL, '0 开启，1 关闭', '2020-11-08 10:23:21', '2020-11-08 14:44:54');
INSERT INTO `system_config` VALUES (40, '新生群号', 'group', '123', 'Y', '1', '0', NULL, NULL, '招新新生群', '2020-11-08 11:34:37', '2020-11-14 13:12:37');
INSERT INTO `system_config` VALUES (41, '新生群答案', 'group:answer', '123', 'Y', '1', '0', NULL, NULL, '招新新生群入群答案', '2020-11-08 13:10:04', '2020-11-14 13:12:39');

-- ----------------------------
-- Table structure for system_demo
-- ----------------------------
DROP TABLE IF EXISTS `system_demo`;
CREATE TABLE `system_demo`  (
  `demo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '案例ID',
  `category_id` bigint(20) NOT NULL COMMENT '分类ID',
  `demo_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '案例名称',
  `demo_cover` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '案例封面',
  `demo_images` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '案例轮播图',
  `demo_sort` bigint(20) NOT NULL DEFAULT 0 COMMENT '案例显示顺序',
  `demo_status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '开发状态（1 即将开始，2 开发中，3 已完成，4 等待处理）',
  `author` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '案例开发者',
  `work` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分工',
  `multi` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '多端',
  `keyword` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '关键词',
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '案例详情内容',
  `other` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '案例其他说明',
  `start_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '开始时间',
  `end_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '完成时间',
  `exp_start_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '预计开始时间',
  `exp_end_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '预计完成时间',
  `desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '案例描述',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '案例状态（0正常，1禁用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`demo_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '案例表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_demo
-- ----------------------------
INSERT INTO `system_demo` VALUES (1, 3, '软件开发中心官网', 'uploads/images/admin/11/01/892d1c106a2d90be.jpg', 'uploads/images/admin/11/01/892d1c106a2d90be.jpg,uploads/images/admin/11/01/13557ce1d9758916.jpg,uploads/images/admin/11/01/fbb07b05fc47d93b.jpg,uploads/images/admin/11/01/75078cb060b747a7.jpg,uploads/images/admin/11/01/53b7ed8e7da554f4.jpg,uploads/images/admin/11/01/c7ea824c4bb9e2e1.jpg,uploads/images/admin/11/01/769411b98cbfeb2f.jpg', 1, '2', '杭伟', '[{\"key\":\"H5开发\",\"value\":\"杭伟\"},{\"key\":\"后台开发\",\"value\":\"杭伟\"},{\"key\":\"后端开发\",\"value\":\"杭伟\"}]', 'H5,微信,后台', '官网,应用,官方', '<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/892d1c106a2d90be.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/13557ce1d9758916.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/fbb07b05fc47d93b.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/75078cb060b747a7.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/53b7ed8e7da554f4.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/c7ea824c4bb9e2e1.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/769411b98cbfeb2f.jpg\" />', '<p>软件开发中心成立于2018年9月，是以对软件开发感兴趣的学生群体为主的工作室。以项目驱动的方式培养学生的专业动手能力，主要技术方向为移动应用开发、图像识别算法和树莓派等。前期主要是以信息学院教师和团队技术人员共同培养学生。</p>', '1598926341', '1609380741', '1598926341', '1609380741', NULL, '0', NULL, NULL, NULL, '2020-10-26 11:25:32', '2020-11-01 14:38:18');
INSERT INTO `system_demo` VALUES (2, 6, '溯源系统', 'uploads/images/admin/10/31/6a9eaa737c256828.jpg', 'uploads/images/admin/10/31/6a9eaa737c256828.jpg,uploads/images/admin/10/31/55c714e3d62d0.jpg,uploads/images/admin/10/31/b971c9391824fd50.jpg,uploads/images/admin/10/31/053289b281b2399c.jpg,uploads/images/admin/10/31/55caa4edb82b3.jpg,uploads/images/admin/10/31/17f1d78db32ebb00.jpg', 2, '3', '杭伟,陆荣会,欧阳发贵', '[{\"key\":\"H5开发\",\"value\":\"杭伟\"},{\"key\":\"APP开发\",\"value\":\"杭伟\"},{\"key\":\"后台开发\",\"value\":\"欧阳发贵\"},{\"key\":\"后端开发\",\"value\":\"陆荣会\"}]', 'H5,APP', '溯源,系统', '<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/10/31/6a9eaa737c256828.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/10/31/55c714e3d62d0.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/10/31/b971c9391824fd50.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/10/31/053289b281b2399c.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/10/31/55caa4edb82b3.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/10/31/17f1d78db32ebb00.jpg\" />', '<p>溯源系统利用现代二维码、数据管理和传递、PHP等目前先进互联网技术，以软件系统技术为依托开发出的一套生产可记录、信息可查询的农产品溯源系统。该系统可以使商家方便的将自己的优质农产品的种植、采摘、包装、流通环节等信息展示给广大消费者，消费者可以通过智能手机扫描二维码即可查看这个产品从育种到走进市场的整个过程，真正做到随时随地“轻轻一扫，知根知源，安安全全”。溯源系统通过记录和展示农产品的产品基本信息、产品简介、种植过程记录、采摘包装运输过程。</p>', '1591800246', '1602341046', '1591800246', '1602341046', NULL, '0', NULL, NULL, NULL, '2020-10-31 22:52:11', '2020-11-01 09:52:49');
INSERT INTO `system_demo` VALUES (3, 9, '智慧课堂', 'uploads/images/admin/11/01/3c608bafa1a19ffe.jpg', 'uploads/images/admin/11/01/3c608bafa1a19ffe.jpg,uploads/images/admin/11/01/faa69edce4f6d879.jpg,uploads/images/admin/11/01/a7cf6bc5b41815c1.jpg,uploads/images/admin/11/01/b8a89e4603718799.jpg', 4, '3', '张兴林,陆荣会', '[{\"key\":\"H5开发\",\"value\":\"张兴林\"},{\"key\":\"后台开发\",\"value\":\"张兴林\"},{\"key\":\"后端开发\",\"value\":\"陆荣会\"}]', 'H5,公众号', '校园,课堂,智慧校园', '<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/3c608bafa1a19ffe.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/faa69edce4f6d879.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/a7cf6bc5b41815c1.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/b8a89e4603718799.jpg\" />', '<p>智慧课堂以建构主义学习理论为指导，利用“互联网+”的思维方式和大数据、云计算等新一代信息技术打造富有智慧的课堂教学环境，在教学决策、评价反馈、交流互动、资源推送等方面实现了数据化、智能化，促进传统课堂教学内容与方式的全面变革，为智慧的教与学提供了先进的技术支撑。</p>', '1563029723', '1584284123', '1563029723', '1584284123', NULL, '0', NULL, NULL, NULL, '2020-11-01 10:15:51', '2020-11-02 22:56:14');
INSERT INTO `system_demo` VALUES (4, 9, '校园闲置资源共享平台', 'uploads/images/admin/11/01/edec16985b5fa3d1.jpg', 'uploads/images/admin/11/01/edec16985b5fa3d1.jpg,uploads/images/admin/11/01/f7c435a1cf58dd5a.jpg,uploads/images/admin/11/01/3927624644498016.jpg,uploads/images/admin/11/01/0b041451018bb8ca.jpg,uploads/images/admin/11/01/aab4704f94ae71d2.jpg,uploads/images/admin/11/01/1effb62ae5570b5e.jpg,uploads/images/admin/11/01/b561737b1b1f18e5.jpg,uploads/images/admin/11/01/d161863eafde5b52.jpg', 3, '3', '杭伟', '[{\"key\":\"H5开发\",\"value\":\"杭伟\"},{\"key\":\"后台开发\",\"value\":\"杭伟\"},{\"key\":\"后端开发\",\"value\":\"杭伟\"}]', 'H5,公众号', '高校,共享,平台,闲置,交易,商城', '<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/edec16985b5fa3d1.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/f7c435a1cf58dd5a.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/3927624644498016.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/aab4704f94ae71d2.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/0b041451018bb8ca.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/1effb62ae5570b5e.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/b561737b1b1f18e5.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/d161863eafde5b52.jpg\" />', '<p>本平台是基于微信公众平台开发的校内资源共享应用平台，用户通过本平台可以租赁自己所需的商品或是出租自己闲置的资源，也可以施展自己的一技之长，技术变现。简化交易流程，线上支付，线下交货/归还货，平台实行实名制认证及信用体系机制，保障商品可靠性、交易安全性。</p>\r\n<br/>\r\n<p style=\"text-align: center;\">网站功能概要设计与分析</p>\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/e1a2d1f3dd990b79.png\" />\r\n<br/>\r\n<p style=\"text-align: center;\">平台基本功能结构（管理员）</p>\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/a32b1b284d463101.png\" />\r\n<br/>\r\n<p style=\"text-align: center;\">平台基本功能结构（用户）</p>\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/ba327c5cdd964504.png\" />', '1576375941', '1589940741', '1576375941', '1589940741', NULL, '0', NULL, NULL, NULL, '2020-11-01 11:05:28', '2020-11-01 13:42:59');
INSERT INTO `system_demo` VALUES (5, 9, '党务学习系统', 'uploads/images/admin/11/01/de59dfb28129db47.jpg', 'uploads/images/admin/11/01/de59dfb28129db47.jpg,uploads/images/admin/11/01/1138770b45bff1fc.jpg,uploads/images/admin/11/01/b065c4b4c8a5c59f.jpg', 5, '3', '何鸿飞,欧阳发贵,陆荣会', '[{\"key\":\"H5开发\",\"value\":\"何鸿飞\"},{\"key\":\"后台开发\",\"value\":\"欧阳发贵\"},{\"key\":\"后端开发\",\"value\":\"陆荣会\"}]', 'H5,公众号', '党务,系统,平台', '<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/de59dfb28129db47.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/1138770b45bff1fc.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/b065c4b4c8a5c59f.jpg\" />', '<p>初步构建“党务管理智能化、信息管理维护精准化、 党员教育管理个性化”的智慧党建工作新模式，打破了地域、时空界限的壁垒，有利于增强基层党组织对党员的吸引力和凝聚力。</p>', '1594779141', '1598926341', '1594779141', '1598926341', NULL, '0', NULL, NULL, NULL, '2020-11-01 11:05:28', '2020-11-03 21:02:39');
INSERT INTO `system_demo` VALUES (6, 9, '科研项目小助手', 'uploads/images/admin/11/01/856c48cb85c1cd3a.jpg', 'uploads/images/admin/11/01/856c48cb85c1cd3a.jpg,uploads/images/admin/11/01/4a49e66f7ec66673.jpg,uploads/images/admin/11/01/75cb47cb459bed46.jpg,uploads/images/admin/11/01/00334cd55c70459c.jpg,uploads/images/admin/11/01/cc9dc3ce7f3f96d6.jpg,uploads/images/admin/11/01/f80081111d484ecb.jpg,uploads/images/admin/11/01/9fafbe4d96a11edb.jpg', 6, '3', '张健,杭伟', '[{\"key\":\"H5开发\",\"value\":\"张健\"},{\"key\":\"后台开发\",\"value\":\"杭伟\"},{\"key\":\"后端开发\",\"value\":\"杭伟\"}]', 'H5,公众号', '科研,管理,系统,平台', '<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/856c48cb85c1cd3a.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/4a49e66f7ec66673.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/75cb47cb459bed46.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/00334cd55c70459c.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/cc9dc3ce7f3f96d6.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/f80081111d484ecb.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/9fafbe4d96a11edb.jpg\" />', '<p>科研项目管理助手的使用，它快捷的数据分析功能能够辅助科研管理人员处理信息，推动科研项目管理的信息化和职能化，系统充分发挥 Internet 在信息收集、存储、传递过程中的优势，使得用户可以突破时间和空间的限制，及时提交和获取科研信息，使科研项目的管理和变更不受时间和空间的限制。</p>', '1567303941', '1575079941', '1567303941', '1575079941', NULL, '0', NULL, NULL, NULL, '2020-11-01 11:05:28', '2020-11-01 14:09:52');
INSERT INTO `system_demo` VALUES (7, 9, '发展党员管理系统', 'uploads/images/admin/11/01/df6accaf249b7b03.jpg', 'uploads/images/admin/11/01/df6accaf249b7b03.jpg,uploads/images/admin/11/01/8d67bf37d62f8ca6.jpg,uploads/images/admin/11/01/1fc42ce22dfa97e3.jpg,uploads/images/admin/11/01/f0abfef094d991e3.jpg', 7, '3', '张兴林,梁巨锟,徐波', '[{\"key\":\"H5开发\",\"value\":\"张兴林 徐波\"},{\"key\":\"后台开发\",\"value\":\"梁巨锟\"},{\"key\":\"后端开发\",\"value\":\"张兴林\"}]', '公众号', '党员,系统,平台,管理,入党,党务', '<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/df6accaf249b7b03.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/8d67bf37d62f8ca6.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/1fc42ce22dfa97e3.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/f0abfef094d991e3.jpg\" />', '<p>加强党员动态管理，是党员队伍建设不断适应经济社会发展新形势的客观需要。建立党员信息库，加强党员动态管理，健全一体的党员管理服务势在必行。该系统可以大大简化党员动态管理的难度，方便操作，提高工作效率。</p>\r\n<p>系统特点：</p>\r\n<p>创新管理，符合党员动态管理需求</p>\r\n<p>操作简便，易学易用</p>\r\n<p>先进的系统平台和良好的系统扩展性</p>\r\n<p>严谨的系统安全性</p>', '1564629141', '1600139541', '1564629141', '1600139541', NULL, '0', NULL, NULL, NULL, '2020-11-01 18:24:51', '2020-11-01 18:50:53');
INSERT INTO `system_demo` VALUES (8, 5, '实训作业管理系统', 'uploads/images/admin/11/01/a0d4a7bc2592c1cd.jpg', 'uploads/images/admin/11/01/a0d4a7bc2592c1cd.jpg,uploads/images/admin/11/01/89491d393407eb73.jpg,uploads/images/admin/11/01/e75a27d6dce3590e.jpg,uploads/images/admin/11/01/0db2d85d122145cd.jpg', 8, '3', '张兴林', '[{\"key\":\"PC端开发\",\"value\":\"张兴林\"}]', 'PC网站', '系统,实训,实验,作业,学生', '<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/a0d4a7bc2592c1cd.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/89491d393407eb73.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/e75a27d6dce3590e.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/0db2d85d122145cd.jpg\" />', '<p>在信息高速发展的时代，随着教学管理信息化的不断推进，越来越多的高校开始使用教学管理工具。高校的理工类专业在实践方面对学生要求较高，实训实验课程的安排与教学比较多，纸质的实训作业在记录与存放方面占用着大量的教学资源。实训管理系统将web技术投入到实训作业的管理中，让实训作业脱离了纸质实体工具的局限，学生只需使用互联网设备进行编辑等操作，就可以将课程的实训作业完成，使用方便，快捷，便于保存和查找，节约了纸质资源及节省了存放实训的空间。</p>', '1535771541', '1556680341', '1535771541', '1556680341', NULL, '0', NULL, NULL, NULL, '2020-11-01 18:24:51', '2020-11-01 18:47:57');
INSERT INTO `system_demo` VALUES (9, 6, '基于树莓派的智能植物养殖系统', 'uploads/images/admin/11/01/704e45adcce3ddbd.jpg', 'uploads/images/admin/11/01/704e45adcce3ddbd.jpg,uploads/images/admin/11/01/5a3ddc72c2fb036c.jpg,uploads/images/admin/11/01/a92ae3b8ca4cee5f.jpg', 8, '3', '何鸿飞,田野,欧阳发贵,陆荣会', '[{\"key\":\"硬件开发\",\"value\":\"何鸿飞\"},{\"key\":\"硬件开发\",\"value\":\"田野\"},{\"key\":\"APP开发\",\"value\":\"欧阳发贵\"},{\"key\":\"后端开发\",\"value\":\"陆荣会\"}]', 'APP', '树莓派,智能,农业,农作物,植物', '<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/704e45adcce3ddbd.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/5a3ddc72c2fb036c.jpg\" />\r\n<img style=\"width:100%\" src=\"%HW_BASEURL%uploads/images/admin/11/01/a92ae3b8ca4cee5f.jpg\" />', '<p>该系统使用嵌入式设备来构建物联网平台，种植的作物生长环境信息和设备运行状态可以存储在数据库中。 将采集到的数据进行融合，树莓派可以作为一个构建网站平台的服务器，该平台用户可以通过互联网设备，更科学和有效的方式获得农作物最新的增长趋势，以APP形式显示了农作物生长环境信息和设备的运行状况以及实时图像。</p>', '1556680341', '1567307541', '1556680341', '1567307541', NULL, '0', NULL, NULL, NULL, '2020-11-01 18:24:51', '2020-11-03 21:04:34');

-- ----------------------------
-- Table structure for system_demo_category
-- ----------------------------
DROP TABLE IF EXISTS `system_demo_category`;
CREATE TABLE `system_demo_category`  (
  `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `category_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '分类名称',
  `category_color` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分类标记颜色',
  `category_badge` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分类标记',
  `parent_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '上级分类ID',
  `icon` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '分类图标',
  `category_sort` bigint(20) NOT NULL DEFAULT 0 COMMENT '分类显示顺序',
  `desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分类描述',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '分类状态（0正常，1禁用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '案例分类表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_demo_category
-- ----------------------------
INSERT INTO `system_demo_category` VALUES (1, '苹果APP', 'orange', 'IOS', 0, '/static/images/demo/menu/ios.png', 1, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:41:17', '2020-10-26 17:38:53');
INSERT INTO `system_demo_category` VALUES (2, '微信小程序', NULL, NULL, 0, '/static/images/demo/menu/mini-program.png', 2, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:41:45', '2020-10-26 10:46:11');
INSERT INTO `system_demo_category` VALUES (3, 'H5', 'orange', 'HTML5', 0, '/static/images/demo/menu/h5.png', 3, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:42:18', '2020-10-26 10:46:13');
INSERT INTO `system_demo_category` VALUES (4, '字节跳动小程序', 'black', 'ByteDance', 0, '/static/images/demo/menu/bytedance-mini-program.png', 4, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:42:45', '2020-10-26 10:46:15');
INSERT INTO `system_demo_category` VALUES (5, 'PC', NULL, NULL, 0, '/static/images/demo/menu/pc.png', 5, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:42:58', '2020-10-26 10:46:17');
INSERT INTO `system_demo_category` VALUES (6, '安卓APP', 'red', 'Android', 0, '/static/images/demo/menu/android.png', 6, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:43:29', '2020-10-26 10:46:19');
INSERT INTO `system_demo_category` VALUES (7, 'QQ小程序', NULL, NULL, 0, '/static/images/demo/menu/qq-mini-program.png', 7, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:43:46', '2020-10-26 10:46:21');
INSERT INTO `system_demo_category` VALUES (8, '支付宝小程序', 'blue', 'Alipay', 0, '/static/images/demo/menu/alipay-mini-program.png', 8, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:44:36', '2020-10-26 10:46:22');
INSERT INTO `system_demo_category` VALUES (9, '微信公众号', NULL, NULL, 0, '/static/images/demo/menu/weixin.png', 9, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:44:55', '2020-10-26 10:46:24');
INSERT INTO `system_demo_category` VALUES (10, '百度小程序', NULL, NULL, 0, '/static/images/demo/menu/baidu-mini-program.png', 10, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:45:16', '2020-10-26 10:46:26');
INSERT INTO `system_demo_category` VALUES (11, '360小程序', NULL, NULL, 0, '/static/images/demo/menu/360-mini-program.png', 11, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:45:34', '2020-10-26 10:46:28');
INSERT INTO `system_demo_category` VALUES (12, '快应用', NULL, NULL, 0, '/static/images/demo/menu/quickapp.png', 12, NULL, '0', NULL, NULL, NULL, '2020-10-26 10:45:50', '2020-10-26 10:46:31');

-- ----------------------------
-- Table structure for system_dept
-- ----------------------------
DROP TABLE IF EXISTS `system_dept`;
CREATE TABLE `system_dept`  (
  `dept_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '部门ID',
  `parent_id` bigint(20) NULL DEFAULT 0 COMMENT '父级部门ID',
  `ancestors` bigint(20) NULL DEFAULT NULL COMMENT '祖级列表',
  `dept_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '部门名称',
  `dept_sort` bigint(20) NOT NULL DEFAULT 0 COMMENT '显示顺序',
  `leader` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '负责人',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '联系电话',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮箱',
  `dept_type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '系统内置（0是，1否）',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '部门状态（0正常，1停用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`dept_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '部门表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_dept
-- ----------------------------
INSERT INTO `system_dept` VALUES (1, 0, NULL, '默认部门', 1, '系统', '13628731731', 'kfzx@lanyanxi.com', '0', '0', NULL, NULL, '系统默认部门，不可删除', NULL, '2020-10-11 13:08:13', '2020-10-11 13:21:42');
INSERT INTO `system_dept` VALUES (2, 0, NULL, '软件组', 1, '杭伟', '13628731731', '2021652599@qq.com', '1', '0', NULL, NULL, NULL, NULL, '2020-10-11 10:25:28', '2020-10-11 13:12:55');
INSERT INTO `system_dept` VALUES (3, 0, NULL, '物联网组', 2, '匿名', '13628731731', '13628731731@qq.com', '1', '0', NULL, NULL, NULL, NULL, '2020-10-11 10:55:16', '2020-10-11 13:31:04');

-- ----------------------------
-- Table structure for system_dict_data
-- ----------------------------
DROP TABLE IF EXISTS `system_dict_data`;
CREATE TABLE `system_dict_data`  (
  `dict_code` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '字典编码',
  `dict_sort` bigint(20) NOT NULL COMMENT '字典排序',
  `dict_label` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '字典标签',
  `dict_value` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '字典键值',
  `dict_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '字典类型',
  `css_class` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '样式属性（其他样式扩展）',
  `list_class` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '表格回显样式',
  `is_default` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N' COMMENT '是否默认（Y是，N否）',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '状态（0正常，1停用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`dict_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '字典数据表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_dict_data
-- ----------------------------

-- ----------------------------
-- Table structure for system_dict_type
-- ----------------------------
DROP TABLE IF EXISTS `system_dict_type`;
CREATE TABLE `system_dict_type`  (
  `dict_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '字典ID',
  `dict_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '字典名称',
  `dict_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '字典类型',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '状态（0正常，1停用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`dict_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '字典类型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_dict_type
-- ----------------------------

-- ----------------------------
-- Table structure for system_email_log
-- ----------------------------
DROP TABLE IF EXISTS `system_email_log`;
CREATE TABLE `system_email_log`  (
  `email_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '邮件ID',
  `title` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮件标题',
  `oper_id` bigint(20) NULL DEFAULT NULL COMMENT '操作人员ID',
  `from_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '发送人',
  `to_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收件人',
  `addcc_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '抄送人',
  `addbcc_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '秘密抄送人',
  `body` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '邮件正文',
  `oper_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '操作人员',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '邮件发送状态（0正常，1异常）',
  `errinfo` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '错误信息',
  `oper_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`email_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '邮件发送日志记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_email_log
-- ----------------------------

-- ----------------------------
-- Table structure for system_login
-- ----------------------------
DROP TABLE IF EXISTS `system_login`;
CREATE TABLE `system_login`  (
  `login_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_id` bigint(20) NOT NULL COMMENT '用户ID',
  `user_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户账号',
  `ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '登录IP地址',
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '登录地点',
  `browser` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '浏览器类型',
  `os` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '操作系统',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '登录状态（0成功，1失败）',
  `msg` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '提示消息',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '备注',
  `time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '登录时间',
  PRIMARY KEY (`login_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统登录记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_login
-- ----------------------------

-- ----------------------------
-- Table structure for system_marketing
-- ----------------------------
DROP TABLE IF EXISTS `system_marketing`;
CREATE TABLE `system_marketing`  (
  `marketing_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '营销ID',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '名称',
  `content` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '内容',
  `resources_id` int(11) NULL DEFAULT NULL COMMENT '图片ID',
  `url` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'url',
  `group` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分组',
  `sort` int(1) NOT NULL DEFAULT 0 COMMENT '排序',
  `status` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '状态（0正常，1停用）',
  `exp_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '4691404800' COMMENT '有效期至（默认至2118年09月01日 00:00:00）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`marketing_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统营销表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_marketing
-- ----------------------------
INSERT INTO `system_marketing` VALUES (1, '首页轮播图1', NULL, 1, NULL, 'index_carousel', 0, '1', '4691404800', NULL, NULL, NULL, '2020-08-17 20:20:27', '2020-08-17 20:30:14');

-- ----------------------------
-- Table structure for system_menu
-- ----------------------------
DROP TABLE IF EXISTS `system_menu`;
CREATE TABLE `system_menu`  (
  `menu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '菜单ID',
  `parent_id` bigint(20) NULL DEFAULT 0 COMMENT '父级菜单ID',
  `path` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '路由地址',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '路由名称',
  `redirect` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '重定向地址',
  `component` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '组件路径',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '菜单名称',
  `icon` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '#' COMMENT '菜单图标',
  `hidden` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '菜单显隐状态（0显示，1隐藏）',
  `hidden_children` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '子菜单显隐状态（0显示，1隐藏）',
  `keep_alive` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '是否缓存（0缓存，1不缓存）',
  `permission` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '权限标识',
  `target` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '外链跳转模式',
  `menu_sort` bigint(20) NOT NULL DEFAULT 0 COMMENT '菜单显示顺序',
  `is_frame` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1' COMMENT '是否为外链（0是，1否）',
  `menu_type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '菜单类型（M目录，C菜单，F按钮，G分组）',
  `menu_types` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '系统内置（0是，1否）',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '菜单状态（0正常，1停用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '更新者',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '备注',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '菜单权限表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_menu
-- ----------------------------
INSERT INTO `system_menu` VALUES (1, 0, '/', 'Index', '/home/workplace', 'BasicLayout', 'menu', '#', '1', '0', '1', NULL, NULL, 1, '1', 'G', '0', '0', '', '', '', '2020-10-06 13:20:59', '2020-10-11 13:38:01');
INSERT INTO `system_menu` VALUES (2, 0, '/home', 'Home', '/home/workplace', 'RouteView', 'menu.home', 'dashboard', '0', '0', '0', 'home', NULL, 2, '1', 'M', '1', '0', '', '', '', '2020-10-06 13:22:38', '2020-10-09 21:30:39');
INSERT INTO `system_menu` VALUES (3, 0, '/recruit', 'Recruit', '/recruit/list', 'RouteView', 'menu.recruit', 'desktop', '0', '0', '0', 'recruit', NULL, 3, '1', 'M', '1', '0', '', '', '', '2020-10-06 13:31:05', '2020-10-12 09:57:28');
INSERT INTO `system_menu` VALUES (4, 0, '/system', 'System', '/system/settings', 'RouteView', 'menu.system', 'global', '0', '0', '0', 'system', NULL, 4, '1', 'M', '1', '0', '', '', '', '2020-10-06 13:33:39', '2020-10-12 09:57:12');
INSERT INTO `system_menu` VALUES (5, 2, '/home/workplace', 'Workplace', NULL, '/home/Workplace', 'menu.home.workplace', 'windows', '0', '0', '0', 'home:workplace', NULL, 1, '1', 'C', '1', '0', '', '', '', '2020-10-06 13:24:18', '2020-10-09 19:55:30');
INSERT INTO `system_menu` VALUES (6, 2, '/home/analysis/:pageNo([1-9]\\d*)?', 'Analysis', '', '/home/Analysis', 'menu.home.analysis', 'pie-chart', '0', '0', '1', 'home:analysis', NULL, 2, '1', 'C', '1', '0', '', '', '', '2020-10-06 13:25:58', '2020-10-06 13:35:38');
INSERT INTO `system_menu` VALUES (7, 2, 'https://www.baidu.com/', 'Baidu', '', NULL, 'menu.home.monitor', 'fund', '0', '0', '0', 'home:monitor', '_blank', 3, '0', 'C', '1', '0', '', '', '', '2020-10-06 13:28:03', '2020-10-06 18:40:11');
INSERT INTO `system_menu` VALUES (8, 2, 'https://kfzx.lanyanxi.com/', 'Kfzx', NULL, '', 'menu.home.kfzx', 'vertical-right', '0', '0', '0', NULL, '_blank', 4, '0', 'C', '1', '0', '', '', '', '2020-10-06 13:29:00', '2020-10-09 10:55:05');
INSERT INTO `system_menu` VALUES (9, 3, '/recruit/data', 'RecruitData', '', '/recruit/data/Index', 'menu.recruit.data', 'bar-chart', '0', '0', '0', 'recruit:data', NULL, 1, '1', 'C', '1', '0', '', '', '', '2020-10-06 13:38:00', '2020-10-06 13:58:44');
INSERT INTO `system_menu` VALUES (10, 3, '/recruit/list', 'RecruitList', NULL, '/recruit/list/Index', 'menu.recruit.list', 'file-protect', '0', '0', '0', 'recruit:list', NULL, 2, '1', 'C', '1', '0', '', '', '', '2020-10-06 13:39:59', '2020-10-06 13:58:46');
INSERT INTO `system_menu` VALUES (11, 3, '/recruit/settings', 'RecruitSettings', '/recruit/settings/base', '/recruit/settings/Index', 'menu.recruit.settings', 'setting', '0', '1', '0', 'recruit:settings', NULL, 3, '1', 'C', '1', '0', '', '', '', '2020-10-06 13:40:53', '2020-10-06 21:38:52');
INSERT INTO `system_menu` VALUES (12, 11, '/recruit/settings/base', 'RecruitSettingsBase', NULL, '/recruit/settings/Base', 'menu.recruit.settings.base', '#', '1', '0', '0', 'recruit:settings:base', NULL, 1, '1', 'C', '1', '0', '', '', '', '2020-10-06 13:58:36', '2020-10-06 14:13:10');
INSERT INTO `system_menu` VALUES (13, 11, '/recruit/settings/details', 'RecruitSettingsDetails', NULL, '/recruit/settings/Details', 'menu.recruit.settings.details', '#', '1', '0', '0', 'recruit:settings:details', NULL, 2, '1', 'C', '1', '0', '', '', '', '2020-10-06 13:59:44', '2020-10-06 14:13:11');
INSERT INTO `system_menu` VALUES (14, 11, '/recruit/settings/schedule', 'RecruitSettingsSchedule', NULL, '/recruit/settings/Schedule', 'menu.recruit.settings.schedule', '#', '1', '0', '0', 'recruit:settings:schedule', NULL, 3, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:00:29', '2020-10-06 14:13:13');
INSERT INTO `system_menu` VALUES (15, 11, '/recruit/settings/note', 'RecruitSettingsNote', NULL, '/recruit/settings/Note', 'menu.recruit.settings.note', '#', '1', '0', '0', 'recruit:settings:note', NULL, 4, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:01:18', '2020-10-06 14:13:15');
INSERT INTO `system_menu` VALUES (16, 4, '/system/manager', 'SystemManager', NULL, '/system/manager/Index', 'menu.system.manager', 'team', '0', '0', '0', 'system:manager', NULL, 1, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:04:02', '2020-10-06 14:04:56');
INSERT INTO `system_menu` VALUES (17, 4, '/system/role', 'SystemRole', NULL, '/system/role/Index', 'menu.system.role', 'skin', '0', '0', '0', 'system:role', NULL, 2, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:04:54', '2020-10-09 11:12:50');
INSERT INTO `system_menu` VALUES (18, 4, '/system/menu', 'SystemMenu', NULL, '/system/menu/Index', 'menu.system.menu', 'profile', '0', '0', '0', 'system:menu', NULL, 3, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:06:35', '2020-10-09 11:12:53');
INSERT INTO `system_menu` VALUES (19, 4, '/system/dept', 'SystemDept', NULL, '/system/dept/Index', 'menu.system.dept', 'apartment', '0', '0', '0', 'system:dept', NULL, 4, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:07:24', '2020-10-06 14:07:24');
INSERT INTO `system_menu` VALUES (20, 4, '/system/profession', 'SystemProfession', NULL, '/system/profession/Index', 'menu.system.profession', 'container', '0', '0', '0', 'system:profession', NULL, 5, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:08:24', '2020-10-06 14:09:15');
INSERT INTO `system_menu` VALUES (21, 4, '/system/class', 'SystemClass', NULL, '/system/class/Index', 'menu.system.class', 'home', '0', '0', '0', 'system:class', NULL, 6, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:09:13', '2020-10-06 14:09:13');
INSERT INTO `system_menu` VALUES (22, 4, '/system/settings', 'SystemSettings', '/system/settings/base', '/system/settings/Index', 'menu.system.settings', 'setting', '0', '1', '0', 'system:settings', NULL, 7, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:10:12', '2020-10-06 21:38:50');
INSERT INTO `system_menu` VALUES (23, 22, '/system/settings/base', 'SystemSettingsBase', '', '/system/settings/Base', 'menu.system.settings.base', '#', '1', '0', '0', 'system:settings:base', NULL, 1, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:12:22', '2020-10-06 14:16:01');
INSERT INTO `system_menu` VALUES (24, 22, '/system/settings/email', 'SystemSettingsEmail', '', '/system/settings/Email', 'menu.system.settings.email', '#', '1', '0', '0', 'system:settings:email', NULL, 2, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:14:05', '2020-10-06 14:14:05');
INSERT INTO `system_menu` VALUES (25, 22, '/system/settings/emailBase', 'SystemSettingsEmailBase', '', '/system/settings/EmailBase', 'menu.system.settings.email.base', '#', '1', '0', '0', 'system:settings:emailbase', NULL, 3, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:15:23', '2020-10-06 14:16:07');
INSERT INTO `system_menu` VALUES (26, 22, '/system/settings/wechat', 'SystemSettingsWechat', NULL, '/system/settings/Wechat', 'menu.system.settings.wechat', '#', '1', '0', '0', 'system:settings:wechat', NULL, 4, '1', 'C', '1', '0', '', '', '', '2020-10-06 14:17:08', '2020-10-06 14:17:08');
INSERT INTO `system_menu` VALUES (27, 10, NULL, '', NULL, NULL, '导出报名', '#', '0', '0', '0', 'recruit:list:export', NULL, 1, '1', 'F', '1', '0', '', '', '', '2020-10-08 17:11:54', '2020-10-11 10:46:59');
INSERT INTO `system_menu` VALUES (28, 10, NULL, '', NULL, NULL, '查询报名', '#', '0', '0', '0', 'recruit:list:query', NULL, 2, '1', 'F', '1', '0', '', '', '', '2020-10-08 17:12:30', '2020-10-11 10:47:11');
INSERT INTO `system_menu` VALUES (29, 10, NULL, '', NULL, NULL, '查看报名详情', '#', '0', '0', '0', 'recruit:list:detail', NULL, 3, '1', 'F', '1', '0', '', '', '', '2020-10-08 17:14:24', '2020-11-03 10:47:00');
INSERT INTO `system_menu` VALUES (30, 10, NULL, '', NULL, NULL, '删除报名', '#', '0', '0', '0', 'recruit:list:delete', NULL, 4, '1', 'F', '1', '0', '', '', '', '2020-10-08 17:15:12', '2020-10-11 10:47:32');
INSERT INTO `system_menu` VALUES (31, 16, NULL, '', NULL, NULL, '查询管理员', '#', '0', '0', '0', 'system:manager:query', NULL, 1, '1', 'F', '1', '0', '', '', '', '2020-10-09 10:58:01', '2020-10-11 10:47:50');
INSERT INTO `system_menu` VALUES (32, 18, NULL, '', NULL, NULL, '编辑菜单', '#', '0', '0', '0', 'system:menu:update', NULL, 1, '1', 'F', '1', '0', '', '', '', '2020-10-09 15:04:17', '2020-10-11 10:50:17');
INSERT INTO `system_menu` VALUES (34, 18, NULL, '', NULL, NULL, '新增菜单', '#', '0', '0', '0', 'system:menu:create', NULL, 3, '1', 'F', '1', '0', '', '', '', '2020-10-09 15:04:17', '2020-10-11 10:50:23');
INSERT INTO `system_menu` VALUES (35, 18, NULL, '', NULL, NULL, '删除菜单', '#', '0', '0', '0', 'system:menu:delete', NULL, 4, '1', 'F', '1', '0', '', '', '', '2020-10-09 15:04:17', '2020-10-11 10:50:28');
INSERT INTO `system_menu` VALUES (37, 16, NULL, '', NULL, NULL, '新增管理员', '#', '0', '0', '0', 'system:manager:create', NULL, 2, '1', 'F', '1', '0', '', '', '', '2020-10-09 23:13:54', '2020-10-11 10:47:56');
INSERT INTO `system_menu` VALUES (38, 16, NULL, '', NULL, NULL, '导出管理员', '#', '0', '0', '0', 'system:manager:export', NULL, 3, '1', 'F', '1', '0', '', '', '', '2020-10-09 23:46:34', '2020-10-11 10:48:04');
INSERT INTO `system_menu` VALUES (39, 16, NULL, '', NULL, NULL, '编辑管理员', '#', '0', '0', '0', 'system:manager:update', NULL, 4, '1', 'F', '1', '0', '', '', '', '2020-10-09 23:48:18', '2020-10-11 10:48:19');
INSERT INTO `system_menu` VALUES (40, 16, NULL, '', NULL, NULL, '删除管理员', '#', '0', '0', '0', 'system:manager:delete', NULL, 5, '1', 'F', '1', '0', '', '', '', '2020-10-10 14:56:50', '2020-10-11 10:48:23');
INSERT INTO `system_menu` VALUES (41, 17, NULL, '', NULL, NULL, '查询角色', '#', '0', '0', '0', 'system:role:query', NULL, 1, '1', 'F', '1', '0', '', '', '', '2020-10-10 16:04:12', '2020-10-11 10:48:38');
INSERT INTO `system_menu` VALUES (42, 17, NULL, '', NULL, NULL, '新增角色', '#', '0', '0', '0', 'system:role:create', NULL, 2, '1', 'F', '1', '0', '', '', '', '2020-10-10 16:05:03', '2020-10-11 10:49:54');
INSERT INTO `system_menu` VALUES (43, 17, NULL, '', NULL, NULL, '编辑角色', '#', '0', '0', '0', 'system:role:update', NULL, 3, '1', 'F', '1', '0', '', '', '', '2020-10-10 16:05:43', '2020-10-11 10:50:00');
INSERT INTO `system_menu` VALUES (44, 17, NULL, '', NULL, NULL, '删除角色', '#', '0', '0', '0', 'system:role:delete', NULL, 4, '1', 'F', '1', '0', '', '', '', '2020-10-10 16:06:30', '2020-10-11 10:50:08');
INSERT INTO `system_menu` VALUES (45, 17, NULL, '', NULL, NULL, '导出角色', '#', '0', '0', '0', 'system:role：export', NULL, 0, '1', 'F', '1', '0', '', '', '', '2020-10-10 16:07:05', '2020-10-11 10:48:32');
INSERT INTO `system_menu` VALUES (46, 19, NULL, '', NULL, NULL, '查询部门', '#', '0', '0', '0', 'system:dept:query', NULL, 1, '1', 'F', '1', '0', '', '', '', '2020-10-11 10:36:36', '2020-10-11 10:50:44');
INSERT INTO `system_menu` VALUES (47, 19, NULL, '', NULL, NULL, '新增部门', '#', '0', '0', '0', 'system:dept:create', NULL, 2, '1', 'F', '1', '0', '', '', '', '2020-10-11 10:37:15', '2020-10-11 10:50:50');
INSERT INTO `system_menu` VALUES (48, 19, NULL, '', NULL, NULL, '导出部门', '#', '0', '0', '0', 'system:dept:export', NULL, 5, '1', 'F', '1', '0', '', '', '', '2020-10-11 10:38:00', '2020-10-11 10:52:10');
INSERT INTO `system_menu` VALUES (49, 19, NULL, '', NULL, NULL, '编辑部门', '#', '0', '0', '0', 'system:dept:update', NULL, 3, '1', 'F', '1', '0', '', '', '', '2020-10-11 10:38:43', '2020-10-11 10:54:08');
INSERT INTO `system_menu` VALUES (50, 19, NULL, '', NULL, NULL, '删除部门', '#', '0', '0', '0', 'system:dept:delete', NULL, 4, '1', 'F', '1', '0', '', '', '', '2020-10-11 10:39:24', '2020-10-11 10:52:05');
INSERT INTO `system_menu` VALUES (51, 0, '/account', 'Account', '/account/center', 'RouteView', '个人中心', 'user', '0', '0', '0', 'account', NULL, 5, '1', 'M', '1', '0', '', '', '', '2020-10-12 15:07:31', '2020-10-12 15:58:13');
INSERT INTO `system_menu` VALUES (52, 51, '/account/center', 'AccountCenter', NULL, '/account/center', '个人主页', 'home', '0', '1', '0', 'account:center', NULL, 1, '1', 'C', '1', '0', '', '', '', '2020-10-12 15:43:04', '2020-10-12 15:58:44');
INSERT INTO `system_menu` VALUES (53, 51, '/account/settings', 'AccounSettings', '/account/settings/base', '/account/settings/Index', '个人设置', 'setting', '0', '1', '0', 'account:settings', NULL, 2, '1', 'M', '1', '0', '', '', '', '2020-10-12 15:52:31', '2020-10-12 16:53:25');
INSERT INTO `system_menu` VALUES (54, 53, '/account/settings/base', 'AccounSettingsBase', NULL, '/account/settings/Base', '基本设置', 'vertical-right', '1', '1', '0', 'account:settings:base', NULL, 1, '1', 'C', '1', '0', '', '', '', '2020-10-12 16:04:40', '2020-10-13 20:24:48');
INSERT INTO `system_menu` VALUES (55, 53, '/account/settings/security', 'AccountSettingsSecurity', NULL, '/account/settings/Security', '安全设置', 'vertical-right', '1', '1', '0', 'account:settings:security', NULL, 2, '1', 'C', '1', '0', '', '', '', '2020-10-12 16:12:34', '2020-10-12 16:47:54');
INSERT INTO `system_menu` VALUES (56, 53, '/account/settings/custom', 'AccountSettingsCustom', NULL, '/account/settings/Custom', '个性化', 'vertical-right', '1', '1', '0', 'account:settings:custom', NULL, 3, '1', 'C', '1', '0', '', '', '', '2020-10-12 16:15:12', '2020-10-12 16:33:31');
INSERT INTO `system_menu` VALUES (57, 53, '/account/settings/binding', 'AccountSettingsBinding', NULL, '/account/settings/Binding', '账户绑定', 'vertical-right', '1', '1', '0', 'account:settings:binding', NULL, 4, '1', 'C', '1', '0', '', '', '', '2020-10-12 16:28:36', '2020-10-12 16:28:36');
INSERT INTO `system_menu` VALUES (58, 53, '/account/settings/notification', 'AccountSettingsNotification', NULL, '/account/settings/Notification', '消息通知', 'vertical-right', '1', '1', '0', 'account:settings:notification', NULL, 5, '1', 'C', '1', '0', '', '', '', '2020-10-12 16:30:18', '2020-10-12 16:33:25');
INSERT INTO `system_menu` VALUES (59, 20, NULL, NULL, NULL, NULL, '新增专业', '#', '0', '0', '0', 'system:profession:create', NULL, 2, '1', 'F', '1', '0', '', '', '', '2020-10-12 19:11:50', '2020-10-12 19:13:29');
INSERT INTO `system_menu` VALUES (60, 20, NULL, NULL, NULL, NULL, '更新专业', '#', '0', '0', '0', 'system:profession:update', NULL, 3, '1', 'F', '1', '0', '', '', '', '2020-10-12 19:12:44', '2020-10-12 19:13:34');
INSERT INTO `system_menu` VALUES (61, 20, NULL, NULL, NULL, NULL, '查询专业', '#', '0', '0', '0', 'system:profession:query', NULL, 1, '1', 'F', '1', '0', '', '', '', '2020-10-12 19:13:19', '2020-10-12 19:13:19');
INSERT INTO `system_menu` VALUES (62, 20, NULL, NULL, NULL, NULL, '删除专业', '#', '0', '0', '0', 'system:profession:delete', NULL, 4, '1', 'F', '1', '0', '', '', '', '2020-10-12 19:13:55', '2020-10-12 19:14:19');
INSERT INTO `system_menu` VALUES (63, 20, NULL, NULL, NULL, NULL, '导出专业', '#', '0', '0', '0', 'system:profession:export', NULL, 5, '1', 'F', '1', '0', '', '', '', '2020-10-12 19:14:54', '2020-10-12 19:14:54');
INSERT INTO `system_menu` VALUES (64, 21, NULL, NULL, NULL, NULL, '查询班级', '#', '0', '0', '0', 'system:class:query', NULL, 1, '1', 'F', '1', '0', '', '', '', '2020-10-13 09:36:08', '2020-10-13 09:36:08');
INSERT INTO `system_menu` VALUES (65, 21, NULL, NULL, NULL, NULL, '新增班级', '#', '0', '0', '0', 'system:class:create', NULL, 2, '1', 'F', '1', '0', '', '', '', '2020-10-13 09:37:04', '2020-10-13 09:37:04');
INSERT INTO `system_menu` VALUES (66, 21, NULL, NULL, NULL, NULL, '更新班级', '#', '0', '0', '0', 'system:class:update', NULL, 3, '1', 'F', '1', '0', '', '', '', '2020-10-13 09:37:37', '2020-10-13 09:37:37');
INSERT INTO `system_menu` VALUES (67, 21, NULL, NULL, NULL, NULL, '删除班级', '#', '0', '0', '0', 'system:class:delete', NULL, 4, '1', 'F', '1', '0', '', '', '', '2020-10-13 09:38:00', '2020-10-13 09:38:00');
INSERT INTO `system_menu` VALUES (68, 21, NULL, NULL, NULL, NULL, '导出班级', '#', '0', '0', '0', 'system:class:export', NULL, 5, '1', 'F', '1', '0', '', '', '', '2020-10-13 09:38:22', '2020-10-13 09:38:51');
INSERT INTO `system_menu` VALUES (69, 12, NULL, NULL, NULL, NULL, '保存配置', '#', '0', '0', '0', 'recruit:config:update', NULL, 5, '1', 'F', '1', '0', '', '', '', '2020-11-03 18:25:09', '2020-11-03 18:27:03');
INSERT INTO `system_menu` VALUES (70, 10, NULL, NULL, NULL, NULL, '通过审核', '#', '0', '0', '0', 'recruit:list:pass', NULL, 5, '1', 'F', '1', '0', '', '', '', '2020-11-08 21:31:32', '2020-11-08 21:32:21');
INSERT INTO `system_menu` VALUES (71, 10, NULL, NULL, NULL, NULL, '拒绝审核', '#', '0', '0', '0', 'recruit:list:reject', NULL, 6, '1', 'F', '1', '0', '', '', '', '2020-11-08 21:32:10', '2020-11-08 21:32:10');

-- ----------------------------
-- Table structure for system_oper_log
-- ----------------------------
DROP TABLE IF EXISTS `system_oper_log`;
CREATE TABLE `system_oper_log`  (
  `oper_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '操作ID',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '模块标题',
  `business_type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '业务类型（0其它，1新增，2修改，3删除）',
  `method` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '方法名称',
  `request_method` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '请求方式',
  `operator_type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '操作类别（0其它，1后台用户，2前台用户）',
  `oper_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作人员',
  `oper_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '请求URL',
  `oper_ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '主机地址',
  `oper_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作地点',
  `oper_param` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '请求参数',
  `json_result` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '返回参数',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '操作状态（0正常，1异常）',
  `error_msg` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '错误消息',
  `oper_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`oper_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '操作日志记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_oper_log
-- ----------------------------

-- ----------------------------
-- Table structure for system_profession
-- ----------------------------
DROP TABLE IF EXISTS `system_profession`;
CREATE TABLE `system_profession`  (
  `profession_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '专业ID',
  `profession_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '专业名称',
  `profession_sort` bigint(20) NOT NULL DEFAULT 0 COMMENT '专业显示顺序',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '专业状态（0正常，1禁用）',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`profession_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '专业表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_profession
-- ----------------------------
INSERT INTO `system_profession` VALUES (1, '网络工程', 1, '0', '', NULL, NULL, NULL, '2020-10-12 20:07:46', '2020-10-12 20:56:41');
INSERT INTO `system_profession` VALUES (2, '计算机科学与技术', 2, '0', '', NULL, NULL, NULL, '2020-10-12 20:09:03', '2020-10-12 20:09:03');
INSERT INTO `system_profession` VALUES (3, '教育技术学', 3, '0', '', NULL, NULL, NULL, '2020-10-12 20:09:12', '2020-10-12 20:10:12');
INSERT INTO `system_profession` VALUES (4, '数字媒体技术', 4, '0', '', NULL, NULL, NULL, '2020-10-12 20:10:40', '2020-10-12 20:10:40');
INSERT INTO `system_profession` VALUES (5, '数据科学与大数据技术', 5, '0', '', NULL, NULL, NULL, '2020-10-12 20:11:44', '2020-11-08 18:56:23');
INSERT INTO `system_profession` VALUES (6, '计算机网络技术', 6, '0', '', NULL, NULL, '2020-10-12 20:32:04', '2020-10-12 20:12:54', '2020-10-12 20:32:04');

-- ----------------------------
-- Table structure for system_protocol
-- ----------------------------
DROP TABLE IF EXISTS `system_protocol`;
CREATE TABLE `system_protocol`  (
  `protocol_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '协议ID',
  `protocol_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '协议名称',
  `protocol_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '协议代码',
  `protocol_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '协议内容',
  `protocol_sort` bigint(20) NOT NULL DEFAULT 0 COMMENT '协议显示顺序',
  `version` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1.0.0' COMMENT '协议版本号',
  `desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '协议描述',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '协议状态（0正常，1禁用）',
  `release_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '发布时间',
  `effect_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '生效时间',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`protocol_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '协议条款表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_protocol
-- ----------------------------
INSERT INTO `system_protocol` VALUES (1, '隐私政策', 'yszc', '<p>本应用尊重并保护所有使用服务用户的个人隐私权。为了给您提供更准确、更有个性化的服务，本应用会按照本隐私权政策的规定使用和披露您的个人信息。但本应用将以高度的勤勉、审慎义务对待这些信息。除本隐私权政策另有规定外，在未征得您事先许可的情况下，本应用不会将这些信息对外披露或向第三方提供。本应用会不时更新本隐私权政策。 您在同意本应用服务使用协议之时，即视为您已经同意本隐私权政策全部内容。本隐私权政策属于本应用服务使用协议不可分割的一部分。</p><p><br></p><p><strong>1. 适用范围</strong></p><p>(a) 在您注册本应用帐号时，您根据本应用要求提供的个人注册信息；</p><p>(b) 在您使用本应用网络服务，或访问本应用平台网页时，本应用自动接收并记录的您的浏览器和计算机上的信息，包括但不限于您的IP地址、浏览器的类型、使用的语言、访问日期和时间、软硬件特征信息及您需求的网页记录等数据；</p><p>(c) 本应用通过合法途径从商业伙伴处取得的用户个人数据；</p><p>(d) 本应用收集到的您在本应用发布的有关信息数据，包括但不限于参与活动、成交信息及评价详情；</p><p>(e) 违反法律规定或违反本应用规则行为及本应用已对您采取的措施。</p><p><br></p><p><strong>2. 信息使用</strong></p><p>(a) 本应用不会向任何无关第三方提供、出售、出租、分享或交易您的个人信息，除非事先得到您的许可，或该第三方和本应用（含本应用关联公司）单独或共同为您提供服务，且在该服务结束后，其将被禁止访问包括其以前能够访问的所有这些资料；</p><p>(b) 本应用亦不允许任何第三方以任何手段收集、编辑、出售或者无偿传播您的个人信息。任何本应用平台用户如从事上述活动，一经发现，本应用有权立即终止与该用户的服务协议；</p><p>(c) 为服务用户的目的，本应用可能通过使用您的个人信息，向您提供您感兴趣的信息，包括但不限于向您发出产品和服务信息，或者与本应用合作伙伴共享信息以便他们向您发送有关其产品和服务的信息（后者需要您的事先同意）。</p><p><br></p><p><strong>3. 信息披露</strong></p><p>在如下情况下，本应用将依据您的个人意愿或法律的规定全部或部分的披露您的个人信息：</p><p>(a) 经您事先同意，向第三方披露；</p><p>(b) 为提供您所要求的产品和服务，而必须和第三方分享您的个人信息；</p><p>(c) 根据法律的有关规定，或者行政或司法机构的要求，向第三方或者行政、司法机构披露；</p><p>(d) 如您出现违反中国有关法律、法规或者本应用服务协议或相关规则的情况，需要向第三方披露；</p><p>(e) 如您是适格的知识产权投诉人并已提起投诉，应被投诉人要求，向被投诉人披露，以便双方处理可能的权利纠纷；</p><p>(f) 在本应用平台上创建的某一交易中，如交易任何一方履行或部分履行了交易义务并提出信息披露请求的，本应用有权决定向该用户提供其交易对方的联络方式等必要信息，以促成交易的完成或纠纷的解决；</p><p>(g) 其它本应用根据法律、法规或者网站政策认为合适的披露。</p><p><br></p><p><strong>4. 信息存储和交换</strong></p><p>本应用收集的有关您的信息和资料将保存在本应用及（或）其关联公司的服务器上，这些信息和资料可能传送至您所在国家、地区或本应用收集信息和资料所在地的境外并在境外被访问、存储和展示。</p><p><br></p><p><strong>5. Cookie的使用</strong></p><p>(a) 在您未拒绝接受cookies的情况下，本应用会在您的计算机上设定或取用cookies ，以便您能登录或使用依赖于cookies的本应用平台服务或功能。本应用使用cookies可为您提供更加周到的个性化服务，包括推广服务；</p><p>(b) 您有权选择接受或拒绝接受cookies。您可以通过修改浏览器设置的方式拒绝接受cookies。但如果您选择拒绝接受cookies，则您可能无法登录或使用依赖于cookies的本应用网络服务或功能；</p><p>(c) 通过本应用所设cookies所取得的有关信息，将适用本政策。</p><p><br></p><p><strong>6. 信息安全</strong></p><p>(a) 本应用帐号均有安全保护功能，请妥善保管您的用户名及密码信息。本应用将通过对用户密码进行加密等安全措施确保您的信息不丢失，不被滥用和变造。尽管有前述安全措施，但同时也请您注意在信息网络上不存在“完善的安全措施”；</p><p>(b) 在使用本应用网络服务进行网上交易时，您不可避免的要向交易对方或潜在的交易对象。</p><p><br></p><p><strong>7.本隐私政策的更改</strong></p><p>(a) 如果决定更改隐私政策，我们会在本政策中、本平台网站中以及我们认为适当的位置发布这些更改，以便您了解我们如何收集、使用您的个人信息，哪些人可以访问这些信息，以及在什么情况下我们会透露这些信息；</p><p>(b) 本平台保留随时修改本政策的权利，因此请经常查看。如对本政策作出重大更改，本平台会通过网站通知的形式告知；</p><p>(c) 请勿披露自己的个人信息，如联络方式或者邮政地址。请您妥善保护自己的个人信息，仅在必要的情形下向他人提供。如您发现自己的个人信息泄密，尤其是本应用用户名及密码发生泄露，请您立即联络本应用客服，以便本应用采取相应措施。</p>', 1, '1.0.0', '用户隐私权政策协议 ', '0', '1602913586', '1602913586', NULL, NULL, NULL, '2020-10-17 13:46:39', '2020-10-17 13:46:39');
INSERT INTO `system_protocol` VALUES (2, '用户协议', 'yhxy', '<p>用户协议</p>', 2, '1.0.0', '用户协议', '0', '1602913586', '1602913586', NULL, NULL, NULL, '2020-10-17 18:13:21', '2020-10-17 18:13:27');

-- ----------------------------
-- Table structure for system_resources
-- ----------------------------
DROP TABLE IF EXISTS `system_resources`;
CREATE TABLE `system_resources`  (
  `resource_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '资源ID',
  `uid` tinyint(4) NOT NULL COMMENT '上传者ID',
  `utype` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '上传者身份（0 前台用户，1 后台管理员）',
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '资源名称',
  `url` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '所在相对路径',
  `size` int(11) NOT NULL COMMENT '资源大小',
  `mime` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'MIME信息',
  `type` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '资源类型（1 图片，2 视频，3 音乐，4 文档，5 压缩包，6 文件，7 其他）',
  `width` int(8) NULL DEFAULT NULL COMMENT '宽度（仅视频，图片）',
  `height` int(8) NULL DEFAULT NULL COMMENT '高度（仅视频，图片）',
  `count` int(1) NOT NULL DEFAULT 0 COMMENT '引用次数',
  `time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '上传时间',
  `exp_time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '4691404800' COMMENT '有效期至（默认至2118年09月01日 00:00:00）',
  `status` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '状态（0正常，1停用）',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  PRIMARY KEY (`resource_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '资源信息表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_resources
-- ----------------------------
INSERT INTO `system_resources` VALUES (1, 1, '0', '轮播图1', '/uploads/images/a1.png', 2012, 'image/jpeg', '1', 500, 500, 0, '4691404800', '4691404800', '1', NULL);

-- ----------------------------
-- Table structure for system_role
-- ----------------------------
DROP TABLE IF EXISTS `system_role`;
CREATE TABLE `system_role`  (
  `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `role_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色名称',
  `role_key` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色权限字符串',
  `role_sort` int(4) NOT NULL COMMENT '显示顺序',
  `role_type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '系统内置（0是，1否）',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '角色状态（0正常，1停用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色信息表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_role
-- ----------------------------
INSERT INTO `system_role` VALUES (1, '超级管理员', 'system:super_admin', 1, '0', '0', NULL, NULL, '拥有最高权限', NULL, '2020-10-03 12:28:22', '2020-11-08 21:32:37');
INSERT INTO `system_role` VALUES (2, '财务管理员', 'system:finance_admin', 2, '1', '0', NULL, NULL, '财务管理相关权限', NULL, '2020-10-03 12:29:24', '2020-10-11 00:04:23');
INSERT INTO `system_role` VALUES (4, '测试1', 'system:test1', 3, '1', '0', NULL, NULL, '', NULL, '2020-10-11 00:37:23', '2020-10-11 16:04:26');

-- ----------------------------
-- Table structure for system_role_dept
-- ----------------------------
DROP TABLE IF EXISTS `system_role_dept`;
CREATE TABLE `system_role_dept`  (
  `role_id` bigint(20) UNSIGNED NOT NULL COMMENT '角色ID',
  `dept_id` bigint(20) UNSIGNED NOT NULL COMMENT '部门ID',
  PRIMARY KEY (`role_id`, `dept_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色和部门关联表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_role_dept
-- ----------------------------

-- ----------------------------
-- Table structure for system_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `system_role_menu`;
CREATE TABLE `system_role_menu`  (
  `role_id` bigint(20) UNSIGNED NOT NULL COMMENT '角色ID',
  `menu_id` bigint(20) UNSIGNED NOT NULL COMMENT '菜单ID',
  PRIMARY KEY (`role_id`, `menu_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色和菜单关联表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_role_menu
-- ----------------------------
INSERT INTO `system_role_menu` VALUES (1, 2);
INSERT INTO `system_role_menu` VALUES (1, 3);
INSERT INTO `system_role_menu` VALUES (1, 4);
INSERT INTO `system_role_menu` VALUES (1, 5);
INSERT INTO `system_role_menu` VALUES (1, 6);
INSERT INTO `system_role_menu` VALUES (1, 7);
INSERT INTO `system_role_menu` VALUES (1, 8);
INSERT INTO `system_role_menu` VALUES (1, 9);
INSERT INTO `system_role_menu` VALUES (1, 10);
INSERT INTO `system_role_menu` VALUES (1, 11);
INSERT INTO `system_role_menu` VALUES (1, 12);
INSERT INTO `system_role_menu` VALUES (1, 13);
INSERT INTO `system_role_menu` VALUES (1, 14);
INSERT INTO `system_role_menu` VALUES (1, 15);
INSERT INTO `system_role_menu` VALUES (1, 16);
INSERT INTO `system_role_menu` VALUES (1, 17);
INSERT INTO `system_role_menu` VALUES (1, 18);
INSERT INTO `system_role_menu` VALUES (1, 19);
INSERT INTO `system_role_menu` VALUES (1, 20);
INSERT INTO `system_role_menu` VALUES (1, 21);
INSERT INTO `system_role_menu` VALUES (1, 22);
INSERT INTO `system_role_menu` VALUES (1, 23);
INSERT INTO `system_role_menu` VALUES (1, 24);
INSERT INTO `system_role_menu` VALUES (1, 25);
INSERT INTO `system_role_menu` VALUES (1, 26);
INSERT INTO `system_role_menu` VALUES (1, 27);
INSERT INTO `system_role_menu` VALUES (1, 28);
INSERT INTO `system_role_menu` VALUES (1, 29);
INSERT INTO `system_role_menu` VALUES (1, 30);
INSERT INTO `system_role_menu` VALUES (1, 31);
INSERT INTO `system_role_menu` VALUES (1, 32);
INSERT INTO `system_role_menu` VALUES (1, 34);
INSERT INTO `system_role_menu` VALUES (1, 35);
INSERT INTO `system_role_menu` VALUES (1, 37);
INSERT INTO `system_role_menu` VALUES (1, 38);
INSERT INTO `system_role_menu` VALUES (1, 39);
INSERT INTO `system_role_menu` VALUES (1, 40);
INSERT INTO `system_role_menu` VALUES (1, 41);
INSERT INTO `system_role_menu` VALUES (1, 42);
INSERT INTO `system_role_menu` VALUES (1, 43);
INSERT INTO `system_role_menu` VALUES (1, 44);
INSERT INTO `system_role_menu` VALUES (1, 45);
INSERT INTO `system_role_menu` VALUES (1, 46);
INSERT INTO `system_role_menu` VALUES (1, 47);
INSERT INTO `system_role_menu` VALUES (1, 48);
INSERT INTO `system_role_menu` VALUES (1, 49);
INSERT INTO `system_role_menu` VALUES (1, 50);
INSERT INTO `system_role_menu` VALUES (1, 51);
INSERT INTO `system_role_menu` VALUES (1, 52);
INSERT INTO `system_role_menu` VALUES (1, 53);
INSERT INTO `system_role_menu` VALUES (1, 54);
INSERT INTO `system_role_menu` VALUES (1, 55);
INSERT INTO `system_role_menu` VALUES (1, 56);
INSERT INTO `system_role_menu` VALUES (1, 57);
INSERT INTO `system_role_menu` VALUES (1, 58);
INSERT INTO `system_role_menu` VALUES (1, 59);
INSERT INTO `system_role_menu` VALUES (1, 60);
INSERT INTO `system_role_menu` VALUES (1, 61);
INSERT INTO `system_role_menu` VALUES (1, 62);
INSERT INTO `system_role_menu` VALUES (1, 63);
INSERT INTO `system_role_menu` VALUES (1, 64);
INSERT INTO `system_role_menu` VALUES (1, 65);
INSERT INTO `system_role_menu` VALUES (1, 66);
INSERT INTO `system_role_menu` VALUES (1, 67);
INSERT INTO `system_role_menu` VALUES (1, 68);
INSERT INTO `system_role_menu` VALUES (1, 69);
INSERT INTO `system_role_menu` VALUES (1, 70);
INSERT INTO `system_role_menu` VALUES (1, 71);
INSERT INTO `system_role_menu` VALUES (2, 2);
INSERT INTO `system_role_menu` VALUES (2, 3);
INSERT INTO `system_role_menu` VALUES (2, 9);
INSERT INTO `system_role_menu` VALUES (2, 10);
INSERT INTO `system_role_menu` VALUES (2, 11);
INSERT INTO `system_role_menu` VALUES (2, 12);
INSERT INTO `system_role_menu` VALUES (2, 13);
INSERT INTO `system_role_menu` VALUES (2, 14);
INSERT INTO `system_role_menu` VALUES (2, 15);
INSERT INTO `system_role_menu` VALUES (2, 27);
INSERT INTO `system_role_menu` VALUES (2, 28);
INSERT INTO `system_role_menu` VALUES (2, 29);
INSERT INTO `system_role_menu` VALUES (2, 30);
INSERT INTO `system_role_menu` VALUES (4, 2);
INSERT INTO `system_role_menu` VALUES (4, 5);
INSERT INTO `system_role_menu` VALUES (4, 6);
INSERT INTO `system_role_menu` VALUES (4, 7);
INSERT INTO `system_role_menu` VALUES (4, 8);

-- ----------------------------
-- Table structure for system_user
-- ----------------------------
DROP TABLE IF EXISTS `system_user`;
CREATE TABLE `system_user`  (
  `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `dept_id` bigint(20) NULL DEFAULT NULL COMMENT '部门ID',
  `user_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户账号',
  `nick_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户昵称',
  `signature` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '个性签名',
  `user_type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '系统内置（0是，1否）',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户邮箱',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '手机号码',
  `sex` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户性别（0未知，1男，2女）',
  `avatar` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '头像地址',
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '用户状态（0正常，1停用）',
  `login_ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '最后登录IP',
  `login_date` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '最后登录时间',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '更新者',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '备注',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '后台用户信息表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_user
-- ----------------------------
INSERT INTO `system_user` VALUES (1, 1, 'admin123', 'admin123', '本宝宝没有签名~', '0', 'your email', 'your phone', '1', 'http://enjoy.api.lanyanxi.com/uploads/storage/2020/03/26/bbee8be72a603e99c5c92b9f60b5e77b.jpg', 'your password', '0', NULL, NULL, '', '', '超级用户', NULL, '2020-09-27 16:56:13', '2020-11-14 13:08:27');
INSERT INTO `system_user` VALUES (2, 1, 'test001', '测试管理员001', NULL, '1', NULL, NULL, '2', 'http://enjoy.api.lanyanxi.com/uploads/storage/2020/03/26/bbee8be72a603e99c5c92b9f60b5e77b.jpg', 'your password', '0', NULL, NULL, '', '', '', NULL, '2020-10-10 13:16:50', '2020-11-14 13:07:09');
INSERT INTO `system_user` VALUES (3, 1, 'test002', '测试管理员002', NULL, '1', NULL, NULL, '1', 'http://enjoy.api.lanyanxi.com/uploads/storage/2020/03/26/bbee8be72a603e99c5c92b9f60b5e77b.jpg', 'your password', '0', NULL, NULL, '', '', '', NULL, '2020-10-10 13:59:03', '2020-11-14 13:07:10');
INSERT INTO `system_user` VALUES (4, 3, 'test003', '测试管理员001', '哈哈', '1', 'your email', 'your phone', '2', 'http://127.0.0.1/uploads/images/08/18/2fbaba470233e9158df5208180b4d534.png', 'your password', '0', NULL, NULL, '', '', '', '2020-10-12 18:54:27', '2020-10-12 11:27:34', '2020-11-14 13:07:47');
INSERT INTO `system_user` VALUES (5, 2, 'admin456', 'admin456', '', '1', 'your email', 'your phone', '2', 'http://127.0.0.1/uploads/images/08/18/2fbaba470233e9158df5208180b4d534.png', 'your password', '0', NULL, NULL, '', '', '', NULL, '2020-11-08 20:47:13', '2020-11-14 13:08:32');

-- ----------------------------
-- Table structure for system_user_role
-- ----------------------------
DROP TABLE IF EXISTS `system_user_role`;
CREATE TABLE `system_user_role`  (
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT '用户ID',
  `role_id` bigint(20) UNSIGNED NOT NULL COMMENT '角色ID',
  PRIMARY KEY (`user_id`, `role_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户和角色关联表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_user_role
-- ----------------------------
INSERT INTO `system_user_role` VALUES (1, 1);
INSERT INTO `system_user_role` VALUES (1, 2);
INSERT INTO `system_user_role` VALUES (5, 1);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `nickname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户昵称',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '头像',
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '姓名',
  `sex` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '性别（0未知，1男，2女）',
  `grade` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '年级',
  `profession` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '专业',
  `class` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '班级',
  `committee` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1' COMMENT '是否班委',
  `union` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1' COMMENT '是否学生会',
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '学号',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '联系电话',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '电子邮箱',
  `birthday` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '生日',
  `qq` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'QQ号',
  `hoppy` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '个人爱好',
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邀请码',
  `push_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '内推码',
  `desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '个人介绍',
  `user_status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '成员状态（0正式成员，1待审核，2待考核，3考核中，4不合格（出局）',
  `verify_email` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '邮箱验证状态（0已验证，1未验证）',
  `verify_phone` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '手机号验证状态（0已验证，1未验证）',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '用户状态（0正常，1停用）',
  `create_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者',
  `update_by` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '更新者',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `delete_time` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 125 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (17, 'your username', 'your nickname', 'uploads/images/api/18/2020/11/08/3b50edbbcd556018.jpg', 'your password', 'your name', '1', '2020', '网络工程', '2020级网络工程班', '1', '1', '180905106', '13628731731', '2021652599@qq.com', '2000-02-22', NULL, NULL, NULL, NULL, '本宝宝没有想到一个签名~', '1', '1', '0', '0', NULL, NULL, NULL, NULL, '2020-11-08 14:45:18', '2020-11-14 13:06:41');

-- ----------------------------
-- Table structure for wx_user
-- ----------------------------
DROP TABLE IF EXISTS `wx_user`;
CREATE TABLE `wx_user`  (
  `wx_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '微信用户ID',
  `openid` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户的标识，对当前公众号唯一',
  `nickname` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户昵称',
  `sex` int(1) NOT NULL DEFAULT 0 COMMENT '用户性别(0 未知，1 男，2 女)',
  `language` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'ZH_CN' COMMENT '用户的语言，简体中文为ZH_CN',
  `city` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '用户所在城市',
  `province` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '用户所在省份',
  `country` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '用户所在国家',
  `headimgurl` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '用户头像',
  `subscribe_time` int(10) NULL DEFAULT NULL COMMENT '关注公众号时间',
  `unionid` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段',
  `remark` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公众号运营者对粉丝的备注，公众号运营者可在微信公众平台用户管理界面对粉丝添加备注',
  `groupid` int(5) NULL DEFAULT 0 COMMENT '用户所在的分组ID（兼容旧的用户分组接口）',
  `tagid_list` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户被打上的标签ID列表',
  `subscribe_scene` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '返回用户关注的渠道来源，ADD_SCENE_SEARCH 公众号搜索，ADD_SCENE_ACCOUNT_MIGRATION 公众号迁移，ADD_SCENE_PROFILE_CARD 名片分享，ADD_SCENE_QR_CODE 扫描二维码，ADD_SCENE_PROFILE_LINK 图文页内名称点击，ADD_SCENE_PROFILE_ITEM 图文页右上角菜单，ADD_SCENE_PAID 支付后关注，ADD_SCENE_WECHAT_ADVERTISEMENT 微信广告，ADD_SCENE_OTHERS 其他',
  `qr_scene` int(64) NULL DEFAULT NULL COMMENT '二维码扫码场景（开发者自定义）',
  `qr_scene_str` int(64) NULL DEFAULT NULL COMMENT '二维码扫码场景描述（开发者自定义）',
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `update_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`wx_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '微信用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wx_user
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
