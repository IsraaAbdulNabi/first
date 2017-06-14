<?php

namespace app\controllers;

use Yii;
use app\models\QuizesAnswers;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuizesAnswersController implements the CRUD actions for QuizesAnswers model.
 */
class QuizesAnswersController extends Controller
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
     * Lists all QuizesAnswers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => QuizesAnswers::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single QuizesAnswers model.
     * @param integer $id
     * @param integer $member_id
     * @param integer $quize_id
     * @param integer $courses_id
     * @return mixed
     */
    public function actionView($id, $member_id, $quize_id, $courses_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $member_id, $quize_id, $courses_id),
        ]);
    }

    /**
     * Creates a new QuizesAnswers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new QuizesAnswers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'member_id' => $model->member_id, 'quize_id' => $model->quize_id, 'courses_id' => $model->courses_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing QuizesAnswers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $member_id
     * @param integer $quize_id
     * @param integer $courses_id
     * @return mixed
     */
    public function actionUpdate($id, $member_id, $quize_id, $courses_id)
    {
        $model = $this->findModel($id, $member_id, $quize_id, $courses_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'member_id' => $model->member_id, 'quize_id' => $model->quize_id, 'courses_id' => $model->courses_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing QuizesAnswers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $member_id
     * @param integer $quize_id
     * @param integer $courses_id
     * @return mixed
     */
    public function actionDelete($id, $member_id, $quize_id, $courses_id)
    {
        $this->findModel($id, $member_id, $quize_id, $courses_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the QuizesAnswers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $member_id
     * @param integer $quize_id
     * @param integer $courses_id
     * @return QuizesAnswers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $member_id, $quize_id, $courses_id)
    {
        if (($model = QuizesAnswers::findOne(['id' => $id, 'member_id' => $member_id, 'quize_id' => $quize_id, 'courses_id' => $courses_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
