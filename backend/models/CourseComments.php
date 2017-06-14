<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_comments".
 *
 * @property integer $id
 * @property string $comment_text
 * @property integer $member_id
 * @property integer $course_id
 *
 * @property Courses $course
 * @property Members $member
 */
class CourseComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'member_id', 'course_id'], 'required'],
            [['id', 'member_id', 'course_id'], 'integer'],
            [['comment_text'], 'string', 'max' => 400],
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
            'comment_text' => 'Comment Text',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Members::className(), ['id' => 'member_id']);
    }
}
