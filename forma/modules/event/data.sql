--
-- Дамп данных таблицы `event`
--

INSERT INTO `event_type` (
id,
name,
status,
color
) VALUES
(NULL, 'Тестовый тип 1', NULL, NULL),
(NULL, 'Тестовый тип 2', NULL, NULL),
(NULL, 'Тестовый тип 3', NULL, NULL),
(NULL, 'Тестовый тип 4', NULL, NULL),
(NULL, 'Тестовый тип 5', NULL, NULL),
(NULL, 'Тестовый тип 6', NULL, NULL),
(NULL, 'Тестовый тип 7', NULL, NULL);


INSERT INTO `event` (
id,
event_type_id,
name,
text,
status,
date_from,
date_to,
start_time
) VALUES
(NULL, 1, 'Тестовое событие 1', 'Описание очень важного события, которое забудется, если не хранить его в системе.', 1, NOW(), NOW()+1, NOW()),
(NULL, 2, 'Тестовое событие 1', 'Описание очень важного события, которое забудется, если не хранить его в системе.', 1, NOW(), NOW()+1, NOW()),
(NULL, 3, 'Тестовое событие 1', 'Описание очень важного события, которое забудется, если не хранить его в системе.', 1, NOW(), NOW()+1, NOW()),
(NULL, 4, 'Тестовое событие 1', 'Описание очень важного события, которое забудется, если не хранить его в системе.', 1, NOW(), NOW()+1, NOW()),
(NULL, 5, 'Тестовое событие 1', 'Описание очень важного события, которое забудется, если не хранить его в системе.', 1, NOW(), NOW()+1, NOW());
