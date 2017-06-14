<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuizesAnswers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quizes-answers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'answer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_id')->textInput() ?>

    <?= $form->field($model, 'quize_id')->textInput() ?>

    <?= $form->field($model, 'courses_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
