<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses Enrollments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-enrollment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Courses Enrollment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'course_id',
            'member_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
