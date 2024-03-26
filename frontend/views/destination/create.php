<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Destination */

$this->title = 'Create Destination';
$this->params['breadcrumbs'][] = ['label' => 'Destinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="destination-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
