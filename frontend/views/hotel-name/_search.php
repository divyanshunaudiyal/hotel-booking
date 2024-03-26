<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HotelNameSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-name-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'destination_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'breakfast') ?>

    <?= $form->field($model, 'lunch') ?>

    <?php // echo $form->field($model, 'dinner') ?>

    <?php // echo $form->field($model, 'extra_bed') ?>

    <?php // echo $form->field($model, 'no_of_rooms') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'location') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
