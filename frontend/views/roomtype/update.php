<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Roomtype */

$this->title = 'Update Roomtype: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Roomtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roomtype-update">



    <?= $this->render('_form_edit', [
        'model' => $model,
    ]) ?>

</div>
