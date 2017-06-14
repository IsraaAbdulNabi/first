<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $country_name
 *
 * @property Members[] $members
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['country_name'], 'string', 'max' => 45],
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
            'country_name' => 'Country Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::className(), ['country_id' => 'id']);
    }
}
