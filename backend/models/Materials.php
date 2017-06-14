<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materials".
 *
 * @property integer $id
 * @property string $date
 * @property string $member_id
 * @property integer $course_id
 *
 * @property Courses $course
 */
class Materials extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id'], 'required'],
            [['id', 'course_id'], 'integer'],
            [['date'], 'safe'],
            [['member_id'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'member_id' => 'Member ID',
            'course_id' => 'Course ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'course_id']);
    }
}
