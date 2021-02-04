<?php

namespace forma\modules\warehouse\controllers;

use forma\components\Controller;

/**
 * Default controller for the `warehouse` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect('/warehouse/warehouse');
    }
}
