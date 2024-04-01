<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//echo "<pre>";print_r($hotels);die;
?>
<div class="row well">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading center" style="font-size: 18px; font-weight: 700;">Enter New Branch Details..!</div>
            <p class="text-center text-danger"><?= !empty($msg) ? $msg : '' ?></p>
            <div class="product-form">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="row" style="font-size: 18px;">
                    <!--**************************--->
                    <div class="col-sm-12" style="margin-top: 8px;">
                        <div class="col-sm-12" id="myform">  
                            <div class="col-sm-4" style="margin-bottom:15px;">  
                                <label>Destination</label>
                                <select class="form-control he" name="destination_id[]">
                                    <option value="">Select</option>
                                    <?php
                                    if (!empty($data)) {
                                        foreach ($data as $val) {
                                            ?>
                                            <option value="<?= $val['id'] ?>"><?= $val['destination_name'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4" style="margin-bottom:15px;">  
                                <label>Main Hotel</label>
                                <select class="form-control he" name="hotel_name[]">
                                    <option value="">Select</option>
                                    <?php
                                    if (!empty($data)) {
                                        foreach ($hotels as $val1) {
                                            ?>
                                            <option value="<?= $val1['id'] ?>"><?= $val1['hotel_name'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="col-sm-4">  
                                <?= $form->field($model, 'location')->textInput(['maxlength' => true, 'name' => 'location[]']) ?>
                            </div>

                            <div class="col-sm-4">  
                                <?= $form->field($model, 'breakfast')->textInput(['maxlength' => true, 'type' => 'number', 'name' => 'breakfast[]']) ?>
                            </div>
                            <div class="col-sm-4">  
                                <?= $form->field($model, 'lunch')->textInput(['maxlength' => true, 'type' => 'number', 'name' => 'lunch[]']) ?>
                            </div>
                            <div class="col-sm-4">  
                                <?= $form->field($model, 'dinner')->textInput(['maxlength' => true, 'type' => 'number', 'name' => 'dinner[]']) ?>
                            </div>

                            <div class="col-sm-4">
                                <label for="extra_bed">Extra Bed Price</label>
                                <input type="number" name="extra_bed[]" id="extra_bed" class="form-control he">
                            </div>    

                            <div class="col-sm-4">  
                                <?= $form->field($model, 'no_of_rooms')->textInput(['maxlength' => true, 'type' => 'number', 'name' => 'no_of_rooms[]']) ?>
                            </div>
                            <div class="col-sm-4">  
                                <?=
                                $form->field($model, 'is_active')->dropDownList(
                                        ['1' => 'Active', '0' => 'Inactive'],
                                        ['class' => 'form-control he', 'name' => 'is_active[]']
                                )
                                ?>

                            </div>
                        </div>
                        <div class="col-sm-12 text-right" style="margin-top:2%;">  
                            <div  class="col-sm-9 "></div>
                            <div  class="col-sm-3 ">
                                <button class="btn btn-primary" onclick="addcontent(event)"><i class="fa fa-plus"></i> add</button>
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

<script>

    function addcontent(event) {
        event.preventDefault(); // stop from submit on add button click
        var html = `
<div class="col-sm-12 new-form ">
        <div col-sm-12>
        <hr>
</div>
<div class="col-sm-4 " style="margin-bottom:15px;">  
                        <label>Destination</label>
                        <select class="form-control he" name="destination_id[]">
                            <option value="">Select</option>
                            <?php
                            if (!empty($data)) {
                                foreach ($data as $val) {
                                    ?>
                                                        <option value="<?= $val['id'] ?>"><?= $val['destination_name'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                        </select>
                        </div>
        <div class="col-sm-4" style="margin-bottom:15px;">  
                                <label>Main Hotel</label>
                                <select class="form-control he" name="hotel_name[]">
                                    <option value="">Select</option>
                        <?php
                        if (!empty($data)) {
                            foreach ($hotels as $val1) {
                                ?>
                           <option value="<?= $val1['id'] ?>"><?= $val1['hotel_name'] ?></option>
                                <?php
                            }
                        }
                        ?>
                                </select>
                            </div>
                      

                            <div class="col-sm-4">  
<?= $form->field($model, 'location')->textInput(['maxlength' => true, 'name' => 'location[]']) ?>
                        </div>
                        
                        <div class="col-sm-4">  
<?= $form->field($model, 'breakfast')->textInput(['maxlength' => true, 'type' => 'number', 'name' => 'breakfast[]']) ?>
                        </div>
                        <div class="col-sm-4">  
<?= $form->field($model, 'lunch')->textInput(['maxlength' => true, 'type' => 'number', 'name' => 'lunch[]']) ?>
                        </div>
                        <div class="col-sm-4">  
<?= $form->field($model, 'dinner')->textInput(['maxlength' => true, 'type' => 'number', 'name' => 'dinner[]']) ?>
                        </div>
                        <div class="col-sm-4">  
<?= $form->field($model, 'extra_bed')->textInput(['maxlength' => true, 'type' => 'number', 'name' => 'extra_bed[]']) ?>
                        </div>
                        <div class="col-sm-4">  
<?= $form->field($model, 'no_of_rooms')->textInput(['maxlength' => true, 'type' => 'number', 'name' => 'no_of_rooms[]']) ?>
                        </div>
                        <div class="col-sm-4">  
<?= $form->field($model, 'is_active')->dropDownList(['1' => 'Active', '0' => 'inactive'], ['class' => 'form-control he', 'name' => 'is_active[]']) ?>
                        </div>
                        <div class="col-sm-4">  
                           <button class="btn btn-danger" onclick="removecontent(event)"><i class="fa fa-trash"></i>  Remove</button>
                        </div>
</div>`;



        $('#myform').append(html);
    }

    function removecontent(event) {
        $(event.target).closest('.new-form').remove();
    }



</script>