<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quizes Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quizes-answers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Quizes Answers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'answer',
            'member_id',
            'quize_id',
            'courses_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
