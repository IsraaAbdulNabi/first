<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "members".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $email
 * @property string $Password
 * @property string $type
 * @property integer $country_id
 * @property integer $city_id
 *
 * @property CourseComments[] $courseComments
 * @property CoursesEnrollment[] $coursesEnrollments
 * @property City $city
 * @property Country $country
 * @property Quizes[] $quizes
 * @property QuizesAnswers[] $quizesAnswers
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'city_id'], 'required'],
            [['id', 'country_id', 'city_id'], 'integer'],
            [['user_name', 'email', 'Password', 'type'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'email' => 'Email',
            'Password' => 'Password',
            'type' => 'Type',
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseComments()
    {
        return $this->hasMany(CourseComments::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoursesEnrollments()
    {
        return $this->hasMany(CoursesEnrollment::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizes()
    {
        return $this->hasMany(Quizes::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizesAnswers()
    {
        return $this->hasMany(QuizesAnswers::className(), ['member_id' => 'id']);
    }
}
