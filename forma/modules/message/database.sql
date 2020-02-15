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
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД';

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
