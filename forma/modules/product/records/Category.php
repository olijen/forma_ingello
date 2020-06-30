<?php

namespace forma\modules\product\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 *
 * @property Product[] $products
 */
class Category extends AccessoryActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'parent_id' => 'Родительская категория',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return static::findOne($this->parent_id);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }


    public function getFields()
    {
        return $this->hasMany(Field::className(), ['category_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    public static function getList()
    {
        return EntityLister::getList(self::className());
    }

    public static function getCurrentAndParentId($parentCategoryId)
    {
        if (!is_null($parentCategoryId)) {
            $currentAndParentId = [];
            $allModel = self::find()->all();
            while (!is_null($parentCategoryId)) {
                foreach ($allModel as $model) {
                    if ($model->id == $parentCategoryId) {
                        $currentAndParentId [] = $parentCategoryId;
                        $parentCategoryId = $model->parent_id;
                    }
                }
            }
            return $currentAndParentId;
        }
        return false;
    }

    public static function getDropDownListPossibleCategories($categoryId)
    {

        $subAndCurrentCategoriesId [] = $categoryId;
        $currentCategoryId [] = $categoryId;

        $allModel = self::find()->all();
        while (!empty($currentCategoryId)) {
            $currentCategoriesId = [];
            foreach ($currentCategoryId as $id) {
                foreach ($allModel as $model) {
                    if ($model->parent_id === $id) {
                        $subAndCurrentCategoriesId [] = $model->id;
                        $currentCategoriesId [] = $model->id;
                    }
                }
                $currentCategoryId = $currentCategoriesId;
            }
        }
        return $subAndCurrentCategoriesId;
    }

    public static function getPossibleCategories($subCategoriesId = null)
    {
        $categories = Category::find()
            ->joinWith(['accessory'])
            ->where(['accessory.user_id' => Yii::$app->getUser()->getId()])
            ->andWhere(['accessory.entity_class' => Category::className()]);

        if (isset($subCategoriesId) && !empty($subCategoriesId)) {
            
            count($subCategoriesId) === 1 ? $subCategoriesId = $subCategoriesId[0] : false;
            $categories->andWhere(['<>', 'category.id', $subCategoriesId]);
        }

        return $categories->all();
    }

    public static function getParentFieldDataProviderAndParentFieldSearch($parentCategoryId)
    {
        $parentsCategoriesId = Category::getCurrentAndParentId($parentCategoryId);
        $searchParentField = new FieldSearch();
        $parentFieldDataProvider = $searchParentField
            ->search(Yii::$app->request->queryParams, $parentsCategoriesId);

        return ['searchParentField' => $searchParentField, 'parentFieldDataProvider' => $parentFieldDataProvider,];
    }
}
