<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OwnerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDowner') ?>

    <?= $form->field($model, 'LastName') ?>

    <?= $form->field($model, 'FirstName') ?>

    <?= $form->field($model, 'Patronymic') ?>

    <?= $form->field($model, 'IDcity') ?>

    <?php // echo $form->field($model, 'Street') ?>

    <?php // echo $form->field($model, 'Building') ?>

    <?php // echo $form->field($model, 'IDpet') ?>

    <?php // echo $form->field($model, 'PhoneNumber') ?>

    <?php // echo $form->field($model, 'IDuser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
