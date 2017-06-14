<?php

namespace app\controllers;

use Yii;
use app\models\Members;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MembersController implements the CRUD actions for Members model.
 */
class MembersController extends Controller
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
     * Lists all Members models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Members::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Members model.
     * @param integer $id
     * @param integer $country_id
     * @param integer $city_id
     * @return mixed
     */
    public function actionView($id, $country_id, $city_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $country_id, $city_id),
        ]);
    }

    /**
     * Creates a new Members model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Members();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'country_id' => $model->country_id, 'city_id' => $model->city_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Members model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $country_id
     * @param integer $city_id
     * @return mixed
     */
    public function actionUpdate($id, $country_id, $city_id)
    {
        $model = $this->findModel($id, $country_id, $city_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'country_id' => $model->country_id, 'city_id' => $model->city_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Members model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $country_id
     * @param integer $city_id
     * @return mixed
     */
    public function actionDelete($id, $country_id, $city_id)
    {
        $this->findModel($id, $country_id, $city_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Members model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $country_id
     * @param integer $city_id
     * @return Members the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $country_id, $city_id)
    {
        if (($model = Members::findOne(['id' => $id, 'country_id' => $country_id, 'city_id' => $city_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
