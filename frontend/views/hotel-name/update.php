<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HotelName */

$this->title = 'Update Hotel Name with user-id: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hotel Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hotel-name-update">
  
    <?= $this->render('_form_edit', [
        'model' => $model,
        'data' => $data,
        'destinationlist' => $destinationlist,
        'hotels' => $hotels
    ]) ?>

</div>
