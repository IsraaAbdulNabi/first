<?php

namespace app\controllers;

use Yii;
use app\models\CourseComments;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CourseCommentsController implements the CRUD actions for CourseComments model.
 */
class CourseCommentsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CourseComments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CourseComments::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CourseComments model.
     * @param integer $id
     * @param integer $member_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionView($id, $member_id, $course_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $member_id, $course_id),
        ]);
    }

    /**
     * Creates a new CourseComments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CourseComments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'member_id' => $model->member_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CourseComments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $member_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionUpdate($id, $member_id, $course_id)
    {
        $model = $this->findModel($id, $member_id, $course_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'member_id' => $model->member_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CourseComments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $member_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionDelete($id, $member_id, $course_id)
    {
        $this->findModel($id, $member_id, $course_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CourseComments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $member_id
     * @param integer $course_id
     * @return CourseComments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $member_id, $course_id)
    {
        if (($model = CourseComments::findOne(['id' => $id, 'member_id' => $member_id, 'course_id' => $course_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
