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
            while (!is_null($parentCategoryId)) {
                $categoryModel = self::findOne($parentCategoryId);
                if (!is_null($categoryModel)) {
                    $parentCategoryId = $categoryModel->parent_id;
                    $parentsCategoriesId [] = $categoryModel->id;
                } else {
                    $parentCategoryId = null;
                }
            }
            return $parentsCategoriesId;
        }
        return false;
    }

    public static function getDropDownListPossibleCategories($currentCategoryId)
    {
        $allSubCategoriesId = [];
        $subCategories = self::find()->andWhere(['parent_id' => $currentCategoryId])->all();// массив обьектов
        while (!empty($subCategories)) {
            $subCategories2 = self::find();
            foreach ($subCategories as $subCategory) {
                $allSubCategoriesId [] = $subCategory->id;
                $subCategories2 = $subCategories2->orWhere(['parent_id' => $subCategory->id]);
            }
            $subCategories = $subCategories2->all();
        }
        return $allSubCategoriesId;
    }

    public static function getPossibleCategories($subCategoriesId = null, $currentCategoryId = null)
    {
        $categories = Category::find()
            ->joinWith(['accessory'])
            ->where(['accessory.user_id' => Yii::$app->getUser()->getId()])
            ->andWhere(['accessory.entity_class' => Category::className()]);

        if (isset($subCategoriesId) && !empty($subCategoriesId)) {
            foreach ($subCategoriesId as $subCategoryId) {
                $categories = $categories->andWhere(['<>', 'category.id', $subCategoryId]);
            }
        }
        if (!is_null($currentCategoryId)) {
            $categories = $categories->andWhere(['<>', 'category.id', $currentCategoryId]);
        }

        $categories = $categories->all();
        return $categories;
    }

    public static function getParentFieldDataProviderAndParentFieldSearch($parentCategoryId)
    {
        $parentsCategoriesId = Category::getCurrentAndParentId($parentCategoryId);
        $searchParentField = new FieldSearch();
        $parentFieldDataProvider = $searchParentField
            ->searchAllFieldsParentCategory(Yii::$app->request->queryParams, $parentsCategoriesId);
        return ['searchParentField' => $searchParentField, 'parentFieldDataProvider' => $parentFieldDataProvider,];
    }
}
