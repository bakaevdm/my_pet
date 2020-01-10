<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Owner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IDcity')->textInput() ?>

    <?= $form->field($model, 'Street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Building')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IDpet')->textInput() ?>

    <?= $form->field($model, 'PhoneNumber')->textInput() ?>

    <?= $form->field($model, 'IDuser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
