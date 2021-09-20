<?php

return [
    'adminEmail' => 'admin@example.com',
    'globalQueries' => [],
    'bsDependencyEnabled' => false,
    // 'client_id' => '756749534749-8cqs0dc8jbvshsnpbsk6o8mhg5vtmamd.apps.googleusercontent.com',
    'client_id' => '573197289123-bf4oqdrq58pihbf0eqjdql1act4q7o6c.apps.googleusercontent.com',
    // 'client_secret' => 'fwk_NIyYpeiJ7jwKtQsF8hJb',
    'client_secret' => '6uAuwMd1jVeNsbAHtsimAapB',
    'applications' => [
        'Apps1' => [
            'Mod0' => [
                0 => 'Accessory',
                1 => 'Answer',
                2 => 'Category',
                3 => 'Color',
                4 => 'Country',
            ],
            'Mod1' => [
                0 => 'Currency',
                1 => 'Customer',
                2 => 'Event',
                3 => 'EventType',
                4 => 'Field',
            ],
            'Mod2' => [
                0 => 'FieldProductValue',
                1 => 'FieldValue',
                2 => 'Interview',
                3 => 'InterviewVacancy',
                4 => 'Inventorization',
            ],
        ],
        'Apps2' => [
            'Mod2' => [
                0 => 'InventorizationProduct',
                1 => 'Item',
                2 => 'Manufacturer',
                3 => 'Message',
                4 => 'Migration',
            ],
            'Mod3' => [
                0 => 'OverheadCost',
                1 => 'PackUnit',
                2 => 'Patient',
                3 => 'Product',
                4 => 'ProductPackUnit',
            ],
            'Mod4' => [
                0 => 'Project',
                1 => 'ProjectUser',
                2 => 'ProjectVacancy',
                3 => 'ProjectVacancyOld',
                4 => 'Purchase',
            ],
        ],
        'Apps3' => [
            'Mod4' => [
                0 => 'PurchaseOverheadCost',
                1 => 'PurchaseProduct',
                2 => 'Regularity',
                3 => 'Request',
                4 => 'RequestStrategy',
            ],
            'Mod5' => [
                0 => 'RequestStrategyOld',
                1 => 'Selling',
                2 => 'SellingProduct',
                3 => 'State',
                4 => 'StateToState',
            ],
            'Mod6' => [
                0 => 'Strategy',
                1 => 'Supplier',
                2 => 'SystemEvent',
                3 => 'SystemEventUser',
                4 => 'TaxRate',
            ],
        ],
        'Apps4' => [
            'Mod6' => [
                0 => 'TblDynagrid',
                1 => 'TblDynagridDtl',
                2 => 'Transit',
                3 => 'TransitOverheadCost',
                4 => 'TransitProduct',
            ],
            'Mod7' => [
                0 => 'Type',
                1 => 'User',
                2 => 'Vacancy',
                3 => 'Warehouse',
                4 => 'WarehouseProduct',
            ],
            'Mod8' => [
                0 => 'WarehouseUser',
                1 => 'Worker',
                2 => 'WorkerVacancy',
            ]
        ]
    ],
    "main" =>

        "{\"BOSS\":{\"Дашборд\":[\"DashbordWidget\"],\"Регламент\":[\"Item\",\"Regularity\"],\"Ядро\":[\"Accessory\",\"Color\",\"Country\",\"Currency\",\"Event\",\"EventType\",\"Migration\",\"SystemEvent\",\"User\",\"Message\"]},\"CRM\":{\"Лид\":[\"Customer\"],\"Продажа\":[\"Selling\",\"SellingProduct\",\"CustomerSource\",\"State\",\"StateToState\"],\"Скрипт\":[\"Answer\",\"Request\",\"RequestStrategy\",\"RequestStrategyOld\",\"Strategy\"]},\"ERP\":{\"Продукт\":[\"Category\",\"Field\",\"FieldProductValue\",\"FieldValue\",\"Manufacturer\",\"PackUnit\",\"Product\",\"ProductPackUnit\",\"Type\"],\"Склад\":[\"Inventorization\",\"InventorizationProduct\",\"OverheadCost\",\"Purchase\",\"PurchaseOverheadCost\",\"PurchaseProduct\",\"Supplier\",\"TaxRate\",\"TblDynagrid\",\"TblDynagridDtl\",\"Transit\",\"TransitOverheadCost\",\"TransitProduct\",\"Warehouse\",\"WarehouseProduct\",\"WarehouseUser\"]},\"HRM\":{\"Найм\":[\"Interview\",\"InterviewVacancy\",\"Worker\",\"WorkerVacancy\",\"InterviewState\"],\"Проект\":[\"Project\",\"ProjectUser\",\"ProjectVacancy\",\"ProjectVacancyOld\",\"Vacancy\"]}}",

        "{\"BOSS\":{\"Дашборд\":[\"DashbordWidget\"],\"Регламент\":[\"Item\",\"Regularity\"],\"Ядро\":[\"Accessory\",\"Color\",\"Country\",\"Currency\",\"Event\",\"EventType\",\"Migration\",\"SystemEvent\",\"User\",\"Message\",\"Template\"]},\"CRM\":{\"Лид\":[\"Customer\"],\"Продажа\":[\"Selling\",\"SellingProduct\",\"State\",\"StateToState\"],\"Скрипт\":[\"Answer\",\"Request\",\"RequestStrategy\",\"RequestStrategyOld\",\"Strategy\"]},\"ERP\":{\"Продукт\":[\"Category\",\"Field\",\"FieldProductValue\",\"FieldValue\",\"Manufacturer\",\"PackUnit\",\"Product\",\"ProductPackUnit\",\"Type\"],\"Склад\":[\"Inventorization\",\"InventorizationProduct\",\"OverheadCost\",\"Purchase\",\"PurchaseOverheadCost\",\"PurchaseProduct\",\"Supplier\",\"TaxRate\",\"TblDynagrid\",\"TblDynagridDtl\",\"Transit\",\"TransitOverheadCost\",\"TransitProduct\",\"Warehouse\",\"WarehouseProduct\",\"WarehouseUser\"]},\"HRM\":{\"Найм\":[\"Interview\",\"InterviewVacancy\",\"Worker\",\"WorkerVacancy\"],\"Проект\":[\"Project\",\"ProjectUser\",\"ProjectVacancy\",\"ProjectVacancyOld\",\"Vacancy\"]}}",
    "colors" => [
        "HRM" => '#f08080',
        "ERP" => '#f49258',
        "CRM" => '#58628e',
        "BOSS" => '#00b65d',
    ],

    "translate" => [
        'DashbordWidget' => 'Виджет на главной странице',
        'Template' => 'Шаблон',
        'Item' => "Шаблон",
        'CustomerSource'=>"Источник клиентов",
        'Regularity' => "Регламент",
        'Accessory' => "Доступ",
        'Color' => "Цвет",
        'Country' => "Страна",
        'Currency' => "Валюта",
        'Event' => "Событие",
        'EventType' => "Тип события",
        'Migration' => "Миграция",
        'SystemEvent' => "Системное событие",
        'User' => "Пользователь",
        'Message' => "Сообщение",
        'Customer' => "Покупатель",
        'Selling' => "Продажа",
        'SellingProduct' => "Продукт в продаже",
        'State' => "Состояние",
        'StateToState' => "Состояние к состоянию",
        'Answer' => "Ответ",
        'Request' => "Запрос",
        'RequestStrategy' => "Стратегия запроса",
        'RequestStrategyOld' => "Старая стратегия запроса",
        'Strategy' => "Стратегия",
        'Category' => "Категория",
        'Field' => "Поле",
        'FieldProductValue' => "Значение поля продукта",
        'FieldValue' => "Значение поля",
        'Manufacturer' => "Производитель",
        'PackUnit' => "Упаковка",
        'Product' => "Продукт",
        'ProductPackUnit' => "Упаковка продукта",
        'Type' => "Тип",
        'Inventorization' => "Инвентаризация",
        'InventorizationProduct' => "Инвентаризация продукта",
        'OverheadCost' => "Накладные расходы",
        'Purchase' => "Закупка",
        'PurchaseOverheadCost' => "Расходы на закупку",
        'PurchaseProduct' => "Закупка продукта",
        'Supplier' => "Поставщик",
        'TaxRate' => "Налоговая ставка",
        'TblDynagrid' => "Таблица",
        'TblDynagridDtl' => "Таблица",
        'Transit' => "Перевозка (транзит)",
        'TransitOverheadCost' => "Расходы на перевозку (транзит)",
        'TransitProduct' => "Транзитный продукт",
        'Warehouse' => "Склад",
        'WarehouseProduct' => "Склад продукта",
        'WarehouseUser' => "Склад пользователя",
        'Interview' => "Найм",
        'InterviewVacancy' => "Вакансия для найма",
        'InterviewState' => "Состояние",
        'Worker' => "Работник",
        'WorkerVacancy' => "Вакансия для работника",
        'Project' => "Проект",
        'ProjectUser' => "Проект пользователя",
        'ProjectVacancy' => "Вакансия для проекта",
        'ProjectVacancyOld' => "Старая вакансия для проекта",
        'Vacancy' => "Вакансия",
    ],




    'warehouse' => [
        [
            'label' => 'Смотреть все',
            'url' => ['/warehouse/warehouse'],
            'icon' => 'th'
        ],

        ['label' => 'Инвентаризация', 'url' => ['/inventorization/main'], 'icon' => 'money'],
        ['label' => 'Поставки', 'url' => ['/purchase/main'], 'icon' => 'download'],
        ['label' => 'Перемещения', 'url' => ['/transit/main'], 'icon' => 'retweet'],

        [
            'label' => 'Список хранилищ',
            'url' => '#',
            'icon' => 'square',
            'items' => [
            ]
        ],

    ],

    'icons' => [
        '' => 'line-chart',
        'Regularity' => 'tree',
        'People' => 'laptop',
        'Customer' => 'user-circle',
        'Worker' => 'user',
        'Supplier' => 'truck',
        'Manufacturer' => 'id-card',
        'Dent.ingello.com' => 'heartbeat',
        'Signup' => 'globe',
        'Referral' => 'book',
        'Selling' => 'money-bill-wave',
        'SpeechModule' => 'list',
        'Freelancehunt' => 'users',
        'BidForm' => 'dollar',
        'Hr' => 'volume-up',
        'Project?ProjectSearch[state]=1' => 'newspaper-o',
        'Vacancy' => 'id-card',
        'Product' => 'cube',
        'Category' => 'object-group',
        'PackUnit' => 'cubes',
        'Country' => 'podcast',
        'Currency' => 'money-bill-alt',
        'TaxRate' => 'balance-scale',
        'Warehouse' => 'th',
        'Inventorization' => 'boxes',
        'Purchase' => 'download',
        'Transit' => 'retweet',
        '#' => 'square',
        'Applan.ingello.com' => 'sitemap',
        'Ecocom.ingello.com' => 'money',
    ],

    'menu' => [
        ['label' => 'Главная', 'url' => ['/'], 'icon' => 'home'],

        ['label'=>'Управление',
            'options' => [
                'class'=>'menuColor',
                'style'=>'background-color:#00a65a; color:white;',
                ],
            'url'=>'#',
            'icon'=>'calendar',
            'items'=>[
                ['label' => 'Статистика', 'url' => ['/'], 'icon' => 'chart-bar'],
                ['label' => 'Шаблоны писем', 'url' => ['/template/template'], 'icon' => 'chart-bar'],
                ['label' => 'Добавить письмо', 'url' => ['//template/template/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                    'style' => 'margin-left: 20px'] ],
                ['label'=>'Календарь','url'=>['/event'], 'icon'=>'calendar',],
                ['label' => 'Добавить событие', 'url' => ['/event/event/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                    'style' => 'margin-left: 20px'] ],
                ['label' => 'Регламент', 'url' => ['/core/regularity'], 'icon' => 'tree' ],
                ['label' => 'Добавить регламент', 'url' => ['/core/regularity/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                    'style' => 'margin-left: 20px'] ],
                ['label' => 'Публичный регламент', 'url' => ['/core/regularity/regularity'], 'icon' => 'tree' ],
                ['label' => 'Системные события', 'url' => ['/core/system-event'], 'icon' => 'history'],
                [
                    'label' => 'Люди',
                    'url' => '#',
                    'icon' => 'users',
                    'items' => [
                        ['label' => 'Панель упр.', 'url' => ['/core/default/people'], 'icon' => 'laptop'],
                        ['label' => 'Клиенты', 'url' => ['/customer/customer/'], 'icon' => 'user-circle'],
                        ['label' => 'Добавить клиента', 'url' => ['/customer/customer/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                            'style' => 'margin-left: 20px'] ],
                        ['label' => 'Кадры', 'url' => ['/worker/worker'], 'icon' => 'user'],
                        ['label' => 'Добавить кадра', 'url' => ['/worker/worker/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                            'style' => 'margin-left: 20px'] ],
                        ['label' => 'Поставщики', 'url' => ['/supplier/supplier'], 'icon' => 'truck'],
                        ['label' => 'Добавить постав.', 'url' => ['/supplier/supplier/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                            'style' => 'margin-left: 20px'] ],
                        ['label' => 'Производители', 'url' => ['/product/manufacturer/'], 'icon' => 'id-card'],
                        ['label' => 'Добавить производ.', 'url' => ['/product/manufacturer/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                            'style' => 'margin-left: 20px'] ],
                        ['label' => 'Пациенты', 'url' => 'https://dent.ingello.com', 'icon' => 'heartbeat'],
                        ['label' => 'Регистрация', 'url' => ['/core/site/signup-referer'], 'icon' => 'globe'],
                        ['label' => 'Пользователи', 'url' => ['/core/user/referral'], 'icon' => 'book'],
                    ]
                ],
            ],
        ],

        [
            'label' => 'Продажи (CRM)',
            'options' => [
                'class'=>'menuColor',
                'style'=>'color: white; background-color: #58628e;',
            ],
            'url' => '#',
            'icon' => 'money-bill-wave',
            'items' => [
                [
                    'label' => 'Панель управления',
                    'url' => ['/selling/default'],
                    'icon' => 'laptop',
                    'items' => [

                    ]
                ],
                [
                    'label' => 'Продажи клиентам',
                    'url' => ['/selling/main'],
                    'icon' => 'money-bill-wave',
                ],

                ['label' => 'Создать продажу',
                    'url' => ['/selling/form'],
                    'icon' => 'plus',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']
                ],
                [
                    'label' => 'Состояния',
                    'url' => ['/selling/main-state/index'],
                    'icon' => 'dot-circle',
                    'items' => [

                    ]
                ],
                ['label' => 'Добавить состояние',
                    'url' => ['/selling/main-state/create'],
                    'icon' => 'plus',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']
                ],
                [
                    'label' => 'Клиенты',
                    'url' => ['/customer/customer'],
                    'icon' => 'user-circle'
                ],
                ['label' => 'Добавить клиента',
                    'url' => ['/customer/customer/create'],
                    'icon' => 'plus',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']
                ],
                [
                    'label' => 'Скрипты',
                    'url' => ['/selling/speech-module'],
                    'icon' => 'list',
                    'items' => [

                    ]
                ],
                ['label' => 'Добавить стратегию',
                    'url' => ['/selling/strategy/create'],
                    'icon' => 'plus',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']
                ],
                ['label' => 'Добавить вопрос',
                    'url' => ['/selling/request/create'],
                    'icon' => 'plus',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']
                ],
                ['label' => 'Добавить ответ',
                    'url' => ['/selling/answer/create'],
                    'icon' => 'plus',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']
                ],
                [
                    'label' => 'Источники клиента',
                    'url' => ['/selling/customer-source'],
                    'icon' => 'list',
                ],

                ['label' => 'Добавить источник',
                    'url' => ['/selling/customer-source/create'],
                    'icon' => 'plus',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']
                ],

                [
                    'label'=>'Тест',
                    'url'=>['/test/main'],
                    'icon'=>'list',
                    'items'=>[

                    ]
                ],
                [
                    'label'=>'Добавить тест',
                    'url'=>['/test/main/create'],
                    'icon'=>'plus',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']
                ],
                [
                    'label'=>'Назначить тест',
                    'url'=>[''],
                    'icon'=>'user-check',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']
                ],

                ['label' => 'Генерация лидов FLH', 'url' => '/selling/freelancehunt/', 'icon' => 'users',
                    'visible' => strripos('localhost', $_SERVER['SERVER_NAME']) !== false],
                ['label' => 'Скрипты для FLH', 'url' => '/selling/freelancehunt/bid-form', 'icon' => 'dollar-sign',
                    'visible' => strripos('localhost', $_SERVER['SERVER_NAME']) !== false],
            ]
        ],
        [

            'label' => 'Найм и проекты',
            'options' => [
                'class'=>'menuColor',
                'style'=>'background-color:#F08080;',
            ],
            'url' => '#',
            'icon' => 'user-plus',
            'items' => [
                ['label' => 'Панель управления', 'url' => ['/hr/'], 'icon' => 'laptop'],
                ['label' => 'Проекты', 'url' => ['/project/project?ProjectSearch[state]=1'], 'icon' => 'newspaper'],
                ['label' => 'Создать проект', 'url' => ['/project/project/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']],
                ['label' => 'Найм', 'url' => ['/hr/main'], 'icon' => 'volume-up'],
                ['label' => 'Добавить найм', 'url' => ['/hr/form/index'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                    'style' => 'margin-left: 20px']],
                ['label' => 'Кадры', 'url' => ['/worker/worker'], 'icon' => 'user'],
                ['label' => 'Добавить кадр', 'url' => ['/worker/worker/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                    'style' => 'margin-left: 20px']],
                ['label' => 'Состояния' , 'url' => ['/hr/interview-state/'], 'icon' => 'dot-circle',],
                ['label' => 'Добавить состояние', 'url' => ['/hr/interview-state/create'],'icon' => 'plus',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px'] ],
                ['label' => 'Вакансии', 'url' => ['/vacancy/vacancy'], 'icon' => 'id-card'],
                ['label' => 'Добавить вакансию', 'url' => ['/vacancy/vacancy/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                    'style' => 'margin-left: 20px']],
                ['label' => 'Скрипты','url' => ['/selling/speech-module'],'icon' => 'list',]],
        ],
        [
            'label' => 'Продукты и услуги',
            'options' => [
                'class'=>'menuColor',
                'style'=>'background-color:#f49258;',
            ],
            'url' => '#',
            'icon' => 'cube',
            'items' => [
                ['label' => 'Панель управления', 'url' => ['/product/'], 'icon' => 'laptop'],
                ['label' => 'Продукты и услуги', 'url' => ['/product/product'], 'icon' => 'cube'],
                ['label' => 'Добавить прод. и усл.', 'url' => ['/product/product/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']],
                ['label' => 'Производители', 'url' => ['/product/manufacturer'], 'icon' => 'id-card'],
                ['label' => 'Добавить производ.', 'url' => ['/product/manufacturer/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                    'style' => 'margin-left: 20px']],
                ['label' => 'Категории', 'url' => ['/product/category'], 'icon' => 'object-group'],
                ['label' => 'Добавить категории', 'url' => ['/product/category/create'], 'icon' => 'plus', 'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']],
                ['label' => 'Упаковки', 'url' => ['/product/pack-unit'], 'icon' => 'cubes'],
                ['label' => 'Страны', 'url' => ['/country/country'], 'icon' => 'podcast'],
                ['label' => 'Валюты', 'url' => ['/product/currency'], 'icon' => 'money-bill-alt'],
                ['label' => 'Налоги', 'url' => ['/product/tax-rate'], 'icon' => 'balance-scale'],
            ],
        ],
        [
            'label' => 'Хранилища',
            'options' => [
                'class'=>'menuColor',
                'style'=>'background-color:#dc7d22; ',
            ],
            'url' => '#',
            'icon' => 'th',
            'items' => [
                [
                    'label' => 'Смотреть все',
                    'url' => ['/warehouse/warehouse'],
                    'icon' => 'th'
                ],
                [
                    'label' => 'Добавить хранилище',
                    'url' => ['/warehouse/warehouse/create'],
                    'icon' => 'plus',
                    'options' => ['class' => 'tabLink', 'style' => 'margin-left: 20px']
                ],

                ['label' => 'Поставки', 'url' => ['/purchase/main'], 'icon' => 'download'],
                ['label' => 'Создать поставку', 'url' => ['/purchase/form/index'], 'icon' => 'plus', 'options' => ['class' => 'tabLink',
                    'style' => 'margin-left: 20px']],
                ['label' => 'Инвентаризация', 'url' => ['/inventorization/main'], 'icon' => 'boxes'],
                //['label' => 'Инвентаризация', 'url' => ['/inventorization/main'], 'icon' => 'boxes'],
                ['label' => 'Перемещения', 'url' => ['/transit/main'], 'icon' => 'retweet'],
            ],
        ],
        ['label' => 'Командная работа', 'url' => 'https://applan.ingello.com', 'icon' => 'sitemap', 'options' => [
                'class'=>'menuColor text_black']],
        ['label' => 'Интернет магазин', 'url' => 'https://ecocom.ingello.com', 'icon' => 'shopping-cart', 'options' => [
                'class'=>'menuColor text_black']],
        ['label' => 'Здоровье: стоматологии', 'url' => 'https://dent.ingello.com', 'icon' => 'heartbeat', 'options' => [
                'class'=>'menuColor text_black']],
    ],
];




