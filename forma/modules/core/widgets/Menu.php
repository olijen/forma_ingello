<?php

namespace forma\modules\core\widgets;

use Yii;

class Menu extends \dmstr\widgets\Menu
{
    protected $_routes = [
        '/warehouse/warehouse' => ['warehouse', ['warehouse', 'warehouse-product']],
        '/purchase/main' => ['purchase'],
        '/transit/main' => ['transit'],
        '/selling/main' => ['selling'],
        '/product/product' => ['product', ['product']],
        '/product/category' => ['product', ['category']],
        '/product/pack-unit' => ['product', ['pack-unit']],
        '/country/country' => ['country'],
        '/supplier/supplier' => ['supplier'],
        '/product/manufacturer' => ['product', ['manufacturer']],
        '/customer/customer' => ['customer'],
        '/core/user' => ['core', ['user']],
    ];

    /**
     * @inheritdoc
     */
    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            if (!key_exists($item['url'][0], $this->_routes)) {
                return false;
            }

            $route = $this->_routes[$item['url'][0]];

            $moduleName = Yii::$app->controller->module->id;
            $controllerName = Yii::$app->controller->id;

            if ($route[0] !== $moduleName) {
                return false;
            }
            if (empty($route[1])) {
                return true;
            }
            if (!in_array($controllerName, $route[1])) {
                return false;
            }
            return true;
        }
    }
}
