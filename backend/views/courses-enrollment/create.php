<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CoursesEnrollment */

$this->title = 'Create Courses Enrollment';
$this->params['breadcrumbs'][] = ['label' => 'Courses Enrollments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-enrollment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
