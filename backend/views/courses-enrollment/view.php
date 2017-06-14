<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CoursesEnrollment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Courses Enrollments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-enrollment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'course_id' => $model->course_id, 'member_id' => $model->member_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'course_id' => $model->course_id, 'member_id' => $model->member_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'course_id',
            'member_id',
        ],
    ]) ?>

</div>
