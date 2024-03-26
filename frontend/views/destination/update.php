<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Destination */

$this->title = 'Update Destination: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Destinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="destination-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
