--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`, `auth_key`, `access_token`) VALUES
(1, 'admin', '$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW', 'admin@admin.admin', 'user', NULL, NULL),
(2, 'manager', '$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW', 'manager@manager.manager', 'user', NULL, NULL);
