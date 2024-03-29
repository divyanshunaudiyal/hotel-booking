<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rooms */

$this->title = 'Update Rooms: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rooms-update">

    <?= $this->render('_form_edit', [
        'model' => $model,
        'data' => $data,
        'roomlist' => $roomlist,
        'roomtype' => $roomtype
    ]) ?>

</div>
