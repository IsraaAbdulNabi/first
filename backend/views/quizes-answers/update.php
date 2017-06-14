<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuizesAnswers */

$this->title = 'Update Quizes Answers: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quizes Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'member_id' => $model->member_id, 'quize_id' => $model->quize_id, 'courses_id' => $model->courses_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quizes-answers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
