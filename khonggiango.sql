/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80015
 Source Host           : localhost:3306
 Source Schema         : khonggiango

 Target Server Type    : MySQL
 Target Server Version : 80015
 File Encoding         : 65001

 Date: 14/01/2020 21:48:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for about
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO `about` VALUES (1, 'PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyBmb250LWZhbWlseTogUm9ib3RvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDEzcHg7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI1NSwgMjU1LCAyNTUpOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjogaW5pdGlhbDsiPjxzdHJvbmcgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtd2VpZ2h0OiBib2xkZXI7Ij5LaG9uZ2dpYW5nby5jb208L3N0cm9uZz4geGluIGfhu61pIHThu5tpIHF1w70ga2jDoWNoIGzhu51pIGNow7pjIHPhu6ljIGto4buPZSB2w6AgYsOsbmggYW48L3A+PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyBmb250LWZhbWlseTogUm9ib3RvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDEzcHg7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI1NSwgMjU1LCAyNTUpOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjogaW5pdGlhbDsiPkNow7puZyB0w7RpIGfhu61pIGzhu51pIGPhuqNtIMahbiBxdcO9IGtow6FjaCDEkcOjIGTDoG5oIHRo4budaSBnaWFuIGdow6kgdGjEg20gV2Vic2l0ZSBj4bunYSBjaMO6bmcgdMO0aTwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7IGNvbG9yOiByZ2IoMCwgMCwgMCk7IGZvbnQtZmFtaWx5OiBSb2JvdG8sIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTNweDsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IHN0YXJ0OyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjU1LCAyNTUsIDI1NSk7IHRleHQtZGVjb3JhdGlvbi1zdHlsZTogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLWNvbG9yOiBpbml0aWFsOyI+VuG7m2kgYuG7gSBkw6B5IGtpbmggbmdoaeG7h20gbMOidSBuxINtIHRyb25nIGzEqW5oIHbhu7FjIMSR4buTIGfhu5csIHThuqFvIMSRxrDhu6NjIHV5IHTDrW4gdHJvbmcgbMOybmcga2jDoWNoIGjDoG5nIHRyb25nIGtodSB24buxYyBUUC4gxJDDgCBO4bq0TkcgLiBOYXksIGNow7puZyB0w7RpIHRp4bq/biB04bubaSBt4bufIGdpYW4gaMOgbmcgZ2nhu5tpIHRoaeG7h3UgdsOgIGLDoW4gaMOgbmcgdHLDqm4gbeG6oW5nIEludGVybmV0IG5o4bqxbSDEkWVtIHThu5tpIGNobyBuaOG7r25nIG5nxrDhu51pIGPDsyBuaHUgY+G6p3UgbXVhIHbDoCBz4butIGThu6VuZyDEkeG7kyBn4buXIG7hu5lpIHRo4bqldCDEkcaw4bujYyB0aeG6v3AgY+G6rW4gduG7m2kgZ2nDoSB0aMOgbmggY+G6oW5oIHRyYW5oIHbDoCBk4buLY2ggduG7pSB04buRdCBuaOG6pXQgLjwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7IGNvbG9yOiByZ2IoMCwgMCwgMCk7IGZvbnQtZmFtaWx5OiBSb2JvdG8sIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTNweDsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IHN0YXJ0OyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjU1LCAyNTUsIDI1NSk7IHRleHQtZGVjb3JhdGlvbi1zdHlsZTogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLWNvbG9yOiBpbml0aWFsOyI+PHN0cm9uZyBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC13ZWlnaHQ6IGJvbGRlcjsiPktob25nZ2lhbmdvLmNvbTwvc3Ryb25nPiBjaHV5w6puIG5o4bqtbiDEkcOzbmcgbeG7m2kgdsOgIGLDoW4gc+G6tW4gY8OhYyBt4bq3dCBow6BuZyB24buBIGfhu5cgLCDEkeG7kyBn4buXIG3hu7kgbmdo4buHICwgbuG7mWkgdGjhuqV0IHBow7JuZyBuZ+G7pywgcGjDsm5nIGtow6FjaCwgcGjDsm5nIGLhur9wLCDEkeG7kyB0aOG7nSB2w6AgcGjDsm5nIHRo4budLiBDYW0ga+G6v3QgbWFuZyBs4bqhaSBjaG8ga2jDoWNoIHPhuqNuIHBo4bqpbSDEkcO6bmcgY2jhuqV0IGzGsOG7o25nLCBnacOhIHRow6BuaCBo4bujcCBsw70gbmjhuqV0IC48L3A+PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyBmb250LWZhbWlseTogUm9ib3RvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDEzcHg7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI1NSwgMjU1LCAyNTUpOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjogaW5pdGlhbDsiPk7hur91IHF1w70ga2jDoWNoIGPDsyBuaHUgY+G6p3UgbXVhIHPhuqNuIHBo4bqpbSBj4bunYSBj4butYSBow6BuZyBob+G6t2MgdMawIHbhuqVuIHhpbiBsacOqbiBo4buHIDo8L3A+PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyBmb250LWZhbWlseTogUm9ib3RvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDEzcHg7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI1NSwgMjU1LCAyNTUpOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjogaW5pdGlhbDsiPjxzdHJvbmcgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtd2VpZ2h0OiBib2xkZXI7Ij5LaG9uZ2dpYW5nby5jb208L3N0cm9uZz4gdGh14buZYyBxdeG6o24gbMO9IEPhu6dhIGPDtG5nIHR5IENQIFhOSyBNw6ogTmFtPGJyIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyI+PHN0cm9uZyBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC13ZWlnaHQ6IGJvbGRlcjsiPkhvdGxpbmU6PC9zdHJvbmc+IDA5MzUuOTg3LjM1NiDigJMgMDc3Ny4yNDguNTY3PGJyIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyI+PHN0cm9uZyBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC13ZWlnaHQ6IGJvbGRlcjsiPsSQ4buLYSBjaOG7iTo8L3N0cm9uZz4gNjQgLTY1IE5ndXnhu4VuIFBoxrDhu5tjIExhbiwgSMOyYSBYdcOibiwgQ+G6qW0gTOG7hywgVFAgxJDDoCBO4bq1bmc8YnIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+RW1haWw6PC9zdHJvbmc+IEtob25nZ2lhbmdvLmNvbUBnbWFpbC5jb208YnIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+WmFsbzo8L3N0cm9uZz4gS2hvbmdnaWFuZ28uY29tPGJyIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyI+PHN0cm9uZyBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC13ZWlnaHQ6IGJvbGRlcjsiPkZCOjwvc3Ryb25nPiBraG9uZ2dpYW5nb2NvbTwvcD48L3A+');

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  CONSTRAINT `FK__auth_assi__item___1367E606` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('/qtht/nguoiky/*', '1', 1516612856);
INSERT INTO `auth_assignment` VALUES ('ADMIN', '1', 1502337518);

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data` longblob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  INDEX `FK__auth_item__rule___08EA5793`(`rule_name`) USING BTREE,
  CONSTRAINT `FK__auth_item__rule___08EA5793` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/baocao/*', 2, 'Báo cáo thống kê', NULL, NULL, NULL, 20170812);
INSERT INTO `auth_item` VALUES ('/danhmuc/danh-muc-san-pham/index', 2, 'Danh mục sản phẩm', NULL, NULL, NULL, NULL);
INSERT INTO `auth_item` VALUES ('/danhmuc/linhvucvanban/*', 2, 'Quản trị danh mục lĩnh vực văn bản', NULL, NULL, NULL, 20170808);
INSERT INTO `auth_item` VALUES ('/danhmuc/loai-san-pham/index', 2, 'Quản lý loại sản phẩm', NULL, NULL, NULL, NULL);
INSERT INTO `auth_item` VALUES ('/danhmuc/loaivanban/*', 2, 'Quản trị danh mục loại văn bản', NULL, NULL, NULL, 20170808);
INSERT INTO `auth_item` VALUES ('/danhmuc/nambanhanh/*', 2, 'Danh mục năm ban hành', NULL, NULL, NULL, 20170905);
INSERT INTO `auth_item` VALUES ('/danhmuc/nhomloaivanban/*', 2, 'Quản trị danh mục nhóm loại văn bản', NULL, NULL, NULL, 20170808);
INSERT INTO `auth_item` VALUES ('/qtht/chucnang/*', 2, 'Quản trị chức năng', NULL, NULL, NULL, 20170807);
INSERT INTO `auth_item` VALUES ('/qtht/configuration/*', 2, 'Cấu hình hệ thống', NULL, NULL, NULL, 20170807);
INSERT INTO `auth_item` VALUES ('/qtht/coquan/*', 2, 'Danh mục cơ quan', NULL, NULL, NULL, 20170926);
INSERT INTO `auth_item` VALUES ('/qtht/menu/*', 2, 'Quản trị menu', NULL, NULL, NULL, 20170807);
INSERT INTO `auth_item` VALUES ('/qtht/nguoiky/*', 2, 'Danh mục người ký', NULL, NULL, NULL, 20180122);
INSERT INTO `auth_item` VALUES ('/qtht/nhomnguoidung/*', 2, 'Quản  trị nhóm người dùng', NULL, NULL, NULL, 20170807);
INSERT INTO `auth_item` VALUES ('/qtht/nhomquyen/*', 2, 'Quản trị nhóm quyền', NULL, NULL, NULL, 20170807);
INSERT INTO `auth_item` VALUES ('/qtht/setting-page/index', 2, 'Settings page', NULL, NULL, NULL, NULL);
INSERT INTO `auth_item` VALUES ('/qtht/user/*', 2, 'Quản trị người dùng', NULL, NULL, NULL, 20170807);
INSERT INTO `auth_item` VALUES ('/sanpham/feedback/index', 2, 'Quản lý đánh giá sản phẩm', NULL, NULL, NULL, NULL);
INSERT INTO `auth_item` VALUES ('/sanpham/san-pham/index', 2, 'Quản lý sản phẩm', NULL, NULL, NULL, NULL);
INSERT INTO `auth_item` VALUES ('/thongtin/vanban/*', 2, 'văn bản', NULL, NULL, NULL, 20170810);
INSERT INTO `auth_item` VALUES ('/thongtin/vanban/index', 2, 'Danh sách văn bản', NULL, NULL, NULL, 20171002);
INSERT INTO `auth_item` VALUES ('/thongtin/vanban/index?idType=0', 2, 'Danh sách văn bản chờ biên tập', NULL, NULL, NULL, 20170810);
INSERT INTO `auth_item` VALUES ('/thongtin/vanban/index?idType=1', 2, 'Danh sách văn bản chờ ban hành', NULL, NULL, NULL, 20170810);
INSERT INTO `auth_item` VALUES ('/thongtin/vanban/index?idType=2', 2, 'Danh sách văn bản đã ban hành', NULL, NULL, NULL, 20170810);
INSERT INTO `auth_item` VALUES ('/thongtin/vanban/input', 2, 'Tiếp nhận văn bản', NULL, NULL, NULL, 20170808);
INSERT INTO `auth_item` VALUES ('/thongtin/vanban/save', 2, 'Lưu tiếp nhận văn bản', NULL, NULL, NULL, 20170809);
INSERT INTO `auth_item` VALUES ('/thongtin/vanban/tabchitiet', 2, 'Xem chi tiết văn bản', NULL, NULL, NULL, 20170810);
INSERT INTO `auth_item` VALUES ('/thongtin/vanban/tabfiledinhkem', 2, 'Xem file đính kèm văn bản', NULL, NULL, NULL, 20170810);
INSERT INTO `auth_item` VALUES ('/thongtin/vanban/tablichsu', 2, 'Xem lịch sử văn bản', NULL, NULL, NULL, 20170810);
INSERT INTO `auth_item` VALUES ('ADMIN', 1, 'Quản trị hệ thống', NULL, NULL, NULL, 20170926);
INSERT INTO `auth_item` VALUES ('BCTK', 2, 'Báo cáo thống kê', NULL, NULL, NULL, 20170808);
INSERT INTO `auth_item` VALUES ('BH', 1, 'Ban hành văn bản', NULL, NULL, 20170807, 20170807);
INSERT INTO `auth_item` VALUES ('BT', 1, 'Biên tập văn bản', NULL, NULL, 20170807, 20170807);
INSERT INTO `auth_item` VALUES ('DM', 2, 'Quản trị danh mục', NULL, NULL, NULL, 20170807);
INSERT INTO `auth_item` VALUES ('HT', 2, 'Quản trị hệ thống', NULL, NULL, NULL, 20170807);
INSERT INTO `auth_item` VALUES ('QLVB', 2, 'Quản lí văn bản', NULL, NULL, NULL, 20170808);
INSERT INTO `auth_item` VALUES ('TN', 1, 'Tiếp nhận văn bản', NULL, NULL, 20170807, 20170807);
INSERT INTO `auth_item` VALUES ('UNI_HETHONG', 0, 'Hệ thống', NULL, NULL, NULL, NULL);
INSERT INTO `auth_item` VALUES ('UNI_VANBAN', 0, 'Văn Bản', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `FK__auth_item__child__0EA330E9`(`child`) USING BTREE,
  CONSTRAINT `FK__auth_item__child__0EA330E9` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK__auth_item__paren__0DAF0CB0` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/baocao/*');
INSERT INTO `auth_item_child` VALUES ('BCTK', '/baocao/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/danhmuc/danh-muc-san-pham/index');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/danhmuc/linhvucvanban/*');
INSERT INTO `auth_item_child` VALUES ('DM', '/danhmuc/linhvucvanban/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/danhmuc/loai-san-pham/index');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/danhmuc/loaivanban/*');
INSERT INTO `auth_item_child` VALUES ('DM', '/danhmuc/loaivanban/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/danhmuc/nambanhanh/*');
INSERT INTO `auth_item_child` VALUES ('DM', '/danhmuc/nambanhanh/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/danhmuc/nhomloaivanban/*');
INSERT INTO `auth_item_child` VALUES ('DM', '/danhmuc/nhomloaivanban/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/qtht/chucnang/*');
INSERT INTO `auth_item_child` VALUES ('HT', '/qtht/chucnang/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/qtht/configuration/*');
INSERT INTO `auth_item_child` VALUES ('HT', '/qtht/configuration/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/qtht/coquan/*');
INSERT INTO `auth_item_child` VALUES ('DM', '/qtht/coquan/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/qtht/menu/*');
INSERT INTO `auth_item_child` VALUES ('HT', '/qtht/menu/*');
INSERT INTO `auth_item_child` VALUES ('DM', '/qtht/nguoiky/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/qtht/nhomnguoidung/*');
INSERT INTO `auth_item_child` VALUES ('HT', '/qtht/nhomnguoidung/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/qtht/nhomquyen/*');
INSERT INTO `auth_item_child` VALUES ('HT', '/qtht/nhomquyen/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/qtht/setting-page/index');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/qtht/user/*');
INSERT INTO `auth_item_child` VALUES ('HT', '/qtht/user/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/sanpham/feedback/index');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/sanpham/san-pham/index');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/thongtin/vanban/*');
INSERT INTO `auth_item_child` VALUES ('BCTK', '/thongtin/vanban/*');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/thongtin/vanban/index');
INSERT INTO `auth_item_child` VALUES ('QLVB', '/thongtin/vanban/index');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/thongtin/vanban/index?idType=0');
INSERT INTO `auth_item_child` VALUES ('QLVB', '/thongtin/vanban/index?idType=0');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/thongtin/vanban/index?idType=1');
INSERT INTO `auth_item_child` VALUES ('QLVB', '/thongtin/vanban/index?idType=1');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/thongtin/vanban/index?idType=2');
INSERT INTO `auth_item_child` VALUES ('QLVB', '/thongtin/vanban/index?idType=2');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/thongtin/vanban/input');
INSERT INTO `auth_item_child` VALUES ('QLVB', '/thongtin/vanban/input');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/thongtin/vanban/save');
INSERT INTO `auth_item_child` VALUES ('QLVB', '/thongtin/vanban/save');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/thongtin/vanban/tabchitiet');
INSERT INTO `auth_item_child` VALUES ('QLVB', '/thongtin/vanban/tabchitiet');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/thongtin/vanban/tabfiledinhkem');
INSERT INTO `auth_item_child` VALUES ('QLVB', '/thongtin/vanban/tabfiledinhkem');
INSERT INTO `auth_item_child` VALUES ('ADMIN', '/thongtin/vanban/tablichsu');
INSERT INTO `auth_item_child` VALUES ('QLVB', '/thongtin/vanban/tablichsu');
INSERT INTO `auth_item_child` VALUES ('UNI_VANBAN', 'BCTK');
INSERT INTO `auth_item_child` VALUES ('UNI_HETHONG', 'DM');
INSERT INTO `auth_item_child` VALUES ('UNI_HETHONG', 'HT');
INSERT INTO `auth_item_child` VALUES ('UNI_VANBAN', 'QLVB');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data` longblob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for cash
-- ----------------------------
DROP TABLE IF EXISTS `cash`;
CREATE TABLE `cash`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cash
-- ----------------------------
INSERT INTO `cash` VALUES (1, 'PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyBmb250LWZhbWlseTogUm9ib3RvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDEzcHg7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI1NSwgMjU1LCAyNTUpOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjogaW5pdGlhbDsiPkzhu51pIMSR4bqndSB0acOqbiB4aW4gY2jDom4gdGjDoG5oIGPhuqNtIMahbiBxdcO9IGtow6FjaCDEkcOjIHhlbSB2w6AgbXVhIGjDoG5nIGPhu6dhJm5ic3A7PHNwYW4gc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGNvbG9yOiByZ2IoMCwgMCwgMCk7IGZvbnQtc2l6ZTogMTUuNnB4OyI+PHN0cm9uZyBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC13ZWlnaHQ6IGJvbGRlcjsiPktob25nZ2lhbmdvLmNvbTwvc3Ryb25nPjwvc3Bhbj48L3A+PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyBmb250LWZhbWlseTogUm9ib3RvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDEzcHg7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI1NSwgMjU1LCAyNTUpOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjogaW5pdGlhbDsiPjxiIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+Q8OhY2ggdGjhu6ljIG11YSBow6BuZyA6PC9iPjwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7IGNvbG9yOiByZ2IoMCwgMCwgMCk7IGZvbnQtZmFtaWx5OiBSb2JvdG8sIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTNweDsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IHN0YXJ0OyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjU1LCAyNTUsIDI1NSk7IHRleHQtZGVjb3JhdGlvbi1zdHlsZTogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLWNvbG9yOiBpbml0aWFsOyI+KioqIEtow6FjaCBow6BuZyBraHUgduG7sWMgVFAuIMSQw4AgTuG6tE5HIDpRdcO9IGtow6FjaCBuw6puIMSR4bq/biBj4butYSBow6BuZyB0aGFtIHF1YW4sIGNo4buNbiBt4bqrdSDEkeG7gyBtdWEgxJHGsOG7o2Mgc+G6o24gcGjhuqltIMawbmcgw70gbmjhuqV0PC9wPjxwIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBtYXJnaW4tYm90dG9tOiAwLjMzZW07IG1hcmdpbi10b3A6IDBweDsgY29sb3I6IHJnYigwLCAwLCAwKTsgZm9udC1mYW1pbHk6IFJvYm90bywgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxM3B4OyBmb250LXN0eWxlOiBub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6IG5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6IG5vcm1hbDsgZm9udC13ZWlnaHQ6IDQwMDsgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDsgb3JwaGFuczogMjsgdGV4dC1hbGlnbjogc3RhcnQ7IHRleHQtaW5kZW50OiAwcHg7IHRleHQtdHJhbnNmb3JtOiBub25lOyB3aGl0ZS1zcGFjZTogbm9ybWFsOyB3aWRvd3M6IDI7IHdvcmQtc3BhY2luZzogMHB4OyAtd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOiAwcHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNTUsIDI1NSwgMjU1KTsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOiBpbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6IGluaXRpYWw7Ij7igJMgQ8OhYyBz4bqjbiBwaOG6qW0gbmjhu48sIGfhu41uIGNow7puZyB0w7RpIHPhur0gduG6rW4gY2h1eeG7g24gdOG6rW4gbmjDoCBy4buTaSB0aGFuaCB0b8OhbiB0cm9uZyAxaCBsw6BtIHZp4buHYyAmbmJzcDvEkeG7kWkgduG7m2kga2jDoWNoIG11YSBvbmxpbmUgLjwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7IGNvbG9yOiByZ2IoMCwgMCwgMCk7IGZvbnQtZmFtaWx5OiBSb2JvdG8sIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTNweDsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IHN0YXJ0OyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjU1LCAyNTUsIDI1NSk7IHRleHQtZGVjb3JhdGlvbi1zdHlsZTogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLWNvbG9yOiBpbml0aWFsOyI+KioqIEtow6FjaCBow6BuZyB04buJbmggeGEgOiBUcm9uZyB0csaw4budbmcgaOG7o3Aga2jDoWNoIGtow7RuZyB0aeG7h24gxJHhur9uIHThuq1uIGPhu61hIGjDoG5nIGNo4buNbiBz4bqjbiBwaOG6qW0sIHF1w70ga2jDoWNoIHZ1aSBsw7JuZyBsacOqbiBo4buHIHbhu5tpIGNow7puZyB0w7RpIMSR4buDIMSRxrDhu6NjIGfhu61pIOG6o25oIGNoaSB0aeG6v3Qgc+G6o24gcGjhuqltIHbDoCB0xrAgduG6pW4gY+G7pSB0aOG7gyBuaOG6pXQgLjwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7IGNvbG9yOiByZ2IoMCwgMCwgMCk7IGZvbnQtZmFtaWx5OiBSb2JvdG8sIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTNweDsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IHN0YXJ0OyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjU1LCAyNTUsIDI1NSk7IHRleHQtZGVjb3JhdGlvbi1zdHlsZTogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLWNvbG9yOiBpbml0aWFsOyI+4oCTIELDoW4gaMOgbmcgVG/DoG4gUXXhu5FjIHbhu5tpIGNoaSBwaMOtIHbhuq1uIGNodXnhu4NuIHLhursgbmjhuqV0LCDEkeG6o20gYuG6o28gY2hvIMSR4bq/biBraGkgbmjhuq1uIGjDoG5nIC48L3A+PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyBmb250LWZhbWlseTogUm9ib3RvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDEzcHg7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI1NSwgMjU1LCAyNTUpOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjogaW5pdGlhbDsiPuKAkyBU4bqldCBj4bqjIOG6o25oIHRyw6puIFdlYnNpdGUgbMOgIOG6o25oIHRo4bqtdCDEkcaw4bujYyBjaOG7pXAgdOG7qyBz4bqjbiBwaOG6qW0gYsOqbiBuZ2/DoGkgLCBraMO0bmcgcXVhIGNo4buJbmggc+G7rWEgbsOqbiBxdcO9IGtow6FjaCBob8OgbiB0b8OgbiB5w6puIHTDom0gduG7gSBjaOG6pXQgZ+G7lyBjxaluZyBuaMawIGtp4buDdSBkw6FuZy48L3A+PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyBmb250LWZhbWlseTogUm9ib3RvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDEzcHg7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI1NSwgMjU1LCAyNTUpOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjogaW5pdGlhbDsiPuKAnSBWdWkgbMOybmcga2jDoWNoIMSR4bq/biwgduG7q2EgbMOybmcga2jDoWNoIMSRaSAmbmJzcDvigJ08L3A+PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyBmb250LWZhbWlseTogUm9ib3RvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDEzcHg7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI1NSwgMjU1LCAyNTUpOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjogaW5pdGlhbDsiPjxzdHJvbmcgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtd2VpZ2h0OiBib2xkZXI7Ij5LaG9uZ2dpYW5nby5jb208L3N0cm9uZz4gdGh14buZYyBxdeG6o24gbMO9IEPhu6dhIGPDtG5nIHR5IENQIFhOSyBNw6ogTmFtPGJyIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyI+PHN0cm9uZyBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC13ZWlnaHQ6IGJvbGRlcjsiPkhvdGxpbmU6PC9zdHJvbmc+IDA5MzUuOTg3LjM1NiDigJMgMDc3Ny4yNDguNTY3PGJyIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyI+PHN0cm9uZyBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC13ZWlnaHQ6IGJvbGRlcjsiPsSQ4buLYSBjaOG7iTo8L3N0cm9uZz4gNjQgLTY1IE5ndXnhu4VuIFBoxrDhu5tjIExhbiwgSMOyYSBYdcOibiwgQ+G6qW0gTOG7hywgVFAgxJDDoCBO4bq1bmc8YnIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+RW1haWw6PC9zdHJvbmc+IEtob25nZ2lhbmdvLmNvbUBnbWFpbC5jb208YnIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+WmFsbzo8L3N0cm9uZz4gS2hvbmdnaWFuZ28uY29tPGJyIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyI+PHN0cm9uZyBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC13ZWlnaHQ6IGJvbGRlcjsiPkZCOjwvc3Ryb25nPiBraG9uZ2dpYW5nb2NvbTwvcD48L3A+');

-- ----------------------------
-- Table structure for configuration
-- ----------------------------
DROP TABLE IF EXISTS `configuration`;
CREATE TABLE `configuration`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `value` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `method` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `isSystem` tinyint(3) UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `UQ__configur__DFD83CAF66603565`(`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (1, 'PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyBmb250LWZhbWlseTogUm9ib3RvLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDEzcHg7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjU1LCAyNTUsIDI1NSk7IHRleHQtZGVjb3JhdGlvbi1zdHlsZTogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLWNvbG9yOiBpbml0aWFsOyB0ZXh0LWFsaWduOiBsZWZ0OyI+PHNwYW4gc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtc2l6ZTogMjMuNHB4OyBjb2xvcjogcmdiKDIzNywgMjgsIDM2KTsiPjxzdHJvbmcgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtd2VpZ2h0OiBib2xkZXI7Ij5LSMOUTkcgR0lBTiBH4buWPC9zdHJvbmc+PC9zcGFuPjwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7IGNvbG9yOiByZ2IoMCwgMCwgMCk7IGZvbnQtZmFtaWx5OiBSb2JvdG8sIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTNweDsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtaW5kZW50OiAwcHg7IHRleHQtdHJhbnNmb3JtOiBub25lOyB3aGl0ZS1zcGFjZTogbm9ybWFsOyB3aWRvd3M6IDI7IHdvcmQtc3BhY2luZzogMHB4OyAtd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOiAwcHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNTUsIDI1NSwgMjU1KTsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOiBpbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6IGluaXRpYWw7IHRleHQtYWxpZ246IGxlZnQ7Ij48c3BhbiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAyMy40cHg7IGNvbG9yOiByZ2IoMCwgMCwgMCk7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+S2hvbmdnaWFuZ28uY29tPC9zdHJvbmc+IHRodeG7mWMgcXXhuqNuIGzDvSBD4bunYSBjw7RuZyB0eSBDUCBYTksgTcOqIE5hbTwvc3Bhbj48YnIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7Ij48c3BhbiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAyMy40cHg7IGNvbG9yOiByZ2IoMCwgMCwgMCk7Ij48c3BhbiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgY29sb3I6IHJnYigyMzcsIDI4LCAzNik7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+SG90bGluZTo8L3N0cm9uZz48L3NwYW4+IDA5MzUuOTg3LjM1NiDigJMgMDc3Ny4yNDguNTY3PC9zcGFuPjxiciBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsiPjxzcGFuIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXNpemU6IDIzLjRweDsgY29sb3I6IHJnYigwLCAwLCAwKTsiPjxzcGFuIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBjb2xvcjogcmdiKDIzNywgMjgsIDM2KTsiPjxzdHJvbmcgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtd2VpZ2h0OiBib2xkZXI7Ij7EkOG7i2EgY2jhu4k6PC9zdHJvbmc+PC9zcGFuPiA2NCAtNjUgTmd1eeG7hW4gUGjGsOG7m2MgTGFuLCBIw7JhIFh1w6JuLCBD4bqpbSBM4buHLCBUUCDEkMOgIE7hurVuZzwvc3Bhbj48YnIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7Ij48c3BhbiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAyMy40cHg7IGNvbG9yOiByZ2IoMCwgMCwgMCk7Ij48c3BhbiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgY29sb3I6IHJnYigyMzcsIDI4LCAzNik7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+RW1haWw6PC9zdHJvbmc+Jm5ic3A7PC9zcGFuPktob25nZ2lhbmdvLmNvbUBnbWFpbC5jb208L3NwYW4+PGJyIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyI+PHNwYW4gc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtc2l6ZTogMjMuNHB4OyBjb2xvcjogcmdiKDAsIDAsIDApOyI+PHNwYW4gc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGNvbG9yOiByZ2IoMjM3LCAyOCwgMzYpOyI+PHN0cm9uZyBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC13ZWlnaHQ6IGJvbGRlcjsiPlphbG86PC9zdHJvbmc+Jm5ic3A7PC9zcGFuPktob25nZ2lhbmdvLmNvbTwvc3Bhbj48YnIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7Ij48c3BhbiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAyMy40cHg7IGNvbG9yOiByZ2IoMCwgMCwgMCk7Ij48c3BhbiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgY29sb3I6IHJnYigyMzcsIDI4LCAzNik7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+RkI6PC9zdHJvbmc+PC9zcGFuPiBraG9uZ2dpYW5nb2NvbTwvc3Bhbj48L3A+PC9wPg==');

-- ----------------------------
-- Table structure for danhmuc_sanpham
-- ----------------------------
DROP TABLE IF EXISTS `danhmuc_sanpham`;
CREATE TABLE `danhmuc_sanpham`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  FULLTEXT INDEX `name`(`name`)
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of danhmuc_sanpham
-- ----------------------------
INSERT INTO `danhmuc_sanpham` VALUES (1, 'Bàn thờ - Tủ thờ', 'ban-tho-tu-tho', '2019-12-09 11:52:31');
INSERT INTO `danhmuc_sanpham` VALUES (4, 'Độc lạ - Phong thủy', 'doc-la-phong-thuy', '2019-12-09 13:18:21');
INSERT INTO `danhmuc_sanpham` VALUES (5, 'Đồng hồ - Bàn trang điểm', 'dong-ho-ban-trang-diem', '2019-12-09 13:18:57');
INSERT INTO `danhmuc_sanpham` VALUES (6, 'Kệ tivi - Lục bình', 'ke-tivi-luc-binh', '2019-12-09 13:19:20');
INSERT INTO `danhmuc_sanpham` VALUES (7, 'Sập - Gỗ khối', 'sap-go-khoi', '2019-12-09 13:19:35');
INSERT INTO `danhmuc_sanpham` VALUES (13, 'Bàn ăn – Tủ quần áo', 'ban-an-tu-quan-ao', NULL);
INSERT INTO `danhmuc_sanpham` VALUES (14, 'Tượng mỹ nghệ', 'tuong-my-nghe', NULL);
INSERT INTO `danhmuc_sanpham` VALUES (15, 'Đặt hàng theo mẫu', 'dat-hang-theo-mau', NULL);
INSERT INTO `danhmuc_sanpham` VALUES (16, 'Bàn ghế phòng khách', 'ban-ghe-phong-khach', NULL);

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NULL DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of feedback
-- ----------------------------
INSERT INTO `feedback` VALUES (2, 5, 'Nguyên', 'vonguyen191996@gmail.com', 'Sản phẩm tốt', '2020-01-02 10:01:23', 1);
INSERT INTO `feedback` VALUES (3, 5, 'Tú', 'tuabc@gmai.com', 'Được!!', '2020-01-02 10:02:51', 1);
INSERT INTO `feedback` VALUES (4, 5, 'Tâm', 'tamabc@gmail.com', 'Tạm tạm', '2020-01-02 10:03:08', 1);
INSERT INTO `feedback` VALUES (5, 5, 'mặt loằn', 'mlabc@gmail.com', 'Như loằn', '2020-01-02 10:03:24', 1);
INSERT INTO `feedback` VALUES (6, 5, 'fuck boy', 'fuckabv@gmail.com', 'fucking good', '2020-01-02 10:03:40', 1);
INSERT INTO `feedback` VALUES (7, 5, 'heyboy', 'heyboy@gmail.com', 'hey hey', '2020-01-02 10:04:21', 1);
INSERT INTO `feedback` VALUES (14, 8, '123123', '121212@gmail.com', '123123 asdasdas mdkas masodm asoidm asoidm oaisdm aosid', '2020-01-09 12:21:18', 0);
INSERT INTO `feedback` VALUES (15, 9, 'tesst', 'test@gmail.com', 'test', NULL, 0);

-- ----------------------------
-- Table structure for guest_visit
-- ----------------------------
DROP TABLE IF EXISTS `guest_visit`;
CREATE TABLE `guest_visit`  (
  `session` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(11) NOT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`session`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of guest_visit
-- ----------------------------
INSERT INTO `guest_visit` VALUES ('01f6vdpqa2in8p9dkrtuqnp2qc', 1505723770, 0);
INSERT INTO `guest_visit` VALUES ('08odo7kfog04l968hup67q6448', 1507253138, 0);
INSERT INTO `guest_visit` VALUES ('09g1lrdmg35nc43pvs5i7peob5', 1509615576, 0);
INSERT INTO `guest_visit` VALUES ('0aik0lp6bupv8pbqraj8hhn68n', 1509327345, 0);
INSERT INTO `guest_visit` VALUES ('0fjbsrj7o7ooqk743eb76kch7k', 1507261722, 0);
INSERT INTO `guest_visit` VALUES ('0l5uunr3hd3a4p2qvn29a3mgo8', 1505744256, 0);
INSERT INTO `guest_visit` VALUES ('0rgl0fdojk2vv81f9fqj7qisni', 1505890065, 0);
INSERT INTO `guest_visit` VALUES ('0ri65t60griv6k3fbjpuqcii96', 1506501775, 0);
INSERT INTO `guest_visit` VALUES ('1dqqit20i53nap1683uug75r78', 1506928205, 0);
INSERT INTO `guest_visit` VALUES ('1qg281bmmkpr7qjna1c9s1vhv2', 1505810844, 0);
INSERT INTO `guest_visit` VALUES ('212ei9uako8i8aotuhp5lfun8v', 1505730807, 0);
INSERT INTO `guest_visit` VALUES ('231q9ecrvbse36iohc4llcvv3l', 1506069066, 0);
INSERT INTO `guest_visit` VALUES ('25q8nch5o2a27tkljokd4i62dd', 1506433172, 0);
INSERT INTO `guest_visit` VALUES ('28lvup1teqi1vp9j89qt6krh4b', 1517814609, 0);
INSERT INTO `guest_visit` VALUES ('2915veb5q16fdkmk015cjt3lnu', 1506504656, 0);
INSERT INTO `guest_visit` VALUES ('2c543ggkq4n6c3ru4j29nvup0t', 1505905240, 0);
INSERT INTO `guest_visit` VALUES ('2e3le6q0l75ftos3mci5v1hk9h', 1508749016, 0);
INSERT INTO `guest_visit` VALUES ('2j9u07nqgtmibu3pnfi9mb0491', 1507266046, 0);
INSERT INTO `guest_visit` VALUES ('2lg3md4g3qvj9cfk03eaa4c1tu', 1505722751, 0);
INSERT INTO `guest_visit` VALUES ('2n3gqrv1l8g9n1kb03haggdmkv', 1508213439, 0);
INSERT INTO `guest_visit` VALUES ('2qi4ct1d9vog0dgc20n8pv2rg9', 1508824884, 0);
INSERT INTO `guest_visit` VALUES ('35ce561mkf6370o5jj4mqgcm70', 1505535924, 0);
INSERT INTO `guest_visit` VALUES ('35s1h6kop2sm3vhrg6img0m0i9', 1505996591, 0);
INSERT INTO `guest_visit` VALUES ('3a1vv4jsr48nsr575pn3285h5g', 1505806134, 0);
INSERT INTO `guest_visit` VALUES ('3ac8b6ki3i48brf44ughuh5goo', 1505983066, 0);
INSERT INTO `guest_visit` VALUES ('3hco7qg826tspkaulombvslm3m', 1506065084, 0);
INSERT INTO `guest_visit` VALUES ('3lr0jmqlql3r1eq4tlcj0i5sjf', 1519612512, 0);
INSERT INTO `guest_visit` VALUES ('42r3s5o19mmiiqcog8lpi0q8av', 1505470054, 0);
INSERT INTO `guest_visit` VALUES ('44ddkcre9dhdejqcjtl3l3brk0', 1505957048, 0);
INSERT INTO `guest_visit` VALUES ('4iudob1eltgsm6nvvqg0v48to2', 1506135692, 0);
INSERT INTO `guest_visit` VALUES ('4mi8oaa6oej10ht03sm3f2n81j', 1509419169, 0);
INSERT INTO `guest_visit` VALUES ('4vfdbgijr0gdgt98ebjl0aiqc5', 1505828472, 0);
INSERT INTO `guest_visit` VALUES ('5g2v8lmdv3r1qtb5106o3u21md', 1509069740, 0);
INSERT INTO `guest_visit` VALUES ('5q8e0m8tanefu7hafn3omjnr4o', 1506920313, 0);
INSERT INTO `guest_visit` VALUES ('5rffa2ep8felp7uqcanjlcpj6k', 1505704322, 0);
INSERT INTO `guest_visit` VALUES ('5spj7797ut89rgfnmtaj0n3fb8', 1505895932, 0);
INSERT INTO `guest_visit` VALUES ('5sppudjnvaep1gfb94dggliehc', 1505726075, 0);
INSERT INTO `guest_visit` VALUES ('63i8vsl1g5jqvgdqiiik06mp7n', 1506514858, 0);
INSERT INTO `guest_visit` VALUES ('63rar20brev8qk1qgogbrplpnj', 1506478045, 0);
INSERT INTO `guest_visit` VALUES ('683qi5frffngl6tp4819lhag26', 1516073376, 0);
INSERT INTO `guest_visit` VALUES ('6hp1v3r3dljk497u73d5s4h9in', 1505535862, 0);
INSERT INTO `guest_visit` VALUES ('6jjdl5h3hbgqib4b1udp70jok1', 1505897576, 0);
INSERT INTO `guest_visit` VALUES ('6q126bs55oqh922ub4dvjiqngj', 1505549077, 0);
INSERT INTO `guest_visit` VALUES ('6s86fi730jd1e9q4dmdctj83g6', 1507292231, 0);
INSERT INTO `guest_visit` VALUES ('711ii6q0v96p1q2hbpckcl6msv', 1505785521, 0);
INSERT INTO `guest_visit` VALUES ('72u2hntsr7nnin4pm31pjvauog', 1509007877, 0);
INSERT INTO `guest_visit` VALUES ('76fg3552kf07f4jbf224ntqbts', 1506473962, 0);
INSERT INTO `guest_visit` VALUES ('76ok3jqva3uhnh9ajfft9gcblp', 1505721291, 0);
INSERT INTO `guest_visit` VALUES ('7gtoqlvrflon708na0t3ocj9nd', 1506668408, 0);
INSERT INTO `guest_visit` VALUES ('7hp5pruv9ai0d02vdf42tge353', 1505794702, 0);
INSERT INTO `guest_visit` VALUES ('7odb005reruqf4q1m1g779vurl', 1506416582, 0);
INSERT INTO `guest_visit` VALUES ('81998s7eigk6u5v37ej16bm0ai', 1505787376, 0);
INSERT INTO `guest_visit` VALUES ('82gaie36m2qer0uta3o8017gdh', 1505810746, 0);
INSERT INTO `guest_visit` VALUES ('86j9rsg7inisgjghm3e5gpjmtb', 1507512999, 0);
INSERT INTO `guest_visit` VALUES ('8d13pag9u8n3ic1vb76pp7u5pf', 1505722228, 0);
INSERT INTO `guest_visit` VALUES ('8jbj4l4461oterbg9tp38859he', 1506064279, 0);
INSERT INTO `guest_visit` VALUES ('8pumo22are84ruepc5a4tgvq66', 1506501861, 0);
INSERT INTO `guest_visit` VALUES ('8svv66felhfvfr9tt4rjj5njrf', 1508727443, 0);
INSERT INTO `guest_visit` VALUES ('93dmkms2amcvdchieikankvt64', 1507800306, 0);
INSERT INTO `guest_visit` VALUES ('9913eh0oa5ghpa9q6anmmve93o', 1505727839, 0);
INSERT INTO `guest_visit` VALUES ('99s863sqmdc93vi19ef6i624h7', 1506484867, 0);
INSERT INTO `guest_visit` VALUES ('9a2j9ui1vh6fga3krivtj8f6je', 1505977048, 0);
INSERT INTO `guest_visit` VALUES ('9aksjb27nu1ilsjuum1a93v2a3', 1505719157, 0);
INSERT INTO `guest_visit` VALUES ('9dc107v733tp1c3noaimmp6qv1', 1505464457, 0);
INSERT INTO `guest_visit` VALUES ('9h6tcgjffmv6lsge5r5eoc6c5g', 1505714944, 0);
INSERT INTO `guest_visit` VALUES ('9qt4lgmlcnv5sfalm74imntuc2', 1505717368, 0);
INSERT INTO `guest_visit` VALUES ('9u775jeg6hfpkbbp97fdtr4p7c', 1508725978, 0);
INSERT INTO `guest_visit` VALUES ('ae54dijuhb5mqsugk8r8vf3it1', 1507194097, 0);
INSERT INTO `guest_visit` VALUES ('am8i2k1tf336e6fk11a18d2bd5', 1505698187, 0);
INSERT INTO `guest_visit` VALUES ('at4tmb2s1si3caqidnfut0qr64', 1505464000, 0);
INSERT INTO `guest_visit` VALUES ('b3bbg00agcjjf9lju4i6rqk8d8', 1506647366, 0);
INSERT INTO `guest_visit` VALUES ('bhhpe0l82p2cabbdn44096895k', 1506842309, 0);
INSERT INTO `guest_visit` VALUES ('bsagtiu0mdvg2n1dk2gs348627', 1507085638, 0);
INSERT INTO `guest_visit` VALUES ('c370poe688b0pap5f28limuko2', 1506506839, 0);
INSERT INTO `guest_visit` VALUES ('c52gtfe1516ma073hsuutmab7q', 1505871376, 0);
INSERT INTO `guest_visit` VALUES ('c7m9jbd2o4a0i4m7qbejd4rd6t', 1506067935, 0);
INSERT INTO `guest_visit` VALUES ('ccvnntdkms4nebs1b7g2rrr0fa', 1506065315, 0);
INSERT INTO `guest_visit` VALUES ('ci2rac9lr1kel7j2sb5j75t0q1', 1506078942, 0);
INSERT INTO `guest_visit` VALUES ('d2lsug6ao0ufm8nrl776622ep1', 1505727828, 0);
INSERT INTO `guest_visit` VALUES ('d4s5eard1fr2d9onpm453d3bua', 1506478576, 0);
INSERT INTO `guest_visit` VALUES ('dbm6qmd94qc10nu2po628avvec', 1506389945, 0);
INSERT INTO `guest_visit` VALUES ('ddh5ef2pt1blki403qj48a0d3r', 1508811523, 0);
INSERT INTO `guest_visit` VALUES ('dni5jh4bs2mrv7cn2pu9cgcun4', 1505809409, 0);
INSERT INTO `guest_visit` VALUES ('dph9br3a9dlp3p5qa80bcur5j0', 1507192590, 0);
INSERT INTO `guest_visit` VALUES ('dr66c8k7am2s7u0tfbu6dtvt9t', 1506409403, 0);
INSERT INTO `guest_visit` VALUES ('dshjd72k4r6g8fst1c8qafo77v', 1507605770, 0);
INSERT INTO `guest_visit` VALUES ('e33hb1egg0srnlbmhcls0dth1l', 1505795563, 0);
INSERT INTO `guest_visit` VALUES ('e9ofnvqprksqvq2vn6m1fkq60v', 1505987507, 0);
INSERT INTO `guest_visit` VALUES ('e9qtkq9028jf47eeon69ehobcn', 1506134304, 0);
INSERT INTO `guest_visit` VALUES ('ea4cq6j04or08gjqh1t9mute67', 1507524318, 0);
INSERT INTO `guest_visit` VALUES ('eag5ko8i8glia8okgiemjcd2uf', 1507600054, 0);
INSERT INTO `guest_visit` VALUES ('eapk849p6u7mp1i6b49ol7a376', 1506300606, 0);
INSERT INTO `guest_visit` VALUES ('eqpqqv2c2rr6g56usb3qntff13', 1506088300, 0);
INSERT INTO `guest_visit` VALUES ('f490b4hdvsrkmhdmg7o9t45duq', 1508989491, 0);
INSERT INTO `guest_visit` VALUES ('f9m33vdgcjson1f9g1gkm03aq8', 1506482320, 0);
INSERT INTO `guest_visit` VALUES ('fcq7u2s3vhg3bnehhrksfcmq0o', 1507537096, 0);
INSERT INTO `guest_visit` VALUES ('fjf8bmieeasfimebdiql612oqi', 1505827016, 0);
INSERT INTO `guest_visit` VALUES ('fjlltdp7jnnm1jb8urocf752ic', 1507276100, 0);
INSERT INTO `guest_visit` VALUES ('g0d6sfs5jv7fk8vp9ua71ot8b5', 1505785204, 0);
INSERT INTO `guest_visit` VALUES ('g7d2s62t76j5253rr5kobds4ts', 1505547036, 0);
INSERT INTO `guest_visit` VALUES ('gj3rp3u4ir1i78nhu9rh1jcjit', 1505870579, 0);
INSERT INTO `guest_visit` VALUES ('goteko930komapr625f190rhr9', 1505726148, 0);
INSERT INTO `guest_visit` VALUES ('h20cft1ics9bp8b9iolbniekjd', 1505534894, 0);
INSERT INTO `guest_visit` VALUES ('hdt2gn9uuiighum1fu07oehq3q', 1506500671, 0);
INSERT INTO `guest_visit` VALUES ('hh9g7llo80k4dlm0e45pdr21cd', 1505700558, 0);
INSERT INTO `guest_visit` VALUES ('hpaohsgqe94une7pjra1ru9h9v', 1506067203, 0);
INSERT INTO `guest_visit` VALUES ('hv9abqno8jc30po9k9c6cqrcnm', 1506915087, 0);
INSERT INTO `guest_visit` VALUES ('i1t2rucjibd1fbplq06pdq40oh', 1558077413, 0);
INSERT INTO `guest_visit` VALUES ('ica54b2bh9tuqmfn4u4174vbad', 1506503728, 0);
INSERT INTO `guest_visit` VALUES ('j0k7gtm6667mbd02cnjco1gv9k', 1506947586, 0);
INSERT INTO `guest_visit` VALUES ('j8eqgku2vjsgk0kjemenaqo53i', 1505697214, 0);
INSERT INTO `guest_visit` VALUES ('jaaruciv0h5riktt7njlnlicgf', 1506134121, 0);
INSERT INTO `guest_visit` VALUES ('jf881gemlltu3q0g96uqv85sbr', 1507262611, 0);
INSERT INTO `guest_visit` VALUES ('jg83l1n5r50lsi1u53sultos16', 1522650536, 0);
INSERT INTO `guest_visit` VALUES ('jgponmf5b4ha2eij4p20if1r28', 1507199704, 0);
INSERT INTO `guest_visit` VALUES ('k0ns2ndckg1p4bs2h9f70sukib', 1506052995, 0);
INSERT INTO `guest_visit` VALUES ('k1qidajrqrv963ocolil5vtu60', 1506487824, 0);
INSERT INTO `guest_visit` VALUES ('k2nsi9govl0oj0rb00np7lje3p', 1505986384, 0);
INSERT INTO `guest_visit` VALUES ('kb00mesh5df2l7mvjq7b9o8p9n', 1506560636, 0);
INSERT INTO `guest_visit` VALUES ('kh155sc5uf9cksv0kqg5e9ejin', 1505959705, 0);
INSERT INTO `guest_visit` VALUES ('khf6h1jgohfjn14moar5usem3q', 1507186170, 0);
INSERT INTO `guest_visit` VALUES ('kj7kg55mcrri5ga46njqjfs5sd', 1506064922, 0);
INSERT INTO `guest_visit` VALUES ('kpnsp84887virretvdtrequ2oo', 1507259511, 0);
INSERT INTO `guest_visit` VALUES ('ku2agqbr30mkcujvunr8tmmjg6', 1505739479, 0);
INSERT INTO `guest_visit` VALUES ('l1gtkecv8bkrnrj68j6rsgqp2c', 1505536572, 0);
INSERT INTO `guest_visit` VALUES ('l472jai9adr3pi552i6tjovl0t', 1505895793, 0);
INSERT INTO `guest_visit` VALUES ('l9c7ejjf06q3cd52asv1aj71d5', 1508749960, 0);
INSERT INTO `guest_visit` VALUES ('lg2klk8tn0heoglp5vbph0kinu', 1506080898, 0);
INSERT INTO `guest_visit` VALUES ('li94tshjbucctvv2muvjjocttc', 1506475577, 0);
INSERT INTO `guest_visit` VALUES ('m1sv9l4u5ib3ee4h3l1cmhn35r', 1505473726, 0);
INSERT INTO `guest_visit` VALUES ('m429gbroghvh0ckv6ucpk5uh9h', 1505983130, 0);
INSERT INTO `guest_visit` VALUES ('m50hfd4cu1tufkmkvmm9qhfnqb', 1508810929, 0);
INSERT INTO `guest_visit` VALUES ('ma6tukkqih887vcapg8ijmpfg6', 1505796207, 0);
INSERT INTO `guest_visit` VALUES ('mg5jarjhhgs8i5760cnssc15qb', 1507262142, 0);
INSERT INTO `guest_visit` VALUES ('mq87ldc0n94okaa3amqbur5euc', 1505983110, 0);
INSERT INTO `guest_visit` VALUES ('n40ni6po9g9bhmgc2jkijdthih', 1508229088, 0);
INSERT INTO `guest_visit` VALUES ('n8nr80itnl2e1fsk7vlh465ft9', 1505809071, 0);
INSERT INTO `guest_visit` VALUES ('ndnbderv9srnl5ugvfg6pfvkgr', 1505789548, 0);
INSERT INTO `guest_visit` VALUES ('nf5dfl8041gl9css228gqvb8f0', 1507704979, 0);
INSERT INTO `guest_visit` VALUES ('nfj4j40nq3pp8cgjc4bcal5gmc', 1507206259, 0);
INSERT INTO `guest_visit` VALUES ('nl0j86oast5c449hb5fc47n994', 1505811527, 0);
INSERT INTO `guest_visit` VALUES ('nq13k7crtc719rgdgfesv22dj2', 1574413598, 0);
INSERT INTO `guest_visit` VALUES ('nq14tb05s1bi8p02q4u4vo4465', 1508810679, 0);
INSERT INTO `guest_visit` VALUES ('nte7ts4pmq3kh201rvpom9igms', 1506305248, 0);
INSERT INTO `guest_visit` VALUES ('o6bsfqtbs17kaacpoprv1vujt5', 1505470084, 0);
INSERT INTO `guest_visit` VALUES ('o7ah4an9sbk81881heo9b8fjb4', 1574927055, 1);
INSERT INTO `guest_visit` VALUES ('ohftjkr9mddsdc0n0gpmv1etm4', 1506050251, 0);
INSERT INTO `guest_visit` VALUES ('olmnr0n49q92a76jrj8fldc3r1', 1506050234, 0);
INSERT INTO `guest_visit` VALUES ('ou58qdpsco44ir6e8e0msgpicv', 1505536225, 0);
INSERT INTO `guest_visit` VALUES ('pi7ar483drh0egu8q0oaglr8p9', 1505716618, 0);
INSERT INTO `guest_visit` VALUES ('pj43pfb331lvu9i3faeu24bdfs', 1505826192, 0);
INSERT INTO `guest_visit` VALUES ('ptqclfkr1l6sn7ds4tsabtatsc', 1505811662, 0);
INSERT INTO `guest_visit` VALUES ('pu3g5lr4hidsjvt1kn2uto9kj1', 1510536858, 0);
INSERT INTO `guest_visit` VALUES ('q4uu7ip97pg6b5m8es4hbpd5f9', 1505982863, 0);
INSERT INTO `guest_visit` VALUES ('qosvfej8421ismj5le1op1puge', 1506484405, 0);
INSERT INTO `guest_visit` VALUES ('qqg79sqgvighpbersrdoavsj58', 1505783788, 0);
INSERT INTO `guest_visit` VALUES ('qs7b7a1k0dhcaila0883tud6sp', 1506502221, 0);
INSERT INTO `guest_visit` VALUES ('r8vkibsve5u5ci4v5693mkveps', 1507252941, 0);
INSERT INTO `guest_visit` VALUES ('rgghk6fjh0o3bt4l9fmdpv2dnm', 1506134396, 0);
INSERT INTO `guest_visit` VALUES ('rr4amobcsqavic90uv8903rc3p', 1507190743, 0);
INSERT INTO `guest_visit` VALUES ('s55tnauksj7mv5ji9j193i0vp7', 1505993574, 0);
INSERT INTO `guest_visit` VALUES ('s7tr5gqglqa2rl4a9mtul1hg48', 1505469975, 0);
INSERT INTO `guest_visit` VALUES ('s88j14pvchbkrd5hum8vecj6cd', 1506563634, 0);
INSERT INTO `guest_visit` VALUES ('sa3spmna7m4b12nub8em1j1hcp', 1505535666, 0);
INSERT INTO `guest_visit` VALUES ('sb7tcfmth0sr87hk4a58f4lof7', 1505726149, 0);
INSERT INTO `guest_visit` VALUES ('se5vb00be3hteetlh8719ubnt0', 1505744165, 0);
INSERT INTO `guest_visit` VALUES ('supp9k31jt251mnn0dslm32e92', 1505719369, 0);
INSERT INTO `guest_visit` VALUES ('t404uvkqt4iceodib02jr5ru27', 1509511900, 0);
INSERT INTO `guest_visit` VALUES ('tjg5l6ups3q18m68dlr4m41m9q', 1505713791, 0);
INSERT INTO `guest_visit` VALUES ('tpf1pnq3dcoh6pthnb6a39vvmc', 1506421847, 0);
INSERT INTO `guest_visit` VALUES ('u0pu5n17gte083qahmn85kl1qt', 1506394287, 0);
INSERT INTO `guest_visit` VALUES ('u3lg23vtkn530ff448bj5n168j', 1506482964, 0);
INSERT INTO `guest_visit` VALUES ('u4gofmrvufosr5k8780op5344j', 1505722791, 0);
INSERT INTO `guest_visit` VALUES ('u6csh82ttfbmdolgppboit8ags', 1505698081, 0);
INSERT INTO `guest_visit` VALUES ('u98l9bq6l8usko293h8n7279h6', 1506501338, 0);
INSERT INTO `guest_visit` VALUES ('ubcnoehs01n5m1vfjes07du0dj', 1505721204, 0);
INSERT INTO `guest_visit` VALUES ('uhga50pcubtjds6lbodnq58rpr', 1508848715, 0);
INSERT INTO `guest_visit` VALUES ('uim197225v0musr9jl542lg6nc', 1505535951, 0);
INSERT INTO `guest_visit` VALUES ('uoskfpuh4mrca00u316f34q6s6', 1508125805, 0);
INSERT INTO `guest_visit` VALUES ('ura0e75lr2chi60ihc1l60cs50', 1505827005, 0);
INSERT INTO `guest_visit` VALUES ('vjso2054g07j24qndnpmccfgrd', 1505987505, 0);
INSERT INTO `guest_visit` VALUES ('vpee5prt9nn1duf7j56k2cljgv', 1506301956, 0);
INSERT INTO `guest_visit` VALUES ('vvhc27aej29akgge8rn1ft0c8a', 1506141002, 0);
INSERT INTO `guest_visit` VALUES ('vvo0prq1fvata5c3j3b4mae98o', 1505986774, 0);

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `parent` int(11) NULL DEFAULT NULL,
  `route` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `data` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'Hệ thống', NULL, '', 1, NULL, 'fa fa-dashboard');
INSERT INTO `menu` VALUES (2, 'Quản trị sản phẩm', NULL, '', 2, NULL, 'fa fa-list');
INSERT INTO `menu` VALUES (3, 'Quản lí liên hệ', NULL, '', 3, NULL, 'fa fa-book ');
INSERT INTO `menu` VALUES (4, 'Báo cáo thống kê', NULL, '', 4, NULL, 'fa fa-bar-chart ');
INSERT INTO `menu` VALUES (10, 'Quản trị menu', 1, '/qtht/menu/index', 6, NULL, NULL);
INSERT INTO `menu` VALUES (11, 'Danh mục sản phẩm', 2, '/danhmuc/danh-muc-san-pham/index', 1, NULL, '');
INSERT INTO `menu` VALUES (19, 'Báo cáo thống kê', 4, '/baocao/baocaothongke/index', 1, NULL, '');
INSERT INTO `menu` VALUES (23, 'Settings page', 3, '/qtht/setting-page/index', 0, NULL, '');
INSERT INTO `menu` VALUES (24, 'Quản lý sản phẩm', 2, '/sanpham/san-pham/index', 0, NULL, '');
INSERT INTO `menu` VALUES (25, 'Quản lý Loại sản phẩm', 2, '/danhmuc/loai-san-pham/index', 0, NULL, '');
INSERT INTO `menu` VALUES (26, 'Quản lý đánh giá sản phẩm', 2, '/sanpham/feedback/index', 0, NULL, '');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1501907343);
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', 1501907347);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sex` tinyint(1) NULL DEFAULT 0,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `ordered_date` datetime(0) NULL DEFAULT NULL,
  `orderCode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `isHoanThanh` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 'Võ Đăng Nguyên', 1, '0782112327', 'p123123@gmail.com', '123123123', '', 4, NULL, '#2020JanWed1', 0);
INSERT INTO `orders` VALUES (2, '123123123', 0, '12312312312', '123123@gmail.com', '123123123', '123123', 0, NULL, '#202001012', 0);
INSERT INTO `orders` VALUES (3, '312312', 1, '312312312312', '12312312@gmail.com', '3123123', '3123123', 4, NULL, '#202001013', 0);
INSERT INTO `orders` VALUES (4, '12312', 1, '3123123123123', '12312312@gmail.com', '123123', '', 4, NULL, '#202001014', 0);
INSERT INTO `orders` VALUES (5, '12312312', 0, '123123123', '12312@gmail.com', '12312312', '12312', 0, '2020-01-09 12:30:44', '#202001095', 0);

-- ----------------------------
-- Table structure for product_types
-- ----------------------------
DROP TABLE IF EXISTS `product_types`;
CREATE TABLE `product_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  FULLTEXT INDEX `name`(`name`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_types
-- ----------------------------
INSERT INTO `product_types` VALUES (3, 'SALON GỖ', 'salon-go');
INSERT INTO `product_types` VALUES (4, 'BÀN THỜ - SẬP THỜ - TỦ THỜ', 'ban-tho-sap-tho-tu-tho');
INSERT INTO `product_types` VALUES (5, 'BÀN ĂN', 'ban-an');
INSERT INTO `product_types` VALUES (6, 'KỆ TIVI', 'ke-tivi');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `describe` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_danhmuc` int(11) NULL DEFAULT NULL,
  `id_product_type` int(11) NULL DEFAULT NULL,
  `is_noibat` tinyint(1) NULL DEFAULT 0,
  `view` int(255) NULL DEFAULT 0,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0 VNĐ',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `title`(`title`) USING BTREE,
  INDEX `id_danhmuc`(`id_danhmuc`) USING BTREE,
  INDEX `id_product_type`(`id_product_type`) USING BTREE,
  FULLTEXT INDEX `titleFullText`(`title`)
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (4, 'Salon gỗ đỏ tay 12 Chạm Nghê', 'Salon gỗ đỏ tay 12 Chạm Nghê', '/Upload/2f099ab4372577b3b52278e2c36ef351.jpg', 16, 3, 1, 12, '2020-01-01 11:55:49', 'salon-go-do-tay-12-cham-nghe', '15,100,000VNĐ');
INSERT INTO `products` VALUES (5, 'Salon gỗ đỏ tay 12 Chạm Đào', 'Salon gỗ đỏ tay 12 Chạm Đào', '/Upload/57966b189e2c7e9ec54ce479a23f6e9a.jpg', 16, 3, 1, 5, '2019-12-27 17:16:37', 'salon-go-do-tay-12-cham-dao', '0 VNĐ');
INSERT INTO `products` VALUES (6, 'Salon gỗ đỏ tay 10 Chạm Đào', 'Salon gỗ đỏ tay 10 Chạm Đào', '/Upload/3b73c96908185907e68bb6362fa5539e.jpeg', 16, 3, 1, 1, '2019-12-27 17:24:00', 'salon-go-do-tay-10-cham-dao', '0 VNĐ');
INSERT INTO `products` VALUES (7, 'Salon gỗ đỏ Hoàng Gia', 'Salon gỗ đỏ Hoàng Gia', '/Upload/628bd762d28f6c8c4c49a4ab0416f86e.jpg', 16, 3, 1, 8, '2019-12-27 17:24:41', 'salon-go-do-hoang-gia', '0 VNĐ');
INSERT INTO `products` VALUES (8, 'Án gian tờ tổ gỗ cao cấp', 'Án gian tờ tổ gỗ cao cấp', '/Upload/e998bf8b817b59bbe609a765efbb88e1.jpg', 1, 4, 1, 9, '2019-12-27 17:25:20', 'an-gian-to-to-go-cao-cap', '0 VNĐ');
INSERT INTO `products` VALUES (9, 'Bàn thờ gia tiên khắc chữ vạn', 'Bàn thờ gia tiên khắc chữ vạn', '/Upload/b4c4e4b38ef6c39902aa7a4355e6d042.jpg', 1, 4, 1, 4, '2019-12-27 17:25:41', 'ban-tho-gia-tien-khac-chu-van', '0 VNĐ');
INSERT INTO `products` VALUES (10, 'Bàn thờ gia tiên mẫu mới hiện đại', 'Bàn thờ gia tiên mẫu mới hiện đại', '/Upload/0fa39ab5d34cff73ef73d3d740dbd4c1.jpg', 1, 4, 1, 1, '2019-12-27 17:26:07', 'ban-tho-gia-tien-mau-moi-hien-dai', '0 VNĐ');
INSERT INTO `products` VALUES (11, 'Bàn thờ kèm đôn mẫu đẹp', 'Bàn thờ kèm đôn mẫu đẹp', '/Upload/2276ca9cb427ccd4b303ae61d7c017c0.jpg', 1, 4, 1, 0, '2019-12-27 17:26:34', 'ban-tho-kem-don-mau-dep', '0 VNĐ');
INSERT INTO `products` VALUES (12, 'Mẫu bàn thờ hoa văn cổ', 'Mẫu bàn thờ hoa văn cổ', '/Upload/7c01a3437fbe6fdbab649ea603afda4b.jpg', 1, 4, 1, 1, '2019-12-27 17:26:57', 'mau-ban-tho-hoa-van-co', '0 VNĐ');
INSERT INTO `products` VALUES (13, 'Bàn ăn gỗ căm xe mặt gõ đỏ 6 ghế', 'Bàn ăn gỗ căm xe mặt gõ đỏ 6 ghế', '/Upload/d20e69f8d0a6b3d65ad2b642cc36e20d.jpg', 13, 5, 1, 1, '2019-12-27 17:27:32', 'ban-an-go-cam-xe-mat-go-do-6-ghe', '0 VNĐ');
INSERT INTO `products` VALUES (14, 'Bàn ăn gỗ sồi 1m8', 'Bàn ăn gỗ sồi 1m8', '/Upload/66e18d8d8f47771ff646029d66d9cf0a.jpg', 13, 5, 1, 0, '2019-12-27 17:27:48', 'ban-an-go-soi-1m8', '0 VNĐ');
INSERT INTO `products` VALUES (15, 'Bàn ăn gỗ sồi 4 ghế', 'Bàn ăn gỗ sồi 4 ghế', '/Upload/bd07cbe5d8f5f82c1bf8b3702073fd5d.jpg', 13, 5, 1, 0, '2019-12-27 17:28:16', 'ban-an-go-soi-4-ghe', '0 VNĐ');
INSERT INTO `products` VALUES (16, 'Kệ tivi gỗ đinh hương 1,6m', 'Kệ tivi gỗ đinh hương 1,6m', '/Upload/4ff6d236b744df135015dff447b41c93.jpg', 6, 6, 1, 0, '2019-12-27 17:28:54', 'ke-tivi-go-dinh-huong-16m', '0 VNĐ');
INSERT INTO `products` VALUES (17, 'Kệ tivi gỗ đinh hương 1,8m', 'Kệ tivi gỗ đinh hương 1,8m', '/Upload/642ed0f33bbe25102ec8f5e4856ae448.jpg', 6, 6, 1, 1, '2019-12-27 17:29:24', 'ke-tivi-go-dinh-huong-18m', '0 VNĐ');
INSERT INTO `products` VALUES (18, 'Kệ tivi gỗ cẩm 2,2m', 'Kệ tivi gỗ cẩm 2,2m', '/Upload/c7e441ebc312321430f5d894024cae1e.jpg', 6, 6, 1, 0, '2019-12-27 17:29:41', 'ke-tivi-go-cam-22m', '0 VNĐ');
INSERT INTO `products` VALUES (20, 'Test', 'test', '/Upload/4942141-6602700762-yasuo.jpg', 16, 3, 1, 26, '2020-01-07 17:02:04', '123123', '15,000,000VNĐ');
INSERT INTO `products` VALUES (24, '', '', NULL, NULL, NULL, 0, 0, '2020-01-11 11:07:51', '', '0 VNĐ');

-- ----------------------------
-- Table structure for promotion
-- ----------------------------
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE `promotion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of promotion
-- ----------------------------
INSERT INTO `promotion` VALUES (1, 'PGRpdiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgY29sb3I6IHJnYigwLCAwLCAwKTsgZm9udC1mYW1pbHk6IFJvYm90bywgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxM3B4OyBmb250LXN0eWxlOiBub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6IG5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6IG5vcm1hbDsgZm9udC13ZWlnaHQ6IDQwMDsgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDsgb3JwaGFuczogMjsgdGV4dC1hbGlnbjogc3RhcnQ7IHRleHQtaW5kZW50OiAwcHg7IHRleHQtdHJhbnNmb3JtOiBub25lOyB3aGl0ZS1zcGFjZTogbm9ybWFsOyB3aWRvd3M6IDI7IHdvcmQtc3BhY2luZzogMHB4OyAtd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOiAwcHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNTUsIDI1NSwgMjU1KTsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOiBpbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6IGluaXRpYWw7Ij48c3BhbiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgY29sb3I6IHJnYigwLCAwLCAwKTsiPjxzcGFuIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXNpemU6IDE1LjZweDsiPjxzdHJvbmcgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtd2VpZ2h0OiBib2xkZXI7Ij5LaG9uZ2dpYW5nby5jb208L3N0cm9uZz48L3NwYW4+IGx1w7RuIGx1w7RuIGPDsyBuaOG7r25nIGNow61uaCBzw6FjaCDGsHUgxJHDo2kgduG7gSBnacOhIHbDoCBxdcOgIHThurduZyDEkeG7kWkgduG7m2kga2jDoWNoIG11YSBow6BuZy48L3NwYW4+PC9kaXY+PGRpdiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgY29sb3I6IHJnYigwLCAwLCAwKTsgZm9udC1mYW1pbHk6IFJvYm90bywgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxM3B4OyBmb250LXN0eWxlOiBub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6IG5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6IG5vcm1hbDsgZm9udC13ZWlnaHQ6IDQwMDsgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDsgb3JwaGFuczogMjsgdGV4dC1hbGlnbjogc3RhcnQ7IHRleHQtaW5kZW50OiAwcHg7IHRleHQtdHJhbnNmb3JtOiBub25lOyB3aGl0ZS1zcGFjZTogbm9ybWFsOyB3aWRvd3M6IDI7IHdvcmQtc3BhY2luZzogMHB4OyAtd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOiAwcHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNTUsIDI1NSwgMjU1KTsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOiBpbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6IGluaXRpYWw7Ij48YnI+PC9kaXY+PGRpdiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgY29sb3I6IHJnYigwLCAwLCAwKTsgZm9udC1mYW1pbHk6IFJvYm90bywgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxM3B4OyBmb250LXN0eWxlOiBub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6IG5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6IG5vcm1hbDsgZm9udC13ZWlnaHQ6IDQwMDsgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDsgb3JwaGFuczogMjsgdGV4dC1hbGlnbjogc3RhcnQ7IHRleHQtaW5kZW50OiAwcHg7IHRleHQtdHJhbnNmb3JtOiBub25lOyB3aGl0ZS1zcGFjZTogbm9ybWFsOyB3aWRvd3M6IDI7IHdvcmQtc3BhY2luZzogMHB4OyAtd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOiAwcHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNTUsIDI1NSwgMjU1KTsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOiBpbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6IGluaXRpYWw7Ij5DaMO6bmcgdMO0aSBjYW0ga+G6v3QgMyBuaOG6pXQgOjwvZGl2PjxkaXYgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGNvbG9yOiByZ2IoMCwgMCwgMCk7IGZvbnQtZmFtaWx5OiBSb2JvdG8sIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTNweDsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IHN0YXJ0OyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjU1LCAyNTUsIDI1NSk7IHRleHQtZGVjb3JhdGlvbi1zdHlsZTogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLWNvbG9yOiBpbml0aWFsOyI+PHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi1ib3R0b206IDAuMzNlbTsgbWFyZ2luLXRvcDogMHB4OyI+4oCTIMSQZW0gdOG7m2kgc+G7sSBow6BpIGzDsm5nIG5o4bqldDwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7Ij7igJMgQ2jhuqV0IGzGsOG7o25nIHThu5F0IG5o4bqldDwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7Ij7igJMgR2nDoSBo4bujcCBsw70gbmjhuqV0LjwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7Ij7igJMgTuG6v3UgcXXDvSBraMOhY2ggY8OzIGLhuqV0IGPhu6kgYsSDbiBraG/Eg24gZ8OsIHbhu4EgxJHhu5MgZ+G7lyBO4buZaSB0aOG6pXQg4oCTIGjDo3kgQ2FsbCBuZ2F5IEhvdGxpbmUg4oCTIENow7puZyB0w7RpIHLhuqV0IHZ1aSBsw7JuZyBraGkgxJHGsOG7o2MgdGnhur9wIGNodXnhu4duIHbhu5tpIGPDoWMgVGjGsOG7o25nIMSQ4bq/LjwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7Ij48c3BhbiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgY29sb3I6IHJnYigwLCAwLCAwKTsiPiZuYnNwO03hu51pIHF1w70ga2jDoWNoIMSR4bq/biB24bubaSA6PC9zcGFuPjwvcD48cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLWJvdHRvbTogMC4zM2VtOyBtYXJnaW4tdG9wOiAwcHg7Ij48c3BhbiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAxNS42cHg7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+S2hvbmdnaWFuZ28uY29tPC9zdHJvbmc+PC9zcGFuPiB0aHXhu5ljIHF14bqjbiBsw70gQ+G7p2EgY8O0bmcgdHkgQ1AgWE5LIE3DqiBOYW08YnIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+SG90bGluZTo8L3N0cm9uZz4gMDkzNS45ODcuMzU2IOKAkyAwNzc3LjI0OC41Njc8YnIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+xJDhu4thIGNo4buJOjwvc3Ryb25nPiA2NCAtNjUgTmd1eeG7hW4gUGjGsOG7m2MgTGFuLCBIw7JhIFh1w6JuLCBD4bqpbSBM4buHLCBUUCDEkMOgIE7hurVuZzxiciBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsiPjxzdHJvbmcgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtd2VpZ2h0OiBib2xkZXI7Ij5FbWFpbDo8L3N0cm9uZz4gS2hvbmdnaWFuZ28uY29tQGdtYWlsLmNvbTxiciBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsiPjxzdHJvbmcgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtd2VpZ2h0OiBib2xkZXI7Ij5aYWxvOjwvc3Ryb25nPiBLaG9uZ2dpYW5nby5jb208YnIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7Ij48c3Ryb25nIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXdlaWdodDogYm9sZGVyOyI+RkI6PC9zdHJvbmc+IGtob25nZ2lhbmdvY29tPC9wPjwvZGl2PjwvcD4=');

-- ----------------------------
-- Table structure for ql_filedinhkem
-- ----------------------------
DROP TABLE IF EXISTS `ql_filedinhkem`;
CREATE TABLE `ql_filedinhkem`  (
  `idDK` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NULL DEFAULT NULL,
  `idObject` int(11) NULL DEFAULT NULL,
  `maSo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fileName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mime` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `dirPath` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `idCreatedUser` int(11) NULL DEFAULT NULL,
  `chonBanHanh` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`idDK`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ql_filedinhkem
-- ----------------------------
INSERT INTO `ql_filedinhkem` VALUES (34, NULL, 4, 'f283a5d15b721cd92de96baf08c2cffe.jpg', 'salon-go-tram-mat-go-do-tay-12-cham-nghe-sl002-.jpg', 'image/jpeg', NULL, '/Upload/f283a5d15b721cd92de96baf08c2cffe.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (35, NULL, 5, 'c5c0ec46cc2e3dd564f97b16517cddaa.jpg', '58f839d31235b_1492662739.jpg', 'image/jpeg', NULL, '/Upload/c5c0ec46cc2e3dd564f97b16517cddaa.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (36, NULL, 6, '49830b43c88b64aaa335b2425a6890fb.jpeg', '0011525_salon-go-go-do-tay-10-cham-dao-600x450.jpeg', 'image/jpeg', NULL, '/Upload/49830b43c88b64aaa335b2425a6890fb.jpeg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (37, NULL, 7, '4052d53f21d0f42fa77bf98aee6ea662.jpg', 'salon-go-hoang-gia-1-800x800.jpg', 'image/jpeg', NULL, '/Upload/4052d53f21d0f42fa77bf98aee6ea662.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (38, NULL, 8, '1796f75f8b27954fdb2c3ffc2fafbc0c.jpg', '03-380x380.jpg', 'image/jpeg', NULL, '/Upload/1796f75f8b27954fdb2c3ffc2fafbc0c.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (39, NULL, 9, '599faf92ec853d438dd46f797f895fb2.jpg', '07-800x822.jpg', 'image/jpeg', NULL, '/Upload/599faf92ec853d438dd46f797f895fb2.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (40, NULL, 10, '8272b7612a8da5d234ea8847ec1fccc7.jpg', 'angian66.jpg', 'image/jpeg', NULL, '/Upload/8272b7612a8da5d234ea8847ec1fccc7.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (41, NULL, 11, '80dcaf3045edbcaec4c98007ae0f9f29.jpg', 'an-gian52.jpg', 'image/jpeg', NULL, '/Upload/80dcaf3045edbcaec4c98007ae0f9f29.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (42, NULL, 12, '955f11ededfa3b4bd698c02f6390f289.jpg', 'Photo22281111052017.jpg', 'image/jpeg', NULL, '/Upload/955f11ededfa3b4bd698c02f6390f289.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (43, NULL, 13, '863c7a3b0d27188ff6988029468308ee.jpg', 'ban-an-go-camxe-mat-go-do-3-800x800.jpg', 'image/jpeg', NULL, '/Upload/863c7a3b0d27188ff6988029468308ee.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (44, NULL, 14, '2654ee91558fce3c7539c79e21d35745.jpg', 'ban-an-go-soi-1m8-ba011-94-1.jpg', 'image/jpeg', NULL, '/Upload/2654ee91558fce3c7539c79e21d35745.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (45, NULL, 15, '115db702449d5e492d7691bdcaa87f9c.jpg', '09_80a423c12d024b6394544ca063202098-800x800.jpg', 'image/jpeg', NULL, '/Upload/115db702449d5e492d7691bdcaa87f9c.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (46, NULL, 16, 'cdf4ff868eec6957e4481acf75473905.jpg', 'ke-tivi-go-dinh-huong-1m6-2-800x800.jpg', 'image/jpeg', NULL, '/Upload/cdf4ff868eec6957e4481acf75473905.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (47, NULL, 17, '112e6ea885bc25011aa583be3ee49b85.jpg', 'ke-ti-vi-dinh-huong-11-800x800.jpg', 'image/jpeg', NULL, '/Upload/112e6ea885bc25011aa583be3ee49b85.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (48, NULL, 18, '6986a964e7db83a4cbdc8e25c4b28ea9.jpg', 'ke-tivi-go-cam-22m-tv034-.jpg', 'image/jpeg', NULL, '/Upload/6986a964e7db83a4cbdc8e25c4b28ea9.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (49, NULL, 20, NULL, '13534511_1773837622831771_566184885_n.jpg', 'image/jpeg', NULL, '/Upload/13534511_1773837622831771_566184885_n.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (50, NULL, 20, NULL, '13551620_546757368859474_1938719913_n.jpg', 'image/jpeg', NULL, '/Upload/13551620_546757368859474_1938719913_n.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (51, NULL, 20, NULL, '13573460_1763706290575296_1657282168_n.jpg', 'image/jpeg', NULL, '/Upload/13573460_1763706290575296_1657282168_n.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (52, NULL, 20, NULL, '13597687_1555288314779256_1389654015_n.jpg', 'image/jpeg', NULL, '/Upload/13597687_1555288314779256_1389654015_n.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (53, NULL, 20, NULL, '13627909_278577929176513_1984302453_n.jpg', 'image/jpeg', NULL, '/Upload/13627909_278577929176513_1984302453_n.jpg', NULL, 0);
INSERT INTO `ql_filedinhkem` VALUES (54, NULL, 20, NULL, '13643138_1764659597152786_1994072682_n.jpg', 'image/jpeg', NULL, '/Upload/13643138_1764659597152786_1994072682_n.jpg', NULL, 0);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `authKey` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `accessToken` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `updatedAt` datetime(6) NULL DEFAULT NULL,
  `createdAt` datetime(6) NULL DEFAULT NULL,
  `isDeleted` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gioiTinh` int(11) NULL DEFAULT NULL,
  `ngaySinh` datetime(6) NULL DEFAULT NULL,
  `donViId` int(11) NULL DEFAULT NULL,
  `diDong` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dienThoai` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `soCMND` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ngayCapCMND` datetime(6) NULL DEFAULT NULL,
  `noiCapCMND` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `isActive` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `maSo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mimeAvatar` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin@gmail.com', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 1, '2019-12-20 04:47:55.000000', NULL, 0, 'Quản trị hệ thống', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '/Upload/f3ccdd27d2000e3f9255a7e3e2c48800', 'image/jpeg');

SET FOREIGN_KEY_CHECKS = 1;
