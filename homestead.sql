/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : homestead

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-09-14 15:04:16
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `fc_admin_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `fc_admin_permissions`;
CREATE TABLE `fc_admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '权限名称',
  `rule` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '权限规则',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '权限描述',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '所属权限',
  `is_menu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否菜单',
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '图标',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_rule_unique` (`rule`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fc_admin_permissions
-- ----------------------------
INSERT INTO `fc_admin_permissions` VALUES ('1', '系统管理', 'admin.system.index', '系统管理', '0', '1', 'fa-cog', '0', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('2', '管理员管理', 'admin.adminUser.index', '管理员管理', '1', '1', 'fa-user-secret', '0', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('3', '权限管理', 'admin.adminPermission.index', '权限管理', '1', '1', 'fa-chain', '1', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('4', '角色管理', 'admin.adminRole.index', '角色管理', '1', '1', 'fa-codepen', '2', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('5', '系统日志', 'log-viewer::dashboard', '系统日志', '1', '1', 'fa-bell', '3', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('6', '添加管理员', 'admin.adminUser.create', '添加管理员', '2', '0', '', '0', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('7', '编辑管理员', 'admin.adminUser.edit', '编辑管理员', '2', '0', '', '1', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('8', '管理员详情', 'admin.adminUser.show', '管理员详情', '2', '0', '', '2', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('9', '删除管理员', 'admin.adminUser.delete', '删除管理员', '2', '0', '', '3', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('10', '添加权限', 'admin.adminPermission.create', '添加权限', '3', '0', '', '0', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('11', '编辑权限', 'admin.adminPermission.edit', '编辑权限', '3', '0', '', '1', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('12', '权限详情', 'admin.adminPermission.show', '权限详情', '3', '0', '', '2', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('13', '删除权限', 'admin.adminPermission.delete', '删除权限', '3', '0', '', '3', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('14', '添加角色', 'admin.adminRole.create', '添加角色', '4', '0', '', '0', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('15', '编辑角色', 'admin.adminRole.edit', '编辑角色', '4', '0', '', '1', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('16', '角色详情', 'admin.adminRole.show', '角色详情', '4', '0', '', '2', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('17', '删除角色', 'admin.adminRole.delete', '删除角色', '4', '0', '', '3', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('18', '角色授权', 'admin.adminRole.auth', '角色授权', '4', '0', '', '4', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('19', '日志列表', 'log-viewer::logs.list', '日志列表', '5', '0', '', '0', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('20', '日志筛选', 'log-viewer::logs.filter', '日志筛选', '5', '0', '', '1', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('21', '日志详情', 'log-viewer::logs.show', '日志详情', '5', '0', '', '2', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('22', '删除日志', 'log-viewer::logs.delete', '删除日志', '5', '0', '', '3', '2017-09-14 06:09:50', null);
INSERT INTO `fc_admin_permissions` VALUES ('23', '下载日志', 'log-viewer::logs.download', '下载日志', '5', '0', '', '4', '2017-09-14 06:09:50', null);

-- ----------------------------
-- Table structure for `fc_admin_permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `fc_admin_permission_role`;
CREATE TABLE `fc_admin_permission_role` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fc_admin_permission_role
-- ----------------------------
INSERT INTO `fc_admin_permission_role` VALUES ('1', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('2', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('6', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('7', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('8', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('9', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('3', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('10', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('11', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('12', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('13', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('4', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('14', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('15', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('16', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('17', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('18', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('5', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('19', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('20', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('21', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('22', '1');
INSERT INTO `fc_admin_permission_role` VALUES ('23', '1');

-- ----------------------------
-- Table structure for `fc_admin_roles`
-- ----------------------------
DROP TABLE IF EXISTS `fc_admin_roles`;
CREATE TABLE `fc_admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '角色名称',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '角色描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fc_admin_roles
-- ----------------------------
INSERT INTO `fc_admin_roles` VALUES ('1', '系统管理员', null, '2017-09-14 06:30:03', '2017-09-14 06:30:03');

-- ----------------------------
-- Table structure for `fc_admin_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `fc_admin_role_user`;
CREATE TABLE `fc_admin_role_user` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fc_admin_role_user
-- ----------------------------
INSERT INTO `fc_admin_role_user` VALUES ('1', '2');

-- ----------------------------
-- Table structure for `fc_admin_users`
-- ----------------------------
DROP TABLE IF EXISTS `fc_admin_users`;
CREATE TABLE `fc_admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'upload/admin/avatar/default/avatar.png' COMMENT '头像',
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `introduction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '介绍',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_id_unique` (`id`),
  UNIQUE KEY `admin_users_name_unique` (`name`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fc_admin_users
-- ----------------------------
INSERT INTO `fc_admin_users` VALUES ('2', 'linshaodong', '林绍东', 'upload/admin/avatar/1\\20170831072412857.jpg', '1619316848@qq.com', '$2y$10$YKeZDn8js2vImswPSxLHtOQC4exthGd85HQtu8RZi3wKrR7XukIKu', null, '5DorePOIp6nGPzJw28YNQ3WEuPUgO5suFktde9OVGBCMfKrxm9Vwnz99mekM', null, '2017-09-14 06:30:55');
INSERT INTO `fc_admin_users` VALUES ('1', 'admin', '超级管理员', 'upload/admin/avatar/default/avatar.png', 'admin@admin.com', '$2y$10$CSW7f3aiNXfnN.m/mkmwkejQb3BI1C.kQZezBo9LBxuT9ROjAk8vW', null, null, '2017-09-14 06:09:50', null);

-- ----------------------------
-- Table structure for `fc_migrations`
-- ----------------------------
DROP TABLE IF EXISTS `fc_migrations`;
CREATE TABLE `fc_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fc_migrations
-- ----------------------------
INSERT INTO `fc_migrations` VALUES ('11', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `fc_migrations` VALUES ('12', '2017_03_05_070720_create_admin_users_table', '2');
INSERT INTO `fc_migrations` VALUES ('13', '2017_03_05_082124_create_admin_rbac_table', '2');

-- ----------------------------
-- Table structure for `fc_password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `fc_password_resets`;
CREATE TABLE `fc_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fc_password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `fc_users`
-- ----------------------------
DROP TABLE IF EXISTS `fc_users`;
CREATE TABLE `fc_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fc_users
-- ----------------------------
