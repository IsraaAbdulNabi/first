<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CourseComments */

$this->title = 'Create Course Comments';
$this->params['breadcrumbs'][] = ['label' => 'Course Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
