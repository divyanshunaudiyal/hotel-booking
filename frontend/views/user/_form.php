<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<div class="row well">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading center" style="font-size: 18px; font-weight: 700;">Enter New User Details..!</div>
            <p class="text-center text-danger"><?= !empty($msg) ? $msg : '' ?></p>
            <div class="product-form">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="row" style="font-size: 18px;">
                    <!--**************************--->
                    <div class="col-sm-12" style="margin-top: 8px;">

                        <div class="col-sm-4">  
                            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-4">  
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="form-group col-sm-4">  
                                    <label for="hotel_id">Hotel Name</label>
                                    <select  id="hotel_id" name="hotel_name" onchange="getbranch()"  class="form-control he" >
                                        <option value="">select</option>
                                        <?php
                                        
                                            foreach ($hotels as $value) {
                                                ?>

                                                <option  value="<?= $value['id'] ?>"><?= $value['hotel_name'] ?></option>
                                            <?php } ?>

                                    </select>

                                </div>
                        <div class="col-sm-4" id="branch">
                            <label for="branch">Branch</label>
                            
                        </div>

                        <div class="col-sm-4">  
                            <?= $form->field($model, 'mobile')->textInput() ?>
                        </div>

                        <div class="col-sm-4">  
                            <?= $form->field($model, 'password_hash')->textInput() ?>
                        </div>

                        <div class="col-sm-4">  
                            <?= $form->field($model, 'user_type')->dropDownList(['superadmin' => 'Super Admin', 'admin' => 'Admin', 'write' => 'Sub-Admin'], ['class' => 'form-control he']) ?>
                        </div>

                        <div class="col-sm-4">
                            <label for="dp">User Photo</label>
                            <input type="file"  id="dp" name="user_image" class="form-control he" accept="image/*">
                        </div>
                        <div class="col-sm-4">  
                            <?= $form->field($model, 'status')->dropDownList(['active' => 'Active', 'block' => 'block', 'deleted' => 'deleted'], ['class' => 'form-control he']) ?>
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
<script>
    function getbranch(){
        const hotelid = document.getElementById('hotel_id').value;
        console.log(hotelid);
       $.ajax({
                url: '<?= BASE_URL ?>user/getbranchname',
                data: {'hotelid': hotelid},
                type: 'post',
                success: function (result) {
                    $('#branch').html(result);
                }
            });
        
    }

</script>