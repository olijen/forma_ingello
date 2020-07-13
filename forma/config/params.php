<?php

return [
    'adminEmail' => 'admin@example.com',
    'bsDependencyEnabled' => false,
    'client_id' => '756749534749-8cqs0dc8jbvshsnpbsk6o8mhg5vtmamd.apps.googleusercontent.com',
    'client_secret' => 'fwk_NIyYpeiJ7jwKtQsF8hJb',
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
    "{\"BOSS\":{\"Дашборд\":[\"DashbordWidget\"],\"Регламент\":[\"Item\",\"Regularity\"],\"Ядро\":[\"Accessory\",\"Color\",\"Country\",\"Currency\",\"Event\",\"EventType\",\"Migration\",\"SystemEvent\",\"User\",\"Message\"]},\"CRM\":{\"Лид\":[\"Customer\"],\"Продажа\":[\"Selling\",\"SellingProduct\",\"State\",\"StateToState\"],\"Скрипт\":[\"Answer\",\"Request\",\"RequestStrategy\",\"RequestStrategyOld\",\"Strategy\"]},\"ERP\":{\"Продукт\":[\"Category\",\"Field\",\"FieldProductValue\",\"FieldValue\",\"Manufacturer\",\"PackUnit\",\"Product\",\"ProductPackUnit\",\"Type\"],\"Склад\":[\"Inventorization\",\"InventorizationProduct\",\"OverheadCost\",\"Purchase\",\"PurchaseOverheadCost\",\"PurchaseProduct\",\"Supplier\",\"TaxRate\",\"TblDynagrid\",\"TblDynagridDtl\",\"Transit\",\"TransitOverheadCost\",\"TransitProduct\",\"Warehouse\",\"WarehouseProduct\",\"WarehouseUser\"]},\"HRM\":{\"Найм\":[\"Interview\",\"InterviewVacancy\",\"Worker\",\"WorkerVacancy\"],\"Проект\":[\"Project\",\"ProjectUser\",\"ProjectVacancy\",\"ProjectVacancyOld\",\"Vacancy\"]}}",
    "colors" => [
        "HRM" => '#f08080',
        "ERP" => '#f49258',
        "CRM" => '#58628e',
        "BOSS" => '#00b65d',
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
            'url' => ['#'],
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
    'Selling' => 'money',
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
    'Inventorization' => 'money',
    'Purchase' => 'download',
    'Transit' => 'retweet',
    '#' => 'square',
    'Applan.ingello.com' => 'sitemap',
    'Ecocom.ingello.com' => 'money',
    ],

    'menu' => [
        ['label' => 'Статистика', 'url' => ['/'], 'icon' => 'line-chart'],

        ['label' => 'Регламент', 'url' => ['/core/regularity'], 'icon' => 'tree' ],
        [
            'label' => 'Люди',
            'url' => ['/core/default/people'],
            'icon' => 'users',
            'items' => [
                ['label' => 'Панель управления', 'url' => ['/core/default/people'], 'icon' => 'laptop'],
                ['label' => 'Клиенты', 'url' => ['/customer/customer'], 'icon' => 'user-circle'],
                ['label' => 'Кадры', 'url' => ['/worker/worker'], 'icon' => 'user'],
                ['label' => 'Поставщики', 'url' => ['/supplier/supplier'], 'icon' => 'truck'],
                ['label' => 'Производители', 'url' => ['/product/manufacturer'], 'icon' => 'id-card'],
                ['label' => 'Пациенты', 'url' => ['https://dent.ingello.com'], 'icon' => 'heartbeat'],
                ['label' => 'Регистрация', 'url' => ['/core/site/signup'], 'icon' => 'globe'],
                ['label' => 'Пользователи', 'url' => ['/core/user/referral'], 'icon' => 'book'],
            ]
        ],
        [
            'label' => 'Продажи (CRM)',
            'url' => ['/selling/default'],
            'icon' => 'money',
            'items' => [
                [
                    'label' => 'Панель управления',
                    'url' => ['/selling/default'],
                    'icon' => 'laptop',
                    'items' => [

                    ]
                ], [
                    'label' => 'Продажи клиентам',
                    'url' => ['/selling/main'],
                    'icon' => 'money',
                    'items' => [

                    ]
                ],[
                    'label' => 'Скрипты',
                    'url' => ['/selling/speech-module'],
                    'icon' => 'list',
                    'items' => [

                    ]
                ],
                ['label' => 'Генерация лидов FLH', 'url' => ['/selling/freelancehunt/'], 'icon' => 'users'],
                ['label' => 'Скрипты для FLH', 'url' => ['/selling/freelancehunt/bid-form'], 'icon' => 'dollar'],
            ]
        ],
        [
            'label' => 'Найм и проекты',
            'url' => ['/hr/'],
            'icon' => 'user-plus',
            'items' => [
                ['label' => 'Панель управления', 'url' => ['/hr/'], 'icon' => 'laptop'],
                ['label' => 'Проекты', 'url' => ['/project/project?ProjectSearch[state]=1'], 'icon' => 'newspaper-o'],
                ['label' => 'Найм', 'url' => ['/hr/main'], 'icon' => 'volume-up'],
                ['label' => 'Кадры', 'url' => ['/worker/worker'], 'icon' => 'user'],
                ['label' => 'Вакансии', 'url' => ['/vacancy/vacancy'], 'icon' => 'id-card'],
                ['label' => 'Регистрация', 'url' => ['/core/site/signup'], 'icon' => 'globe'],
                ['label' => 'Пользователи', 'url' => ['/core/user/referral'], 'icon' => 'book'],
            ],
        ],
        [
            'label' => 'Продукты и услуги',
            'url' => ['/product/default/'],
            'icon' => 'cube',
            'items' => [
                ['label' => 'Панель управления', 'url' => ['/product/'], 'icon' => 'laptop'],
                ['label' => 'Продукты и услуги', 'url' => ['/product/product'], 'icon' => 'cube'],
                ['label' => 'Категории', 'url' => ['/product/category'], 'icon' => 'object-group'],
                ['label' => 'Упаковки', 'url' => ['/product/pack-unit'], 'icon' => 'cubes'],
                ['label' => 'Страны', 'url' => ['/country/country'], 'icon' => 'podcast'],
                ['label' => 'Валюты', 'url' => ['/product/currency'], 'icon' => 'money-bill-alt'],
                ['label' => 'Налоги', 'url' => ['/product/tax-rate'], 'icon' => 'balance-scale'],
            ],
        ],
        [
            'label' => 'Хранилища',
            'url' => ['/warehouse/warehouse'],
            'icon' => 'th',
            'items' => [
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
                    'url' => ['/#'],
                    'icon' => 'square',
                    'items' => [
                    ]
                ],

            ],
        ],
        ['label' => 'Командная работа', 'url' => ['https://applan.ingello.com'], 'icon' => 'sitemap'],
        ['label' => 'Интернет магазин', 'url' => ['https://ecocom.ingello.com'], 'icon' => 'money'],
    ],
];
