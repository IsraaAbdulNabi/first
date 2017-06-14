<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property integer $id
 * @property string $start_date
 * @property string $end_date
 * @property string $member_id
 * @property integer $subject_id
 *
 * @property CourseComments[] $courseComments
 * @property Subjects $subject
 * @property CoursesEnrollment[] $coursesEnrollments
 * @property Materials[] $materials
 * @property Quizes[] $quizes
 * @property QuizesAnswers[] $quizesAnswers
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'subject_id'], 'required'],
            [['id', 'subject_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['member_id'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'member_id' => 'Member ID',
            'subject_id' => 'Subject ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseComments()
    {
        return $this->hasMany(CourseComments::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoursesEnrollments()
    {
        return $this->hasMany(CoursesEnrollment::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Materials::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizes()
    {
        return $this->hasMany(Quizes::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizesAnswers()
    {
        return $this->hasMany(QuizesAnswers::className(), ['courses_id' => 'id']);
    }
}
