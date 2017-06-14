<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuizesAnswers */

$this->title = 'Create Quizes Answers';
$this->params['breadcrumbs'][] = ['label' => 'Quizes Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quizes-answers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
