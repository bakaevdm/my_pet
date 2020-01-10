<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Owner */

$this->title = 'Update Owner: ' . $model->IDowner;
$this->params['breadcrumbs'][] = ['label' => 'Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDowner, 'url' => ['view', 'id' => $model->IDowner]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="owner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
