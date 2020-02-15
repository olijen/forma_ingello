--
-- Дамп данных таблицы `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `country_id`, `address`) VALUES
(4, 'Bacardi', 4, 'Адрес Bacardi'),
(1, 'Hennessy', 1, 'Адрес Hennessy'),
(5, 'Jack Daniels', 5, 'Адрес Jack Daniels'),
(3, 'Martini', 3, 'Адрес Martini'),
(2, 'Zonin', 2, 'Адрес Zonin');

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Вино'),
(2, 'Спиртное');

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, 'Крепкие напитки', NULL),
(2, 'Слабоалкогольные напитки', NULL);

--
-- Дамп данных таблицы `pack_unit`
--

INSERT INTO `pack_unit` (`id`, `name`, `bottles_quantity`, `volume`) VALUES
(2, '12 шт', 12, 1),
(3, '24 шт', 24, 1);

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'indianred'),
(2, 'crimson'),
(3, 'firebrick'),
(4, 'deeppink');

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `type_id`, `category_id`, `manufacturer_id`, `sku`, `customs_code`, `name`, `note`, `volume`, `color_id`, `year_chart`, `proof`, `batcher`, `rating`, `country_id`, `pack_unit_id`, `parent_id`) VALUES
(1, 2, NULL, 1, 'KNKH-50', NULL, 'Коньяк Hennessy XO', 'От 10 лет выдержки 0.5 л 40% в подарочной упаковке', 50, NULL, 2007, 40.00, 0, NULL, 1, NULL, NULL),
(2, 2, NULL, 1, 'KNKH-REF-100', NULL, 'Коньяк Hennessy VSOP', 'От 4 лет выдержки 1 л 40% в подарочной упаковке', 100, NULL, 2013, 40.00, 1, NULL, 1, NULL, NULL),
(3, 1, NULL, 2, 'VNZN-2016-75', NULL, 'Вино Zonin Bardolino Doc', 'Красное сухое 0.75 л 12%', 75, 3, 2016, 12.00, NULL, 5.00, 2, NULL, NULL),
(4, 1, NULL, 2, 'VNGR-2015-75', NULL, 'Вино игристое Zonin Prosecco Doc', '1821 белое сухое 0.75 л 11%', 75, NULL, 2015, 11.00, NULL, 5.00, 2, NULL, NULL),
(5, 2, NULL, 3, 'VRMT-REF-75', NULL, 'Вермут Martini Bianco', 'Сладкий 0.75 л 15%', 75, NULL, NULL, 15.00, 1, NULL, 3, NULL, NULL),
(6, 2, NULL, 3, 'VRMT-REF-100', NULL, 'Вермут Martini Bitter', ' 1 л 25%', 100, NULL, NULL, 25.00, 1, NULL, 3, NULL, NULL),
(7, 2, NULL, 4, 'RMBC-REF-70', NULL, 'Ром Bacardi Oakheart Original', '12 месяцев выдержки 0.7 л 35%', 70, NULL, 2016, 35.00, 1, NULL, 4, NULL, NULL),
(8, 2, NULL, 4, 'RMBC-REF-100', NULL, 'Ром Bacardi Carta Blanca', 'От 6 месяцев выдержки 1 л 40%', 100, NULL, 2017, 40.00, 1, NULL, 4, NULL, NULL),
(9, 2, NULL, 5, 'TNNS-REF-70', NULL, 'Теннесси Виски Jack Daniels Tennessee Honey', ' 0.7 л 35%', 70, NULL, NULL, 35.00, 1, NULL, 5, NULL, NULL),
(10, 2, NULL, 5, 'TNNS-REF-100', NULL, 'Теннесси Виски Jack Daniels Old', 'No.7 1 л 40%', 100, NULL, NULL, 40.00, 1, NULL, 5, NULL, NULL);

INSERT INTO tax_rate (id, name, percent) VALUES
(1, '13', 13),
(2, '14', 14),
(3, '15', 15);

INSERT INTO currency(id, name, code, rate) VALUES
(1, 'US Dollar', 'USD', 1),
(2, 'Euro', 'EUR', 1.24),
(3, 'Hryvnia', 'UAH', 0.04);
