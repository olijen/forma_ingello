CREATE TABLE `event` (
  `id` int(11) NOT NULL COMMENT 'ИД',
  `event_type_id` int(11) NOT NULL COMMENT 'Тип',
  `name` varchar(255) NOT NULL COMMENT 'Имя',
  `text` text NOT NULL COMMENT 'Текст',
  `status` int(1) NOT NULL COMMENT 'Статус',
  `date_from` date NOT NULL COMMENT 'Начало',
  `date_to` date NOT NULL COMMENT 'Конец',
  `start_time` time NOT NULL COMMENT 'Время'
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `event_type` (
  `id` int(11) NOT NULL COMMENT 'ИД',
  `name` int(255) NOT NULL COMMENT 'Имя',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'Статус',
  `color` varchar(20) NOT NULL DEFAULT '#CCC' COMMENT 'Цвет'
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

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
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД';

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД';

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
