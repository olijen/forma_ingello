SET NAMES utf8;
SET CHARACTER SET utf8;
DEFAULT CHARSET='utf8';



--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `auth_key` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`, `auth_key`, `access_token`, `phone`, `parent_id`) VALUES
  (1, 'admin', '$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW', 'admin@admin.admin', 'user', NULL, NULL, NULL, NULL),
  (4, 'kirill', '$2y$13$HOrJAi19qEm7yaelOVsvw.tb7NSZnruC50C09cabJLgXHGkApgW1u', 'limbo9826@gmail.com', 'user', NULL, NULL, NULL, NULL),
  (5, 'archie', '$2y$13$gYhb25Lo7tj00Ax03/PV9.prTGdykgsZ4qaXNE/6nkVw02FsAVrxW', 'astronautgeek@gmail.com', 'user', NULL, NULL, NULL, NULL),
  (6, 'ingello', '$2y$13$.GfcJiKrglWdpk0oS2G/2ewlBCjuzWHnb/XC/Lg10UpBNkUULhYze', 'olijenius@gmail.com', 'user', NULL, NULL, NULL, NULL),
  (7, 'ingello2', '$2y$13$OGCC6UGvUK2AoRaKOGRpJef0NbuWBtr.zMHLeXQIXsZcoXhzVtOVS', 'business.ingello@gmail.com', 'user', NULL, NULL, '', 1),
  (8, 'Test1', '$2y$13$SfFAYsZ.uHjPxOaNpOchreuYyuit7gg.Iln9KduYPyMeNpCtbNRbG', '1111@agsdg.com', 'user', NULL, NULL, '111111', 6),
  (9, 'oleg', '$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW', 'levit@i.ua', 'user', NULL, NULL, '0937130073', NULL),
  (12, 'ingello1', '$2y$13$/zUzmvjIVqFhX4rViZRDrOciwo92zuVP4.l3izWSjI5WMBGkp8Erq', 'ing@gmail.com', 'user', NULL, NULL, '', 1),
  (16, 'tema', '$2y$13$cAvQs5KaL6EAWETqeabH9e3WQnkWkAVPLV42BBCS/1/REMRW9XF1e', 'daivts1488@gmail.com', 'user', NULL, NULL, '+380-637154401', NULL),
  (17, 'TestGabri', '$2y$13$xiMx2bJhNm/nS6X7BH5F0.ea9tJF7laASWzc0dGyxe1xHiYGlXP4e', 'TestGabriasdasd@asasf.com', 'user', NULL, NULL, '1241241', NULL),
  (18, 'admin2', '$2y$13$c8d6vyPnAriDyDE1ySWa7e09nYVySRelhyU7VBlY4UmvkbCEhPvQO', 'dasha252342@gmail.com', 'user', NULL, NULL, '', 1),
  (19, 'TestForGabri', '$2y$13$WLv4wEcZuQvAeIAEAqgNCu0ouygMxKmqxTnUQ4mdeCChHTvYci9Ly', '11111WQ@gmail.com', 'user', NULL, NULL, '1111', NULL),
  (20, 'NewUser', '$2y$13$qMXgiS8rrhC.OZpNJKf4KO2rHQFkQmYuorP2i24jooGe8/6mm6AxO', '11111@gmail.com', 'user', NULL, NULL, '11111', NULL),
  (21, 'NewUserRef', '$2y$13$ZcvJ5K/qkOYZe95EuzpbIuGX0P.ejr.mlCi5hf9BiacmzdM1sSs6O', '11111@saf.com', 'user', NULL, NULL, '11111', 20),
  (22, '111111', '$2y$13$pb1EQk1LNzMbo4m7vZhRu.DnMvM2gPqJKVzBJy2Ocaf9vY6GaUOJm', 'ngello@gmail.com', 'user', NULL, NULL, '111111', NULL),
  (23, 'manager1', '$2y$13$aojywk9rO95bSepeLXVnEumnNISHUwRXzsuECcIYJ2caC8FkP0hRm', 'hh23456789098765433456789987654@gmail.com', 'user', NULL, NULL, '', 9);

-- --------------------------------------------------------


CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order` int(11),
  description varchar(6500),
  PRIMARY KEY (`id`),
  KEY `state_ibfk_1` (`user_id`),
  CONSTRAINT `state_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `state` (`name`, `user_id`, `order`) VALUES
  ('Не знакомы', 1, 5),
  ('Презентация', 1, 4),
  ('Не интересно', 1, 3),
  ('Есть интерес', 1, 2),
  ('Согласована цена', 1, 1),
  ('Подписан договор', 1, 4),
  ('В работе', 1, 4),
  ('Закрыт', 1, 4);




CREATE TABLE `accessory` (
  `id` int(11) NOT NULL,
  `entity_class` varchar(255) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accessory`
--

INSERT INTO `accessory` (`id`, `entity_class`, `entity_id`, `user_id`) VALUES
  (1, 'forma\\modules\\country\\records\\Country', 6, 1),
  (2, 'forma\\modules\\customer\\records\\Customer', 6, 1),
  (3, 'forma\\modules\\customer\\records\\Customer', 7, 1),
  (9, 'forma\\modules\\country\\records\\Country', 7, 3),
  (10, 'forma\\modules\\customer\\records\\Customer', 8, 3),
  (13, 'forma\\modules\\country\\records\\Country', 8, 6),
  (14, 'forma\\modules\\country\\records\\Country', 9, 4),
  (15, 'forma\\modules\\customer\\records\\Customer', 9, 4),
  (17, 'forma\\modules\\country\\records\\Country', 10, 6),
  (18, 'forma\\modules\\country\\records\\Country', 11, 6),
  (19, 'forma\\modules\\customer\\records\\Customer', 10, 6),
  (21, 'forma\\modules\\customer\\records\\Customer', 4, 6),
  (23, 'forma\\modules\\customer\\records\\Customer', 11, 1),
  (25, 'forma\\modules\\product\\records\\Manufacturer', 6, 1),
  (26, 'forma\\modules\\product\\records\\Type', 3, 1),
  (27, 'forma\\modules\\product\\records\\Product', 11, 1),
  (28, 'forma\\modules\\customer\\records\\Customer', 12, 5),
  (31, 'forma\\modules\\customer\\records\\Customer', 13, 5),
  (34, 'forma\\modules\\customer\\records\\Customer', 14, 5),
  (36, 'forma\\modules\\customer\\records\\Customer', 15, 5),
  (38, 'forma\\modules\\customer\\records\\Customer', 16, 5),
  (40, 'forma\\modules\\customer\\records\\Customer', 17, 5),
  (42, 'forma\\modules\\customer\\records\\Customer', 18, 5),
  (44, 'forma\\modules\\customer\\records\\Customer', 19, 5),
  (47, 'forma\\modules\\customer\\records\\Customer', 20, 5),
  (49, 'forma\\modules\\customer\\records\\Customer', 21, 5),
  (51, 'forma\\modules\\customer\\records\\Customer', 22, 5),
  (54, 'forma\\modules\\product\\records\\Type', 4, 5),
  (55, 'forma\\modules\\product\\records\\Manufacturer', 7, 5),
  (59, 'forma\\modules\\customer\\records\\Customer', 23, 1),
  (62, 'forma\\modules\\product\\records\\Type', 5, 1),
  (63, 'forma\\modules\\product\\records\\Product', 12, 1),
  (66, 'forma\\modules\\customer\\records\\Customer', 24, 6),
  (67, 'forma\\modules\\customer\\records\\Customer', 25, 6),
  (68, 'forma\\modules\\customer\\records\\Customer', 26, 6),
  (69, 'forma\\modules\\customer\\records\\Customer', 27, 1),
  (70, 'forma\\modules\\customer\\records\\Customer', 28, 1),
  (71, 'forma\\modules\\customer\\records\\Customer', 29, 1),
  (78, 'forma\\modules\\customer\\records\\Customer', 30, 4),
  (79, 'forma\\modules\\customer\\records\\Customer', 31, 6),
  (85, 'forma\\modules\\customer\\records\\Customer', 32, 6),
  (86, 'forma\\modules\\customer\\records\\Customer', 33, 6),
  (87, 'forma\\modules\\customer\\records\\Customer', 34, 6),
  (88, 'forma\\modules\\customer\\records\\Customer', 35, 6),
  (89, 'forma\\modules\\customer\\records\\Customer', 36, 6),
  (90, 'forma\\modules\\customer\\records\\Customer', 37, 6),
  (91, 'forma\\modules\\customer\\records\\Customer', 38, 6),
  (92, 'forma\\modules\\customer\\records\\Customer', 39, 6),
  (93, 'forma\\modules\\customer\\records\\Customer', 40, 6),
  (94, 'forma\\modules\\customer\\records\\Customer', 41, 6),
  (95, 'forma\\modules\\customer\\records\\Customer', 42, 6),
  (96, 'forma\\modules\\customer\\records\\Customer', 43, 6),
  (97, 'forma\\modules\\customer\\records\\Customer', 44, 6),
  (98, 'forma\\modules\\customer\\records\\Customer', 45, 6),
  (99, 'forma\\modules\\customer\\records\\Customer', 46, 6),
  (100, 'forma\\modules\\customer\\records\\Customer', 47, 6),
  (101, 'forma\\modules\\customer\\records\\Customer', 48, 6),
  (102, 'forma\\modules\\customer\\records\\Customer', 49, 6),
  (103, 'forma\\modules\\customer\\records\\Customer', 50, 6),
  (104, 'forma\\modules\\customer\\records\\Customer', 51, 6),
  (105, 'forma\\modules\\customer\\records\\Customer', 52, 6),
  (106, 'forma\\modules\\customer\\records\\Customer', 53, 6),
  (107, 'forma\\modules\\customer\\records\\Customer', 54, 6),
  (108, 'forma\\modules\\customer\\records\\Customer', 55, 6),
  (109, 'forma\\modules\\customer\\records\\Customer', 56, 6),
  (110, 'forma\\modules\\customer\\records\\Customer', 57, 6),
  (111, 'forma\\modules\\customer\\records\\Customer', 58, 6),
  (115, 'forma\\modules\\customer\\records\\Customer', 59, 1),
  (117, 'forma\\modules\\customer\\records\\Customer', 60, 1),
  (118, 'forma\\modules\\product\\records\\Type', 9, 1),
  (119, 'forma\\modules\\product\\records\\Type', 10, 1),
  (120, 'forma\\modules\\product\\records\\Manufacturer', 8, 1),
  (121, 'forma\\modules\\product\\records\\Type', 11, 1),
  (122, 'forma\\modules\\product\\records\\Type', 12, 1),
  (123, 'forma\\modules\\product\\records\\Type', 13, 1),
  (124, 'forma\\modules\\product\\records\\Type', 14, 1),
  (125, 'forma\\modules\\product\\records\\PackUnit', 4, 1),
  (126, 'forma\\modules\\product\\records\\PackUnit', 5, 1),
  (127, 'forma\\modules\\product\\records\\Category', 1, 1),
  (128, 'forma\\modules\\product\\records\\Category', 2, 1),
  (129, 'forma\\modules\\product\\records\\Product', 13, 1),
  (130, 'forma\\modules\\product\\records\\Product', 14, 1),
  (131, 'forma\\modules\\supplier\\records\\Supplier', 6, 1),
  (132, 'forma\\modules\\product\\records\\Currency', 4, 1),
  (133, 'forma\\modules\\product\\records\\Currency', 5, 1),
  (134, 'forma\\modules\\product\\records\\Currency', 6, 1),
  (135, 'forma\\modules\\product\\records\\TaxRate', 4, 1),
  (136, 'forma\\modules\\product\\records\\TaxRate', 5, 1),
  (138, 'forma\\modules\\product\\records\\TaxRate', 6, 1),
  (152, 'forma\\modules\\customer\\records\\Customer', 61, 6),
  (153, 'forma\\modules\\customer\\records\\Customer', 62, 6),
  (154, 'forma\\modules\\customer\\records\\Customer', 63, 6),
  (155, 'forma\\modules\\customer\\records\\Customer', 64, 6),
  (156, 'forma\\modules\\customer\\records\\Customer', 65, 6),
  (157, 'forma\\modules\\customer\\records\\Customer', 66, 6),
  (159, 'forma\\modules\\customer\\records\\Customer', 67, 6),
  (161, 'forma\\modules\\customer\\records\\Customer', 68, 6),
  (163, 'forma\\modules\\customer\\records\\Customer', 69, 6),
  (165, 'forma\\modules\\customer\\records\\Customer', 70, 6),
  (166, 'forma\\modules\\customer\\records\\Customer', 71, 6),
  (168, 'forma\\modules\\customer\\records\\Customer', 72, 6),
  (170, 'forma\\modules\\customer\\records\\Customer', 73, 6),
  (172, 'forma\\modules\\customer\\records\\Customer', 74, 6),
  (174, 'forma\\modules\\customer\\records\\Customer', 75, 6),
  (176, 'forma\\modules\\supplier\\records\\Supplier', 7, 6),
  (177, 'forma\\modules\\customer\\records\\Customer', 76, 6),
  (178, 'forma\\modules\\customer\\records\\Customer', 77, 6),
  (181, 'forma\\modules\\project\\records\\Project', 2, 1),
  (182, 'forma\\modules\\vacancy\\records\\Vacancy', 1, 1),
  (183, 'forma\\modules\\vacancy\\records\\Vacancy', 2, 1),
  (184, 'forma\\modules\\vacancy\\records\\Vacancy', 3, 1),
  (185, 'forma\\modules\\vacancy\\records\\Vacancy', 4, 1),
  (186, 'forma\\modules\\worker\\records\\Worker', 1, 1),
  (187, 'forma\\modules\\worker\\records\\Worker', 2, 1),
  (188, 'forma\\modules\\worker\\records\\Worker', 3, 1),
  (189, 'forma\\modules\\worker\\records\\Worker', 4, 1),
  (190, 'forma\\modules\\worker\\records\\Worker', 5, 1),
  (191, 'forma\\modules\\worker\\records\\Worker', 6, 1),
  (192, 'forma\\modules\\worker\\records\\Worker', 7, 1),
  (193, 'forma\\modules\\worker\\records\\Worker', 8, 1),
  (194, 'forma\\modules\\product\\records\\Product', 15, 1),
  (195, 'forma\\modules\\product\\records\\Product', 16, 1),
  (196, 'forma\\modules\\product\\records\\Product', 17, 1),
  (197, 'forma\\modules\\product\\records\\Product', 18, 1),
  (198, 'forma\\modules\\product\\records\\Product', 19, 1),
  (199, 'forma\\modules\\customer\\records\\Customer', 78, 1),
  (200, 'forma\\modules\\customer\\records\\Customer', 79, 6),
  (201, 'forma\\modules\\customer\\records\\Customer', 80, 6),
  (202, 'forma\\modules\\customer\\records\\Customer', 81, 6),
  (203, 'forma\\modules\\customer\\records\\Customer', 82, 6),
  (204, 'forma\\modules\\customer\\records\\Customer', 83, 6),
  (205, 'forma\\modules\\customer\\records\\Customer', 84, 6),
  (206, 'forma\\modules\\customer\\records\\Customer', 85, 6),
  (207, 'forma\\modules\\customer\\records\\Customer', 86, 6),
  (208, 'forma\\modules\\customer\\records\\Customer', 87, 6),
  (209, 'forma\\modules\\customer\\records\\Customer', 88, 6),
  (210, 'forma\\modules\\customer\\records\\Customer', 89, 6),
  (211, 'forma\\modules\\customer\\records\\Customer', 90, 6),
  (212, 'forma\\modules\\customer\\records\\Customer', 91, 6),
  (213, 'forma\\modules\\customer\\records\\Customer', 92, 6),
  (214, 'forma\\modules\\customer\\records\\Customer', 93, 6),
  (215, 'forma\\modules\\customer\\records\\Customer', 94, 6),
  (216, 'forma\\modules\\customer\\records\\Customer', 95, 6),
  (234, 'forma\\modules\\customer\\records\\Customer', 96, 6),
  (235, 'forma\\modules\\customer\\records\\Customer', 97, 6),
  (239, 'forma\\modules\\supplier\\records\\Supplier', 8, 1),
  (240, 'forma\\modules\\worker\\records\\Worker', 9, 8),
  (241, 'forma\\modules\\project\\records\\project\\Project', 13, 6),
  (242, 'forma\\modules\\project\\records\\project\\Project', 14, 6),
  (243, 'forma\\modules\\project\\records\\project\\Project', 15, 6),
  (244, 'forma\\modules\\project\\records\\project\\Project', 16, 6),
  (245, 'forma\\modules\\project\\records\\project\\Project', 17, 6),
  (246, 'forma\\modules\\project\\records\\project\\Project', 18, 6),
  (247, 'forma\\modules\\vacancy\\records\\Vacancy', 5, 6),
  (248, 'forma\\modules\\vacancy\\records\\Vacancy', 6, 6),
  (249, 'forma\\modules\\vacancy\\records\\Vacancy', 7, 6),
  (250, 'forma\\modules\\vacancy\\records\\Vacancy', 8, 6),
  (251, 'forma\\modules\\vacancy\\records\\Vacancy', 9, 6),
  (252, 'forma\\modules\\vacancy\\records\\Vacancy', 10, 6),
  (253, 'forma\\modules\\worker\\records\\Worker', 10, 6),
  (255, 'forma\\modules\\worker\\records\\Worker', 11, 6),
  (256, 'forma\\modules\\worker\\records\\Worker', 12, 6),
  (257, 'forma\\modules\\worker\\records\\Worker', 13, 6),
  (305, 'forma\\modules\\vacancy\\records\\Vacancy', 34, 11),
  (306, 'forma\\modules\\project\\records\\project\\Project', 30, 11),
  (307, 'forma\\modules\\worker\\records\\Worker', 27, 11),
  (308, 'forma\\modules\\worker\\records\\Worker', 28, 11),
  (312, 'forma\\modules\\customer\\records\\Customer', 98, 6),
  (327, 'forma\\modules\\project\\records\\Project', 1, 1),
  (328, 'forma\\modules\\project\\records\\project\\Project', 2, 1),
  (329, 'forma\\modules\\project\\records\\project\\Project', 3, 1),
  (330, 'forma\\modules\\project\\records\\project\\Project', 4, 1),
  (331, 'forma\\modules\\project\\records\\project\\Project', 5, 1),
  (332, 'forma\\modules\\project\\records\\project\\Project', 6, 1),
  (333, 'forma\\modules\\project\\records\\project\\Project', 7, 1),
  (334, 'forma\\modules\\project\\records\\project\\Project', 8, 1),
  (335, 'forma\\modules\\project\\records\\project\\Project', 9, 1),
  (336, 'forma\\modules\\project\\records\\project\\Project', 10, 1),
  (337, 'forma\\modules\\project\\records\\project\\Project', 11, 1),
  (338, 'forma\\modules\\project\\records\\project\\Project', 12, 1),
  (339, 'forma\\modules\\project\\records\\project\\Project', 31, 1),
  (340, 'forma\\modules\\customer\\records\\Customer', 99, 1),
  (341, 'forma\\modules\\worker\\records\\Worker', 30, 1),
  (342, 'forma\\modules\\vacancy\\records\\Vacancy', 36, 1),
  (343, 'forma\\modules\\project\\records\\project\\Project', 32, 1),
  (344, 'forma\\modules\\worker\\records\\Worker', 31, 1),
  (345, 'forma\\modules\\product\\records\\Product', 20, 1),
  (347, 'forma\\modules\\selling\\records\\talk\\Answer', 1, 6),
  (348, 'forma\\modules\\selling\\records\\talk\\Answer', 2, 6),
  (350, 'forma\\modules\\selling\\records\\talk\\Answer', 3, 6),
  (351, 'forma\\modules\\selling\\records\\talk\\Answer', 4, 6),
  (352, 'forma\\modules\\selling\\records\\talk\\Answer', 5, 6),
  (353, 'forma\\modules\\selling\\records\\talk\\Answer', 6, 6),
  (354, 'forma\\modules\\selling\\records\\talk\\Answer', 7, 6),
  (355, 'forma\\modules\\selling\\records\\talk\\Answer', 8, 6),
  (356, 'forma\\modules\\selling\\records\\talk\\Answer', 9, 6),
  (357, 'forma\\modules\\selling\\records\\talk\\Answer', 10, 6),
  (358, 'forma\\modules\\selling\\records\\talk\\Answer', 11, 6),
  (359, 'forma\\modules\\selling\\records\\talk\\Answer', 12, 6),
  (360, 'forma\\modules\\selling\\records\\talk\\Answer', 13, 6),
  (361, 'forma\\modules\\selling\\records\\talk\\Answer', 31, 6),
  (362, 'forma\\modules\\selling\\records\\talk\\Answer', 32, 6),
  (363, 'forma\\modules\\selling\\records\\talk\\Answer', 33, 6),
  (364, 'forma\\modules\\selling\\records\\talk\\Request', 1, 6),
  (365, 'forma\\modules\\selling\\records\\talk\\Request', 2, 6),
  (366, 'forma\\modules\\selling\\records\\talk\\Request', 3, 6),
  (367, 'forma\\modules\\selling\\records\\talk\\Request', 4, 6),
  (368, 'forma\\modules\\selling\\records\\talk\\Request', 5, 6),
  (369, 'forma\\modules\\selling\\records\\talk\\Request', 6, 6),
  (370, 'forma\\modules\\selling\\records\\talk\\Request', 7, 6),
  (371, 'forma\\modules\\selling\\records\\talk\\Request', 8, 6),
  (372, 'forma\\modules\\selling\\records\\talk\\Request', 9, 6),
  (373, 'forma\\modules\\selling\\records\\talk\\Request', 10, 6),
  (374, 'forma\\modules\\selling\\records\\talk\\Request', 11, 6),
  (375, 'forma\\modules\\selling\\records\\talk\\Request', 12, 6),
  (376, 'forma\\modules\\selling\\records\\talk\\Request', 13, 6),
  (377, 'forma\\modules\\selling\\records\\talk\\Request', 14, 6),
  (378, 'forma\\modules\\selling\\records\\talk\\Request', 15, 6),
  (379, 'forma\\modules\\selling\\records\\talk\\Request', 16, 6),
  (380, 'forma\\modules\\selling\\records\\talk\\Request', 17, 6),
  (381, 'forma\\modules\\selling\\records\\strategy\\Strategy', 1, 6),
  (382, 'forma\\modules\\customer\\records\\Customer', 100, 6),
  (383, 'forma\\modules\\hr\\records\\interview\\Interview', 27, 1),
  (385, 'forma\\modules\\customer\\records\\Customer', 101, 1),
  (389, 'forma\\modules\\customer\\records\\Customer', 102, 1),
  (390, 'forma\\modules\\worker\\records\\Worker', 32, 1),
  (392, 'forma\\modules\\project\\records\\project\\Project', 33, 1),
  (394, 'forma\\modules\\hr\\records\\interview\\Interview', 28, 1),
  (395, 'forma\\modules\\customer\\records\\Customer', 103, 6),
  (396, 'forma\\modules\\vacancy\\records\\Vacancy', 37, 1),
  (397, 'forma\\modules\\hr\\records\\interview\\Interview', 29, 1),
  (402, 'forma\\modules\\hr\\records\\interview\\Interview', 30, 1),
  (406, 'forma\\modules\\hr\\records\\interview\\Interview', 31, 1),
  (413, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 2, 6),
  (414, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 3, 6),
  (415, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 4, 6),
  (416, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 5, 6),
  (417, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 6, 6),
  (418, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 7, 6),
  (419, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 8, 6),
  (420, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 9, 6),
  (421, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 10, 6),
  (422, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 11, 6),
  (423, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 12, 6),
  (424, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 13, 6),
  (425, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 14, 6),
  (426, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 15, 6),
  (427, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 16, 6),
  (428, 'forma\\modules\\selling\\records\\selling\\Selling', 20, 6),
  (430, 'forma\\modules\\selling\\records\\selling\\Selling', 23, 6),
  (431, 'forma\\modules\\selling\\records\\selling\\Selling', 24, 6),
  (432, 'forma\\modules\\selling\\records\\selling\\Selling', 25, 6),
  (433, 'forma\\modules\\selling\\records\\selling\\Selling', 26, 6),
  (434, 'forma\\modules\\selling\\records\\selling\\Selling', 27, 6),
  (435, 'forma\\modules\\selling\\records\\selling\\Selling', 28, 6),
  (436, 'forma\\modules\\selling\\records\\selling\\Selling', 29, 6),
  (437, 'forma\\modules\\selling\\records\\selling\\Selling', 30, 6),
  (438, 'forma\\modules\\selling\\records\\selling\\Selling', 32, 6),
  (439, 'forma\\modules\\selling\\records\\selling\\Selling', 33, 6),
  (440, 'forma\\modules\\selling\\records\\selling\\Selling', 34, 6),
  (441, 'forma\\modules\\selling\\records\\selling\\Selling', 35, 6),
  (442, 'forma\\modules\\selling\\records\\selling\\Selling', 37, 6),
  (443, 'forma\\modules\\selling\\records\\selling\\Selling', 38, 6),
  (444, 'forma\\modules\\selling\\records\\selling\\Selling', 39, 6),
  (445, 'forma\\modules\\selling\\records\\selling\\Selling', 45, 6),
  (446, 'forma\\modules\\selling\\records\\selling\\Selling', 47, 6),
  (447, 'forma\\modules\\selling\\records\\selling\\Selling', 48, 6),
  (448, 'forma\\modules\\selling\\records\\selling\\Selling', 49, 6),
  (449, 'forma\\modules\\selling\\records\\selling\\Selling', 51, 6),
  (450, 'forma\\modules\\selling\\records\\selling\\Selling', 53, 6),
  (451, 'forma\\modules\\selling\\records\\selling\\Selling', 54, 6),
  (452, 'forma\\modules\\selling\\records\\selling\\Selling', 60, 6),
  (453, 'forma\\modules\\selling\\records\\selling\\Selling', 61, 6),
  (454, 'forma\\modules\\selling\\records\\selling\\Selling', 62, 6),
  (455, 'forma\\modules\\selling\\records\\selling\\Selling', 63, 6),
  (456, 'forma\\modules\\selling\\records\\selling\\Selling', 64, 6),
  (457, 'forma\\modules\\selling\\records\\selling\\Selling', 66, 6),
  (458, 'forma\\modules\\selling\\records\\selling\\Selling', 67, 6),
  (459, 'forma\\modules\\selling\\records\\selling\\Selling', 68, 6),
  (460, 'forma\\modules\\selling\\records\\selling\\Selling', 69, 6),
  (461, 'forma\\modules\\selling\\records\\selling\\Selling', 71, 6),
  (462, 'forma\\modules\\selling\\records\\selling\\Selling', 73, 6),
  (463, 'forma\\modules\\selling\\records\\selling\\Selling', 75, 6),
  (464, 'forma\\modules\\selling\\records\\selling\\Selling', 76, 6),
  (465, 'forma\\modules\\selling\\records\\selling\\Selling', 77, 6),
  (466, 'forma\\modules\\selling\\records\\selling\\Selling', 78, 6),
  (467, 'forma\\modules\\selling\\records\\selling\\Selling', 79, 6),
  (468, 'forma\\modules\\selling\\records\\selling\\Selling', 80, 6),
  (469, 'forma\\modules\\selling\\records\\selling\\Selling', 81, 6),
  (470, 'forma\\modules\\selling\\records\\selling\\Selling', 82, 6),
  (471, 'forma\\modules\\selling\\records\\selling\\Selling', 83, 6),
  (472, 'forma\\modules\\selling\\records\\selling\\Selling', 84, 6),
  (473, 'forma\\modules\\selling\\records\\selling\\Selling', 85, 6),
  (474, 'forma\\modules\\selling\\records\\selling\\Selling', 86, 6),
  (475, 'forma\\modules\\selling\\records\\selling\\Selling', 87, 6),
  (476, 'forma\\modules\\selling\\records\\selling\\Selling', 88, 6),
  (477, 'forma\\modules\\selling\\records\\selling\\Selling', 89, 6),
  (478, 'forma\\modules\\selling\\records\\selling\\Selling', 90, 6),
  (479, 'forma\\modules\\selling\\records\\selling\\Selling', 91, 6),
  (480, 'forma\\modules\\selling\\records\\selling\\Selling', 92, 6),
  (481, 'forma\\modules\\selling\\records\\selling\\Selling', 93, 6),
  (482, 'forma\\modules\\selling\\records\\selling\\Selling', 94, 6),
  (483, 'forma\\modules\\selling\\records\\selling\\Selling', 95, 6),
  (484, 'forma\\modules\\selling\\records\\selling\\Selling', 96, 6),
  (485, 'forma\\modules\\selling\\records\\selling\\Selling', 97, 6),
  (486, 'forma\\modules\\selling\\records\\selling\\Selling', 98, 6),
  (487, 'forma\\modules\\selling\\records\\selling\\Selling', 99, 6),
  (488, 'forma\\modules\\selling\\records\\selling\\Selling', 100, 6),
  (489, 'forma\\modules\\selling\\records\\selling\\Selling', 101, 6),
  (490, 'forma\\modules\\selling\\records\\selling\\Selling', 102, 6),
  (491, 'forma\\modules\\selling\\records\\selling\\Selling', 103, 6),
  (492, 'forma\\modules\\selling\\records\\selling\\Selling', 104, 6),
  (493, 'forma\\modules\\selling\\records\\selling\\Selling', 105, 6),
  (494, 'forma\\modules\\selling\\records\\selling\\Selling', 106, 6),
  (495, 'forma\\modules\\selling\\records\\selling\\Selling', 107, 6),
  (496, 'forma\\modules\\selling\\records\\selling\\Selling', 108, 6),
  (497, 'forma\\modules\\selling\\records\\selling\\Selling', 109, 6),
  (498, 'forma\\modules\\selling\\records\\selling\\Selling', 110, 6),
  (499, 'forma\\modules\\selling\\records\\selling\\Selling', 111, 6),
  (500, 'forma\\modules\\selling\\records\\selling\\Selling', 112, 6),
  (501, 'forma\\modules\\selling\\records\\selling\\Selling', 113, 6),
  (502, 'forma\\modules\\selling\\records\\selling\\Selling', 114, 6),
  (503, 'forma\\modules\\selling\\records\\selling\\Selling', 115, 6),
  (504, 'forma\\modules\\selling\\records\\selling\\Selling', 116, 6),
  (505, 'forma\\modules\\selling\\records\\selling\\Selling', 117, 6),
  (506, 'forma\\modules\\selling\\records\\selling\\Selling', 118, 6),
  (507, 'forma\\modules\\selling\\records\\selling\\Selling', 119, 6),
  (508, 'forma\\modules\\selling\\records\\selling\\Selling', 120, 6),
  (509, 'forma\\modules\\selling\\records\\selling\\Selling', 121, 6),
  (510, 'forma\\modules\\hr\\records\\interview\\Interview', 32, 6),
  (513, 'forma\\modules\\vacancy\\records\\Vacancy', 38, 1),
  (603, 'forma\\modules\\vacancy\\records\\Vacancy', 39, 14),
  (604, 'forma\\modules\\vacancy\\records\\Vacancy', 40, 14),
  (605, 'forma\\modules\\vacancy\\records\\Vacancy', 41, 14),
  (606, 'forma\\modules\\vacancy\\records\\Vacancy', 42, 13),
  (607, 'forma\\modules\\vacancy\\records\\Vacancy', 43, 13),
  (608, 'forma\\modules\\vacancy\\records\\Vacancy', 44, 13),
  (609, 'forma\\modules\\vacancy\\records\\Vacancy', 45, 15),
  (610, 'forma\\modules\\vacancy\\records\\Vacancy', 46, 15),
  (611, 'forma\\modules\\vacancy\\records\\Vacancy', 47, 15),
  (612, 'forma\\modules\\worker\\records\\Worker', 33, 14),
  (613, 'forma\\modules\\worker\\records\\Worker', 34, 14),
  (614, 'forma\\modules\\worker\\records\\Worker', 35, 14),
  (615, 'forma\\modules\\worker\\records\\Worker', 36, 13),
  (616, 'forma\\modules\\worker\\records\\Worker', 37, 13),
  (617, 'forma\\modules\\worker\\records\\Worker', 38, 13),
  (618, 'forma\\modules\\worker\\records\\Worker', 39, 15),
  (619, 'forma\\modules\\worker\\records\\Worker', 40, 15),
  (620, 'forma\\modules\\worker\\records\\Worker', 41, 15),
  (621, 'forma\\modules\\project\\records\\project\\Project', 34, 14),
  (622, 'forma\\modules\\project\\records\\project\\Project', 35, 14),
  (623, 'forma\\modules\\project\\records\\project\\Project', 36, 14),
  (630, 'forma\\modules\\project\\records\\project\\Project', 40, 15),
  (631, 'forma\\modules\\project\\records\\project\\Project', 41, 13),
  (632, 'forma\\modules\\project\\records\\project\\Project', 38, 13),
  (633, 'forma\\modules\\project\\records\\project\\Project', 42, 13),
  (634, 'forma\\modules\\project\\records\\project\\Project', 43, 15),
  (635, 'forma\\modules\\project\\records\\project\\Project', 42, 15),
  (636, 'forma\\modules\\project\\records\\project\\Project', 41, 15),
  (637, 'forma\\modules\\project\\records\\project\\Project', 35, 15),
  (638, 'forma\\modules\\project\\records\\project\\Project', 36, 15),
  (639, 'forma\\modules\\project\\records\\project\\Project', 34, 15),
  (640, 'forma\\modules\\project\\records\\project\\Project', 44, 13),
  (641, 'forma\\modules\\project\\records\\project\\Project', 45, 15),
  (642, 'forma\\modules\\project\\records\\project\\Project', 46, 13),
  (659, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 10, 14),
  (660, 'forma\\modules\\vacancy\\records\\Vacancy', 42, 14),
  (661, 'forma\\modules\\vacancy\\records\\Vacancy', 43, 14),
  (662, 'forma\\modules\\vacancy\\records\\Vacancy', 44, 14),
  (663, 'forma\\modules\\vacancy\\records\\Vacancy', 45, 14),
  (664, 'forma\\modules\\vacancy\\records\\Vacancy', 46, 14),
  (665, 'forma\\modules\\vacancy\\records\\Vacancy', 47, 14),
  (666, 'forma\\modules\\hr\\records\\interview\\Interview', 51, 14),
  (667, 'forma\\modules\\hr\\records\\interview\\Interview', 50, 14),
  (668, 'forma\\modules\\worker\\records\\Worker', 21, 14),
  (669, 'forma\\modules\\worker\\records\\Worker', 39, 14),
  (670, 'forma\\modules\\hr\\records\\interview\\Interview', 52, 14),
  (671, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 8, 14),
  (672, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 11, 14),
  (673, 'forma\\modules\\worker\\records\\Worker', 37, 14),
  (674, 'forma\\modules\\hr\\records\\interview\\Interview', 53, 14),
  (675, 'forma\\modules\\selling\\records\\strategy\\Strategy', 3, 14),
  (676, 'forma\\modules\\selling\\records\\talk\\Request', 18, 14),
  (677, 'forma\\modules\\selling\\records\\talk\\Request', 19, 14),
  (678, 'forma\\modules\\selling\\records\\talk\\Request', 20, 14),
  (679, 'forma\\modules\\selling\\records\\talk\\Request', 21, 14),
  (680, 'forma\\modules\\selling\\records\\talk\\Request', 22, 14),
  (682, 'forma\\modules\\selling\\records\\talk\\Request', 23, 14),
  (683, 'forma\\modules\\selling\\records\\talk\\Request', 24, 14),
  (684, 'forma\\modules\\selling\\records\\talk\\Request', 25, 14),
  (685, 'forma\\modules\\selling\\records\\talk\\Request', 26, 14),
  (686, 'forma\\modules\\worker\\records\\Worker', 42, 14),
  (687, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 17, 14),
  (688, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 18, 14),
  (689, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 19, 14),
  (690, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 20, 14),
  (691, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 21, 14),
  (692, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 22, 14),
  (693, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 23, 14),
  (694, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 24, 14),
  (695, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 25, 14),
  (707, 'forma\\modules\\worker\\records\\Worker', 14, 13),
  (708, 'forma\\modules\\worker\\records\\Worker', 16, 13),
  (709, 'forma\\modules\\worker\\records\\Worker', 33, 13),
  (710, 'forma\\modules\\worker\\records\\Worker', 34, 13),
  (711, 'forma\\modules\\worker\\records\\Worker', 35, 13),
  (723, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 17, 14),
  (724, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 18, 14),
  (725, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 19, 14),
  (726, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 20, 14),
  (728, 'forma\\modules\\hr\\records\\interview\\Interview', 58, 14),
  (730, 'forma\\modules\\hr\\records\\interview\\Interview', 60, 13),
  (731, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 21, 13),
  (732, 'forma\\modules\\hr\\records\\interview\\Interview', 61, 13),
  (733, 'forma\\modules\\hr\\records\\interview\\Interview', 62, 13),
  (734, 'forma\\modules\\hr\\records\\interview\\Interview', 58, 13),
  (735, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 17, 13),
  (736, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 19, 13),
  (737, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 22, 13),
  (738, 'forma\\modules\\hr\\records\\interview\\Interview', 63, 13),
  (739, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 23, 15),
  (740, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 24, 15),
  (741, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 25, 15),
  (742, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 26, 15),
  (743, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 27, 15),
  (744, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 28, 13),
  (746, 'forma\\modules\\worker\\records\\Worker', 17, 15),
  (747, 'forma\\modules\\worker\\records\\Worker', 16, 14),
  (748, 'forma\\modules\\worker\\records\\Worker', 17, 14),
  (877, 'forma\\modules\\worker\\records\\Worker', 76, 14),
  (878, 'forma\\modules\\hr\\records\\interview\\Interview', 96, 14),
  (892, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 83, 9),
  (893, 'forma\\modules\\project\\records\\project\\Project', 36, 9),
  (894, 'forma\\modules\\vacancy\\records\\Vacancy', 66, 9),
  (895, 'forma\\modules\\worker\\records\\Worker', 78, 9),
  (896, 'forma\\modules\\project\\records\\project\\Project', 60, 9),
  (897, 'forma\\modules\\hr\\records\\interview\\Interview', 100, 9),
  (898, 'forma\\modules\\project\\records\\project\\Project', 61, 9),
  (899, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 84, 9),
  (900, 'forma\\modules\\project\\records\\project\\Project', 62, 9),
  (901, 'forma\\modules\\project\\records\\project\\Project', 63, 9),
  (902, 'forma\\modules\\project\\records\\project\\Project', 64, 9),
  (903, 'forma\\modules\\project\\records\\project\\Project', 65, 9),
  (904, 'forma\\modules\\project\\records\\project\\Project', 66, 9),
  (905, 'forma\\modules\\project\\records\\project\\Project', 67, 9),
  (906, 'forma\\modules\\project\\records\\project\\Project', 68, 9),
  (907, 'forma\\modules\\project\\records\\project\\Project', 69, 9),
  (908, 'forma\\modules\\project\\records\\project\\Project', 70, 9),
  (909, 'forma\\modules\\vacancy\\records\\Vacancy', 67, 9),
  (910, 'forma\\modules\\vacancy\\records\\Vacancy', 68, 9),
  (911, 'forma\\modules\\selling\\records\\selling\\Selling', 142, 1),
  (912, 'forma\\modules\\selling\\records\\selling\\Selling', 143, 1),
  (913, 'forma\\modules\\worker\\records\\Worker', 79, 1),
  (914, 'forma\\modules\\worker\\records\\Worker', 80, 1),
  (915, 'forma\\modules\\worker\\records\\Worker', 81, 1),
  (916, 'forma\\modules\\hr\\records\\interview\\Interview', 101, 1),
  (917, 'forma\\modules\\customer\\records\\Customer', 104, 9),
  (918, 'forma\\modules\\customer\\records\\Customer', 105, 9),
  (919, 'forma\\modules\\customer\\records\\Customer', 106, 9),
  (920, 'forma\\modules\\customer\\records\\Customer', 107, 9),
  (921, 'forma\\modules\\selling\\records\\selling\\Selling', 144, 9),
  (922, 'forma\\modules\\selling\\records\\selling\\Selling', 145, 9),
  (923, 'forma\\modules\\selling\\records\\selling\\Selling', 146, 9),
  (924, 'forma\\modules\\selling\\records\\selling\\Selling', 147, 9),
  (925, 'forma\\modules\\selling\\records\\selling\\Selling', 148, 9),
  (926, 'forma\\modules\\selling\\records\\selling\\Selling', 149, 9),
  (927, 'forma\\modules\\selling\\records\\selling\\Selling', 150, 9),
  (928, 'forma\\modules\\selling\\records\\selling\\Selling', 151, 9),
  (929, 'forma\\modules\\customer\\records\\Customer', 108, 6),
  (930, 'forma\\modules\\selling\\records\\selling\\Selling', 152, 6),
  (931, 'forma\\modules\\selling\\records\\selling\\Selling', 153, 1),
  (932, 'forma\\modules\\selling\\records\\selling\\Selling', 154, 1),
  (933, 'forma\\modules\\selling\\records\\selling\\Selling', 155, 1),
  (934, 'forma\\modules\\selling\\records\\selling\\Selling', 156, 1),
  (935, 'forma\\modules\\customer\\records\\Customer', 109, 6),
  (936, 'forma\\modules\\selling\\records\\selling\\Selling', 157, 6),
  (937, 'forma\\modules\\selling\\records\\selling\\Selling', 158, 1),
  (938, 'forma\\modules\\selling\\records\\selling\\Selling', 159, 1),
  (939, 'forma\\modules\\selling\\records\\selling\\Selling', 160, 1),
  (940, 'forma\\modules\\selling\\records\\selling\\Selling', 161, 1),
  (941, 'forma\\modules\\selling\\records\\selling\\Selling', 162, 1),
  (942, 'forma\\modules\\selling\\records\\selling\\Selling', 163, 1),
  (943, 'forma\\modules\\selling\\records\\selling\\Selling', 164, 1),
  (944, 'forma\\modules\\selling\\records\\selling\\Selling', 165, 1),
  (945, 'forma\\modules\\selling\\records\\selling\\Selling', 166, 1),
  (946, 'forma\\modules\\selling\\records\\selling\\Selling', 167, 1),
  (947, 'forma\\modules\\selling\\records\\selling\\Selling', 168, 1),
  (948, 'forma\\modules\\selling\\records\\selling\\Selling', 169, 1),
  (949, 'forma\\modules\\selling\\records\\selling\\Selling', 170, 1),
  (950, 'forma\\modules\\selling\\records\\selling\\Selling', 171, 1),
  (951, 'forma\\modules\\selling\\records\\selling\\Selling', 172, 1),
  (952, 'forma\\modules\\selling\\records\\selling\\Selling', 173, 1),
  (953, 'forma\\modules\\selling\\records\\selling\\Selling', 174, 1),
  (954, 'forma\\modules\\selling\\records\\selling\\Selling', 175, 1),
  (955, 'forma\\modules\\selling\\records\\selling\\Selling', 176, 1),
  (956, 'forma\\modules\\selling\\records\\selling\\Selling', 177, 1),
  (957, 'forma\\modules\\selling\\records\\selling\\Selling', 178, 1),
  (958, 'forma\\modules\\selling\\records\\selling\\Selling', 179, 1),
  (959, 'forma\\modules\\selling\\records\\selling\\Selling', 180, 1),
  (960, 'forma\\modules\\selling\\records\\selling\\Selling', 181, 1),
  (961, 'forma\\modules\\selling\\records\\selling\\Selling', 182, 1),
  (962, 'forma\\modules\\selling\\records\\selling\\Selling', 183, 1),
  (963, 'forma\\modules\\selling\\records\\selling\\Selling', 184, 1),
  (964, 'forma\\modules\\selling\\records\\selling\\Selling', 185, 1),
  (965, 'forma\\modules\\selling\\records\\selling\\Selling', 186, 1),
  (966, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 85, 6),
  (967, 'forma\\modules\\worker\\records\\Worker', 82, 6),
  (968, 'forma\\modules\\hr\\records\\interview\\Interview', 102, 6),
  (969, 'forma\\modules\\selling\\records\\selling\\Selling', 137, 6),
  (970, 'forma\\modules\\selling\\records\\selling\\Selling', 138, 6),
  (971, 'forma\\modules\\selling\\records\\selling\\Selling', 136, 6),
  (972, 'forma\\modules\\selling\\records\\selling\\Selling', 134, 6),
  (973, 'forma\\modules\\selling\\records\\selling\\Selling', 132, 6),
  (974, 'forma\\modules\\selling\\records\\selling\\Selling', 131, 6),
  (975, 'forma\\modules\\selling\\records\\selling\\Selling', 129, 6),
  (976, 'forma\\modules\\selling\\records\\selling\\Selling', 124, 6),
  (977, 'forma\\modules\\selling\\records\\selling\\Selling', 122, 6),
  (978, 'forma\\modules\\selling\\records\\selling\\Selling', 130, 6),
  (979, 'forma\\modules\\selling\\records\\selling\\Selling', 133, 6),
  (980, 'forma\\modules\\project\\records\\project\\Project', 71, 9),
  (981, 'forma\\modules\\vacancy\\records\\Vacancy', 69, 9),
  (982, 'forma\\modules\\worker\\records\\Worker', 83, 9),
  (983, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 86, 9),
  (984, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 87, 9),
  (985, 'forma\\modules\\project\\records\\project\\Project', 72, 9),
  (986, 'forma\\modules\\vacancy\\records\\Vacancy', 70, 9),
  (987, 'forma\\modules\\worker\\records\\Worker', 84, 9),
  (988, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 88, 9),
  (989, 'forma\\modules\\hr\\records\\interview\\Interview', 103, 9),
  (990, 'forma\\modules\\customer\\records\\Customer', 110, 6),
  (991, 'forma\\modules\\selling\\records\\selling\\Selling', 187, 6),
  (992, 'forma\\modules\\customer\\records\\Customer', 111, 6),
  (993, 'forma\\modules\\selling\\records\\selling\\Selling', 188, 6),
  (994, 'forma\\modules\\customer\\records\\Customer', 112, 6),
  (995, 'forma\\modules\\selling\\records\\selling\\Selling', 189, 6),
  (996, 'forma\\modules\\vacancy\\records\\Vacancy', 37, 9),
  (997, 'forma\\modules\\selling\\records\\talk\\Request', 27, 9),
  (998, 'forma\\modules\\selling\\records\\talk\\Request', 28, 9),
  (999, 'forma\\modules\\selling\\records\\talk\\Request', 29, 9),
  (1000, 'forma\\modules\\selling\\records\\talk\\Request', 30, 9),
  (1001, 'forma\\modules\\selling\\records\\talk\\Request', 31, 9),
  (1002, 'forma\\modules\\selling\\records\\talk\\Request', 32, 9),
  (1003, 'forma\\modules\\selling\\records\\talk\\Request', 33, 9),
  (1004, 'forma\\modules\\selling\\records\\talk\\Request', 34, 9),
  (1005, 'forma\\modules\\selling\\records\\strategy\\Strategy', 4, 9),
  (1006, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 26, 9),
  (1007, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 27, 9),
  (1008, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 28, 9),
  (1009, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 29, 9),
  (1010, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 30, 9),
  (1011, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 31, 9),
  (1012, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 32, 9),
  (1013, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 33, 9),
  (1014, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 34, 9),
  (1015, 'forma\\modules\\selling\\records\\selling\\Selling', 190, 1),
  (1016, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 89, 1),
  (1017, 'forma\\modules\\worker\\records\\Worker', 85, 1),
  (1018, 'forma\\modules\\hr\\records\\interview\\Interview', 104, 1),
  (1019, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 90, 1),
  (1020, 'forma\\modules\\hr\\records\\interview\\Interview', 105, 1),
  (1021, 'forma\\modules\\worker\\records\\Worker', 86, 1),
  (1022, 'forma\\modules\\hr\\records\\interview\\Interview', 106, 1),
  (1023, 'forma\\modules\\worker\\records\\Worker', 87, 1),
  (1024, 'forma\\modules\\hr\\records\\interview\\Interview', 107, 1),
  (1025, 'forma\\modules\\worker\\records\\Worker', 88, 1),
  (1026, 'forma\\modules\\hr\\records\\interview\\Interview', 108, 1),
  (1027, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 91, 1),
  (1028, 'forma\\modules\\worker\\records\\Worker', 89, 1),
  (1029, 'forma\\modules\\hr\\records\\interview\\Interview', 109, 1),
  (1030, 'forma\\modules\\worker\\records\\Worker', 90, 1),
  (1031, 'forma\\modules\\hr\\records\\interview\\Interview', 110, 1),
  (1032, 'forma\\modules\\worker\\records\\Worker', 91, 1),
  (1033, 'forma\\modules\\hr\\records\\interview\\Interview', 111, 1),
  (1034, 'forma\\modules\\selling\\records\\selling\\Selling', 191, 1),
  (1035, 'forma\\modules\\customer\\records\\Customer', 113, 1),
  (1036, 'forma\\modules\\selling\\records\\selling\\Selling', 192, 1),
  (1037, 'forma\\modules\\customer\\records\\Customer', 114, 16),
  (1038, 'forma\\modules\\selling\\records\\selling\\Selling', 193, 16),
  (1039, 'forma\\modules\\selling\\records\\selling\\Selling', 194, 16),
  (1040, 'forma\\modules\\customer\\records\\Customer', 115, 16),
  (1041, 'forma\\modules\\selling\\records\\selling\\Selling', 195, 16),
  (1042, 'forma\\modules\\customer\\records\\Customer', 116, 16),
  (1043, 'forma\\modules\\selling\\records\\selling\\Selling', 196, 16),
  (1044, 'forma\\modules\\customer\\records\\Customer', 117, 16),
  (1045, 'forma\\modules\\selling\\records\\selling\\Selling', 197, 16),
  (1046, 'forma\\modules\\customer\\records\\Customer', 118, 16),
  (1047, 'forma\\modules\\selling\\records\\selling\\Selling', 198, 16),
  (1048, 'forma\\modules\\customer\\records\\Customer', 119, 16),
  (1049, 'forma\\modules\\selling\\records\\selling\\Selling', 199, 16),
  (1050, 'forma\\modules\\customer\\records\\Customer', 120, 16),
  (1051, 'forma\\modules\\selling\\records\\selling\\Selling', 200, 16),
  (1052, 'forma\\modules\\selling\\records\\selling\\Selling', 201, 16),
  (1053, 'forma\\modules\\customer\\records\\Customer', 121, 16),
  (1054, 'forma\\modules\\selling\\records\\selling\\Selling', 202, 16),
  (1055, 'forma\\modules\\customer\\records\\Customer', 122, 16),
  (1056, 'forma\\modules\\selling\\records\\selling\\Selling', 203, 16),
  (1057, 'forma\\modules\\customer\\records\\Customer', 123, 16),
  (1058, 'forma\\modules\\selling\\records\\selling\\Selling', 204, 16),
  (1059, 'forma\\modules\\customer\\records\\Customer', 124, 16),
  (1060, 'forma\\modules\\selling\\records\\selling\\Selling', 205, 16),
  (1061, 'forma\\modules\\customer\\records\\Customer', 125, 16),
  (1062, 'forma\\modules\\selling\\records\\selling\\Selling', 206, 16),
  (1063, 'forma\\modules\\customer\\records\\Customer', 126, 16),
  (1064, 'forma\\modules\\selling\\records\\selling\\Selling', 207, 16),
  (1065, 'forma\\modules\\customer\\records\\Customer', 127, 16),
  (1066, 'forma\\modules\\selling\\records\\selling\\Selling', 208, 16),
  (1067, 'forma\\modules\\customer\\records\\Customer', 128, 16),
  (1068, 'forma\\modules\\selling\\records\\selling\\Selling', 209, 16),
  (1069, 'forma\\modules\\customer\\records\\Customer', 129, 16),
  (1070, 'forma\\modules\\selling\\records\\selling\\Selling', 210, 16),
  (1071, 'forma\\modules\\customer\\records\\Customer', 130, 16),
  (1072, 'forma\\modules\\selling\\records\\selling\\Selling', 211, 16),
  (1073, 'forma\\modules\\customer\\records\\Customer', 131, 16),
  (1074, 'forma\\modules\\selling\\records\\selling\\Selling', 212, 16),
  (1075, 'forma\\modules\\customer\\records\\Customer', 132, 16),
  (1076, 'forma\\modules\\selling\\records\\selling\\Selling', 213, 16),
  (1077, 'forma\\modules\\customer\\records\\Customer', 133, 16),
  (1078, 'forma\\modules\\selling\\records\\selling\\Selling', 214, 16),
  (1079, 'forma\\modules\\customer\\records\\Customer', 134, 16),
  (1080, 'forma\\modules\\selling\\records\\selling\\Selling', 215, 16),
  (1081, 'forma\\modules\\customer\\records\\Customer', 135, 16),
  (1082, 'forma\\modules\\selling\\records\\selling\\Selling', 216, 16),
  (1083, 'forma\\modules\\customer\\records\\Customer', 136, 6),
  (1084, 'forma\\modules\\selling\\records\\selling\\Selling', 217, 1),
  (1085, 'forma\\modules\\customer\\records\\Customer', 137, 16),
  (1086, 'forma\\modules\\selling\\records\\selling\\Selling', 218, 16),
  (1087, 'forma\\modules\\customer\\records\\Customer', 138, 16),
  (1088, 'forma\\modules\\selling\\records\\selling\\Selling', 219, 16),
  (1089, 'forma\\modules\\customer\\records\\Customer', 139, 16),
  (1090, 'forma\\modules\\selling\\records\\selling\\Selling', 220, 16),
  (1091, 'forma\\modules\\customer\\records\\Customer', 140, 16),
  (1092, 'forma\\modules\\selling\\records\\selling\\Selling', 221, 16),
  (1093, 'forma\\modules\\customer\\records\\Customer', 141, 16),
  (1094, 'forma\\modules\\selling\\records\\selling\\Selling', 222, 16),
  (1095, 'forma\\modules\\customer\\records\\Customer', 142, 16),
  (1096, 'forma\\modules\\selling\\records\\selling\\Selling', 223, 16),
  (1097, 'forma\\modules\\customer\\records\\Customer', 143, 16),
  (1098, 'forma\\modules\\selling\\records\\selling\\Selling', 224, 16),
  (1099, 'forma\\modules\\customer\\records\\Customer', 144, 16),
  (1100, 'forma\\modules\\selling\\records\\selling\\Selling', 225, 16),
  (1101, 'forma\\modules\\customer\\records\\Customer', 145, 16),
  (1102, 'forma\\modules\\selling\\records\\selling\\Selling', 226, 16),
  (1103, 'forma\\modules\\selling\\records\\selling\\Selling', 227, 1),
  (1104, 'forma\\modules\\customer\\records\\Customer', 146, 6),
  (1105, 'forma\\modules\\worker\\records\\Worker', 92, 1),
  (1106, 'forma\\modules\\selling\\records\\strategy\\Strategy', 5, 1),
  (1107, 'forma\\modules\\selling\\records\\talk\\Request', 35, 1),
  (1108, 'forma\\modules\\selling\\records\\talk\\Answer', 40, 1),
  (1109, 'forma\\modules\\selling\\records\\talk\\Answer', 41, 9),
  (1110, 'forma\\modules\\selling\\records\\talk\\Answer', 42, 9),
  (1111, 'forma\\modules\\worker\\records\\Worker', 93, 9),
  (1112, 'forma\\modules\\hr\\records\\interview\\Interview', 112, 9),
  (1113, 'forma\\modules\\selling\\records\\talk\\Answer', 43, 9),
  (1114, 'forma\\modules\\hr\\records\\interview\\Interview', 113, 1),
  (1115, 'forma\\modules\\project\\records\\project\\Project', 73, 17),
  (1116, 'forma\\modules\\vacancy\\records\\Vacancy', 71, 17),
  (1117, 'forma\\modules\\vacancy\\records\\Vacancy', 72, 9),
  (1118, 'forma\\modules\\worker\\records\\Worker', 94, 17),
  (1119, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 92, 9),
  (1120, 'forma\\modules\\selling\\records\\talk\\Request', 36, 17),
  (1121, 'forma\\modules\\worker\\records\\Worker', 95, 9),
  (1122, 'forma\\modules\\hr\\records\\interview\\Interview', 114, 9),
  (1123, 'forma\\modules\\selling\\records\\talk\\Answer', 44, 17),
  (1124, 'forma\\modules\\selling\\records\\strategy\\Strategy', 6, 17),
  (1125, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 93, 17),
  (1126, 'forma\\modules\\hr\\records\\interview\\Interview', 115, 17),
  (1127, 'forma\\modules\\selling\\records\\talk\\Answer', 45, 9),
  (1128, 'forma\\modules\\selling\\records\\strategy\\Strategy', 7, 17),
  (1129, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 35, 17),
  (1130, 'forma\\modules\\hr\\records\\interview\\Interview', 116, 17),
  (1131, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 94, 9),
  (1132, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 95, 9),
  (1133, 'forma\\modules\\hr\\records\\interview\\Interview', 117, 9),
  (1134, 'forma\\modules\\selling\\records\\talk\\Answer', 46, 17),
  (1135, 'forma\\modules\\selling\\records\\talk\\Answer', 47, 9),
  (1136, 'forma\\modules\\hr\\records\\interview\\Interview', 118, 9),
  (1137, 'forma\\modules\\selling\\records\\talk\\Request', 37, 1),
  (1138, 'forma\\modules\\selling\\records\\talk\\Answer', 48, 1),
  (1139, 'forma\\modules\\selling\\records\\talk\\Answer', 49, 1),
  (1140, 'forma\\modules\\selling\\records\\talk\\Request', 38, 1),
  (1141, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 96, 9),
  (1142, 'forma\\modules\\selling\\records\\talk\\Answer', 50, 1),
  (1143, 'forma\\modules\\selling\\records\\talk\\Request', 39, 17),
  (1144, 'forma\\modules\\hr\\records\\interview\\Interview', 119, 9),
  (1145, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 36, 1),
  (1146, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 37, 1),
  (1147, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 97, 18),
  (1148, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 98, 18),
  (1149, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 99, 9),
  (1150, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 100, 18),
  (1151, 'forma\\modules\\worker\\records\\Worker', 96, 9),
  (1152, 'forma\\modules\\hr\\records\\interview\\Interview', 120, 9),
  (1153, 'forma\\modules\\hr\\records\\interview\\Interview', 101, 18),
  (1154, 'forma\\modules\\worker\\records\\Worker', 81, 18),
  (1155, 'forma\\modules\\worker\\records\\Worker', 3, 18),
  (1156, 'forma\\modules\\worker\\records\\Worker', 1, 18),
  (1157, 'forma\\modules\\hr\\records\\interview\\Interview', 105, 18),
  (1158, 'forma\\modules\\hr\\records\\interview\\Interview', 121, 1),
  (1159, 'forma\\modules\\hr\\records\\interview\\Interview', 122, 1),
  (1160, 'forma\\modules\\hr\\records\\interview\\Interview', 123, 1),
  (1161, 'forma\\modules\\hr\\records\\interview\\Interview', 124, 1),
  (1162, 'forma\\modules\\hr\\records\\interview\\Interview', 125, 1),
  (1163, 'forma\\modules\\hr\\records\\interview\\Interview', 126, 1),
  (1164, 'forma\\modules\\hr\\records\\interview\\Interview', 127, 1),
  (1165, 'forma\\modules\\selling\\records\\talk\\Answer', 51, 9),
  (1166, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 101, 9),
  (1167, 'forma\\modules\\project\\records\\project\\Project', 74, 19),
  (1168, 'forma\\modules\\vacancy\\records\\Vacancy', 73, 19),
  (1169, 'forma\\modules\\worker\\records\\Worker', 97, 19),
  (1170, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 102, 19),
  (1171, 'forma\\modules\\hr\\records\\interview\\Interview', 128, 19),
  (1172, 'forma\\modules\\selling\\records\\talk\\Request', 40, 19),
  (1173, 'forma\\modules\\selling\\records\\talk\\Answer', 52, 19),
  (1174, 'forma\\modules\\selling\\records\\strategy\\Strategy', 8, 19),
  (1175, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 38, 19),
  (1176, 'forma\\modules\\project\\records\\project\\Project', 75, 20),
  (1177, 'forma\\modules\\project\\records\\project\\Project', 76, 20),
  (1178, 'forma\\modules\\project\\records\\project\\Project', 77, 20),
  (1179, 'forma\\modules\\vacancy\\records\\Vacancy', 74, 20),
  (1180, 'forma\\modules\\vacancy\\records\\Vacancy', 75, 20),
  (1181, 'forma\\modules\\vacancy\\records\\Vacancy', 76, 20),
  (1182, 'forma\\modules\\worker\\records\\Worker', 98, 20),
  (1183, 'forma\\modules\\worker\\records\\Worker', 99, 20),
  (1184, 'forma\\modules\\worker\\records\\Worker', 100, 20),
  (1185, 'forma\\modules\\selling\\records\\talk\\Request', 41, 20),
  (1186, 'forma\\modules\\selling\\records\\talk\\Request', 42, 20),
  (1187, 'forma\\modules\\selling\\records\\talk\\Request', 43, 20),
  (1188, 'forma\\modules\\selling\\records\\talk\\Answer', 53, 20),
  (1189, 'forma\\modules\\selling\\records\\talk\\Answer', 54, 20),
  (1190, 'forma\\modules\\selling\\records\\talk\\Answer', 55, 20),
  (1191, 'forma\\modules\\selling\\records\\strategy\\Strategy', 9, 20),
  (1192, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 39, 20),
  (1193, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 40, 20),
  (1194, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 41, 20),
  (1195, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 103, 20),
  (1196, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 104, 20),
  (1197, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 105, 20),
  (1198, 'forma\\modules\\hr\\records\\interview\\Interview', 129, 20),
  (1199, 'forma\\modules\\selling\\records\\talk\\Answer', 56, 20),
  (1200, 'forma\\modules\\hr\\records\\interview\\Interview', 130, 21),
  (1201, 'forma\\modules\\worker\\records\\Worker', 98, 21),
  (1202, 'forma\\modules\\project\\records\\project\\Project', 78, 9),
  (1203, 'forma\\modules\\vacancy\\records\\Vacancy', 77, 9),
  (1204, 'forma\\modules\\worker\\records\\Worker', 101, 9),
  (1205, 'forma\\modules\\selling\\records\\talk\\Request', 44, 9),
  (1206, 'forma\\modules\\selling\\records\\talk\\Answer', 57, 9),
  (1207, 'forma\\modules\\selling\\records\\strategy\\Strategy', 10, 9),
  (1208, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 42, 9),
  (1209, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 106, 9),
  (1210, 'forma\\modules\\hr\\records\\interview\\Interview', 131, 9),
  (1211, 'forma\\modules\\hr\\records\\interview\\Interview', 132, 1),
  (1212, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 98, 1),
  (1213, 'forma\\modules\\selling\\records\\talk\\Answer', 58, 1),
  (1214, 'forma\\modules\\selling\\records\\talk\\Request', 45, 18),
  (1215, 'forma\\modules\\selling\\records\\talk\\Answer', 59, 18),
  (1216, 'forma\\modules\\selling\\records\\talk\\Answer', 60, 18),
  (1217, 'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy', 43, 18),
  (1218, 'forma\\modules\\hr\\records\\interview\\Interview', 111, 18),
  (1219, 'forma\\modules\\selling\\records\\talk\\Answer', 58, 18),
  (1220, 'forma\\modules\\hr\\records\\interview\\Interview', 133, 1),
  (1221, 'forma\\modules\\selling\\records\\talk\\Answer', 61, 9),
  (1222, 'forma\\modules\\selling\\records\\talk\\Answer', 62, 9),
  (1223, 'forma\\modules\\selling\\records\\talk\\Answer', 63, 9),
  (1224, 'forma\\modules\\selling\\records\\talk\\Answer', 64, 9),
  (1225, 'forma\\modules\\selling\\records\\talk\\Answer', 65, 9),
  (1226, 'forma\\modules\\selling\\records\\talk\\Answer', 66, 9),
  (1227, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 107, 9),
  (1228, 'forma\\modules\\purchase\\records\\purchase\\Purchase', 17, 1),
  (1229, 'forma\\modules\\product\\records\\Product', 21, 1),
  (1230, 'forma\\modules\\inventorization\\records\\Inventorization', 1, 1),
  (1231, 'forma\\modules\\worker\\records\\Worker', 102, 9),
  (1232, 'forma\\modules\\worker\\records\\Worker', 103, 9),
  (1233, 'forma\\modules\\vacancy\\records\\Vacancy', 78, 9),
  (1234, 'forma\\modules\\vacancy\\records\\Vacancy', 79, 9),
  (1235, 'forma\\modules\\vacancy\\records\\Vacancy', 80, 9),
  (1236, 'forma\\modules\\worker\\records\\Worker', 104, 9),
  (1237, 'forma\\modules\\worker\\records\\Worker', 105, 9),
  (1238, 'forma\\modules\\vacancy\\records\\Vacancy', 81, 9),
  (1239, 'forma\\modules\\worker\\records\\Worker', 106, 9),
  (1240, 'forma\\modules\\vacancy\\records\\Vacancy', 82, 9),
  (1241, 'forma\\modules\\worker\\records\\Worker', 107, 9),
  (1242, 'forma\\modules\\worker\\records\\Worker', 108, 9),
  (1243, 'forma\\modules\\worker\\records\\Worker', 109, 9),
  (1244, 'forma\\modules\\worker\\records\\Worker', 110, 9),
  (1245, 'forma\\modules\\worker\\records\\Worker', 111, 9),
  (1246, 'forma\\modules\\worker\\records\\Worker', 112, 9),
  (1247, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 108, 9),
  (1248, 'forma\\modules\\hr\\records\\interview\\Interview', 134, 1),
  (1249, 'forma\\modules\\vacancy\\records\\Vacancy', 83, 1),
  (1250, 'forma\\modules\\worker\\records\\Worker', 113, 1),
  (1251, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 109, 1),
  (1252, 'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy', 110, 1),
  (1253, 'forma\\modules\\hr\\records\\interview\\Interview', 135, 1),
  (1254, 'forma\\modules\\selling\\records\\selling\\Selling', 228, 1),
  (1255, 'forma\\modules\\customer\\records\\Customer', 147, 6),
  (1256, 'forma\\modules\\hr\\records\\interview\\Interview', 136, 1);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `text` text,
  `request_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `text`, `request_id`) VALUES
  (1, 'Это (название организации), я правильно  позвонил?', 1),
  (2, 'Это (имя, отчество менеджера). Руководитель на месте?', 2),
  (3, 'Да, это по поводу  системы автоматизации. Вы руководитель?', 3),
  (4, 'В первую очередь, наши программы наводят порядок в продажах. Кроме того, мы наводим порядок в процессах найма, планирования и так далее. ', 4),
  (5, 'Соедините с руководителем отдела продаж. (С директором вашим)', 5),
  (6, 'Для автоматизации продаж и бизнес процессов. Вы руководитель, я правильно понимаю? Переключите на руководителя! ', 6),
  (7, 'Мне нужно переговорить с ним сегодня, т.к. мы могли бы дать компании дополнительных клиентов. Продиктуйте его номер.', 7),
  (8, 'Скажите, а вы всё еще пользуетесь теми старыми программами для учета? Ну, говорили что тормозят, что какие то проблеммы с ними. Не в курсе?Дайте номер руководителя, он должен быть в курсе этих вопросов.', 7),
  (9, 'Мы создаём ПОНЯТНОЕ программное обеспечение для компании и сотрудников, у нас две цели: 1)Повышение прибыльности компании;\r\n2)Порядок и дисциплина в бизнесе; \r\nВы сейчас пользуетесь какими либо программами, или может Excell, или ручка-листик?', 8),
  (10, 'В первую очередь, наши программы наводят порядок в продажах. Кроме того, мы наводим порядок в процессах найма, планирования и так далее. ', 9),
  (11, 'Могли бы Вы переговорить с нашим директором. Он расскажет все технические и формальные детали. ', 10),
  (12, 'Я видел много запросов по Вашему направлению. Вас ищут клиенты через интернет. Скажите, а Вы смогли бы обрабатывать больше клиентов, если мы предоставим Вам такую возможность? ', 11),
  (13, 'Рыночная! Прототип = 2000$ (как телефон и ноутбук(Проект в среднем, как не дорогая машина(20000$)))', 12),
  (31, 'Добрый день, соедениет с руководителем ', 16),
  (32, 'Ну отлично, значит не зря Вам звоню, если мы разработаем клиентскую  базу для вас, мы повысим эффективность Вашего бизнеса', 17),
  (34, 'fghjkl;', 10),
  (35, 'Я представляю компанию Инжелло', 2),
  (36, 'ыывапролдлорпа', 12),
  (37, 'цукенг', 4),
  (38, 'Вот ответ', 3),
  (39, ' Мой ответ', 12),
  (40, 'Да', 35),
  (44, '12', 36),
  (45, 'Пришлю на почту', 24),
  (46, '2', 36),
  (47, 'да', 26),
  (48, 'да', 37),
  (49, 'а раньше никак?', 37),
  (51, 'У меня нет опыта', 19),
  (52, 'TestForGabri', 40),
  (53, 'Тестовый ответ №1', 41),
  (54, 'Тестовый ответ №2', 42),
  (55, 'Тестовый ответ №3', 43),
  (56, 'тестовый ответ', 43),
  (58, 'да', 37),
  (59, 'картой', 45),
  (60, 'наличными', 45),
  (61, 'йцу', 19),
  (62, 'йцу', 19),
  (63, 'йцу', 19),
  (64, 'уцй', 24),
  (65, 'уцй', 24),
  (66, 'уууу', 26);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
  (1, 'Крепкие', NULL),
  (2, 'Слабоалкоголка', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
  (1, 'Украина'),
  (2, 'Польша'),
  (3, 'Чехия'),
  (4, 'Германия'),
  (5, 'Франция'),
  (6, 'Украина'),
  (7, 'Украина'),
  (8, 'Украина'),
  (9, 'Украина'),
  (10, 'Белоруссия'),
  (11, 'Россия');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` char(3) NOT NULL COMMENT 'ISO 4217 code',
  `rate` decimal(13,4) NOT NULL COMMENT 'US Dollar rate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `rate`) VALUES
  (4, 'Доллар', 'USD', '1.0000'),
  (5, 'Евро', 'EUR', '1.2400'),
  (6, 'Гривна', 'GRN', '0.0400');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `tax_rate` double(10,2) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `firm` varchar(100) DEFAULT NULL,
  `address` varchar(32) DEFAULT NULL,
  `company_email` varchar(32) DEFAULT NULL,
  `chief_email` varchar(32) DEFAULT NULL,
  `company_phone` varchar(32) DEFAULT NULL,
  `chief_phone` varchar(32) DEFAULT NULL,
  `site_company` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `country_id`, `tax_rate`, `name`, `firm`, `address`, `company_email`, `chief_email`, `company_phone`, `chief_phone`, `site_company`) VALUES
  (10, 10, NULL, 'Дмитрий Фомченко', 'ИП, Цифровой мир для малого бизнеса (что-то с проф-союзами)', 'Минск', '', '3045655@gmail.com', '', '+375293045655', NULL),
  (12, 1, NULL, '?', 'Адар-Принт', '', '', '', '0 66–008–73–74', '', NULL),
  (13, 1, NULL, '?', 'Райская полиграфия', '', '', '', '0 99–032–25–86', '', NULL),
  (14, 1, NULL, '?', 'Яблочко', '', '', '', '0 93–360–43–44', '', NULL),
  (15, 1, NULL, 'Кирилл Дмитриевич', 'Артмак', '', '', '', '0 99–066–93–28', '', NULL),
  (16, 1, NULL, '?', 'Factor Druk', '', '', '', '0 (57) 717–57–80', '', NULL),
  (17, 1, NULL, 'Дмитрий', 'Nova print', '', '', '', '0 95–591–19–05', '', NULL),
  (18, 1, NULL, 'Алексеев Валентин Вадимович', 'Яскравий друк', '', '', '', '', '(067) 579-28-14', NULL),
  (19, 1, NULL, 'Наталья', 'Центр цифровой полиграфии', '', '', '', '', '0 50–106–65–00', NULL),
  (20, 1, NULL, '?', 'Точка', '', '', '', '0 67–551–11–32', '', NULL),
  (21, 1, NULL, '?', 'Домино', '', '', '', '0 95–466–86–40', '', NULL),
  (22, 1, NULL, 'Дмитрий', 'NonStop', '', '', '', '0 67–853–61–33', '', NULL),
  (27, 1, NULL, 'Владимир Витальевич', 'Авто Мото', 'Киев, проспект Ленина 18', '', '', '', '+380995354555', NULL),
  (28, 11, NULL, 'Алиса Чудова', 'Стильная Мода', 'Челябинск, Корпоративная 17А', '', '', '', '+785225856501', NULL),
  (29, 1, NULL, 'Владимир Мироносец', 'Молоко в каждый дом', 'пос. Новомолочный', '', '', '', '+380961523855', NULL),
  (30, 1, NULL, 'Антон', 'Тест', 'Тест', 'dasdas@fas.com', 'dasdas@fas.com', '0990303922', '0990303922', NULL),
  (31, 1, NULL, 'Нужна тех-поддержка проекта. etc. ', 'Валентин Петроченков', '', 'sbi@i.com.ua', NULL, '674073537', NULL, NULL),
  (33, 1, NULL, 'Николай', 'Nikodent Стоматология', '', '', '', '+380 93–861–83–39', '', NULL),
  (34, 1, NULL, 'Элистом Сеть стоматологических рентген-кабинетов', 'Элистом Сеть стоматологических рентген-кабинетов', '', '', '', '380 (57) 755–17–57', '', NULL),
  (35, 1, NULL, 'Megastom Стоматологический кабинет', 'Megastom Стоматологический кабинет', '', '', '', '+380 67–774–93–29', '', NULL),
  (37, 1, NULL, 'Мария Александровна ', 'Стоматологический кабинет ФЛП Тагаева М.А.', '', '', '', '+380 50–816–77–77', '', NULL),
  (38, 1, NULL, 'Многопрофильный медицинский центр доктора Артемчука', 'Многопрофильный медицинский центр доктора Артемчука', '', '', '', '+380 63–950–70–00', '', NULL),
  (39, 1, NULL, 'Дента-л Стоматология', 'Дента-л Стоматология', '', '', '', '+380 (57) 751–76–67', '', NULL),
  (40, 1, NULL, ' Фортуна Стоматологическая клиника', ' Фортуна Стоматологическая клиника', '', '', '', '+380 63–521–40–69', '', NULL),
  (41, 1, NULL, 'Вивастом, ООО Стоматология', 'Вивастом, ООО Стоматология', '', '', '', '+380 (57) 731–11–80', '', NULL),
  (42, 1, NULL, 'Mamont Стоматологическая клиника', 'Mamont Стоматологическая клиника', '', '', '', '+380 63–864–24–90', '', NULL),
  (44, 1, NULL, 'Белоног Ю.И., ЧП Стоматологический кабинет', 'Белоног Ю.И., ЧП Стоматологический кабинет', '', '', '', '+380 (572) 52–03–32', '', NULL),
  (45, 1, NULL, '+380 96–411–11–62', '+380 96–411–11–62', '', '', '', '+380 96–411–11–62', '', NULL),
  (46, 1, NULL, 'Юлия', 'Улыбка Стоматология', '', '', '', '+380 68–009–77–88', '', NULL),
  (47, 1, NULL, 'Сімейна Стоматология', 'Сімейна Стоматология', '', '', '', '+380 96–943–86–36', '', NULL),
  (48, 1, NULL, 'Елена Васильевна ', 'Хороший доктор Медицинский центр', '', '', '', '+380 67–577–40–20', '', NULL),
  (49, 1, NULL, 'Алексей Петрович', 'Стоматология Доктора Крамаренко', '', '', '', '+380 (57) 731–15–46', '+380 050 300 24 06 ', NULL),
  (50, 1, NULL, 'Стар Дент Стоматология', 'Стар Дент Стоматология', '', '', '', '+380 97–915–71–80', '', NULL),
  (51, 1, NULL, ' Ди-2 Стоматологический центр', ' Ди-2 Стоматологический центр', '', '', '', '+380 96–267–38–81', '', NULL),
  (52, 1, NULL, ' Rock & Gloss Авторская студия', ' Rock & Gloss Авторская студия', '', '', '', '+380 95–471–07–98', '', NULL),
  (53, 1, NULL, 'Новая Стоматология', 'Новая Стоматология', '', '', '', '+380 93–030–86–80', '', NULL),
  (54, 1, NULL, 'Валентина  Старший менеджер', 'Vita Стоматологический центр', '', 'stomatologiya.vita@gmail.com', '', '+380 (57) 728–08–37', '', NULL),
  (55, 1, NULL, ' Smile Time Стоматология', ' Smile Time Стоматология', '', '', '', '+380 97–522–22–54', '', NULL),
  (56, 1, NULL, ' Современная Стоматология', ' Современная Стоматология', '', '', '', '+380 99–287–55–55', '', NULL),
  (57, 1, NULL, 'Любовь Сергеевна ', 'Стоматологический кабинет ПП Софі дент', '', '', '', '+380 67–728–69–33', '067286933', NULL),
  (58, 1, NULL, 'Мастер Мед Сеть стоматологий', 'Мастер Мед Сеть стоматологий', '', '', '', '+380 66–133–38–00', '', NULL),
  (59, 2, NULL, 'Валентина Литейченко', 'Qiite Systems', 'Pritholinsi 43-e-1 ', '', '', '', '+589654523241', NULL),
  (60, 1, NULL, 'Олег Николаевич', 'Ingello', 'Харьков, Сумская 34\\10', '', 'olijenius@gmail.com', '', '0535658546', NULL),
  (61, 1, NULL, 'Жемчуг Сеть стоматологических клиник', 'Жемчуг Сеть стоматологических клиник', 'Данилевского, 20 1 этаж Шевченко', '', '', '+380 (57) 705–44–70', '', NULL),
  (62, 1, NULL, 'Ландыш Сеть стоматологических кабинетов', 'Ландыш Сеть стоматологических кабинетов', 'Победы проспект, 77г Алексеевски', '', '', '+380 66–985–85–35', '', NULL),
  (63, 1, NULL, 'Universal dentist Стоматологический кабинет', 'Universal dentist Стоматологический кабинет', 'Тракторостроителей проспект, 103', '', '', '+380 93–660–26–36', '', NULL),
  (64, 1, NULL, 'NANOdentis Стоматологический кабинет', 'NANOdentis Стоматологический кабинет', 'БЦ Дом проектов Науки проспект38', '', '', '+380 95–772–23–72', '', NULL),
  (65, 1, NULL, 'Dental Union Studio Сеть стоматологий', 'Dental Union Studio Сеть стоматологий', 'Победы проспект, 58а 1 этаж', '', '', '+380 99–093–29–80', '', NULL),
  (66, 1, NULL, 'Роман Владимирович, Елена.', 'Silk Стоматологическая клиника', 'Культуры, 26', '', '', '+380 50–230–60–22', '', NULL),
  (67, 1, NULL, 'Евгений Борисович', 'Стоматологическая клиника доктора Мезенцева', 'Славянская, 8 Холодногорский рай', '', '', '+380 50–134–44–01', '', NULL),
  (68, 1, NULL, 'Евгений Владимирович*', 'Happy Dent', 'Державинская, 2', '', '', '+380 66–655–88–77', '+380 97–928–73–50', NULL),
  (69, 1, NULL, 'Uniqum Стоматологический центр', 'Uniqum Стоматологический центр', 'Металлиста, 2', '', '', '+380 50–636–45–56', '', NULL),
  (70, 1, NULL, 'Bella Vista Стоматология', 'Bella Vista Стоматология', 'Гимназическая Набережная, 24', '', '', '+380 66–518–09–99', '', NULL),
  (71, 1, NULL, 'Элистом Сеть стоматологических рентген-кабинетов', 'Элистом Сеть стоматологических рентген-кабинетов', 'Донец-Захаржевского, 4', '', '', '+380 (57) 755–17–57', '', NULL),
  (72, 1, NULL, 'Лоридан Клиника', 'Лоридан Клиника', 'Метростроителей, 24', '', '', '+380 (57) 758–23–82', '0800302022', NULL),
  (73, 1, NULL, 'Загребельная Ирина Владимировна ', 'Региональный медицинский центр', 'Полтавский шлях, 152/1', '', 'me.izagrebelna@gmail.com', '0800 500 103', '066 9957 900', NULL),
  (74, 1, NULL, 'Марина Викторовна', 'Многопрофильный медицинский центр «Эввива»', '', '', '', '380 50–403–39–03', '067 422 03 95 ', NULL),
  (75, 1, NULL, 'Многопрофильный медицинский центр доктора Артемчука', 'Многопрофильный медицинский центр доктора Артемчука', 'Державинская, 38', '', '', '+380 63–950–70–00', '', NULL),
  (76, 1, NULL, 'Нужно составление ТЗ. Нужна тех-поддержка проекта. etc. ', 'Selene Putnam', '', 'selene.putnam@yahoo.com', NULL, '(61) 8424-9610', NULL, NULL),
  (77, 1, NULL, '', '', '', 'sps.sklad1@mail.ru', NULL, '3098040', NULL, NULL),
  (78, 1, NULL, 'Наталья ', 'Андромеда Стоматология', 'Тракторостроителей проспект, 65', '', '', '0 99–335–56–40', '', NULL),
  (79, 1, NULL, 'Наталья', 'Андромеда Стоматология', ' Тракторостроителей проспект, 65', '', '', '+380 99–335–56–40', '', NULL),
  (80, 1, NULL, 'Европейский центр детской стоматологии', 'Европейский центр детской стоматологии', ' Ромена Роллана, 15а', '', '', '+380 95–230–00–09', '', NULL),
  (81, 1, NULL, 'Дмитрий Олегович', 'Mamont Стоматологическая клиника', 'Полтавский шлях, 42', '', '', '+380 63–864–24–90', '', NULL),
  (82, 1, NULL, 'Dentalkids Стоматология', 'Dentalkids Стоматология', 'Петра Болбочана, 52', '', '', '+380 95–671–10–76', '', NULL),
  (83, 1, NULL, 'Вивастом, ООО Стоматология', 'Вивастом, ООО Стоматология', 'Кооперативная, 5', '', '', '+380 (57) 731–11–80', '', NULL),
  (84, 1, NULL, 'Тарас Александрович', 'Мир Стоматология', 'Отакара Яроша переулок, 16', '', '', '+380 50–338–15–10', '', NULL),
  (85, 1, NULL, 'Медсмайл Стоматология', 'Медсмайл Стоматология', 'Грицевца, 29а', '', '', '+380 66–043–74–44', '', NULL),
  (86, 1, NULL, 'Денис Евгеньевич', 'Стоматологическая клиника доктора Морозова', 'Победы проспект, 85', '', '', '+380 99–644–54–70', '+380 97-915-10-25', NULL),
  (87, 1, NULL, 'Юрий Иванович', 'Белоног Ю.И., ЧП Стоматологический кабинет', ' Героев Сталинграда проспект, 1/', '', '', '+380 99–644–54–70', '', NULL),
  (88, 1, NULL, 'Оксана Ивановна', 'Leo Dent Стоматология', 'Универмаг Харьков, Московский пр', '', '', '+380 50–291–02–74', '', NULL),
  (89, 1, NULL, 'CaspiDent Сеть стоматологий', 'CaspiDent Сеть стоматологий', 'Гвардейцев-Широнинцев, 62', '', '', '+380 99–258–33–66', '', NULL),
  (90, 1, NULL, ' Все 32 Стоматология', ' Все 32 Стоматология', 'Воробьёва, 5', '', '', '+380 66–753–48–69', '', NULL),
  (91, 1, NULL, 'Людмила Ивановна', 'L-dental Стоматологический кабинет', 'Академика Проскуры, 5в', '', '', '+380 95–556–18–84', '', NULL),
  (92, 1, NULL, 'Сеть стоматологических кабинетов ФЛП Киевская Н.Б.', 'Сеть стоматологических кабинетов ФЛП Киевская Н.Б.', 'Салтовское шоссе, 262', '', '', '+380 66–867–55–61', '', NULL),
  (93, 1, NULL, 'Мария Васильевна', 'РЦСИ, ООО Стоматологический центр', 'Бакулина, 4', '', '', '+380 99–943–76–12', '', NULL),
  (94, 1, NULL, 'Натали ', 'Немецкая стоматология', 'Чернышевская, 26', '', 'nemestol@gmail.com', '+380 67–579–99–49', '+380 66-310-60-39', NULL),
  (95, 1, NULL, 'Феникс Стоматологический кабинет', 'Феникс Стоматологический кабинет', ' Роганская, 3 ', 'fenix.denta@gmail.com', '', '+380 95–388–69–24', '', NULL),
  (96, 1, NULL, 'Нужно составление ТЗ. Нужна тех-поддержка проекта. erp. ', 'ascv`', '', 'cvb@CVB.COM', NULL, '12332112', NULL, NULL),
  (97, 1, NULL, 'Нужно составление ТЗ. Нужна тех-поддержка проекта. admin. ', 'Kratofil Daria', '', 'dasha252342@gmail.com', NULL, '+380660443958', NULL, NULL),
  (98, 1, NULL, 'Нужно составление ТЗ. Нужна тех-поддержка проекта. admin. ', 'Ира Барскова', '', 'smailick1@yandex.ru', NULL, '+38(066)044-39-58', NULL, NULL),
  (100, 1, NULL, 'Нужна тех-поддержка проекта. admin. ', 'fghjk', '', 'boder124@gmail.com', NULL, '5555858', NULL, NULL),
  (102, 1, NULL, 'Антон', 'Орео', 'широнинцев 22', '@ua', '@ua', '6666', '555555', NULL),
  (103, 1, NULL, 'Нужна тех-поддержка проекта. erp. ', 'Олег Григорьев', '', 'smailick1@yandex.ru', NULL, '+380660443958', NULL, NULL),
  (108, 1, NULL, 'Денис Борисовичь', ' Эстет Центр стоматологии', '', '', '', '+380 50–678–02–57', '', NULL),
  (109, 1, NULL, 'Оксана', 'MarkOS Стоматология', '', '', '', '+380 93–742–17–01', '', NULL),
  (110, 1, NULL, 'Ярослав', 'Санитас Стоматология', 'Героев Труда, 37', '', '', '+380 (57) 364–98–92', '', NULL),
  (111, 1, NULL, 'Таисия Сергеевна', 'Литвиненко Т.С., ФЛП ', 'Роганская, 130/2', '', '', '+380 66–407–25–14', '', NULL),
  (112, 1, NULL, 'РусланК Стоматология', 'РусланК Стоматология', '', '', '', '+380 50–200–44–22', '', NULL),
  (113, 1, NULL, 'Максим менеджер', 'Роял канин', '', '', '', '', '', NULL),
  (114, 1, NULL, 'Tamtour', 'Tamtour', '', '', '', '0680616884', '', NULL),
  (115, 1, NULL, 'Ирина', 'Citrus Tour', '', '', '', '', '0682779458', NULL),
  (116, 1, NULL, 'Lot tour', 'Lot tour', '', '', '', '068668018', '', NULL),
  (117, 1, NULL, 'Романтик Travel', 'Романтик Travel', '', '', '', '0503253531', '', NULL),
  (118, 1, NULL, 'Сильпо Voyage ', 'Сильпо Voyage ', '', '', '', '0999246101', '', NULL),
  (119, 1, NULL, 'Марина', 'Nirvana tour', 'Алчевских, 18/22', '', '', '0978937526', '0509276033', NULL),
  (120, 1, NULL, 'La dolce vita', 'La dolce vita', '', '', '', '0956207700', '', NULL),
  (121, 1, NULL, 'Белиз-тур', 'Белиз-тур', '', '', '', '', '0956065937', NULL),
  (122, 1, NULL, 'Golden Monkey', 'Golden Monkey', '', '', '', '0987171010; 0661395413', '', NULL),
  (123, 1, NULL, 'Бутик Вояж', 'Бутик Вояж', '', '', '', '0952381456', '', NULL),
  (124, 1, NULL, 'Отдых на все 100', 'Отдых на все 100', '', '', '', '0995612244', '', NULL),
  (125, 1, NULL, 'Денис', '50 паралель', '', '', '', '', '0967229779', NULL),
  (126, 1, NULL, 'Ольга Михайловна', 'Пилигрим', '', '', '', '0509687333', '0675702720', NULL),
  (127, 1, NULL, 'Тур.Агенство Бронниковой', 'Тур.Агенство Бронниковой', '', '', '', '050411563', '', NULL),
  (128, 1, NULL, 'Денис ? или не Денис', 'Sunrise Travel Agency', '', '', '', '', '0953077078', NULL),
  (129, 1, NULL, '38 попугаев и КО.', '38 попугаев и КО.', '', '', '', '0679505215', '', NULL),
  (130, 1, NULL, 'Кирилл', 'Навигатор Украина', '', '', '', '', '0955148080', NULL),
  (131, 1, NULL, 'Виват тур', 'Виват тур', '', '', '', '0633572889', '', NULL),
  (132, 1, NULL, '5 континент/Колобус тур', '5 континент/Колобус тур', '', '', '', '0503237346', '', NULL),
  (133, 1, NULL, 'Анна', 'Эстет-Тур', '', '', '', '', '0679986638', NULL),
  (134, 1, NULL, 'Алексей', 'Буссоль Вояж', '', '', '', '', '0505776318', NULL),
  (135, 1, NULL, 'SVtravel', 'SVtravel', '', '', '', '0679430101', '', NULL),
  (136, 1, NULL, 'etc. ', 'Дмитрий, дизайн-агенство \"Кенгуру\"', '', 'dim3.vs@gmail.com', NULL, '+38 (068) 680-31-40', NULL, NULL),
  (137, 1, NULL, 'Z-Тур', 'Z-Тур', '', '', '', '057-717-56-60', '', NULL),
  (138, 1, NULL, 'Tui', 'Tui', '', '', '', '097-232-21-47', '', NULL),
  (139, 1, NULL, 'Владимир Михайлович', 'Барт', '', '', '', '', '067-575-11-67', NULL),
  (140, 1, NULL, 'Наталья', 'Meribel tour', '', '', '', '', '095-711-20-51', NULL),
  (141, 1, NULL, 'Калейдоскоп путешествий', 'Калейдоскоп путешествий', '', '', '', '050-303-96-75', '', NULL),
  (142, 1, NULL, 'Марина', 'ЛеГрандТур', '', '', '', '050-844-49-79', '095-858-70-07', NULL),
  (143, 1, NULL, 'Alora Tour', 'Alora Tour', '', '', '', '050-964-53-12', '', NULL),
  (144, 1, NULL, 'Альтернатива', 'Альтернатива', '', '', '', '057-728-05-65', '', NULL),
  (145, 1, NULL, 'Пингвин', 'Пингвин', '', '', '', '057-755-99-00', '', NULL),
  (146, 1, NULL, 'Есть ТЗ. crm. ', 'dffghjl', '', 'dasha252342@gmail.com', NULL, '06564', NULL, NULL),
  (147, 1, NULL, 'Есть ТЗ. etc. ', 'Kelhierne', '', 'kelMole@emaill.host', NULL, '88485537494', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL COMMENT 'ИД',
  `event_type_id` int(11) NOT NULL COMMENT 'Тип',
  `name` varchar(255) NOT NULL COMMENT 'Имя',
  `text` text NOT NULL COMMENT 'Текст',
  `status` int(1) NOT NULL COMMENT 'Статус',
  `date_from` date NOT NULL COMMENT 'Начало',
  `date_to` date NOT NULL COMMENT 'Конец',
  `start_time` time NOT NULL COMMENT 'Время'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_type_id`, `name`, `text`, `status`, `date_from`, `date_to`, `start_time`) VALUES
  (1, 1, 'Тестовое событие 1', 'Описание очень важного события, которое забудется, если не хранить его в системе.', 1, '2018-10-30', '2018-10-30', '10:06:09'),
  (2, 1, 'Тестовое событие 1', 'Тестовое событие 1', 1, '2018-10-31', '2018-10-31', '09:06:09'),
  (3, 3, 'Тестовое событие 1', 'Описание очень важного события, которое забудется, если не хранить его в системе.', 1, '2018-10-30', '2018-10-30', '10:06:09'),
  (4, 4, 'Тестовое событие 1', 'Описание очень важного события, которое забудется, если не хранить его в системе.', 1, '2018-10-30', '2018-10-30', '10:06:09'),
  (5, 1, 'Тестовое событие 1', 'Тестовое событие 1', 1, '2018-10-29', '2018-10-29', '10:36:09'),
  (6, 1, 'Тестовое событие 2 ', 'Тестовое событие 2 ', 1, '2018-12-21', '2018-12-21', '11:30:07'),
  (7, 1, 'Тестовое событие 3', 'Тестовое событие 3', 1, '2018-12-20', '2018-12-20', '07:00:07'),
  (8, 2, 'Тестовое событие 4', 'Описание', 1, '2018-12-22', '2018-12-22', '17:20:00'),
  (9, 1, 'Тестовое событие 5', 'Тестовое событие 5', 1, '2018-12-21', '2018-12-21', '02:20:00'),
  (10, 1, 'Тестовое событие 6', 'Тестовое событие 6', 1, '2018-12-14', '2018-12-14', '12:50:00'),
  (11, 1, 'Тестовое событие 7', 'Тестовое событие 7', 1, '2018-12-12', '2018-12-12', '01:20:00'),
  (12, 2, 'Тестовое событие 8', 'описание события', 1, '2018-12-12', '2018-12-12', '13:20:00'),
  (13, 2, 'Тестовое событие 9', 'описание', 1, '2018-12-26', '2018-12-26', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `id` int(11) NOT NULL COMMENT 'ИД',
  `name` int(255) NOT NULL COMMENT 'Имя',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'Статус',
  `color` varchar(20) NOT NULL DEFAULT '#CCC' COMMENT 'Цвет'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`id`, `name`, `status`, `color`) VALUES
  (1, 0, 0, ''),
  (2, 0, 0, ''),
  (3, 0, 0, ''),
  (4, 0, 0, ''),
  (5, 0, 0, ''),
  (6, 0, 0, ''),
  (7, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_complete` datetime DEFAULT NULL,
  `state` int(11) NOT NULL,
  `vacancy_id` int(11) DEFAULT NULL,
  `dialog` text,
  `next_step` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`id`, `worker_id`, `project_id`, `name`, `date_create`, `date_complete`, `state`, `vacancy_id`, `dialog`, `next_step`) VALUES
  (55, 43, 21, '', '2018-12-26 16:15:36', NULL, 4, 11, '28.12.2018 12:49:07<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">йцуйцуйцу</div><br/>false28.12.2018 12:50:33<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">йцу</div><br/>false', 'false'),
  (56, 44, 21, '', '2018-12-26 16:17:42', NULL, 4, 11, NULL, NULL),
  (67, 29, 22, '', '2018-12-27 12:59:48', NULL, 1, 11, NULL, NULL),
  (68, 50, 22, '', '2018-12-27 13:00:54', NULL, 4, 49, NULL, NULL),
  (69, 51, 22, '', '2018-12-27 13:03:00', NULL, 5, 49, NULL, NULL),
  (70, 52, 22, '', '2018-12-27 13:10:16', NULL, 1, 49, NULL, NULL),
  (71, 53, 24, '', '2018-12-27 13:11:11', NULL, 1, 49, NULL, NULL),
  (72, 54, 24, '', '2018-12-27 13:12:59', NULL, 2, 49, NULL, NULL),
  (73, 55, 25, '', '2018-12-27 13:14:11', NULL, 2, 30, NULL, NULL),
  (74, 17, 47, '', '2018-12-28 12:57:54', NULL, 3, 11, '28.12.2018 11:03:36<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Я оставил коментарий к диалогу.\nОн может быть различного размера.</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">В следующий раз позвонить в четверг</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">А вот оперативно-добавленный комментарий. </div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">В следующий раз позвонить в четверг</div>'),
  (75, 56, 21, '', '2018-12-28 13:05:51', NULL, 2, 26, NULL, NULL),
  (76, 56, 21, '', '2018-12-28 13:06:03', NULL, 3, 26, NULL, NULL),
  (77, 56, 21, '', '2018-12-28 13:06:13', NULL, 2, 26, NULL, NULL),
  (78, 56, 21, '', '2018-12-28 13:07:04', NULL, 2, 26, NULL, NULL),
  (79, 56, 21, '', '2018-12-28 13:07:20', NULL, 1, 26, NULL, NULL),
  (80, 56, 21, '', '2018-12-28 13:07:27', NULL, 0, 26, NULL, NULL),
  (81, 56, 21, '', '2018-12-28 13:07:33', NULL, 0, 26, NULL, NULL),
  (82, 56, 21, '', '2018-12-28 13:07:39', NULL, 0, 26, NULL, NULL),
  (83, 56, 21, '', '2018-12-28 13:07:44', NULL, 0, 26, NULL, NULL),
  (84, 56, 21, '', '2018-12-28 13:07:50', NULL, 0, 26, NULL, NULL),
  (85, 56, 21, '', '2018-12-28 13:07:59', NULL, 0, 26, NULL, NULL),
  (86, 56, 21, '', '2018-12-28 13:08:06', NULL, 0, 26, NULL, NULL),
  (87, 56, 21, '', '2018-12-28 13:08:11', NULL, 0, 26, NULL, NULL),
  (88, 56, 21, '', '2018-12-28 13:08:24', NULL, 0, 26, NULL, NULL),
  (89, 56, 21, '', '2018-12-28 13:08:28', NULL, 0, 26, NULL, NULL),
  (90, 56, 21, '', '2018-12-28 13:08:34', NULL, 0, 26, NULL, NULL),
  (91, 56, 21, '', '2018-12-28 13:09:53', NULL, 4, 26, NULL, NULL),
  (92, 56, 21, '', '2018-12-28 13:10:30', NULL, 5, 26, NULL, NULL),
  (93, 56, 21, '', '2018-12-28 13:10:49', NULL, 6, 26, NULL, NULL),
  (94, 29, 58, '', '2018-12-28 13:13:56', NULL, 1, 11, NULL, NULL),
  (95, 74, 25, '', '2018-12-28 15:12:05', NULL, 0, 30, '28.12.2018 13:13:27<br/><p>Клиент: \n                        \n                        «Расскажите нам о себе» (образование, специализация, опыт работы. почему вы пришли именно в эту кампанию, и почему эта должность так важна. )                        \n                    </p><p>Менеджер: Удовлетворительно</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">подходит</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">этап работы</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">этап работы</div>'),
  (97, 17, 21, '', '2018-12-28 16:16:04', NULL, 1, 11, '28.12.2018 14:17:51<br/><p>Клиент: \n                        \n                        «Расскажите нам о себе» (образование, специализация, опыт работы. почему вы пришли именно в эту кампанию, и почему эта должность так важна. )                        \n                    </p><p>Менеджер: Удовлетворительно</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">kdjagffjbj</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">12 5</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">12 5</div>'),
  (98, 17, 21, '', '2018-12-28 16:18:45', NULL, 3, 26, NULL, NULL),
  (99, 17, 59, '', '2018-12-28 16:39:11', NULL, 4, 11, NULL, NULL),
  (101, 81, 3, '', '2019-01-08 13:50:33', NULL, 2, 1, '18.01.2019 16:33:53<br/><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: да</p><p>Клиент: \n                        \n                        Здравствуйте, вы оформили на сайте заказ желаете проверить?                        \n                    </p><p>Менеджер: Да</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">комментарий</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">хз</div>18.01.2019 16:53:32<br/><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: да</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ж</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">д</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">рр</div><div style=\"background: #ffba1e;\" class=\"alert alert-primary\" role=\"alert\">рр</div>20.01.2019 17:05:52<br/><p>Клиент: \n                        \n                        Здравствуйте, вы оформили на сайте заказ желаете проверить?                        \n                    </p><p>Менеджер: Да</p><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: а раньше никак?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">рр</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">рр</div><div style=\"background: #ffba1e;\" class=\"alert alert-primary\" role=\"alert\">рр</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">рр</div>'),
  (102, 82, 13, '', '2019-01-08 21:21:57', NULL, 3, 5, '08.01.2019 19:23:00<br/><p>Клиент: \n                        \n                        Из какой компании?                        \n                    </p><p>Менеджер: В первую очередь, наши программы наводят порядок в продажах. Кроме того, мы наводим порядок в процессах найма, планирования и так далее. </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">123</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">1231</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">1231</div>'),
  (104, 85, 8, '', '2019-01-11 10:04:46', NULL, 2, 1, NULL, NULL),
  (105, 1, 9, '', '2019-01-11 10:05:56', NULL, 3, 2, NULL, NULL),
  (106, 86, 9, '', '2019-01-11 10:07:46', NULL, 4, 2, '19.01.2019 14:28:30<br/><p>Клиент: \n                        \n                        Здравствуйте, вы оформили на сайте заказ желаете проверить?                        \n                    </p><p>Менеджер: Да</p><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: фывфыв</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ыфв</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ыв</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ыв</div>'),
  (107, 87, 9, '', '2019-01-11 10:08:50', NULL, 1, 2, NULL, NULL),
  (108, 88, 8, '', '2019-01-11 10:13:37', NULL, 5, 1, NULL, NULL),
  (109, 89, 10, '', '2019-01-11 10:14:58', NULL, 4, 3, NULL, NULL),
  (110, 90, 10, '', '2019-01-11 10:15:49', NULL, 1, 3, NULL, NULL),
  (111, 91, 10, '', '2019-01-11 10:17:37', NULL, 0, 3, '20.01.2019 17:10:03<br/><p>Клиент: \n                        \n                        Оплата наличными, или картой?                        \n                    </p><p>Менеджер: картой</p><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: фывфыв</p><p>Клиент: \n                        \n                        Здравствуйте, вы оформили на сайте заказ желаете проверить?                        \n                    </p><p>Менеджер: Да</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div>20.01.2019 17:10:09<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">а</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div>20.01.2019 17:10:10<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">а</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div>20.01.2019 17:10:11<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">а</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div>20.01.2019 17:10:11<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">а</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div><div style=\"background: #ffba1e;\" class=\"alert alert-primary\" role=\"alert\">а</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div>'),
  (113, 1, 6, '', '2019-01-18 17:49:31', NULL, 0, 2, NULL, NULL),
  (115, 94, 73, '', '2019-01-18 17:54:50', NULL, 0, 71, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">ыфафыа</div>', NULL),
  (116, 94, 73, '', '2019-01-18 17:55:35', NULL, 0, 71, '18.01.2019 16:16:51<br/><p>Клиент: \n                        \n                                                \n                    </p><p>Менеджер: 12</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">asd</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">asd</div>18.01.2019 16:30:14<br/><p>Клиент: \n                        \n                                                \n                    </p><p>Менеджер: 2</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">фв</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">фыв</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">фыв</div>'),
  (120, 96, 66, '', '2019-01-18 18:45:33', NULL, 4, 66, '20.01.2019 19:19:58<br/><p>Клиент: \n                        \n                        \"Что вы умеете делать ?\" (конкретные навыки)                        \n                    </p><p>Менеджер: У меня нет опыта</p><p>Клиент: \n                        \n                        «Может ли кто-то дать вам рекомендации?»                        \n                    </p><p>Менеджер: Пришлю на почту</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Комментарий к собес</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">сш</div>20.01.2019 19:20:48<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Комментарий к собес</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">сш</div>21.01.2019 09:26:38<br/><p>Менеджер: \n                        \n                        \"Что вы умеете делать ?\" (конкретные навыки)                        \n                    </p><p>Кадр: йцу</p><p>Менеджер: \n                        \n                        «Может ли кто-то дать вам рекомендации?»                        \n                    </p><p>Кадр: уцй</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">йцу</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">След шаг</div>21.01.2019 09:28:05<br/><p>Менеджер: \n                        \n                        \"Что вы умеете делать ?\" (конкретные навыки)                        \n                    </p><p>Кадр: йцу</p><p>Менеджер: \n                        \n                        «Готовы ли вы работать на  объектах, если на  будет мало задач?»                        \n                    </p><p>Кадр: уууу</p><p>Менеджер: \n                        \n                        «Может ли кто-то дать вам рекомендации?»                        \n                    </p><p>Кадр: Пришлю на почту</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ууууу</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ууууууууу</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ууууууууу</div>'),
  (121, 1, 12, '', '2019-01-18 20:36:33', NULL, 0, 1, NULL, NULL),
  (122, 1, 12, '', '2019-01-18 20:36:45', NULL, 0, 1, NULL, NULL),
  (123, 1, 12, '', '2019-01-18 20:36:53', NULL, 1, 1, NULL, NULL),
  (124, 1, 12, '', '2019-01-18 20:37:10', NULL, 6, 1, NULL, NULL),
  (125, 1, 12, '', '2019-01-18 20:38:56', NULL, 0, 1, NULL, NULL),
  (126, 1, 12, '', '2019-01-18 20:39:05', NULL, 0, 1, NULL, NULL),
  (127, 1, 12, '', '2019-01-18 20:39:11', NULL, 0, 1, NULL, NULL),
  (128, 97, 74, '', '2019-01-19 15:32:39', NULL, 0, 73, '19.01.2019 13:34:12<br/><p>Клиент: \n                        \n                        TestForGabri                        \n                    </p><p>Менеджер: TestForGabri</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">фыв</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">фыв</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">фыв</div>'),
  (129, 98, 75, '', '2019-01-19 15:41:31', NULL, 4, 74, '19.01.2019 13:42:22<br/><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: Тестовый ответ №1</p><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: Тестовый ответ №2</p><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: тестовый ответ</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Тестовый коммент</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">тестовый след.шаг</div><div style=\"background: #ffba1e;\" class=\"alert alert-primary\" role=\"alert\">Тестовый </div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">тестовый след.шаг</div>'),
  (130, 98, 75, '', '2019-01-19 15:45:04', NULL, 0, 74, '19.01.2019 13:45:33<br/><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: Тестовый ответ №2</p><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: Тестовый ответ №1</p><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: тестовый ответ</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">1</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">1</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">1</div>'),
  (132, 1, 12, '', '2019-01-19 16:21:12', NULL, 4, 1, NULL, NULL),
  (133, 1, 6, '', '2019-01-20 21:52:07', NULL, 0, 2, NULL, NULL),
  (134, 3, 3, '', '2019-01-25 13:49:07', NULL, 0, 2, NULL, NULL),
  (135, 1, 3, '', '2019-02-06 14:49:41', NULL, 3, 1, '06.02.2019 12:50:57<br/><p>Менеджер: \n                        \n                        Оплата наличными, или картой?                        \n                    </p><p>Кадр: картой</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">йцу</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">йцу</div><div style=\"background: #ffba1e;\" class=\"alert alert-primary\" role=\"alert\">йцуцкуекнерно</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">йцу</div>'),
  (136, 1, 3, '', '2019-03-13 23:27:29', NULL, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interview_vacancy`
--

CREATE TABLE `interview_vacancy` (
  `id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `interview_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `cost_type` int(11) DEFAULT NULL,
  `overhead_cost_id` int(11) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `pack_unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventorization`
--

CREATE TABLE `inventorization` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventorization`
--

INSERT INTO `inventorization` (`id`, `warehouse_id`, `name`, `date`, `state`) VALUES
  (1, 18, 'Новая инвентаризация с 24.10.2018', '2017-10-24 00:00:00', 0),
  (2, 1, 'Новая инвентаризация с 24.10.2017', '2017-10-24 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventorization_product`
--

CREATE TABLE `inventorization_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `inventorization_id` int(11) NOT NULL,
  `accounting_quantity` int(11) DEFAULT NULL,
  `fact_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `country_id`, `address`) VALUES
  (4, 'Bacardi', 4, 'Адрес Bacardi'),
  (7, 'fghjk', 3, 'fghjk.'),
  (1, 'Hennessy', 1, 'Адрес Hennessy'),
  (5, 'Jack Daniels', 5, 'Адрес Jack Daniels'),
  (3, 'Martini', 3, 'Адрес Martini'),
  (2, 'Zonin', 2, 'Адрес Zonin'),
  (8, 'Производитель 2', 1, ''),
  (6, 'Производитьель 1', 1, 'йцуйцу');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL COMMENT 'ИД',
  `from_user_id` int(11) NOT NULL COMMENT 'Кто',
  `to_user_id` int(11) NOT NULL COMMENT 'Кому',
  `title` varchar(500) NOT NULL COMMENT 'О чем',
  `text` text NOT NULL COMMENT 'Сообщение',
  `datetime` datetime NOT NULL COMMENT 'Когда',
  `favorit` int(1) NOT NULL COMMENT 'Избранное',
  `status` int(2) NOT NULL COMMENT 'Статус'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
  ('m000000_000000_base', 1541601480),
  ('m171008_182007_base', 1543322835),
  ('m181207_232206_add_table_worker', 1544605972),
  ('m181207_233850_add_table_vacancy', 1544605972),
  ('m181207_234922_add_table_project', 1544605972),
  ('m181207_235524_create_junction_table_for_project_and_vacancy_tables', 1544605972),
  ('m181207_235742_create_junction_table_for_project_and_user_tables', 1544605973),
  ('m181209_140101_add_relation_for_interview_table', 1544606347),
  ('m181209_142416_rename_column_title_name', 1544606347),
  ('m181209_161439_add_column_dialog_in_interview', 1544606347),
  ('m181209_162945_add_column_count_in_project_vacancy', 1544610554),
  ('m181216_152128_add_column_parent_id_for_user_table', 1544983343),
  ('m181220_143552_add_column_id_for_request_strategy', 1545327578),
  ('m181222_213415_create_junction_table_for_worker_and_vacancy_tables', 1545653493),
  ('m181225_123543_create_junction_table_for_project_and_vacancy_tables', 1545744817),
  ('m181225_163355_add_column_collaborated_in_worker', 1545757345);

-- --------------------------------------------------------

--
-- Table structure for table `overhead_cost`
--

CREATE TABLE `overhead_cost` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `sum` double(10,2) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `overhead_cost`
--

INSERT INTO `overhead_cost` (`id`, `type`, `sum`, `currency_id`, `comment`) VALUES
  (1, 1, 2.00, 4, 'Норм всё'),
  (2, 1, 5.00, 4, ''),
  (3, 2, 25.00, 5, 'Нормас'),
  (4, 2, 123.00, 4, '1'),
  (5, 1, 55.00, 5, '!'),
  (6, 2, 25.00, 6, '50!'),
  (7, 3, 567.00, 5, 'Просто вот такой расход'),
  (8, 1, 456.00, 4, ''),
  (9, 2, 500.00, 4, ''),
  (10, 2, 1.00, 4, '6'),
  (11, 2, 1.00, 4, '6'),
  (12, 2, 1.00, 4, '6');

-- --------------------------------------------------------

--
-- Table structure for table `pack_unit`
--

CREATE TABLE `pack_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bottles_quantity` int(11) NOT NULL,
  `volume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pack_unit`
--

INSERT INTO `pack_unit` (`id`, `name`, `bottles_quantity`, `volume`) VALUES
  (2, '12 шт', 12, 1),
  (3, '24 шт', 24, 1),
  (4, 'Коробка', 10, 20),
  (5, 'Блок', 200, 20);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `nameCompany` varchar(255) DEFAULT NULL COMMENT 'Имя министерства, другого органа исполнительной власти, придпринемательства, установки, организации, к сфере управления которого является заведение охраны здоровя',
  `address` varchar(255) DEFAULT NULL COMMENT 'Местонахождения заведения где заполняется форма',
  `years` int(11) DEFAULT NULL COMMENT 'Текущий год',
  `name` varchar(255) DEFAULT NULL COMMENT 'Имя клиента',
  `surname` varchar(255) DEFAULT NULL COMMENT 'Фамилия клиента',
  `patronymic` varchar(255) DEFAULT NULL COMMENT 'Отчество клиента',
  `gender` tinyint(1) DEFAULT NULL COMMENT 'Пол клиента',
  `dateBirth` date DEFAULT NULL COMMENT 'Дата рождения клиента',
  `location` varchar(255) DEFAULT NULL COMMENT 'Место проживания клиента',
  `phone` varchar(255) DEFAULT NULL COMMENT 'Номер телефона клиента',
  `diagnosis` varchar(255) DEFAULT NULL COMMENT 'Диагноз клиента',
  `complaints` text COMMENT 'Жалобы клиента',
  `allDiseases` text COMMENT 'История болезни',
  `developmentOfDisease` text COMMENT 'Развитие текущего заболевания',
  `surveyData` text COMMENT 'Дата объективного осмотра, внешний осмотр, состояние зубов',
  `bite` text COMMENT 'Прикус',
  `mouthCondition` text COMMENT 'Состояние гигиены рта, состояние слизистой оболочки  ',
  `xray` text COMMENT 'Ренгеновское обследование',
  `laboratoryTests` text COMMENT 'Лабараторное обследование',
  `colorVita` varchar(2) DEFAULT NULL COMMENT 'Цвет зубов по шкале Вита',
  `hygieneЕrainingDate` date DEFAULT NULL COMMENT 'Дата обучения ухода за полостью рта',
  `dateHygieneControl` date DEFAULT NULL COMMENT 'Дата контроля за уходом полостью рта'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `nameCompany`, `address`, `years`, `name`, `surname`, `patronymic`, `gender`, `dateBirth`, `location`, `phone`, `diagnosis`, `complaints`, `allDiseases`, `developmentOfDisease`, `surveyData`, `bite`, `mouthCondition`, `xray`, `laboratoryTests`, `colorVita`, `hygieneЕrainingDate`, `dateHygieneControl`) VALUES
  (3, 'Минфин', 'ул. Прохорова 5', 18, 'Дарья', 'Корнева', 'Валерьевна', 2, '1996-10-26', 'г. Харьков', '0660443958', '', '-', 'Носила брекеты с 1.08.17 до 14.12.17. Сейчас стоит ретейнер. \r\n', 'внизу справа ', '', 'правильный', 'следующая чистка 11.10.18', '', '', '', NULL, NULL),
  (4, 'Культуры', '-', 18, 'Алина', 'Богуш', 'Николаевна', 2, '1997-01-08', 'г.Харьков', '0504034783', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
  (5, 'культуры', '', 18, 'Александр', 'Мовчан', 'Сергеевич', 1, '1994-12-09', '', '0504024285', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
  (6, 'образования', 'г. Харьков', 19, 'Соня', 'Панкевич', 'Генадиевна', 2, '1994-01-06', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
  (7, '-', 'г. Харьков', 17, 'Елена', 'Чегодаева', 'Аркадьевна', 2, '1995-01-06', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
  (9, '', '', 18, 'Дмитрий', 'Воеводчук', '', 1, '1995-03-07', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
  (10, '', '', 17, 'Артем', 'Зибаров', 'Игоревич', 1, '1993-09-08', '', '0663483345', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
  (11, '', '', 18, 'Света', 'Чуприна', '', 2, '1975-10-10', '', '456765433243', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
  (12, 'шршотшот', 'ригрт', 21, 'Олег', 'Григорьев', 'Николаевич', 1, '1994-10-11', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `customs_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `note` text,
  `volume` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `year_chart` int(11) DEFAULT NULL,
  `proof` double(10,2) DEFAULT NULL,
  `batcher` tinyint(1) DEFAULT NULL,
  `rating` double(10,2) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `type_id`, `category_id`, `manufacturer_id`, `sku`, `customs_code`, `name`, `note`, `volume`, `color_id`, `year_chart`, `proof`, `batcher`, `rating`, `country_id`, `pack_unit_id`, `parent_id`) VALUES
  (13, 5, 2, 6, 'VSKR-50', '', 'Виски Red Lable', 'Какой то текст...', 50, NULL, 1998, 40.00, 0, 5.00, 6, NULL, NULL),
  (14, 5, 2, 6, 'RV-50', '', 'Revo', 'One shot - one hit', 50, NULL, 2018, 8.00, 1, NULL, 11, NULL, NULL),
  (15, 10, NULL, 8, 'KNSL-75', '', 'Консультация', '', 75, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL),
  (16, 5, NULL, 8, 'VNGR-70', '', 'Вино Игристое ', '', 70, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL),
  (17, 10, NULL, 8, 'DSTV-75', '', 'Доставка', '', 75, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL),
  (18, 5, NULL, 8, 'VDK-125', '', 'Водка ', '', 125, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL),
  (19, 10, NULL, 8, 'SBPK-100', '', 'Особая упаковка', '', 100, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL),
  (20, 5, 2, 6, 'VSK-70', '2254464865129', 'Виски', '--', 70, NULL, 1995, 45.00, 0, 6.00, 3, NULL, NULL),
  (21, 5, 2, 8, 'PRDC-100', '3254', 'product 12', 'примечание', 100, NULL, 2018, 40.00, 0, 5.00, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_pack_unit`
--

CREATE TABLE `product_pack_unit` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `pack_unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `state` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `address`, `description`, `state`) VALUES
  (1, 'Проект Красный', 'Харьков, Уличная 123', 'Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.', 1),
  (2, 'Проект Синий', 'Харьков, Уличная 123', '<h1>Используйте простые текстовые редакторы<br></h1>\r\n<p>Это очень простой текстовый редактор. Можно формировать произвольный текст и быстро тестировать различные форматы. Позже форматы будут переведены в регламент форм...\r\n</p>\r\n<p>Можно использовать разграничение текста посредством заголовков и горизонтальных линий\r\n</p>\r\n<h1>\r\n<hr>\r\n<p>Списки - это удобно. Используйте вложенные списки.\r\n</p></h1>\r\n<ul>\r\n	<li>Список пункт номер №</li>\r\n	<li>Список пункт номер №</li>\r\n	<li>Список пункт номер №\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n	</ul>\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n	</ul></li>\r\n	<li>Список пункт номер №\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n	</ul>\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n	</ul>\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n		<li>Список пункт номер №</li>\r\n	</ul></li>\r\n	<li>Список пункт номер №\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n		<li>Список пункт номер №</li>\r\n		<li>Список пункт номер №</li>\r\n		\r\n		\r\n	</ul></li>\r\n</ul>\r\n<strong>Используйте нумерованные списки</strong>\r\n<ol>\r\n	<li>Список пункт номер №\r\n	<ol>\r\n		<li>Список пункт номер №\r\n		<ol>\r\n			<li>Список пункт номер №</li>\r\n			<li>Список пункт номер №</li>\r\n			<li>Список пункт номер №</li>\r\n		</ol></li>\r\n	</ol></li>\r\n	<li>Список пункт номер №\r\n	<ol>\r\n		<li>Список пункт номер №</li>\r\n		<li>Список пункт номер №</li>\r\n		<li>Список пункт номер №</li>\r\n	</ol></li>\r\n	<li>Список пункт номер №</li>\r\n	<li>Список пункт номер №\r\n	<ol>\r\n		<li>Список пункт номер №</li>\r\n	</ol>\r\n	<ol>\r\n		<li>Список пункт номер №</li>\r\n	</ol>\r\n	<ol>\r\n		<li>Список пункт номер №</li>\r\n	</ol>\r\n	<ol>\r\n		<li>Список пункт номер №</li>\r\n	</ol></li>\r\n</ol>\r\n<p><span class=\"redactor-invisible-space\"><span class=\"label-red\">Текст статус важный</span></span>\r\n</p>', 2),
  (3, 'Проект Зеленый', 'Харьков, Уличная 123', 'Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.', 1),
  (4, 'Проект Лиловый', 'Харьков, Уличная 123', 'Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.', 2),
  (5, 'Проект Белый', 'Харьков, Уличная 123', 'Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.', 2),
  (6, 'Проект Перломутровый', 'Харьков, Уличная 123', 'Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.', 2),
  (8, 'Проект Фиолетовый', 'Харьков, Уличная 123', 'Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.', 2),
  (9, 'Проект Бирюзовый', 'Харьков, Уличная 123', 'Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.', 2),
  (10, 'Проект Серый', 'Харьков, Уличная 123', 'Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.', 2),
  (11, 'Проект Зеленый', 'Адрессная 45', 'Это очень интересный проект', 1),
  (12, 'Проект Алый', 'Адресная 8', 'Проект классный', 2),
  (13, 'Синий', 'Синий', '<p>Синий</p>', 1),
  (14, 'Красный', 'Красный', '<p>Красный</p>', 1),
  (15, 'Жёлтый', 'Жёлтый', '<p>Жёлтый</p>', 1),
  (16, 'Зелёный ', 'Зелёный ', '<p style=\"margin-left: 40px;\">Зелёный </p>', 1),
  (17, 'Голубой', 'Голубой', '<p>Голубой</p>', 1),
  (18, 'Чёрный', 'Чёрный', '<p>Чёрный</p>', 1),
  (19, 'Пробить стену', 'ул. Шевченко, дом 11, 115 кв', '<p>Необходимо пробить стену и сделать подсобное помещение </p>', 1),
  (21, 'Поменять сантехнику', 'ул героев Сталинграда, дом 51, 66 кв', '<p>Сантехника устарела и постоянно течёт, нужно всю заменить</p>', 2),
  (22, 'Строительство бани', 'ул 50 лет ВЛКСМ, дом 119', '<p>Строительство бани по уже готовым чертежамСтроительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span> </p><p><br></p>', 1),
  (23, 'Замена стеклопакета', 'ул. Вакуленко, 102, 43 ', '<p>Нужно заменить разбитый стеклопакет</p>', 2),
  (24, 'Натяжка потолка', 'ул. Франко. дом 45, кв 14', '<p>Натяжка потолка в комнате длиной в 10 метров, шириной в 4</p>', 1),
  (25, 'Провести проводку', 'вул Валентиновская 2б. кв 38', '<p>провести проводку в достроенное помещение </p>', 1),
  (27, 'Постройка жилого дома', 'ул Жорвика 15.', '<p>Постройка частного двухэтажного дома по готовой планировке</p>', 1),
  (28, 'Ремонт квартиры', 'ул. Антонавская 36. кв 41', '<p>Нужно положить ленолиум </p>', 1),
  (30, 'Убрать теретори', 'Люблой', '<p style=\"margin-left: 20px;\">Любое</p>', 2),
  (31, 'Проект', 'Адрес', '<p><strong>Описание</strong></p>', 2),
  (32, 'Проект по токарным работам', 'Киевская 18', '<p style=\"margin-left: 20px;\"><span></span></p><hr><p>Проект и его описание</p><p>Можно писать тут</p><ul><li>И пользоваться классными штуками</li></ul>', 1),
  (38, 'Ремонт и проводка', 'Проводочная 17 А', '<p>Тут я напишу данные о проекте. А так же добавлю файлы / фотографии.</p><p><br></p><p><img src=\"/images/5c2236cd5459f.jpg\"></p>', 1),
  (47, 'Капитальный ремонт', 'Капитальная 10', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong> после старого мастера<br></p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1<br><ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=Купить инструменты для ремонта\" target=\"_blank\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"/images/5c23a7784167c.xls\">Договор</a><br></p>', 1),
  (48, 'Ремонт подъезда', 'ул. Блюхера 51', '<p>Требуется ремонт подъезда</p><ul><li>побелить стены</li><li>заменить оконные рамы</li><li>покрасить перила </li></ul><p><br></p>', 1),
  (49, 'Заменить дверную коробку', 'ул. Клочковская 34. 121', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>', 1),
  (50, 'Залить бетонной смесью армированную ферму', 'Новогородская 57', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>', 2),
  (51, 'Положить слои дорожной одежды', 'Частная 22', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>', 1),
  (52, 'Вырыть котлован ', 'ул Междунородная 31', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>', 1),
  (53, 'Ремонт водоотводного сооружения ', 'Водоотводная 7', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>', 1),
  (54, 'Кровля частного дома', 'Частный 51', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>', 2),
  (55, 'Залить пол ', 'Заливаня 54, 32', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>', 1),
  (56, 'Шпаклёвка помещения ', 'Шлакова 22', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>', 2),
  (57, 'Ремонт подвального помещения', 'Подвальный переулок 4/7', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>', 1),
  (58, 'Возвести летнею беседку ', 'Летняя 41', '<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера<br></p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><br><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>', 1),
  (59, 'ЖК Левада трёшка новострой', 'Харьков, Гагарина 51', '<p>С первого января начинаем новый объект - новострой. </p><p><br></p>', 1),
  (61, 'Циркуны дом', 'Циркуны', '<p>Плитка санузлы кухня камин</p>', 2),
  (62, 'ЖК Маршал,двушка новострой,отделка', 'Маршала Жукова ', '<p>Закончена плитка ,остались финишные работы</p>', 1),
  (63, 'Качановская 17а,новострой двушка', 'Зделаем стяжка ,штукатурка,', '<p>Временно заморожен</p>', 1),
  (64, 'Валентиновская ,45,трёшка ', '', '<p><img src=\"/images/5c42f9953e4de.jpg\"></p>', 1),
  (65, 'Старошишковская,11.трешка', 'Старошишковская 11 кв 12', '<p>На 21.01.19</p><p>Стяжка пола . Перегородки. Штукатурка</p>', 1),
  (66, 'ЖК Дуэт ,новострой .двушка', '', '<p>Работа по дизайн проекту </p><p>Дима,Вадик,Макс</p><p><br></p>', 1),
  (68, 'Гагарина ,новострой .трешка', '', '<p>Штука есть,гипс есть , нужен сантехник, плиточник,шпатлевщики</p>', 1),
  (69, 'Амосова ,вторичка трешка', '', '<p>Прораб О</p><p>Мастер Игорь</p>', 1),
  (70, 'Балакирева 19 новострой трешка', '', '<p>Прораб ,бригадир Володя</p>', 1),
  (73, 'Тест1', 'Тест1', '<p>Тест1</p>', 1),
  (74, 'TestForGabri', 'TestForGabri', '<p>TestForGabri</p>', 1),
  (75, 'тестовый проект №1', 'тестовый проект №1', '<p>тестовый проект №1</p><p><img src=\"/images/5c4327cba116d.png\"></p>', 1),
  (76, 'тестовый проект №2', 'тестовый проект №2', '<p>тестовый проект №2</p>', 1),
  (77, 'тестовый проект №3', 'тестовый проект №3', '<p>тестовый проект №3</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`project_id`, `user_id`) VALUES
  (1, 1),
  (2, 1),
  (3, 1),
  (4, 1),
  (5, 1),
  (6, 1),
  (8, 1),
  (9, 1),
  (10, 1),
  (11, 1),
  (12, 1),
  (13, 6),
  (14, 6),
  (15, 6),
  (16, 6),
  (17, 6),
  (18, 6);

-- --------------------------------------------------------

--
-- Table structure for table `project_vacancy`
--

CREATE TABLE `project_vacancy` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `vacancy_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_vacancy`
--

INSERT INTO `project_vacancy` (`id`, `project_id`, `vacancy_id`, `count`) VALUES
  (12, 21, 11, 3),
  (31, 47, 11, 5),
  (32, 47, 24, 5),
  (34, 28, 11, 1),
  (35, 28, 30, 1),
  (36, 22, 11, 1),
  (37, 22, 49, 2),
  (38, 24, 11, 1),
  (39, 24, 49, 2),
  (40, 25, 11, 1),
  (41, 25, 30, 1),
  (42, 19, 49, 1),
  (44, 47, 25, 6),
  (45, 21, 26, 1),
  (47, 48, 11, 1),
  (48, 49, 11, 1),
  (49, 49, 61, 1),
  (50, 49, 50, 1),
  (51, 50, 11, 1),
  (52, 50, 24, 1),
  (53, 50, 52, 4),
  (54, 50, 49, 3),
  (55, 51, 11, 1),
  (56, 51, 24, 3),
  (57, 51, 27, 1),
  (58, 51, 32, 1),
  (59, 52, 11, 1),
  (60, 52, 59, 1),
  (61, 53, 11, 1),
  (62, 53, 26, 1),
  (63, 53, 24, 4),
  (64, 54, 11, 1),
  (65, 54, 50, 1),
  (66, 54, 58, 1),
  (67, 55, 11, 1),
  (68, 55, 24, 2),
  (69, 56, 11, 1),
  (70, 56, 24, 1),
  (71, 57, 11, 1),
  (72, 57, 24, 2),
  (73, 57, 25, 1),
  (74, 57, 61, 1),
  (75, 58, 11, 1),
  (76, 58, 50, 1),
  (77, 58, 24, 2),
  (78, 23, 11, 2),
  (80, 59, 26, 1),
  (81, 59, 63, 1),
  (82, 59, 65, 1),
  (83, 6, 2, 1),
  (85, 13, 5, 2),
  (87, 61, 66, 2),
  (89, 8, 1, 3),
  (90, 9, 2, 2),
  (91, 10, 3, 4),
  (93, 73, 71, 5),
  (95, 62, 68, 2),
  (97, 11, 1, 2),
  (100, 12, 3, 5),
  (102, 74, 73, 1),
  (103, 75, 74, 1),
  (104, 76, 75, 3),
  (105, 77, 76, 6),
  (107, 68, 66, 1),
  (108, 64, 79, 1),
  (109, 3, 1, 3),
  (110, 32, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `project_vacancy_old`
--

CREATE TABLE `project_vacancy_old` (
  `project_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `count` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_vacancy_old`
--

INSERT INTO `project_vacancy_old` (`project_id`, `vacancy_id`, `count`) VALUES
  (2, 1, 2),
  (13, 10, 1),
  (14, 9, NULL),
  (15, 9, NULL),
  (19, 11, 3),
  (19, 25, 1),
  (21, 26, 2),
  (22, 24, 1),
  (22, 26, 2),
  (22, 31, 1),
  (23, 24, 1),
  (23, 25, 1),
  (24, 24, 1),
  (25, 30, 1),
  (27, 24, 1),
  (27, 31, 1),
  (27, 32, 1),
  (28, 24, 1),
  (30, 34, 1),
  (32, 36, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_complete` datetime DEFAULT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `supplier_id`, `warehouse_id`, `name`, `date_create`, `date_complete`, `state`) VALUES
  (5, 2, 1, 'Новая поставка с 23.01.2018 22:07:10', '2018-01-23 22:07:10', '2018-01-23 22:07:28', 1),
  (6, 2, 1, 'Новая поставка с 23.01.2018 22:08:15', '2018-01-23 22:08:15', NULL, 0),
  (9, 1, 1, 'Новая поставка с 28.11.2018 13:37:51', '2018-11-28 13:37:51', NULL, 0),
  (10, 1, 20, 'Новая поставка с 29.11.2018 11:53:51', '2018-11-29 11:53:51', NULL, 0),
  (11, 6, 20, '12 23 344', '2018-11-29 11:54:29', NULL, 0),
  (12, 7, 11, 'Поставка газона', '2018-12-08 15:58:58', NULL, 0),
  (13, 1, 1, 'Новая поставка с 16.12.2018 19:06:15', '2018-12-16 19:06:15', NULL, 0),
  (14, 6, 18, 'Поставка 103', '2018-12-16 19:07:05', '2018-12-16 19:42:08', 3),
  (15, 8, 7, 'Новая поставка с 16.12.2018 19:58:30', '2018-12-16 19:58:30', NULL, 1),
  (16, 6, 23, 'Новая поставка с 20.12.2018 16:09:43', '2018-12-20 16:09:43', '2018-12-20 16:12:45', 3),
  (17, 8, 7, 'йуцйц', '2019-01-21 18:20:38', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_overhead_cost`
--

CREATE TABLE `purchase_overhead_cost` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `overhead_cost_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_overhead_cost`
--

INSERT INTO `purchase_overhead_cost` (`id`, `purchase_id`, `overhead_cost_id`) VALUES
  (1, 14, 3),
  (2, 16, 7),
  (3, 16, 8),
  (4, 16, 9);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE `purchase_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` double(10,2) NOT NULL,
  `tax_rate_id` double(10,2) DEFAULT NULL,
  `overhead_cost_id` int(11) DEFAULT NULL,
  `prepayment` double(10,2) DEFAULT NULL,
  `currency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_product`
--

INSERT INTO `purchase_product` (`id`, `product_id`, `pack_unit_id`, `purchase_id`, `quantity`, `cost`, `tax_rate_id`, `overhead_cost_id`, `prepayment`, `currency_id`) VALUES
  (1, 13, NULL, 14, 4, 1.00, 4.00, 1, NULL, 4),
  (2, 16, NULL, 14, 200, 375.00, 5.00, 2, NULL, 4),
  (3, 15, NULL, 15, 1, 500.00, 4.00, 4, NULL, 4),
  (4, 20, NULL, 16, 500, 1212.00, 6.00, 5, 500.00, 5),
  (5, 13, NULL, 16, 500, 589.00, 6.00, 6, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `text`) VALUES
  (1, 'Вы не туда попали'),
  (2, 'Кто вы?'),
  (3, 'По какому вопросу?'),
  (4, 'Из какой компании?'),
  (5, 'Не знаю, с кем соединить?'),
  (6, 'Что за система?'),
  (7, 'Руководителя нет, вышлите на почту'),
  (8, 'ЛПР Что Вы предлагаете?'),
  (9, 'ЛПР Что за система? Что за продукт? Что за прототип? Какие функции?'),
  (10, 'ЛПР Есть интерес. Расскажите еще подробнее.'),
  (11, 'ЛПР  Нет денег. Затишье  на рынке'),
  (12, 'ЛПР Какая стоимость Ваших услуг?'),
  (13, 'ЛПР Мне необходимо хранить данные о своем бизнесе только у себя на машине'),
  (14, 'ЛПР У нас уже есть система созданная специально для нас'),
  (15, 'ЛПР НЕ нуждаемся'),
  (16, 'Алло'),
  (17, 'Мы не ведём никакую базу клиентов.'),
  (18, '«Расскажите нам о себе» (образование, специализация, опыт работы. почему вы пришли именно в эту кампанию, и почему эта должность так важна. )'),
  (19, '\"Что вы умеете делать ?\" (конкретные навыки)'),
  (20, '\"Сколько считаете вы должны получать сразу, а сколько потом\"'),
  (21, '\"На какую должность претендуете?\" '),
  (22, '\"Какие вакансии могли бы вам тоже подойти?\"'),
  (23, '«Почему вы уволились с предыдущего места работы?»'),
  (24, '«Может ли кто-то дать вам рекомендации?»'),
  (25, '«Готовы ли вы работать в выходные или праздничные дни?»'),
  (26, '«Готовы ли вы работать на 2 объектах, если на 1 будет мало задач?»'),
  (27, '«Расскажите нам о себе» (образование, специализация, опыт работы. почему вы пришли именно в эту кампанию, и почему эта должность так важна. )'),
  (28, '\"Что вы умеете делать ?\" (конкретные навыки)'),
  (29, '\"Сколько считаете вы должны получать сразу, а сколько потом\"'),
  (30, '\"На какую должность претендуете?\" '),
  (31, '\"Какие вакансии могли бы вам тоже подойти?\"'),
  (32, '«Почему вы уволились с предыдущего места работы?»'),
  (33, '«Может ли кто-то дать вам рекомендации?»'),
  (34, '«Готовы ли вы работать в выходные или праздничные дни?»'),
  (35, 'Здравствуйте, вы оформили на сайте заказ желаете проверить?'),
  (36, '1'),
  (37, 'Время доставки - в зависимости от загруженности от 2-х часов до 4. Будете ждать?'),
  (39, 'тест'),
  (40, 'TestForGabri'),
  (41, 'Тестовый вопрос №1'),
  (42, 'Тестовый вопрос №2'),
  (43, 'Тестовый вопрос №3'),
  (45, 'Оплата наличными, или картой?');

-- --------------------------------------------------------

--
-- Table structure for table `request_strategy`
--

CREATE TABLE `request_strategy` (
  `id` int(11) NOT NULL,
  `strategy_id` int(11) DEFAULT NULL,
  `request_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_strategy`
--

INSERT INTO `request_strategy` (`id`, `strategy_id`, `request_id`) VALUES
  (1, 1, 16),
  (2, 1, 1),
  (3, 1, 2),
  (4, 1, 3),
  (5, 1, 4),
  (6, 1, 5),
  (7, 1, 6),
  (8, 1, 7),
  (9, 1, 8),
  (10, 1, 9),
  (11, 1, 10),
  (12, 1, 11),
  (13, 1, 12),
  (14, 1, 13),
  (15, 1, 14),
  (16, 1, 17),
  (17, 3, 18),
  (18, 3, 19),
  (19, 3, 21),
  (20, 3, 22),
  (21, 3, 23),
  (22, 3, 24),
  (23, 3, 25),
  (24, 3, 26),
  (25, 3, 20),
  (26, 4, 18),
  (27, 4, 19),
  (28, 4, 20),
  (29, 4, 21),
  (30, 4, 22),
  (31, 4, 23),
  (32, 4, 24),
  (33, 4, 25),
  (34, 4, 26),
  (35, 7, 36),
  (36, 5, 35),
  (37, 5, 37),
  (38, 8, 40),
  (39, 9, 41),
  (40, 9, 42),
  (41, 9, 43),
  (43, 5, 45);

-- --------------------------------------------------------

--
-- Table structure for table `request_strategy_old`
--

CREATE TABLE `request_strategy_old` (
  `request_id` int(11) NOT NULL,
  `strategy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_strategy_old`
--

INSERT INTO `request_strategy_old` (`request_id`, `strategy_id`) VALUES
  (1, 1),
  (2, 1),
  (3, 1),
  (4, 1),
  (5, 1),
  (6, 1),
  (7, 1),
  (8, 1),
  (9, 1),
  (10, 1),
  (11, 1),
  (12, 1),
  (16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `selling`
--

CREATE TABLE `selling` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `state_id` int(11),
  `name` varchar(100) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_complete` datetime DEFAULT NULL,
  `dialog` text,
  `next_step` text,
  KEY `selling_ibfk_1` (`state_id`),
  CONSTRAINT `selling_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selling`
--

INSERT INTO `selling` (`id`, `customer_id`, `warehouse_id`, `name`, `date_create`, `date_complete`, `state_id`, `dialog`, `next_step`) VALUES
  (23, 12, 13, NULL, '2018-11-08 14:01:11', NULL, null, '08.11.2018 12:08:17<br/><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Руководитель будет во второй половине дня. Звонить на тот же номер.</div><br/>', NULL),
  (24, 13, 13, NULL, '2018-11-08 14:11:02', NULL, null, '08.11.2018 12:17:11<br/><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Используют Принт(Офис?)24. Это CRM. Встречаться не хотят. Просили выслать презентацию на почту.</div><br/>', NULL),
  (25, 14, 13, NULL, '2018-11-08 14:24:00', NULL, null, '08.11.2018 12:25:05<br/><p>Клиент: \n                        Кто вы?                        \n                    </p><p>Менеджер: Это (имя, отчество менеджера). Руководитель на месте?</p><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Используют CRM систему. Не интересно. Бросили трубку.</div><br/>', NULL),
  (26, 15, 13, NULL, '2018-11-08 14:29:00', NULL, null, '08.11.2018 12:30:08<br/><p>Клиент: \n                        Кто вы?                        \n                    </p><p>Менеджер: Это (имя, отчество менеджера). Руководитель на месте?</p><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Руководитель за границей. Будет в конце месяца. Позвонить по тому же номеру.</div><br/>', NULL),
  (27, 16, 13, NULL, '2018-11-08 14:38:29', NULL, null, '08.11.2018 12:39:55<br/><p>Клиент: \n                        Кто вы?                        \n                    </p><p>Менеджер: Это (имя, отчество менеджера). Руководитель на месте?</p><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Дали номер приемной руководителя, но он не обслуживается. 0 (57) 717–57–85.</div><br/>', NULL),
  (28, 17, 13, NULL, '2018-11-08 14:44:20', NULL, null, '08.11.2018 12:45:32<br/><p>Клиент: \n                        Кто вы?                        \n                    </p><p>Менеджер: Это (имя, отчество менеджера). Руководитель на месте?</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><p>Клиент: \n                        ЛПР  Нет денег. Затишье  на рынке                        \n                    </p><p>Менеджер: Я видел много запросов по Вашему направлению. Вас ищут клиенты через интернет. Скажите, а Вы смогли бы обрабатывать больше клиентов, если мы предоставим Вам такую возможность? </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Общался с руководителем. Ничего не используют. Не интересно.</div><br/>', NULL),
  (29, 18, 13, NULL, '2018-11-08 14:52:08', NULL, null, '08.11.2018 12:53:35<br/><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">На встречу согласен. Чернышевская, 8. 12:00. Подъехать и набрать.</div><br/>', NULL),
  (30, 19, 13, NULL, '2018-11-08 14:58:15', NULL, null, '08.11.2018 12:59:23<br/><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Попросила выслать на почту. Если заинтересует - тогда встретимся.</div><br/>', NULL),
  (32, 20, 13, NULL, '2018-11-08 15:02:17', NULL, null, '08.11.2018 13:03:13<br/><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Говорил с ЛПР. Не представилась. \"Сейчас заняты. Всего доброго.\" Борисили трубку.</div><br/>', NULL),
  (33, 21, 13, NULL, '2018-11-08 15:05:33', NULL, null, '08.11.2018 13:06:00<br/><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">\"С руководителем не соединяем. Всего доброго.\"</div><br/>', NULL),
  (34, 22, 13, NULL, '2018-11-08 15:10:34', NULL, null, '08.11.2018 13:11:29<br/><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><p>Клиент: \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">\"Не интересно. Всего доброго\".</div><br/>', NULL),
  (35, 15, 14, NULL, '2018-11-08 17:20:52', NULL, null, '08.11.2018 15:38:49<br/><p>Клиент: \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Это (название организации), я правильно  позвонил?</p><p>Клиент: \n                        Из какой компании?                        \n                    </p><p>Менеджер: undefined</p><p>Клиент: \n                        Из какой компании?                        \n                    </p><p>Менеджер: sdkhglgneglenk</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">kjgfdlkjngrk</div><br/>', NULL),
  (37, 15, 13, NULL, '2018-11-09 12:16:53', NULL, null, NULL, NULL),
  (38, 15, 13, NULL, '2018-11-09 12:49:45', NULL, null, NULL, NULL),
  (39, 15, 14, NULL, '2018-11-09 14:36:20', NULL, null, '09.11.2018 12:45:09<br/><p>Клиент: \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Это (название организации), я правильно  позвонил?</p><p>Клиент: \n                        Из какой компании?                        \n                    </p><p>Менеджер: Из самой лучшей, а Вы как думали? </p><p>Клиент: \n                        Руководителя нет, вышлите на почту                        \n                    </p><p>Менеджер: смиротимсс</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">фычвсапрт</div><br/><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">чсм</div>', NULL),
  (45, 30, 9, NULL, '2018-11-27 13:59:35', NULL, null, '27.11.2018 12:00:08<br/><p>Клиент: \n                        Не знаю, с кем соединить?                        \n                    </p><p>Менеджер: Соедините с руководителем отдела продаж. (С директором вашим)</p><p>Клиент: \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">вацыва</div><br/>27.11.2018 12:21:09<br/><p>Клиент: \n                        Руководителя нет, вышлите на почту                        \n                    </p><p>Менеджер: Мне нужно переговорить с ним сегодня, т.к. мы могли бы дать компании дополнительных клиентов. Продиктуйте его номер.</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">111111</div><br/>27.11.2018 12:23:55<br/><p>Клиент: \n                        Кто вы?                        \n                    </p><p>Менеджер: Это (имя, отчество менеджера). Руководитель на месте?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">1111111111</div><br/>27.11.2018 12:46:14<br/><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Это (название организации), я правильно  позвонил?</p><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Это (название организации), я правильно  позвонил?</p><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Это (название организации), я правильно  позвонил?</p><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Вроде бы туда</p><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Вроде бы туда</p><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Вроде бы туда</p><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Это (название организации), я правильно  позвонил?</p><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Вроде бы туда</p><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Вроде бы туда</p><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Вроде бы туда</p><p>Клиент: \n                        \n                        Вы не туда попали                        \n                    </p><p>Менеджер: Вроде бы туда</p><p>Клиент: \n                        \n                        Из какой компании?                        \n                    </p><p>Менеджер: Ingello systems. Мы Вам проводим технический анализ. Соедините руководителем.</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">1111</div><br/>27.11.2018 12:46:36<br/><p>Клиент: \n                        \n                        Кто вы?                        \n                    </p><p>Менеджер: Это (имя, отчество менеджера). Руководитель на месте?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">1111111111</div><br/>', NULL),
  (47, 33, 10, NULL, '2018-11-27 15:23:35', NULL, null, '03.12.2018 14:07:40<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу  системы автоматизации. Вы руководитель?</p><p>Клиент: \n                        \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Ничего нет, молодая контора, не готовы платить, так как дорого</div><br/>false<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Поздравил с НГ. Николай был занят. Сбросил. Реакция не понятна. \r\nОтправил ссылку на fractal. Можно перезвонить и спросить - че как. </div>', 'false'),
  (48, 34, 10, NULL, '2018-11-27 15:25:12', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Секретарь отшил </div>', NULL),
  (49, 35, 10, NULL, '2018-11-27 15:26:04', NULL, null, '03.12.2018 13:50:45<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу  системы автоматизации. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Сейчас у руководителя клиент, перезвонить через час</div><br/>false14.12.2018 12:45:20<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        Из какой компании?                        \n                    </p><p>Менеджер: Ingello systems. Мы Вам проводим технический анализ. Соедините руководителем.</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Врет по поводу занятости руководителя, сказала что записала номер, он перезвонит.</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить через неделю под другим именем</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить через неделю под другим именем</div>'),
  (51, 37, 10, NULL, '2018-11-27 15:28:30', NULL, null, '03.12.2018 13:41:59<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не взяли трубку</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить</div>03.12.2018 13:46:25<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Мы ничем не пользуемся, на нас работает репутация</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить </div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">9,01 16,00 Мило пообщались с лпр, сказала что посмотрит видео и дат отзыв. Т.е. надо перезвонить через день после того, как скинем видео.</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить </div>'),
  (53, 39, 10, NULL, '2018-11-27 15:30:45', NULL, null, '03.12.2018 13:48:01<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не берут трубку</div><br/>false', 'false'),
  (54, 40, 10, NULL, '2018-11-27 15:31:27', NULL, null, '03.12.2018 14:02:19<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не берут трубку</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить </div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить </div>'),
  (60, 46, 10, NULL, '2018-11-27 15:36:52', NULL, null, '03.12.2018 13:56:46<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встре</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Нам не интересно, спасибо</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить через две недели</div>03.12.2018 13:56:55<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Нам не интересно, спасибо</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить через две недели</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">09,01 не взял никто трубку. </div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">09 01 - прислать видео в вайбер на тот же номер</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить через две недели</div>'),
  (61, 47, 10, NULL, '2018-11-27 15:37:45', NULL, null, '03.12.2018 14:14:46<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Абонент вне зоны</div><br/>false14.12.2018 12:54:58<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу  системы автоматизации. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Секретарь спросила при мне руководителя, давать ли трубку и сказала что нам это не нужно.</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить с другой стратегией </div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить с другой стратегией </div>'),
  (62, 48, 10, NULL, '2018-11-27 15:38:23', NULL, null, '03.12.2018 14:15:55<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">не берет трубку</div><br/>false14.12.2018 12:59:45<br/><p>Клиент: \n                        \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу  системы автоматизации. Вы руководитель?</p><p>Клиент: \n                        \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Повышаем прибыльность небольших компаний. Разрабатываем индивидуальные программы для бизнеса. Не устроить результат - не оплачиваете  (прописано в договоре).</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не ясно кто это, но сказала, нет спасибо, нет спасибо и сбросила.</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Проявить изобретательность </div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Проявить изобретательность </div>'),
  (63, 49, 10, NULL, '2018-11-27 15:39:10', NULL, null, '03.12.2018 14:24:02<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">абонент не доступен</div><br/>false14.12.2018 13:04:33<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ЛПР сейчас занять, звоните на моб. Секретарь дала номер, Имя и отчество</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Позвонить лично ЛПР.</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Позвонить лично ЛПР.</div>'),
  (64, 50, 10, NULL, '2018-11-27 15:41:05', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Не берут трубку, перезвонить</div>14.12.2018 13:17:23<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        Кто вы?                        \n                    </p><p>Менеджер: Это (имя, отчество менеджера). Руководитель на месте?</p><p>Клиент: \n                        \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Повышаем прибыльность небольших компаний. Разрабатываем индивидуальные программы для бизнеса. Не устроить результат - не оплачиваете  (прописано в договоре).</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Понедельник приедет с конфы.</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить в плнидельник</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить в плнидельник</div>'),
  (66, 52, 10, NULL, '2018-11-27 15:43:04', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">в первый раз был разговор, в котором какая-то девушка сказала что, да интересно, но времени нет, всё рассматривают на почту. Потом пару раз позвонил Олег, руководителя не было на месте. перезвонить  </div>', NULL),
  (67, 53, 10, NULL, '2018-11-27 15:44:01', NULL, null, '03.12.2018 13:23:19<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ёёё</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ёё</div>03.12.2018 13:36:54<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        Кто вы?                        \n                    </p><p>Менеджер: Это (имя, отчество менеджера). Руководитель на месте?</p><p>Клиент: \n                        \n                        Из какой компании?                        \n                    </p><p>Менеджер: Ingello systems. Мы Вам проводим технический анализ. Соедините руководителем.</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Вроде взяла трубку ЛПР, сказала если будет интересно, с Вами свяжутся.</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить через две недели.</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить через две недели.</div>'),
  (68, 54, 10, NULL, '2018-11-27 15:45:06', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Не ещё успел позвонить.</div>14.12.2018 13:26:20<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу  системы автоматизации. Вы руководитель?</p><p>Клиент: \n                        \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Повышаем прибыльность небольших компаний. Разрабатываем индивидуальные программы для бизнеса. Не устроить результат - не оплачиваете  (прописано в договоре).</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Поговорил с старшим админом, уже есть ПО, сказала что все устраивает, но говорит не уверенно. Рассказала что  в скором времени будт на законодательном уровне будет ведено обязательное ПО.</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Отправить ссылку на почту.</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Отправить ссылку на почту.</div>'),
  (69, 55, 10, NULL, '2018-11-27 15:45:30', NULL, null, '27.11.2018 14:23:34<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу  системы автоматизации. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Директор в отпуске</div><br/>', NULL),
  (71, 57, 10, NULL, '2018-11-27 15:47:03', NULL, null, '27.11.2018 14:12:51<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Вам перезвонят </div><br/><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Отправил руководителю систему в скайп</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">*в вайбер</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Слабо заинтересована, мало времени.</div>', NULL),
  (73, 29, 7, NULL, '2018-11-28 13:09:30', NULL, null, NULL, NULL),
  (75, 66, 10, NULL, '2018-12-06 15:14:09', NULL, null, '06.12.2018 13:22:54<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        Руководителя нет, вышлите на почту                        \n                    </p><p>Менеджер: Мне нужно переговорить с ним сегодня, т.к. мы могли бы дать компании дополнительных клиентов. Продиктуйте его номер.</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ЛПР заняты, получил имена</div><br/>false14.12.2018 13:33:02<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Секретарь ничего полезного не сказала. Много директоров.</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить в понедельник. Нету лпр на месте.</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить в понедельник. Нету лпр на месте.</div>'),
  (76, 67, 10, NULL, '2018-12-06 15:24:09', NULL, null, '06.12.2018 13:26:45<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Будет  завтра к двум</div><br/>false14.12.2018 13:38:11<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу  системы автоматизации. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Взяла трубку не понятно кто, сказала поговорить с администратором через две минуты.</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Позвонить Администратору</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Позвонить Администратору</div>'),
  (77, 68, 10, NULL, '2018-12-06 15:31:14', NULL, null, '06.12.2018 13:44:34<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Повышаем прибыльность небольших компаний. Разрабатываем индивидуальные программы для бизнеса. Не устроить результат - не оплачиваете  (прописано в договоре).</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">13 : 30  встреча.</div><br/>false<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Встреча в среду 13: 30. 12.12.2018\r\n</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Встреча прошла странна и за 5 минут, не захотел слушать, хотел услышать конкретное предложение как увеличить продажи\r\n</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">была встреча 15 .01 он не пришел</div>', 'false'),
  (78, 69, 10, NULL, '2018-12-06 15:46:32', NULL, null, '06.12.2018 13:50:05<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        Кто вы?                        \n                    </p><p>Менеджер: Это (имя, отчество менеджера). Руководитель на месте?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не прошел секретаря, не использовал скрипт</div><br/>false', 'false'),
  (79, 70, 10, NULL, '2018-12-06 15:52:01', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Нет ответа</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Павел, консультация</div>', NULL),
  (80, 71, 10, NULL, '2018-12-06 16:19:28', NULL, null, '06.12.2018 14:22:27<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        Руководителя нет, вышлите на почту                        \n                    </p><p>Менеджер: Мне нужно переговорить с ним сегодня, т.к. мы могли бы дать компании дополнительных клиентов. Продиктуйте его номер.</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не прошёл секретаря </div><br/>false', 'false'),
  (81, 72, 10, NULL, '2018-12-06 16:25:19', NULL, null, '06.12.2018 14:30:32<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Взяла трубку ЛПР и слила меня на секретаря</div><br/>false', 'false'),
  (82, 73, 10, NULL, '2018-12-06 16:37:33', NULL, null, '06.12.2018 14:43:05<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Повышаем прибыльность небольших компаний. Разрабатываем индивидуальные программы для бизнеса. Не устроить результат - не оплачиваете  (прописано в договоре).</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Вторник 11 числа позвонить к трем часам договорится о встрече. Уже работают по договору с конторой.</div><br/>false<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Встретились с Ириной Владимировной. Ирина рассказала о компании. Компания очень большая - мед центр с комплексными услугами. На рынке давно много этапов программных изменений прошли. Есть куча графиков и аналитик в штате. \r\nИрина Владимировна сказала, что может заинтересуется отдел кадров. \r\nДоговорились о встрече  на будущей неделе чтобы обсудить это с другими людьми. \r\n</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">(12.12.18)</div>', 'false'),
  (83, 74, 10, NULL, '2018-12-06 16:47:25', NULL, null, '06.12.2018 14:51:58<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Позвонить завтра</div><br/>false14.12.2018 13:50:20<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Повышаем прибыльность небольших компаний. Разрабатываем индивидуальные программы для бизнеса. Не устроить результат - не оплачиваете  (прописано в договоре).</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча завтра, позвонить договорится о месте и времени. Контакты передал нам Алексей</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча 15.12.2018</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">На встрече рассказала что уже пользуются ПО, которое написал штат программистов,  ПО с очень древним интерфесом. заинтересовал модуль планирования и найма. В нашем ПО очень понравился дизайн. Компания довольно большая.Марина занимет должность руководителя отдела маркетинга, она же и единственный работник этого отдела.\r\n</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча 15.12.2018</div>'),
  (84, 75, 10, NULL, '2018-12-06 16:54:01', NULL, null, '06.12.2018 14:57:34<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не берут трубку </div><br/>false', 'false'),
  (85, 28, 7, NULL, '2018-12-11 14:56:12', NULL, null, NULL, NULL),
  (86, 27, 8, NULL, '2018-12-11 15:00:18', NULL, null, '11.12.2018 13:03:36<br/><p>Клиент: \n                        \n                        Руководителя нет, вышлите на почту                        \n                    </p><p>Менеджер: Мне нужно переговорить с ним сегодня, т.к. мы могли бы дать компании дополнительных клиентов. Продиктуйте его номер.</p><p>Клиент: \n                        \n                        Что за система?                        \n                    </p><p>Менеджер: НЕПАПИШОАТЫУОЩАТ</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ФЦУКЫВАП2345678Ш54</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">ЫВАЯЧПРАПОР\r\n</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ФЦУКЫВАП2345678Ш54</div>'),
  (87, 27, 18, NULL, '2018-12-12 13:03:36', NULL, null, NULL, NULL),
  (89, 27, 18, NULL, '2018-12-12 13:06:03', NULL, null, NULL, NULL),
  (90, 27, 18, NULL, '2018-12-12 13:06:19', NULL, null, NULL, NULL),
  (91, 28, 18, NULL, '2018-12-12 13:06:37', NULL, null, NULL, NULL),
  (92, 27, 7, NULL, '2018-12-12 13:06:46', NULL, null, NULL, NULL),
  (93, 27, 8, NULL, '2018-12-12 13:06:54', NULL, null, NULL, NULL),
  (94, 27, 8, NULL, '2018-12-12 13:07:01', NULL, null, NULL, NULL),
  (95, 28, 8, NULL, '2018-12-12 13:07:33', NULL, null, NULL, NULL),
  (96, 27, 8, NULL, '2018-12-12 13:08:57', NULL, null, NULL, NULL),
  (97, 27, 8, NULL, '2018-12-12 13:09:23', NULL, null, NULL, NULL),
  (98, 28, 8, NULL, '2018-12-12 13:09:33', NULL, null, NULL, NULL),
  (99, 28, 18, NULL, '2018-12-12 13:09:42', NULL, null, NULL, NULL),
  (100, 28, 18, NULL, '2018-12-12 13:10:11', NULL, null, NULL, NULL),
  (101, 29, 8, NULL, '2018-12-12 13:10:35', NULL, null, NULL, NULL),
  (102, 28, 19, NULL, '2018-12-12 13:11:02', NULL, null, NULL, NULL),
  (103, 29, 8, NULL, '2018-12-12 13:11:39', NULL, null, NULL, NULL),
  (104, 28, 8, NULL, '2018-12-12 13:12:39', NULL, null, NULL, NULL),
  (105, 59, 18, NULL, '2018-12-12 13:12:53', NULL, null, NULL, NULL),
  (106, 28, 18, NULL, '2018-12-12 13:14:06', NULL, null, NULL, NULL),
  (107, 29, 8, NULL, '2018-12-12 13:16:04', NULL, null, NULL, NULL),
  (108, 60, 18, NULL, '2018-12-12 13:21:42', NULL, null, NULL, NULL),
  (109, 59, 20, NULL, '2018-12-12 13:22:36', NULL, null, NULL, NULL),
  (110, 28, 18, NULL, '2018-12-12 13:24:29', NULL, null, NULL, NULL),
  (111, 29, 19, NULL, '2018-12-12 13:26:56', NULL, null, NULL, NULL),
  (112, 29, 20, NULL, '2018-12-12 13:27:34', NULL, null, NULL, NULL),
  (113, 29, 8, NULL, '2018-12-12 13:33:15', NULL, null, NULL, NULL),
  (114, 59, 19, NULL, '2018-12-12 13:33:28', NULL, null, NULL, NULL),
  (115, 27, 8, NULL, '2018-12-12 13:33:44', NULL, null, NULL, NULL),
  (116, 59, 7, NULL, '2018-12-12 13:34:03', NULL, null, NULL, NULL),
  (117, 59, 19, NULL, '2018-12-12 13:38:51', NULL, null, NULL, NULL),
  (118, 60, 18, NULL, '2018-12-12 13:39:11', NULL, null, NULL, NULL),
  (119, 59, 19, NULL, '2018-12-12 13:39:59', NULL, null, NULL, NULL),
  (120, 27, 19, NULL, '2018-12-12 13:51:21', NULL, null, NULL, NULL),
  (122, 79, 10, NULL, '2018-12-12 16:32:16', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Есть уже ПО.  Не согласилась дальше разговаривать</div>', NULL),
  (123, 80, 10, NULL, '2018-12-12 16:47:38', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Руководителя нет на месте, звонить примерно к трём.</div>', NULL),
  (124, 81, 10, NULL, '2018-12-12 16:49:56', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Директор на конференции будет с 12 декабря </div>14.12.2018 12:39:47<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Секретарь врёт по поводу отсутствия руководителя, но выдала его имя. </div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Позвонить через неделю от имени другой компании</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Позвонить через неделю от имени другой компании</div>'),
  (125, 82, 11, NULL, '2018-12-12 16:53:45', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Не прошел секретаря</div>', NULL),
  (126, 83, 10, NULL, '2018-12-12 16:58:15', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Руководитель будет с 12 декабря </div>', NULL),
  (127, 84, 10, NULL, '2018-12-12 17:01:50', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Не было на месте, перезвонить</div>', NULL),
  (128, 85, 10, NULL, '2018-12-12 17:14:33', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Руководитель заболел, позвонить в пятницу.</div>', NULL),
  (129, 86, 10, NULL, '2018-12-12 17:26:39', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\"></div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Встреча 13.12.2018. записывает все данные на листике.</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Высказал свое негативное видинье дизайна и функционала. Было решено связаться после того как он скинет пример интересующего ПО, встретится и обсудить все подробнее.</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">todo: напомнить о договоренности</div>', NULL),
  (130, 87, 10, NULL, '2018-12-12 17:30:46', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Нет на месте, перезвонить.</div>', NULL),
  (131, 88, 10, NULL, '2018-12-12 18:12:54', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">ЛПР спросила за лицензию, сказал что у нас GNU лицензия. Так, же, попросила перечислить функционал нашего ПО, на каждый пункт сказала что у нас это есть. Очень не понятливая девушка.</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">сказал что скину на почту</div>', NULL),
  (132, 89, 10, NULL, '2018-12-12 18:19:12', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Руководитель плохо говорит на русском, ничего не понял, но вроде как, его заинтересоывало, попросил личный номер.</div>', NULL),
  (133, 90, 10, NULL, '2018-12-12 18:21:26', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Не прошёл секретаря.</div>', NULL),
  (134, 91, 10, NULL, '2018-12-12 18:23:28', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Нет на месте, перезвонить.</div>', NULL),
  (135, 92, 10, NULL, '2018-12-12 18:25:23', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Нет на месте, перезвонить.</div>', NULL),
  (136, 93, 10, NULL, '2018-12-12 18:27:48', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Не записано ничего по этому поводу, но вроде общался Олег и договорился о встрече.</div>', NULL),
  (137, 94, 10, NULL, '2018-12-12 18:32:14', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Провели встречу, решили что можем помочь, скидываем данные на почту.</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Большая современная стоматология, есть филиал в Киеве. Пользуются ПО под названием Лакмус. Наталья нормально относится к медицине как к бизнесу, готова рассматривать некоторые модули нашего ПО для интеграции.</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">В Киеве две клиники.Наталя считает показателем качества работы кол-во операции в день.все специалисты ускоспециолезированы. Указала на нехватку ПО для отчётности, расчета зп. </div>', NULL),
  (138, 95, 10, NULL, '2018-12-12 18:37:11', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Руководитель человек в возрасте, ничего в этом не понимает, передал кому-то трубку, на предложение втсречи сказали что вообще нет времени. Попросили скинуть на почту</div>', NULL);
INSERT INTO `selling` (`id`, `customer_id`, `warehouse_id`, `name`, `date_create`, `date_complete`, `state_id`, `dialog`, `next_step`) VALUES
  (139, 28, 19, NULL, '2018-12-15 16:25:34', NULL, null, '15.12.2018 14:30:23<br/><p>Клиент: \n                        \n                        Кто вы?                        \n                    </p><p>Менеджер: Это (имя, отчество менеджера). Руководитель на месте?</p><p>Клиент: \n                        \n                        Из какой компании?                        \n                    </p><p>Менеджер: цукенг</p><p>Клиент: \n                        \n                        ЛПР Есть интерес. Расскажите еще подробнее.                        \n                    </p><p>Менеджер: Могли бы Вы переговорить с нашим директором. Он расскажет все технические и формальные детали. </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Обсле...</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Обсле...</div>'),
  (141, 28, 22, NULL, '2018-12-20 15:51:27', NULL, null, NULL, NULL),
  (142, 27, 21, NULL, '2019-01-08 13:28:44', NULL, null, '08.01.2019 11:29:57<br/><p>Клиент: \n                        \n                        Что за система?                        \n                    </p><p>Менеджер: Для автоматизации продаж. Вы руководитель, я правильно понимаю? Переключите на руководителя! </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">отличный разговор</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">перезвонить в понедельник</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">поставка товаров во вторник</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">перезвонить в понедельник</div>'),
  (143, 29, 7, NULL, '2019-01-08 13:43:17', NULL, null, NULL, NULL),
  (152, 108, 10, NULL, '2019-01-08 17:03:26', NULL, null, '08.01.2019 15:05:53<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><p>Клиент: \n                        \n                        По какому вопросу?                        \n                    </p><p>Менеджер: Да, это по поводу  системы автоматизации. Вы руководитель?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Нет на месте</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">позвонить 9 января с  двух до пяти </div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">позвонить 9 января с  двух до пяти </div>'),
  (153, 28, 1, NULL, '2019-01-08 17:06:25', NULL, null, NULL, NULL),
  (154, 29, 1, NULL, '2019-01-08 17:06:56', NULL, null, NULL, NULL),
  (155, 60, 1, NULL, '2019-01-08 17:07:50', NULL, null, NULL, NULL),
  (156, 27, 7, NULL, '2019-01-08 17:09:40', NULL, null, NULL, NULL),
  (157, 109, 10, NULL, '2019-01-08 17:09:48', NULL, null, '08.01.2019 15:14:16<br/><p>Клиент: \n                        \n                        Алло                        \n                    </p><p>Менеджер: Добрый день, соедениет с руководителем </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Четверг 12:00</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча</div>'),
  (158, 28, 7, NULL, '2019-01-08 17:09:51', NULL, null, NULL, NULL),
  (159, 29, 7, NULL, '2019-01-08 17:10:28', NULL, null, NULL, NULL),
  (160, 78, 7, NULL, '2019-01-08 17:10:46', NULL, null, NULL, NULL),
  (161, 28, 18, NULL, '2019-01-08 17:12:46', NULL, null, NULL, NULL),
  (162, 60, 18, NULL, '2019-01-08 17:13:08', NULL, null, NULL, NULL),
  (163, 78, 18, NULL, '2019-01-08 17:13:21', NULL, null, NULL, NULL),
  (164, 28, 19, NULL, '2019-01-08 17:15:22', NULL, null, NULL, NULL),
  (165, 29, 19, NULL, '2019-01-08 17:26:03', NULL, null, NULL, NULL),
  (166, 60, 18, NULL, '2019-01-08 17:26:15', NULL, null, NULL, NULL),
  (167, 27, 26, NULL, '2019-01-08 17:27:14', NULL, null, NULL, NULL),
  (168, 28, 26, NULL, '2019-01-08 17:27:35', NULL, null, NULL, NULL),
  (169, 29, 26, NULL, '2019-01-08 17:28:05', NULL, null, NULL, NULL),
  (170, 29, 26, NULL, '2019-01-08 17:28:23', NULL, null, NULL, NULL),
  (171, 59, 26, NULL, '2019-01-08 17:29:03', NULL, null, NULL, NULL),
  (172, 60, 26, NULL, '2019-01-08 17:29:18', NULL, null, NULL, NULL),
  (173, 60, 26, NULL, '2019-01-08 17:29:33', NULL, null, NULL, NULL),
  (174, 78, 26, NULL, '2019-01-08 17:29:44', NULL, null, NULL, NULL),
  (175, 102, 26, NULL, '2019-01-08 17:29:56', NULL, null, NULL, NULL),
  (176, 27, 22, NULL, '2019-01-08 17:30:48', NULL, null, NULL, NULL),
  (177, 28, 22, NULL, '2019-01-08 17:31:12', NULL, null, NULL, NULL),
  (178, 29, 22, NULL, '2019-01-08 17:32:26', NULL, null, NULL, NULL),
  (179, 60, 22, NULL, '2019-01-08 17:32:53', NULL, null, NULL, NULL),
  (180, 78, 22, NULL, '2019-01-08 17:34:13', NULL, null, NULL, NULL),
  (181, 27, 23, NULL, '2019-01-08 17:45:10', NULL, null, NULL, NULL),
  (182, 28, 23, NULL, '2019-01-08 17:45:32', NULL, null, NULL, NULL),
  (183, 59, 20, NULL, '2019-01-08 17:46:03', NULL, null, NULL, NULL),
  (184, 102, 23, NULL, '2019-01-08 17:46:51', NULL, null, NULL, NULL),
  (185, 29, 18, NULL, '2019-01-08 17:50:51', NULL, null, NULL, NULL),
  (186, 28, 19, NULL, '2019-01-08 17:51:17', NULL, null, NULL, NULL),
  (187, 110, 10, NULL, '2019-01-09 17:03:57', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Встреча в пятницу 11 числа по предварительному созвону</div>', NULL),
  (188, 111, 10, NULL, '2019-01-09 17:06:56', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Встреча на 11-12 число, ближе к 15:00 с предварительным созвоном.  </div>', NULL),
  (189, 112, 10, NULL, '2019-01-09 17:11:52', NULL, null, '<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">Плохо говорит на русском. Не расслышал имя. Встреча на пн 14 января в 10:00  </div>', NULL),
  (190, 28, 7, NULL, '2019-01-10 14:10:02', NULL, null, NULL, NULL),
  (191, 102, 8, NULL, '2019-01-11 10:21:12', NULL, null, NULL, NULL),
  (192, 113, 26, NULL, '2019-01-11 10:22:51', NULL, null, NULL, NULL),
  (194, 114, 27, NULL, '2019-01-11 11:29:36', NULL, null, '11.01.2019 09:30:01<br/><p>Клиент: \n                        \n                        ЛПР Что Вы предлагаете?                        \n                    </p><p>Менеджер: Мы создаём ПОНЯТНОЕ программное обеспечение для компании и сотрудников, у нас две цели: 1)Повышение прибыльности компании;\n2)Порядок и дисциплина в бизнесе; \nВы сейчас пользуетесь какими либо программами, или может Excell, или ручка-листик?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не удалось пройти секретаря</div><br/>false<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">рвапролджэжм</div>', 'false'),
  (195, 115, 27, NULL, '2019-01-11 11:32:17', NULL, null, '11.01.2019 09:33:35<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">По словам ЛПР компания новая, предложение заинтересовало но испугала цена</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Олег, у тебя выйдет её убедить</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Олег, у тебя выйдет её убедить</div>'),
  (196, 116, 27, NULL, '2019-01-11 11:37:37', NULL, null, '11.01.2019 09:38:09<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не ответили на звонок</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить</div>'),
  (197, 117, 27, NULL, '2019-01-11 11:39:03', NULL, null, '11.01.2019 09:40:13<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Агрессивно отнеслись к звонку</div><br/>false', 'false'),
  (198, 118, 27, NULL, '2019-01-11 11:42:41', NULL, null, '11.01.2019 09:43:54<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">В калл центре дали номер главного офиса в Киеве </div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">0443920606 Киевский офис</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">0443920606 Киевский офис</div>'),
  (199, 119, 27, NULL, '2019-01-11 11:47:15', NULL, null, '11.01.2019 09:50:15<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Договорились о встрече 14.01 (предварительный созвон в 12:00 14.01)</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Договорились о встрече 14.01 (предварительный созвон в 12:00 14.01)</div>'),
  (200, 120, 27, NULL, '2019-01-11 11:51:18', NULL, null, '11.01.2019 09:52:03<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ЛПР в отпуске</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить 20.01-21.01</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить 20.01-21.01</div>'),
  (202, 121, 27, NULL, '2019-01-11 11:54:51', NULL, null, '11.01.2019 09:55:34<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон 14.01</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон 14.01</div>'),
  (203, 122, 27, NULL, '2019-01-11 11:57:21', NULL, null, '11.01.2019 09:58:04<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не ответили на звонок</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>'),
  (204, 123, 27, NULL, '2019-01-11 12:11:25', NULL, null, '11.01.2019 10:12:20<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Отказались от ПО, сказали что оно им не нужно и не понадобится </div><br/>false', 'false'),
  (205, 124, 27, NULL, '2019-01-11 12:13:52', NULL, null, '11.01.2019 10:14:23<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Попросили перезвонить 14.01</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>'),
  (206, 125, 27, NULL, '2019-01-11 12:15:18', NULL, null, '11.01.2019 10:16:00<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Пьяный Денис попросил перезвонить потом</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>'),
  (207, 126, 27, NULL, '2019-01-11 12:17:15', NULL, null, '11.01.2019 10:17:59<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Серьёзная компания с ЛПР лучше переговорить Олегу</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон ЛПР</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон ЛПР</div>'),
  (208, 127, 27, NULL, '2019-01-11 12:19:22', NULL, null, '11.01.2019 10:20:07<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Долго ждал соединения с ЛПР (не соединили)</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>'),
  (209, 128, 27, NULL, '2019-01-11 12:21:23', NULL, null, '11.01.2019 10:22:33<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Договорились о встрече 14.01 в 17:00 (предварительный созвон в 15:00)</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча</div>'),
  (210, 129, 27, NULL, '2019-01-11 12:25:33', NULL, null, '11.01.2019 10:55:33<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не вышло убедить</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>'),
  (211, 130, 27, NULL, '2019-01-11 12:57:32', NULL, null, '11.01.2019 10:59:49<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не давно начали пользоваться CRM</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Можно позвонить через месяц и узнать всё ли их устраивает</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Можно позвонить через месяц и узнать всё ли их устраивает</div>'),
  (212, 131, 27, NULL, '2019-01-11 13:01:30', NULL, null, '11.01.2019 11:07:21<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Нет продаж, нужно перезвонить тому кто сможет их убедить в том что мы поднимем продажи</div><br/>false', 'false'),
  (213, 132, 27, NULL, '2019-01-11 13:09:06', NULL, null, '11.01.2019 11:11:59<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не заинтересованы</div><br/>false', 'false'),
  (214, 133, 27, NULL, '2019-01-11 13:13:03', NULL, null, '11.01.2019 11:13:38<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">(Закончила разговор вежливо)</div><br/>false', 'false'),
  (215, 134, 27, NULL, '2019-01-11 13:14:44', NULL, null, '11.01.2019 11:16:16<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча 15.01 в 12:00 созвонится </div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча</div>'),
  (216, 135, 27, NULL, '2019-01-11 13:17:06', NULL, null, '11.01.2019 11:17:38<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не ответили на звонок</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>'),
  (217, 27, 1, NULL, '2019-01-11 17:19:31', NULL, null, NULL, NULL),
  (218, 137, 27, NULL, '2019-01-13 17:39:44', NULL, null, '13.01.2019 15:40:10<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">руководителя нет на месте</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">перезвон</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">перезвон</div>'),
  (219, 138, 27, NULL, '2019-01-13 17:41:22', NULL, null, '13.01.2019 15:42:07<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">руководителя нет на месте</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">перезвон</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">перезвон</div>'),
  (220, 139, 27, NULL, '2019-01-13 17:43:14', NULL, null, '13.01.2019 15:44:01<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча 15.01 предварительный созвон в 12:00</div>13.01.2019 15:44:01<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча 15.01 предварительный созвон в 12:00</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Встреча 15.01 предварительный созвон в 12:00</div>'),
  (221, 140, 27, NULL, '2019-01-13 17:44:59', NULL, null, '13.01.2019 15:45:37<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Пользуется блокнотом\nМожно попробовать убедить </div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>'),
  (222, 141, 27, NULL, '2019-01-13 20:41:00', NULL, null, '13.01.2019 18:41:14<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Отказ</div><br/>false', 'false'),
  (223, 142, 27, NULL, '2019-01-13 20:42:13', NULL, null, '13.01.2019 18:42:43<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить ЛПРу</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвонить ЛПРу</div>'),
  (224, 143, 27, NULL, '2019-01-13 20:43:24', NULL, null, '13.01.2019 18:43:42<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не ответили на звонок</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">Перезвон</div>'),
  (225, 144, 27, NULL, '2019-01-13 20:44:25', NULL, null, '13.01.2019 18:44:41<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Не заинтересованы</div><br/>false', 'false'),
  (226, 145, 27, NULL, '2019-01-14 14:27:50', NULL, null, NULL, NULL),
  (227, 28, 21, NULL, '2019-01-14 17:06:46', NULL, null, '14.01.2019 15:15:40<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">івапроуке</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">вапролдвапролб</div>14.01.2019 15:15:42<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">івапроуке</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">вапролдвапролб</div>14.01.2019 15:15:45<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">івапроуке</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">вапролдвапролб</div>14.01.2019 15:15:52<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">івапроуке</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">вапролдвапролб</div>14.01.2019 15:15:53<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">івапроуке</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">вапролдвапролб</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">івапролвапролро</div>', '<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">вапролдвапролб</div>'),
  (228, 28, 1, NULL, '2019-02-07 11:44:15', NULL, null, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `selling_product`
--

CREATE TABLE `selling_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selling_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `cost_type` int(11) DEFAULT NULL,
  `overhead_cost_id` int(11) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `pack_unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `strategy`
--

CREATE TABLE `strategy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strategy`
--

INSERT INTO `strategy` (`id`, `name`, `description`) VALUES
  (1, 'Холодные звонки', 'NULL'),
  (3, '1 Вид собеседования', ''),
  (4, '1 Вид собеседования', ''),
  (5, 'Продажа', ''),
  (6, 'ррло', 'ор'),
  (7, 'тест', '1'),
  (8, 'TestForGabri', ''),
  (9, 'Тестовая стратегия №1', 'Тестовая стратегия №1');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `firm` varchar(100) DEFAULT NULL,
  `contact_name` varchar(100) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `tax_rate` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `firm`, `contact_name`, `country_id`, `address`, `email`, `tax_rate`) VALUES
  (1, 'Ткаченко', 'Ткаченко', 'Михаил Ткаченко', 1, 'Киев', 'misha.tka4enko@gmail.com', 2.20),
  (2, 'Боренко', 'Боренко', 'Боренко Павел', 2, 'Варшава', 'p.borenko@gmail.com', 2.80),
  (3, 'Овик', 'Болгарские напитки', 'Овик', 3, 'Прага', 'kavkazec.wakeup@gmail.com', 2.40),
  (4, 'Полко', 'Полко', 'Александр Маслаев', 4, 'Берлин', 'alex.butter@gmail.com', 2.50),
  (5, 'Колядар', 'Колядар', 'Артур', 5, 'Париж', 'archie@gmail.com', 2.10),
  (6, 'Поставщик спиртного', 'Пьяный мастер', 'Вадим Олегович', 1, 'Харьков, Сумская 21-в', 'olpmaster@gmail.com', 10.00),
  (7, 'Поставщик номер 2', 'ФИрма', '1', 2, '1', '1', 1.00),
  (8, 'Поставщик услуг', 'ПостУслу', 'Олег', 1, 'Харьков, Широнинцев 15', 'olijenius@gmail.com', 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `tax_rate`
--

CREATE TABLE `tax_rate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `percent` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tax_rate`
--

INSERT INTO `tax_rate` (`id`, `name`, `percent`) VALUES
  (4, 'ФЛП 3 группа', 3.00),
  (5, 'ФЛП 2 группа', 5.00),
  (6, 'ООО', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dynagrid`
--

CREATE TABLE `tbl_dynagrid` (
  `id` varchar(100) NOT NULL COMMENT 'Unique dynagrid setting identifier',
  `filter_id` varchar(100) DEFAULT NULL COMMENT 'Filter setting identifier',
  `sort_id` varchar(100) DEFAULT NULL COMMENT 'Sort setting identifier',
  `data` varchar(5000) DEFAULT NULL COMMENT 'Json encoded data for the dynagrid configuration'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dynagrid personalization configuration settings';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dynagrid_dtl`
--

CREATE TABLE `tbl_dynagrid_dtl` (
  `id` varchar(100) NOT NULL COMMENT 'Unique dynagrid detail setting identifier',
  `category` varchar(10) NOT NULL COMMENT 'Dynagrid detail setting category "filter" or "sort"',
  `name` varchar(150) NOT NULL COMMENT 'Name to identify the dynagrid detail setting',
  `data` varchar(5000) DEFAULT NULL COMMENT 'Json encoded data for the dynagrid detail configuration',
  `dynagrid_id` varchar(100) NOT NULL COMMENT 'Related dynagrid identifier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dynagrid detail configuration settings';

-- --------------------------------------------------------

--
-- Table structure for table `transit`
--

CREATE TABLE `transit` (
  `id` int(11) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_complete` datetime DEFAULT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transit`
--

INSERT INTO `transit` (`id`, `from_warehouse_id`, `to_warehouse_id`, `name`, `date_create`, `date_complete`, `state`) VALUES
  (1, 18, 7, 'Перемещение новое', '2018-12-20 16:14:05', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transit_overhead_cost`
--

CREATE TABLE `transit_overhead_cost` (
  `id` int(11) NOT NULL,
  `transit_id` int(11) NOT NULL,
  `overhead_cost_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transit_product`
--

CREATE TABLE `transit_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transit_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `overhead_cost_id` int(11) DEFAULT NULL,
  `pack_unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transit_product`
--

INSERT INTO `transit_product` (`id`, `product_id`, `transit_id`, `quantity`, `overhead_cost_id`, `pack_unit_id`) VALUES
  (1, 13, 1, 4, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
  (11, 'Инструмент'),
  (12, 'Объект'),
  (5, 'Продукт'),
  (13, 'Расходный материал'),
  (14, 'Сотрудник'),
  (10, 'Услуга');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `rate` double DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `rate`, `description`, `name`) VALUES
  (1, 60000, '<p>Почему мы?</p>\r\n<p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p>\r\n<p>Условия работы</p>\r\n<p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p>\r\n<p>Что Вы получите?</p>\r\n<p>Самые комфортные условия труда по мере Вашего роста</p>', 'Должность Круглая'),
  (2, 70000, '<p>Почему мы?</p>\r\n<p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p>\r\n<p>Условия работы</p>\r\n<p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p>\r\n<p>Что Вы получите?</p>\r\n<p>Самые комфортные условия труда по мере Вашего роста</p>', 'Должность Интересная'),
  (3, 120000, '<p>Почему мы?</p>\r\n<p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p>\r\n<p>Условия работы</p>\r\n<p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p>\r\n<p>Что Вы получите?</p>\r\n<p>Самые комфортные условия труда по мере Вашего роста</p>', 'Должность Высокая'),
  (4, 15000, '<p>Почему мы?</p>\r\n<p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p>\r\n<p>Условия работы</p>\r\n<p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p>\r\n<p>Что Вы получите?</p>\r\n<p>Самые комфортные условия труда по мере Вашего роста</p>', 'Должность младшего специалиста'),
  (5, 1, '<p>Красная</p>', 'Красная​'),
  (6, 2, '<p>Синяя</p>', 'Синяя'),
  (7, 3, '<p>Жёлтая</p>', 'Жёлтая'),
  (8, 1, '<p>й</p>', 'Чёрная'),
  (9, 2, '<p>цйуй</p>', 'Серая'),
  (10, 234, '<p>Белая</p>', 'Белая'),
  (11, 400, '<p>Необходим опытный работник со знанием своего дела</p>', 'Прораб'),
  (24, 500, '<p>Нужен строитель для постройки бани</p>', 'Строитель'),
  (25, 300, '<p>Нужен специалист, чтоб пробить стену для нового помещения </p>', 'Демонтажник'),
  (26, 150, '<p>Нужен человек для замены сантехники, можно с малым кол-во опыта.</p>', 'Сантехник'),
  (27, 800, '<p>Нужен очень опытный специалист</p>', 'Геодезист'),
  (28, 600, '<p>Нужен очень опытный специалист</p>', 'Бригадир'),
  (29, 600, '<p>Нужен очень опытный специалист с правами кат C</p>', 'Водитель кат C'),
  (30, 300, '<p>Нужен очень опытный специалист </p>', 'Электрик '),
  (31, 1000, '<p>Нужен очень опытный специалист </p>', 'Архитектор'),
  (32, 1000, '<p>Нужен очень опытный специалист </p>', 'Геолог'),
  (34, 300, '<p>Нужен уборщик рабочей територии</p>', 'Уборщик'),
  (36, 10000, '<p>Описание этой вакансии.</p><p>В ней много преимуществ. </p><p>И так далее...</p>', 'Вакансия Токаря от 10 до 15 лет опыта'),
  (38, 300, '<p>300 грн в день</p><p>опыт, требования, задачиопыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', 'Разнорабочий'),
  (49, NULL, '', 'Разнорабочий'),
  (50, 300, '<p>Нужен специалист по дереву</p>', 'Плотник'),
  (51, 1000, '<p>Нужен специалист по сварке</p>', 'Сварщик'),
  (52, 1000, '<p>Нужен специалист по бетонам</p>', 'Специалист по заполнителям бетонов'),
  (53, 2000, '<p>Нужен специалист</p>', 'Высотный рабочий'),
  (54, NULL, '', 'Помощник сварщика'),
  (55, NULL, '', 'помощник электрика'),
  (56, 75000, '<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\" style=\"width: 421px; height: 271px;\" width=\"421\" height=\"271\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно. </p><p>И <a href=\"https://google.com\" target=\"_blank\">ссылки</a> делать</p>', 'Руководитель'),
  (57, 3999, '<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\" width=\"363\" height=\"258\" style=\"width: 363px; height: 258px;\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно.</p><p>И <a href=\"https://google.com/\" target=\"_blank\">ссылки</a> делать</p>', 'Оператор крана'),
  (58, 39000, '<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно.</p><p>И <a href=\"https://google.com/\" target=\"_blank\">ссылки</a> делать</p>', 'Специалист по кровле'),
  (59, 4000, '<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\" width=\"463\" height=\"297\" style=\"width: 463px; height: 297px;\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно.</p><p>И <a href=\"https://google.com/\" target=\"_blank\">ссылки</a> делать</p>', 'Водитель экскаватора '),
  (60, 7000, '<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно.</p><p>И <a href=\"https://google.com/\" target=\"_blank\">ссылки</a> делать</p>', 'Дизайнер помещений '),
  (61, 3000, '<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно.</p><p>И <a href=\"https://google.com/\" target=\"_blank\">ссылки</a> делать</p>', 'Замерщик'),
  (62, 2000, '<p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"ÐÐ°ÑÑÐ¸Ð½ÐºÐ¸ Ð¿Ð¾ Ð·Ð°Ð¿ÑÐ¾ÑÑ ÑÑÐºÐ¾Ð²Ð¾Ð´Ð¸ÑÐµÐ»Ñ\"></p>', 'дизайнер'),
  (63, NULL, '', 'Плиточник'),
  (64, NULL, '', 'Гибсокортонщик'),
  (65, NULL, '', 'Отделочник'),
  (66, 6000, '<p>Прораб: ответственность + опытность. </p><p><strong>Требования к кандидату: </strong></p><ul><li>Требование 1</li><li>Требование 2</li><li>Требование 3</li></ul>', 'Прораб'),
  (68, 10000, '', 'Электрик'),
  (71, 13, '<p>Тест1</p>', 'Тест1'),
  (73, 1, '<p>TestForGabri</p>', 'TestForGabri1'),
  (74, 1, '<p>тестовая вакансия №1</p>', 'тестовая вакансия №1'),
  (75, 2, '<ol><li>тестовая вакансия №2<strong>тестовая вакансия №1 тестовая вакансия №1<span class=\"redactor-invisible-space\"><em></em></span></strong></li></ol>', 'тестовая вакансия №2'),
  (76, 123, '<p>тестовая вакансия №3</p>', 'тестовая вакансия №3'),
  (78, 10000, '<p>Опыт работ на внутренних работах от 3 лет<br></p>', 'Отделочник'),
  (79, 10000, '<p>Опыт работ в облицовки плитки</p>', 'Плиточник'),
  (80, 10000, '<p>Опыт работ<br></p>', 'Сантехник'),
  (81, 10000, '', 'Штукатур'),
  (82, 10000, '', 'Разнорабочий'),
  (83, 8000, '<ul><li>йцуйцк</li><li>ца</li><li>йцкйцкйц</li><li>кцйцкйцккц</li></ul>', 'Повар');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `country_id`, `address`) VALUES
  (1, 'Склад в Украине', 1, 'Киев'),
  (6, '***', 7, 'Харьков'),
  (7, 'Офис №53', 6, 'Проспект Победы 29'),
  (8, 'Главный офис', 6, 'Харьков, Сумская 95'),
  (9, 'Круговое', 9, 'Кругов'),
  (10, 'Офис Инжелло', 8, ''),
  (11, 'Отдел мед автоматизации', 1, 'Харьков'),
  (12, 'Отдел автоматизации продаж', 1, 'Харьков'),
  (13, 'Полиграфия', NULL, ''),
  (14, 'Офис 5', 1, 'г. Харьков, переулог Электроинструментальный, д. 6-Б'),
  (15, 'Квартира новострой', 1, 'Жукова 17'),
  (18, 'Магазин 2', 1, 'Житомир, Магазинная 16'),
  (19, 'Отделение', 1, 'Киев, Больничная 17'),
  (20, 'Проект А', 11, 'Кутузовский 7'),
  (21, 'Новый офис', 1, 'Новый адрес'),
  (22, 'Новейший офис', 1, 'Харьков, офисная 13'),
  (23, 'Хранилище для тестов', 1, 'Адрес хранилищный 234'),
  (24, 'Магазин барс', 1, ''),
  (25, 'Магазин русалочка', NULL, ''),
  (26, 'Барс', 1, ''),
  (27, 'Офис Инжелло', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_product`
--

CREATE TABLE `warehouse_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `purchase_cost` double(10,2) DEFAULT NULL,
  `recommended_cost` double(10,2) DEFAULT NULL,
  `consumer_cost` double(10,2) DEFAULT NULL,
  `trade_cost` double(10,2) DEFAULT NULL,
  `tax` double(10,2) DEFAULT NULL,
  `overhead_cost` double(10,2) DEFAULT NULL,
  `currency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse_product`
--

INSERT INTO `warehouse_product` (`id`, `product_id`, `warehouse_id`, `quantity`, `purchase_cost`, `recommended_cost`, `consumer_cost`, `trade_cost`, `tax`, `overhead_cost`, `currency_id`) VALUES
  (1, 13, 18, -4, 1.00, NULL, 7.03, 6.49, 0.03, 4.38, 4),
  (2, 16, 18, 200, 375.00, NULL, 512.01, 472.62, 18.75, 0.10, 4),
  (4, 15, 7, 1, 300.00, 700.00, 700.00, 500.00, 5.00, NULL, 4),
  (5, 20, 23, 500, 1212.00, NULL, 1892.60, 1747.02, 242.40, 1.45, 5),
  (6, 13, 23, 500, 589.00, NULL, 918.89, 848.21, 117.80, 0.04, 6),
  (11, 14, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, 5),
  (12, 15, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, 5),
  (13, 17, 19, 2, NULL, NULL, NULL, NULL, NULL, NULL, 5),
  (14, 16, 22, 4, NULL, NULL, NULL, NULL, NULL, NULL, 4),
  (15, 15, 18, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4),
  (16, 16, 26, 5, NULL, NULL, NULL, NULL, NULL, NULL, 5),
  (17, 15, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, 5),
  (18, 17, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, 4),
  (19, 15, 20, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4),
  (20, 14, 8, 2000, NULL, NULL, NULL, NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_user`
--

CREATE TABLE `warehouse_user` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse_user`
--

INSERT INTO `warehouse_user` (`id`, `warehouse_id`, `user_id`) VALUES
  (1, 1, 1),
  (7, 7, 1),
  (8, 8, 1),
  (9, 9, 4),
  (10, 10, 6),
  (11, 11, 6),
  (12, 12, 6),
  (13, 13, 5),
  (14, 14, 5),
  (15, 15, 5),
  (18, 18, 1),
  (19, 19, 1),
  (20, 20, 1),
  (21, 21, 1),
  (22, 22, 1),
  (23, 23, 1),
  (24, 24, 9),
  (25, 25, 9),
  (26, 26, 1),
  (27, 21, 1),
  (28, 27, 16);

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `passport` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `apply_position` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `experience_description` text CHARACTER SET utf8,
  `collaborated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `status`, `name`, `surname`, `patronymic`, `date_birth`, `gender`, `passport`, `apply_position`, `experience`, `experience_description`, `collaborated`) VALUES
  (1, 1, 'Олег', 'Олегов', 'Олегович', '2018-12-12', 0, '123456789', 'Желаемая позиция из резюме', 17, '<p>Работал на работе 1</p><p>Работал на работе 2</p><p>Работал на работе 3</p>', 1),
  (2, 1, 'Вадим', 'Вадимович', 'Вадимов', '2018-12-12', 1, '123456789', 'Желаемая позиция из резюме', 13, '<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>', NULL),
  (3, 1, 'Денис', 'Денисович', 'Денисов', '2018-12-12', 1, '123456789', 'Желаемая позиция из резюме', 13, '<p>Работал на работе 1</p><p>Работал на работе 2</p><p>Работал на работе 3</p>', 0),
  (4, 1, 'Мария', 'Мариевна', 'Мариева', '2018-12-12', 1, '123456789', 'Желаемая позиция из резюме', 13, '<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>', NULL),
  (5, 1, 'Филип', 'Филипович', 'Филипов', '2018-12-12', 1, '123456789', 'Желаемая позиция из резюме', 13, '<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>', NULL),
  (6, 1, 'Кирилл', 'Кириллович', 'Кириллов', '2018-12-12', 1, '123456789', 'Желаемая позиция из резюме', 13, '<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>', NULL),
  (7, 1, 'Маграт', 'Магратович', 'Магратов', '2018-12-12', 1, '123456789', 'Желаемая позиция из резюме', 13, '<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>', NULL),
  (8, 1, 'Мария', 'Мариевна', 'Мариева', '2018-12-12', 1, '123456789', 'Желаемая позиция из резюме', 13, '<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>', NULL),
  (10, 0, 'Антон', 'Буткевич', 'Антонович', '1985-03-14', 0, '1MК274ТРО', 'Администратор', 1, '<p>Я доволен своим опытом</p>', NULL),
  (11, 0, 'Ира', 'Солдатова', 'Ириновна', '1995-06-12', 1, 'RT34ЦУ422', 'По ситуации', 5, '<p>Много чего видала</p>', NULL),
  (12, 0, 'Александр', 'Романов', 'Александрович', '2018-12-13', 0, 'T730ОР3ТРВ', 'Водитель', 9, '<p>Хорошо вожу</p>', NULL),
  (13, 0, 'Георгий', 'Крутой', 'Варфаламеевич', '9111-05-01', 0, '', 'Повар', 1, '', NULL),
  (14, 0, 'Александр', 'Крок', 'Аслександрович', '0124-03-12', 1, 'Ф24ПУ5Ц', 'Строитель', 16, '<p>Большое количество малых проектов</p>', 1),
  (16, 1, 'Мария', 'Пушкина', 'Александровна', '0222-02-22', 1, '', '', NULL, '', 1),
  (17, 1, 'Святослав', 'Кудрявцев', 'Иванович', '0222-02-22', 1, '23356', '', 4, '<p>asfsf</p>', 1),
  (18, 1, 'Артём', 'Гордын', 'Иванович', '0222-02-22', 1, '', '', NULL, '', NULL),
  (19, 1, 'Михаил', 'Степной', 'Романович', '0222-02-22', 1, '', '', NULL, '', 1),
  (20, 0, 'Дмитрий', 'Грус', 'Витальевич ', '0222-02-22', 0, '', '', NULL, '', NULL),
  (21, 1, 'Антон', 'Покусай', 'Павлович', '0222-02-22', 0, '', '', NULL, '', 1),
  (22, 0, 'Генадий', 'Мащенко', 'Павлович', '0222-02-22', 0, '', '', NULL, '', NULL),
  (23, 0, 'Григорий', 'Спел', 'Ворфаломеевич ', NULL, 0, '', '', NULL, '<p>Что-то умеет</p>', NULL),
  (24, 1, 'Дмитрий', 'Грус', 'Витальевич ', '0222-02-22', 0, '', '', NULL, '<p>фвы</p>', NULL),
  (25, 1, 'Святослав', 'Кудрявцев', 'Иванович', '0222-02-22', 1, '', '', NULL, '', NULL),
  (27, 0, 'Серафим', 'Серафим', '', NULL, 0, '', '', NULL, '', NULL),
  (28, 0, 'Серафим', 'Серафим', '', NULL, 0, '', '', NULL, '', NULL),
  (29, 0, 'Антон', 'Нежин', 'Иванович', NULL, NULL, '', '', NULL, '', 0),
  (30, 0, 'Валерий', 'ВИкторович', 'ВИкторенко', '2018-12-19', 0, '2546464542', 'Плотник', 8, '<p><strong>Текст описания</strong></p><p><em>Текст описания</em><em></em><br></p><h1>Текст описания<br></h1>', NULL),
  (31, 1, 'Филип', 'Филипович', 'Филипов', '2018-12-12', 1, '123456789', 'Желаемая позиция из резюме', 13, '<p>Работал на работе 1</p><p>Работал на работе 2</p><p>Работал на работе 3</p>', NULL),
  (32, 0, 'Алексей2', 'Алехин2', 'Алехович2', '1993-02-05', 0, 'МД 5451', 'прораб', 16, '<p>Работал в многих компаниях</p>', NULL),
  (43, 1, 'Прораб', 'Прорабов', 'Тестович', '2018-12-13', 0, '', '', NULL, '', 1),
  (44, 1, 'Прораб 2', 'Прорабович', '', NULL, NULL, '', '', NULL, '', 1),
  (45, 0, 'Мария', 'Пушкина', 'Александровна', '0222-02-22', 1, '', '', NULL, '', NULL),
  (46, 0, 'Святослав', 'Кудрявцев', 'Иванович', '0222-02-22', 1, '', '', NULL, '', NULL),
  (47, 0, 'Артем2', 'Гордын', 'Иванович', NULL, NULL, '', '', NULL, '', 0),
  (48, 0, 'Тимофей', 'Работников3', '', NULL, NULL, '', '', NULL, '', 1),
  (49, 1, 'Тимофей', 'Работников3', '', NULL, NULL, '', '', NULL, '', 1),
  (50, 1, 'Нурлан', 'Сабуров', '', NULL, 0, '', '', NULL, '', 1),
  (51, 0, 'Жора', 'Торянов', '', NULL, NULL, '', '', NULL, '', 0),
  (52, 0, 'Богдан', 'Сенин', '', NULL, NULL, '', '', NULL, '', 0),
  (53, 0, 'Петр', 'Меньшов', '', NULL, NULL, '', '', NULL, '', 0),
  (54, 0, 'Иван', 'Абрамов', '', NULL, NULL, '', '', NULL, '', 0),
  (55, 0, 'Владимир', 'Круглов', '', NULL, NULL, '', '', NULL, '', 0),
  (56, 1, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 11, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 1),
  (57, 0, 'Саша', 'Страхов', 'Сергеевич ', '2018-12-13', 0, '1G32KAS84', '', 2, '<p>Хороший специалист</p>', 0),
  (58, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (59, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (60, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (61, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (62, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (63, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (64, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (65, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (66, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (67, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (68, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (69, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (70, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (71, 0, 'Виктор', 'Победов', 'Трудовович', '2018-12-27', 0, '1221231346', 'Больше всего интересует личный рост и интересные проекты', 9, '<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>', 0),
  (72, 0, 'Святослав', 'Кудрявцев', 'Иванович', '2005-02-22', 1, '13214125126', '', 4, '<p><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsdYEBb3uN3pFa-KqKH73BdjTf0-1TPTaYFyIZNXWdTntg9nKL\" alt=\"Похожее изображение\"></p><p><strong>Отчет о разговоре с кандидатом</strong></p>', NULL),
  (73, 1, 'Прорабб', 'Прорабов', 'Тестович', '2018-12-13', 0, '23432432', 'кккк', NULL, '', NULL),
  (74, 0, 'Антон', 'Гармаш', '', NULL, NULL, '', '', NULL, '', 0),
  (76, 0, 'Жора', 'Фомичев', '', NULL, NULL, '', '', NULL, '', 0),
  (77, 0, '', '', '', NULL, NULL, '', '', NULL, '<p><strong>gfclmknk\r\n</strong></p><p><img src=\"https://st2.depositphotos.com/2001755/5408/i/450/depositphotos_54081723-stock-photo-beautiful-nature-landscape.jpg\" alt=\"ÐÐ°ÑÑÐ¸Ð½ÐºÐ¸ Ð¿Ð¾ Ð·Ð°Ð¿ÑÐ¾ÑÑ ÐºÐ°ÑÑÐ¸Ð½ÐºÐ°\" width=\"422\" height=\"422\" style=\"width: 422px; height: 422px;\">\r\n</p><hr><p><img src=\"/images/5c262fdccea3b.jpeg\">\r\n</p>', 0),
  (79, 0, 'Олег', 'Иванов', '', NULL, NULL, '', '', NULL, '', 0),
  (80, 0, '', '', '', NULL, NULL, '', '', NULL, '', 0),
  (81, 0, 'Олег', 'Иванов2', 'Максимович', NULL, NULL, '', '', NULL, '', 0),
  (82, 0, '1', '1', '', '2019-01-08', 0, '', '', NULL, '<p>dasdad</p>', 0),
  (85, 0, 'Алексей', 'Петров', '', NULL, NULL, '', '', NULL, '', 0),
  (86, 1, 'Борис', 'Фамильев', 'фыв', NULL, NULL, 'фывфв', 'фыв', -1, '', 1),
  (87, 0, 'Анна', 'Романова', '', NULL, NULL, '', '', NULL, '', 0),
  (88, 0, 'Остап', 'Колинин', '', NULL, NULL, '', '', NULL, '', 0),
  (89, 1, 'София', 'Печугина', '', NULL, NULL, '', '', NULL, '', 1),
  (90, 0, 'Дмитрий', 'Дурнев', '', NULL, NULL, '', '', NULL, '', 0),
  (91, 0, 'Лена', 'Караченцева', '', NULL, NULL, '', '', NULL, '', 0),
  (92, 0, '', '', '', '2019-01-09', NULL, '', '', 1, '', 0),
  (94, 0, 'Тест1', 'Тест1', 'Тест1', NULL, NULL, '', '', NULL, '<p>Тест1</p>', 0),
  (96, 1, 'Вова Прораб', '', '', NULL, 0, '', 'Прораб', 5, '<p>Курирует два обьекта</p>', 1),
  (97, 0, 'TestForGabri', 'TestForGabri', 'TestForGabri', NULL, 0, '', '', NULL, '', 0),
  (98, 1, 'Тестовый кадр №1', 'Тестовый кадр №1 Наверное', 'Тестовый кадр №1', '2019-01-19', 1, 'фывфв2141', 'Тестовый кадр №1', 4, '<p>Тестовый кадр №1 фывфывфвы</p>', 1),
  (99, 0, 'Тестовый кадр №2', 'Тестовый кадр №2', 'Тестовый кадр №2', '2019-01-19', 1, '1234', 'Тестовый кадр №2', 1, '<p>Тестовый кадр №2</p>', 0),
  (100, 1, 'Тестовый кадр №3', 'Тестовый кадр №3', 'Тестовый кадр №3', '2019-01-30', 1, '214124', 'Тестовый кадр №3', 3, 'Тестовый кадр №3<p><img src=\"/images/5c4328708ff46.png\"></p>', 1),
  (102, 1, 'Вадим Пенсия', '', '', NULL, 0, '', 'Отделочник', 20, '', 1),
  (103, 1, 'Дима пенсия', '', '', NULL, 0, '', 'Отделочник', 15, '', 0),
  (104, 1, 'Дядя Петя', '', '', NULL, NULL, '', 'Сантехник', 10, '', 0),
  (105, 1, 'Саша', 'Бондаренко', '', NULL, NULL, '', 'Плиточник', 7, '<p>Работает на Валентиновской<br></p>', 0),
  (106, 1, 'Руслан', 'Дейнеко', '', NULL, 0, '', 'Штукатур', NULL, '', 0),
  (107, 1, 'Дима Юрист', '', '', NULL, 0, '', 'Разнорабочий', NULL, '', 0),
  (108, 1, 'Дима', 'Пихотинский', '', NULL, 0, '', 'Разнорабочий', NULL, '', 0),
  (109, 1, 'Саша', 'Шульгин', '', '1984-01-08', 0, '', 'Электрик', NULL, '', 0),
  (110, 1, 'Макс', '', '', NULL, NULL, '', 'Плиточник', NULL, '', 0),
  (111, 1, 'Саша Купянск', '', '', NULL, 0, '', 'Плиточник', NULL, '', 0),
  (112, 1, 'Женя', 'Соболь', '', '1983-01-06', NULL, '', 'Отделочник', NULL, '<p>Веницианка</p>', 0),
  (113, 0, 'Олег', 'Григорьев', 'Николаевич', '2019-02-06', 0, '123', '', 5, '<p><img src=\"/images/5c5ad69400420.jpg\"></p><p><br></p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `worker_vacancy`
--

CREATE TABLE `worker_vacancy` (
  `id` int(11) NOT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `vacancy_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_vacancy`
--

INSERT INTO `worker_vacancy` (`id`, `worker_id`, `vacancy_id`) VALUES
  (11, 23, 27),
  (12, 23, 28),
  (50, 45, 11),
  (51, 45, 31),
  (52, 46, 11),
  (53, 47, 24),
  (54, 47, 27),
  (55, 47, 28),
  (56, 48, 11),
  (57, 48, 24),
  (58, 48, 25),
  (68, 29, 11),
  (74, 72, 11),
  (75, 72, 24),
  (76, 73, 25),
  (77, 73, 27),
  (78, 77, 24),
  (79, 77, 27),
  (80, 77, 28),
  (81, 17, 11),
  (82, 17, 26),
  (83, 17, 28),
  (84, 56, 11),
  (85, 56, 24),
  (86, 56, 25),
  (88, 80, 1),
  (90, 82, 5),
  (91, 82, 6),
  (92, 82, 7),
  (93, 82, 9),
  (101, 92, 3),
  (102, 92, 4),
  (109, 94, 71),
  (111, 3, 1),
  (112, 3, 2),
  (113, 3, 3),
  (123, 97, 73),
  (125, 99, 75),
  (126, 100, 76),
  (128, 98, 74),
  (132, 86, 2),
  (142, 104, 80),
  (144, 105, 79),
  (145, 106, 81),
  (146, 96, 66),
  (147, 107, 82),
  (150, 109, 68),
  (151, 110, 79),
  (152, 108, 82),
  (155, 112, 78),
  (156, 103, 78),
  (157, 102, 78),
  (158, 111, 79),
  (161, 113, 1),
  (162, 113, 2),
  (163, 113, 4),
  (164, 1, 1),
  (165, 1, 2),
  (166, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessory`
--
ALTER TABLE `accessory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id-answer-request_id` (`request_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_unique_index` (`name`,`parent_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer-country_id_fk` (`country_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_type_id` (`event_type_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interview_worker_id_fk` (`worker_id`),
  ADD KEY `interview_project_id_fk` (`project_id`),
  ADD KEY `interview_vacancy_id_fk` (`vacancy_id`);

--
-- Indexes for table `interview_vacancy`
--
ALTER TABLE `interview_vacancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interview_vacancy_currency_id_fk` (`currency_id`),
  ADD KEY `interview_vacancy_pack_unit_id_fk` (`pack_unit_id`),
  ADD KEY `interview_vacancy_vacancy_id_fk` (`vacancy_id`),
  ADD KEY `interview_vacancy_interview_id_fk` (`interview_id`),
  ADD KEY `interview_vacancy_overhead_cost_id_fk` (`overhead_cost_id`);

--
-- Indexes for table `inventorization`
--
ALTER TABLE `inventorization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventorization_warehouse_id_fk` (`warehouse_id`);

--
-- Indexes for table `inventorization_product`
--
ALTER TABLE `inventorization_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventorization_product_product_id_fk` (`product_id`),
  ADD KEY `iinventorization_product_warehouse_id_fk` (`inventorization_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manufacturer_unique_index` (`name`,`country_id`,`address`),
  ADD KEY `manufacturer-country_id_fk` (`country_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `overhead_cost`
--
ALTER TABLE `overhead_cost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overhead_cost_currency_id_fk` (`currency_id`);

--
-- Indexes for table `pack_unit`
--
ALTER TABLE `pack_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product-country_id_fk` (`country_id`),
  ADD KEY `field_product_manufacturer_id_fk` (`manufacturer_id`),
  ADD KEY `field_product_category_id_fk` (`category_id`),
  ADD KEY `field_product_type_id_fk` (`type_id`),
  ADD KEY `product-color_id-fk` (`color_id`);

--
-- Indexes for table `product_pack_unit`
--
ALTER TABLE `product_pack_unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_pack_unit_unique_index` (`product_id`,`pack_unit_id`),
  ADD KEY `field_product_pack_unit_pack_unit_id_fk` (`pack_unit_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`project_id`,`user_id`),
  ADD KEY `idx-project_user-project_id` (`project_id`),
  ADD KEY `idx-project_user-user_id` (`user_id`);

--
-- Indexes for table `project_vacancy`
--
ALTER TABLE `project_vacancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `x-project_vacancy-project_id` (`project_id`),
  ADD KEY `id-project_vacancy-vacancy_id` (`vacancy_id`);

--
-- Indexes for table `project_vacancy_old`
--
ALTER TABLE `project_vacancy_old`
  ADD PRIMARY KEY (`project_id`,`vacancy_id`),
  ADD KEY `idx-project_vacancy-project_id` (`project_id`),
  ADD KEY `idx-project_vacancy-vacancy_id` (`vacancy_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_supplier_id_fk` (`supplier_id`),
  ADD KEY `purchase_warehouse_id_fk` (`warehouse_id`);

--
-- Indexes for table `purchase_overhead_cost`
--
ALTER TABLE `purchase_overhead_cost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_overhead_cost_purchase_id_fk` (`purchase_id`),
  ADD KEY `purchase_overhead_cost_overhead_cost_id_fk` (`overhead_cost_id`);

--
-- Indexes for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_product_currency_id_fk` (`currency_id`),
  ADD KEY `purchase_product_pack_unit_id_fk` (`pack_unit_id`),
  ADD KEY `purchase_product_product_id_fk` (`product_id`),
  ADD KEY `purchase_product_purchase_id_fk` (`purchase_id`),
  ADD KEY `purchase_product_overhead_cost_id_fk` (`overhead_cost_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_strategy`
--
ALTER TABLE `request_strategy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-strategy-id` (`strategy_id`),
  ADD KEY `fk-request-id` (`request_id`);

--
-- Indexes for table `request_strategy_old`
--
ALTER TABLE `request_strategy_old`
  ADD PRIMARY KEY (`request_id`,`strategy_id`),
  ADD KEY `idx-request_strategy-request_id` (`request_id`),
  ADD KEY `idx-request_strategy-strategy_id` (`strategy_id`);

--
-- Indexes for table `selling`
--
ALTER TABLE `selling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selling_customer_id_fk` (`customer_id`),
  ADD KEY `selling_warehouse_id_fk` (`warehouse_id`);

--
-- Indexes for table `selling_product`
--
ALTER TABLE `selling_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selling_product_currency_id_fk` (`currency_id`),
  ADD KEY `selling_product_pack_unit_id_fk` (`pack_unit_id`),
  ADD KEY `selling_product_product_id_fk` (`product_id`),
  ADD KEY `selling_product_selling_id_fk` (`selling_id`),
  ADD KEY `selling_product_overhead_cost_id_fk` (`overhead_cost_id`);

--
-- Indexes for table `strategy`
--
ALTER TABLE `strategy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_rate`
--
ALTER TABLE `tax_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dynagrid`
--
ALTER TABLE `tbl_dynagrid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_dynagrid_FK1` (`filter_id`),
  ADD KEY `tbl_dynagrid_FK2` (`sort_id`);

--
-- Indexes for table `tbl_dynagrid_dtl`
--
ALTER TABLE `tbl_dynagrid_dtl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_dynagrid_dtl_UK1` (`name`,`category`,`dynagrid_id`);

--
-- Indexes for table `transit`
--
ALTER TABLE `transit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transit_from_warehouse_id_fk` (`from_warehouse_id`),
  ADD KEY `transit_to_warehouse_id_fk` (`to_warehouse_id`);

--
-- Indexes for table `transit_overhead_cost`
--
ALTER TABLE `transit_overhead_cost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transit_overhead_cost_transit_id_fk` (`transit_id`),
  ADD KEY `transit_overhead_cost_overhead_cost_id_fk` (`overhead_cost_id`);

--
-- Indexes for table `transit_product`
--
ALTER TABLE `transit_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transit_product_pack_unit_id_fk` (`pack_unit_id`),
  ADD KEY `transit_product_product_id_fk` (`product_id`),
  ADD KEY `transit_product_transit_id_fk` (`transit_id`),
  ADD KEY `transit_product_overhead_cost_id_fk` (`overhead_cost_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);
  -- ADD UNIQUE KEY `type_name_unique_index` (`name`);

--
-- Indexes for table `user`
--
 -- ALTER TABLE `user`
  -- ADD PRIMARY KEY (`id`);
  -- ADD UNIQUE KEY `user_email_uindex` (`email`);
  -- ADD UNIQUE KEY `user_username_uindex` (`username`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse-country_id_fk` (`country_id`);

--
-- Indexes for table `warehouse_product`
--
ALTER TABLE `warehouse_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_product_currency_id_fk` (`currency_id`),
  ADD KEY `warehouse_product_product_id_fk` (`product_id`),
  ADD KEY `warehouse_product_warehouse_id_fk` (`warehouse_id`);

--
-- Indexes for table `warehouse_user`
--
ALTER TABLE `warehouse_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_user_warehouse_id_fk` (`warehouse_id`),
  ADD KEY `warehouse_customer_user_id_fk` (`user_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker_vacancy`
--
ALTER TABLE `worker_vacancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-worker_vacancy-worker_id` (`worker_id`),
  ADD KEY `idx-worker_vacancy-vacancy_id` (`vacancy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessory`
--
ALTER TABLE `accessory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1257;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `interview_vacancy`
--
ALTER TABLE `interview_vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventorization`
--
ALTER TABLE `inventorization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventorization_product`
--
ALTER TABLE `inventorization_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД';

--
-- AUTO_INCREMENT for table `overhead_cost`
--
ALTER TABLE `overhead_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pack_unit`
--
ALTER TABLE `pack_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_pack_unit`
--
ALTER TABLE `product_pack_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `project_vacancy`
--
ALTER TABLE `project_vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchase_overhead_cost`
--
ALTER TABLE `purchase_overhead_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_product`
--
ALTER TABLE `purchase_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `request_strategy`
--
ALTER TABLE `request_strategy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `selling`
--
ALTER TABLE `selling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `selling_product`
--
ALTER TABLE `selling_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strategy`
--
ALTER TABLE `strategy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tax_rate`
--
ALTER TABLE `tax_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transit`
--
ALTER TABLE `transit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transit_overhead_cost`
--
ALTER TABLE `transit_overhead_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transit_product`
--
ALTER TABLE `transit_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `warehouse_product`
--
ALTER TABLE `warehouse_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `warehouse_user`
--
ALTER TABLE `warehouse_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `worker_vacancy`
--
ALTER TABLE `worker_vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `interview_project_id_fk` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interview_vacancy_id_fk` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interview_worker_id_fk` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interview_vacancy`
--
ALTER TABLE `interview_vacancy`
  ADD CONSTRAINT `interview_vacancy_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interview_vacancy_interview_id_fk` FOREIGN KEY (`interview_id`) REFERENCES `interview` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interview_vacancy_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interview_vacancy_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interview_vacancy_vacancy_id_fk` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventorization`
--
ALTER TABLE `inventorization`
  ADD CONSTRAINT `inventorization_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventorization_product`
--
ALTER TABLE `inventorization_product`
  ADD CONSTRAINT `iinventorization_product_warehouse_id_fk` FOREIGN KEY (`inventorization_id`) REFERENCES `inventorization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventorization_product_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD CONSTRAINT `manufacturer-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `overhead_cost`
--
ALTER TABLE `overhead_cost`
  ADD CONSTRAINT `overhead_cost_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `field_product_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `field_product_manufacturer_id_fk` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `field_product_type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product-color_id-fk` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_pack_unit`
--
ALTER TABLE `product_pack_unit`
  ADD CONSTRAINT `field_product_pack_unit_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `field_product_pack_unit_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `fk-project_user-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-project_user-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_vacancy`
--
ALTER TABLE `project_vacancy`
  ADD CONSTRAINT `fk-project_vacancy_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-project_vacancy_vacancy` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_vacancy_old`
--
ALTER TABLE `project_vacancy_old`
  ADD CONSTRAINT `fk-project_vacancy-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-project_vacancy-vacancy_id` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_supplier_id_fk` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_overhead_cost`
--
ALTER TABLE `purchase_overhead_cost`
  ADD CONSTRAINT `purchase_overhead_cost_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_overhead_cost_purchase_id_fk` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD CONSTRAINT `purchase_product_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_product_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_product_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_product_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_product_purchase_id_fk` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_strategy`
--
ALTER TABLE `request_strategy`
  ADD CONSTRAINT `fk-request-id` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-strategy-id` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request_strategy_old`
--
ALTER TABLE `request_strategy_old`
  ADD CONSTRAINT `fk-request_strategy-request_id` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-request_strategy-strategy_id` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `selling`
--
ALTER TABLE `selling`
  ADD CONSTRAINT `selling_customer_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selling_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `selling_product`
--
ALTER TABLE `selling_product`
  ADD CONSTRAINT `selling_product_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selling_product_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selling_product_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selling_product_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selling_product_selling_id_fk` FOREIGN KEY (`selling_id`) REFERENCES `selling` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_dynagrid`
--
ALTER TABLE `tbl_dynagrid`
  ADD CONSTRAINT `tbl_dynagrid_FK1` FOREIGN KEY (`filter_id`) REFERENCES `tbl_dynagrid_dtl` (`id`),
  ADD CONSTRAINT `tbl_dynagrid_FK2` FOREIGN KEY (`sort_id`) REFERENCES `tbl_dynagrid_dtl` (`id`);

--
-- Constraints for table `transit`
--
ALTER TABLE `transit`
  ADD CONSTRAINT `transit_from_warehouse_id_fk` FOREIGN KEY (`from_warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transit_to_warehouse_id_fk` FOREIGN KEY (`to_warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transit_overhead_cost`
--
ALTER TABLE `transit_overhead_cost`
  ADD CONSTRAINT `transit_overhead_cost_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transit_overhead_cost_transit_id_fk` FOREIGN KEY (`transit_id`) REFERENCES `transit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transit_product`
--
ALTER TABLE `transit_product`
  ADD CONSTRAINT `transit_product_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transit_product_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transit_product_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transit_product_transit_id_fk` FOREIGN KEY (`transit_id`) REFERENCES `transit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `warehouse-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse_product`
--
ALTER TABLE `warehouse_product`
  ADD CONSTRAINT `warehouse_product_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warehouse_product_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warehouse_product_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse_user`
--
ALTER TABLE `warehouse_user`
  ADD CONSTRAINT `warehouse_customer_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warehouse_user_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `worker_vacancy`
--
ALTER TABLE `worker_vacancy`
  ADD CONSTRAINT `fk-worker_vacancy-vacancy_id` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-worker_vacancy-worker_id` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON DELETE CASCADE;
COMMIT;


CREATE TABLE `state_to_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `to_state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_to_state_ibfk_1` (`state_id`),
  KEY `state_to_state_ibfk_2` (`to_state_id`),
  CONSTRAINT `state_to_state_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `state_to_state_ibfk_2` FOREIGN KEY (`to_state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `regularity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order` int(11),
  PRIMARY KEY (`id`),
  KEY `regularity_ibfk_1` (`user_id`),
  CONSTRAINT `regularity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `regularity` (`name`, `user_id`, `order`) VALUES
  ('Входящие звонки', 1, 5),
  ('Обзвон', 1, 4),
  ('Звонки', 1, 1),
  ('Менеджмент', 1, 2),
  ('Найм', 1, 3);

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255),
  `description` varchar(255),
  parent_id int(11),
  regularity_id int(11),
  `order` int(11),
  `color` varchar(55) ,
  PRIMARY KEY (`id`),
  KEY `regularity_item_ibfk_1` (`regularity_id`),
  KEY `regularity_item_ibfk_2` (`parent_id`),
  CONSTRAINT `regularity_item_ibfk_1` FOREIGN KEY (`regularity_id`) REFERENCES `regularity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `regularity_item_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `item` (`title`, `description`,  `regularity_id`, `order`, `color`) VALUES
  ('Как дела?', 'Отлично',  1, 5, 'red'),
  ('Как я?', 'плохо', 1, 4,  'red'),
  ('Как ты?', 'Отлично',  1, 1, 'red'),
  ('Как мы?', 'Отлично',  1, 1, 'red'),
  ('Как вы?', 'Отлично',  1, 1, 'red');



INSERT INTO `item` (`title`, `description`, `parent_id`, `regularity_id`, `order`, `color`) VALUES
  ('Как я?', 'плохо', 2, 1, 1, 'red'),
  ('Как ты?', 'Отлично', 3, 1, 1, 'red'),
  ('Как мы?', 'Отлично', 1, 1, 1, 'red'),
  ('Как вы?', 'Отлично', 3, 1, 1, 'red');
