<?php

namespace forma\modules\product;

use forma\modules\product\records\PackUnit;
use forma\modules\product\records\Product;
use forma\modules\product\services\ProductService;
use Yii;
use yii\helpers\Url;

/**
 * product module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'forma\modules\product\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (!Yii::$app->user->isGuest) {
            return true;
        } else {
            setcookie(
                "after_login_link",
                $actual_link =
                    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
                    . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
            );

            Yii::$app->getResponse()->redirect(Url::to(['/login']));
            return false;
        }
    }

    /**
     * Returns product's variant by pack.
     *
     * @param Product $product
     * @param PackUnit|null $packUnit
     * @return Product|array|null|static
     */
    public function getByPack(Product $product, PackUnit $packUnit = null)
    {
        $parent = ProductService::getParent($product);
        return ProductService::getByPackUnit($parent->id, $packUnit->id ?? null);
    }

    /**
     * Return array of available product's packs units for drop down list.
     *
     * @param Product $product
     * @return array
     */
    public function getPacksUnits(Product $product)
    {
        $parent = ProductService::getParent($product);
        return ProductService::getPacksList($parent);
    }
}
