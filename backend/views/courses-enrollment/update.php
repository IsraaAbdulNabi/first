<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CoursesEnrollment */

$this->title = 'Update Courses Enrollment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Courses Enrollments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'course_id' => $model->course_id, 'member_id' => $model->member_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="courses-enrollment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
