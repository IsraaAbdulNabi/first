<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $category_name
 *
 * @property Subjects[] $subjects
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['category_name'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['category_id' => 'id']);
    }
}
