<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\QuizesAnswers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quizes Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quizes-answers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'member_id' => $model->member_id, 'quize_id' => $model->quize_id, 'courses_id' => $model->courses_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'member_id' => $model->member_id, 'quize_id' => $model->quize_id, 'courses_id' => $model->courses_id], [
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
            'answer',
            'member_id',
            'quize_id',
            'courses_id',
        ],
    ]) ?>

</div>
