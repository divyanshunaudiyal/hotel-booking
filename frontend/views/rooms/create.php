<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rooms */

$this->title = 'Create Rooms';
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rooms-create">


    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
         'roomtype' => $roomtype
    ]) ?>

</div>
