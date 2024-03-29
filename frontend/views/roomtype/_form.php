<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="row well">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading center" style="font-size: 18px; font-weight: 700;">Enter roomtype Details..!</div>
            <p class="text-center text-danger"><?= !empty($msg) ? $msg : '' ?></p>
            <div class="product-form">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="row" style="font-size: 18px;" >
                    <!--**************************--->
                    <div id="myform">
                        <div>

                            <div class="col-sm-12" style="margin-top: 8px;">


                                <div class="col-sm-6">  
                                    <label for="room_type">Room Type</label>
                                    <input type="text" id="room_type" name="room_type" class="form-control he">

                                </div>
                                 <div class="col-sm-6">  
                                    <label for="room_category">Room Category</label>
                                    <select id="room-category" name="room_category" class="form-control he">
                                        <option value="general">General</option>
                                        <option value="standard">Standard</option>
                                        <option value="deluxe">Deluxe</option>
                                        <option value="premium">Premium</option>
                                        
                                    </select>

                                </div>

                                <div class="col-sm-6">  
                                    <label for="is_active">Is Active</label>
                                    <select  name="is_active" class="form-control he">
                                        <option value="1">active</option>
                                        <option value="0">inactive</option>

                                    </select>


                                </div>

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
        .new-form{
            background: #ddd;
        }
    </style>




