<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HotelName */

$this->title = 'Create Hotel Name';
$this->params['breadcrumbs'][] = ['label' => 'Hotel Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-name-create">



    <?=
    $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'users' => $users,
        'hotels' => $hotels
    ])
    ?>

</div>
