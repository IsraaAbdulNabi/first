<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quizes_answers".
 *
 * @property integer $id
 * @property string $answer
 * @property integer $member_id
 * @property integer $quize_id
 * @property integer $courses_id
 *
 * @property Members $member
 * @property Courses $courses
 * @property Quizes $quize
 */
class QuizesAnswers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quizes_answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'member_id', 'quize_id', 'courses_id'], 'required'],
            [['id', 'member_id', 'quize_id', 'courses_id'], 'integer'],
            [['answer'], 'string', 'max' => 1000],
            [['id'], 'unique'],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['member_id' => 'id']],
            [['courses_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['courses_id' => 'id']],
            [['quize_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quizes::className(), 'targetAttribute' => ['quize_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'answer' => 'Answer',
            'member_id' => 'Member ID',
            'quize_id' => 'Quize ID',
            'courses_id' => 'Courses ID',
        ];
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
    public function getCourses()
    {
        return $this->hasOne(Courses::className(), ['id' => 'courses_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuize()
    {
        return $this->hasOne(Quizes::className(), ['id' => 'quize_id']);
    }
}
