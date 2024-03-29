<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Roomtype */

$this->title = 'Create Roomtype';
$this->params['breadcrumbs'][] = ['label' => 'Roomtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roomtype-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
