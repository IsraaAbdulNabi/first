<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CourseComments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'member_id' => $model->member_id, 'course_id' => $model->course_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'member_id' => $model->member_id, 'course_id' => $model->course_id], [
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
            'comment_text',
            'member_id',
            'course_id',
        ],
    ]) ?>

</div>
