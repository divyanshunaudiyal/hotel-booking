<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="row well">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading center" style="font-size: 18px; font-weight: 700;">Enter New Destination Details..!</div>
            <p class="text-center text-danger"><?= !empty($msg) ? $msg : '' ?></p>
            <div class="product-form">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="row" style="font-size: 18px;">
                    <!--**************************--->
                    <div class="col-sm-12" style="margin-top: 8px;">
                       
                       <div class="col-sm-6">  
                            <?= $form->field($model, 'destination_name')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-6">  
                            <?= $form->field($model, 'is_active')->dropDownList(['1' => 'Active', '0' => 'inactive'], ['class' => 'form-control he']) ?>
                        </div>
                        

                    </div>

            

                    <div class="col-sm-12" style="margin-top: 2%;">

                        <!--**************************--->
                        <div class="form-group center" >
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6" style="margin-bottom: 25px; margin-top: 20px;">
                                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>

    </div>
</div>

<style>
    .well {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #ffffff;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    }
    .note-editor.note-frame .note-editing-area .note-editable {
        color: #676a6c;
        padding: 15px;
        border: solid 2px #f5f5f5;
        height: 200px;
    }
    .he{
        height:34px !important;
    }
</style>