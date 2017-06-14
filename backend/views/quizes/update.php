<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Quizes */

$this->title = 'Update Quizes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'member_id' => $model->member_id, 'course_id' => $model->course_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quizes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
