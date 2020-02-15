--
-- Дамп данных таблицы `selling`
--

INSERT INTO `interview` (`id`, `worker_id`, `project_id`, `name`, `date_create`, `date_complete`, `state`) VALUES
(1, 1, 1, 'Новое Интервью с 23.01.2018 22:24:51', '2017-09-23 22:24:51', '2017-09-23 22:25:24', 1),
(2, 1, 2, 'Новое Интервью с 23.01.2018 22:25:42', '2017-09-23 22:25:42', '2017-09-23 22:25:52', 1),
(3, 1, 3, 'Новое Интервью с 23.01.2018 22:26:04', '2017-11-23 22:26:04', '2017-11-23 22:26:11', 1),
(4, 1, 4, 'Новое Интервью с 23.01.2018 22:26:29', '2018-01-23 22:26:29', '2018-01-23 22:26:36', 1),
(5, 1, 5, 'Новое Интервью с 23.01.2018 22:27:48', '2018-01-23 22:27:48', '2018-01-23 22:27:57', 1),
(6, 1, 1, 'Новое Интервью с 23.01.2018 22:28:58', '2018-01-23 22:28:58', NULL, 0),
(7, 1, 2, 'Новое Интервью с 23.01.2018 22:29:03', '2018-01-23 22:29:03', NULL, 0),
(8, 1, 3, 'Новое Интервью с 23.01.2018 22:29:07', '2018-01-23 22:29:07', NULL, 0),
(9, 1, 4, 'Новое Интервью с 23.01.2018 22:29:11', '2018-01-23 22:29:11', NULL, 0),
(10, 1, 5, 'Новое Интервью с 23.01.2018 22:29:15', '2018-01-23 22:29:15', NULL, 0);

--
-- Дамп данных таблицы `selling_product`
--

INSERT INTO `interview_vacancy` (`id`, `vacancy_id`, `interview_id`, `quantity`, `cost`, `cost_type`, `overhead_cost_id`, `currency_id`) VALUES
(1, 4, 1, 9, 8.00, 0, NULL, 1),
(2, 1, 2, 9, 10.50, 0, NULL, 1),
(3, 5, 3, 9, 6.50, 0, NULL, 1),
(4, 7, 4, 9, 10.50, 0, NULL, 1),
(5, 9, 5, 9, 12.50, 0, NULL, 1),
(6, 4, 6, 6, 8.00, 0, NULL, 1),
(7, 1, 7, 6, 10.50, 0, NULL, 1),
(8, 5, 8, 6, 6.50, 0, NULL, 1),
(9, 7, 9, 6, 10.50, 1, NULL, 1),
(10, 9, 10, 6, 12.50, 1, NULL, 1);


--
-- Дамп данных таблицы `requests`
--
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('Вы не туда попали');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('Кто вы?');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('По какому вопросу?');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('Из какой компании?');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('Не знаю, с кем соединить?');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('Что за система?');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('Руководителя нет, вышлите на почту');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('ЛПР Что Вы предлагаете?');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('ЛПР Что за система? Что за продукт? Что за прототип? Какие функции?');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('ЛПР Есть интерес. Расскажите еще подробнее.');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('ЛПР  Нет денег. Затишье  на рынке');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('ЛПР Какая стоимость Ваших услуг?');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('ЛПР Мне необходимо хранить данные о своем бизнесе только у себя на машине');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('ЛПР У нас уже есть система созданная специально для нас');
INSERT INTO `warehouse`.`requests` (`text`) VALUES ('ЛПР НЕ нуждаемся');


--
-- Дамп данных таблицы `answers`
--
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Это (название организации), я правильно  позвонил?', 1);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Это (имя, отчество менеджера). Руководитель на месте?', 2);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Да, это по поводу внедрения системы автоматизации бизнеса. Вы руководитель?', 3);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Ingello systems. Мы Вам проводим технический анализ. Соедините руководителем.', 4);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Соедините с руководителем отдела продаж. (С директором вашим)', 5);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Для автоматизации продаж. Вы руководитель, я правильно понимаю? Переключите на руководителя! ', 6);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Мне нужно переговорить с ним сегодня, т.к. мы могли бы дать компании дополнительных клиентов. Продиктуйте его номер.', 7);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Скажите, а вы всё еще пользуетесь теми старыми программами для учета? Ну, говорили что тормозят, что какие то проблеммы с ними. Не в курсе?Дайте номер руководителя, он должен быть в курсе этих вопросов.', 7);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Мы разрабатываем системы для автоматизации работы с клиентами, которые гарантированно повышают эффективность бизнеса. Мы занимаемся Вашим направлением (назвать направление). И у нас уже есть готовые прототипы. Я бы хотел с Вами их обсудить. Мы можем встретиться на следующей неделе? Это займет минут 10-20. ', 8);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Давайте перечислю основные преимущества. В систему вшиты функции поиска, фильтрации, сортировки и изменения статусов для продаж, клиентов и сотрудников бизнеса. Для владельцев и менеджмента предусмотрены удобные системы, которые помогают принимать правильные решения. Данные отображаются наглядно в виде графиков и диаграмм. ', 9);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Могли бы Вы переговорить с нашим директором. Он расскажет все технические и формальные детали. ', 10);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Я видел много запросов по Вашему направлению. Вас ищут клиенты через интернет. Скажите, а Вы смогли бы обрабатывать больше клиентов, если мы предоставим Вам такую возможность? ', 11);
INSERT INTO `warehouse`.`answers` (`text`, `requests_id`) VALUES ('Рыночная!', 12);


--
-- Дамп данных таблицы `strategy`
--
INSERT INTO `warehouse`.`strategy` (`name`, `description`) VALUES ('Холодные звонки', 'NULL');

--
-- Дамп данных таблицы `request_strategy`
--
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (1, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (2, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (3, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (4, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (5, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (6, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (7, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (8, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (9, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (10, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (11, 1);
INSERT INTO `warehouse`.`request_strategy` (`request_id`, `strategy_id`) VALUES (12, 1);
