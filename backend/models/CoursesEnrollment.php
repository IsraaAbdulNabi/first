<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses_enrollment".
 *
 * @property integer $id
 * @property integer $course_id
 * @property integer $member_id
 *
 * @property Courses $course
 * @property Members $member
 */
class CoursesEnrollment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'courses_enrollment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'member_id'], 'required'],
            [['id', 'course_id', 'member_id'], 'integer'],
            [['id'], 'unique'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['member_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'member_id' => 'Member ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Members::className(), ['id' => 'member_id']);
    }
}
