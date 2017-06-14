<?php

namespace app\controllers;

use Yii;
use app\models\CoursesEnrollment;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CoursesEnrollmentController implements the CRUD actions for CoursesEnrollment model.
 */
class CoursesEnrollmentController extends Controller
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
     * Lists all CoursesEnrollment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CoursesEnrollment::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CoursesEnrollment model.
     * @param integer $id
     * @param integer $course_id
     * @param integer $member_id
     * @return mixed
     */
    public function actionView($id, $course_id, $member_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $course_id, $member_id),
        ]);
    }

    /**
     * Creates a new CoursesEnrollment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CoursesEnrollment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'course_id' => $model->course_id, 'member_id' => $model->member_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CoursesEnrollment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $course_id
     * @param integer $member_id
     * @return mixed
     */
    public function actionUpdate($id, $course_id, $member_id)
    {
        $model = $this->findModel($id, $course_id, $member_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'course_id' => $model->course_id, 'member_id' => $model->member_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CoursesEnrollment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $course_id
     * @param integer $member_id
     * @return mixed
     */
    public function actionDelete($id, $course_id, $member_id)
    {
        $this->findModel($id, $course_id, $member_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CoursesEnrollment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $course_id
     * @param integer $member_id
     * @return CoursesEnrollment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $course_id, $member_id)
    {
        if (($model = CoursesEnrollment::findOne(['id' => $id, 'course_id' => $course_id, 'member_id' => $member_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
