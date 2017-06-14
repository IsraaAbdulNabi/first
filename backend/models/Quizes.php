<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quizes".
 *
 * @property integer $id
 * @property string $questions
 * @property integer $member_id
 * @property integer $course_id
 *
 * @property Courses $course
 * @property Members $member
 * @property QuizesAnswers[] $quizesAnswers
 */
class Quizes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quizes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'member_id', 'course_id'], 'required'],
            [['id', 'member_id', 'course_id'], 'integer'],
            [['questions'], 'string', 'max' => 1000],
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
            'questions' => 'Questions',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizesAnswers()
    {
        return $this->hasMany(QuizesAnswers::className(), ['quize_id' => 'id']);
    }
}
