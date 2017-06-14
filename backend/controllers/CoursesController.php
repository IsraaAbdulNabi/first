<?php

namespace app\controllers;

use Yii;
use app\models\Courses;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CoursesController implements the CRUD actions for Courses model.
 */
class CoursesController extends Controller
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
     * Lists all Courses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Courses::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Courses model.
     * @param integer $id
     * @param integer $subject_id
     * @return mixed
     */
    public function actionView($id, $subject_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $subject_id),
        ]);
    }

    /**
     * Creates a new Courses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Courses();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'subject_id' => $model->subject_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Courses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $subject_id
     * @return mixed
     */
    public function actionUpdate($id, $subject_id)
    {
        $model = $this->findModel($id, $subject_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'subject_id' => $model->subject_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Courses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $subject_id
     * @return mixed
     */
    public function actionDelete($id, $subject_id)
    {
        $this->findModel($id, $subject_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Courses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $subject_id
     * @return Courses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $subject_id)
    {
        if (($model = Courses::findOne(['id' => $id, 'subject_id' => $subject_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
