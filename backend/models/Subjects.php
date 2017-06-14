<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property integer $id
 * @property string $subjest_name
 * @property string $description
 * @property integer $category_id
 *
 * @property Courses[] $courses
 * @property Category $category
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'required'],
            [['id', 'category_id'], 'integer'],
            [['subjest_name', 'description'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subjest_name' => 'Subjest Name',
            'description' => 'Description',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
