<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//echo "<pre>";print_r($roomtype);die;
?>
<div class="row well">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading center" style="font-size: 18px; font-weight: 700;">Enter New Room Details..!</div>
            <p class="text-center text-danger"><?= !empty($msg) ? $msg : '' ?></p>
            <div class="product-form">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="row" style="font-size: 18px;" >
                    <!--**************************--->
                    <div id="myform">
                        <div>
                            <div class="col-sm-12" style="margin-top: 8px;">

                                <div class="col-sm-4 form-group">  
                                    <label>Hotel Name</label>
                                    <select class="form-control he" name="hotelname_id[]">

                                        <?php
                                        if (!empty($data)) {
                                            foreach ($data as $val) {
                                                ?>
                                                <option value="<?= $val['id'] ?>"><?= $val['location'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-4 form-group" >
                                     <label for="room_type[]">Room Type</label>
                                    <select id="room_type" name="room_type[]" class="form-control he">

                                        <?php
                                        foreach ($roomtype as $val) {
                                            ?>
                                            <option value ="<?= $val['id'] ?>" ><?= $val['room_type'], ' - ', $val['room_category'] ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>

                                </div>




                                <div class="col-sm-4">  
                                    <?= $form->field($model, 'price[]')->textInput(['maxlength' => true, ['class' => 'form-control he'],'type' => 'number']) ?>
                                </div>

                                <div class="col-sm-4">  
                                    <?= $form->field($model, 'total_rooms[]')->textInput(['maxlength' => true, 'type' => 'number', ['class' => 'form-control he']]) ?>
                                </div>




                                <div class="col-sm-4">  

                                    <?= $form->field($model, 'is_active[]')->dropDownList(['1' => 'Active', '0' => 'inactive'], ['class' => 'form-control he']) ?>
                                </div>


                            </div>

                        </div>

                    </div>
                    <div class="col-sm-12 text-right" style="margin-top: 2%">
                        <div class="col-sm-9"></div>
                        <div class="col-sm-3">
                            <button type="" class="btn btn-primary" onclick="addcontent(event)">
                                <i class="fa fa-plus"></i> add
                            </button>

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
    .btn-danger{
        margin-top: 5%;
    }
    @media screen and (max-width:768px){
        .btn-danger{
            margin: 2% 0;
        }
    }
</style>

<script>

    function addcontent(event) {
        event.preventDefault();
        var html = `
            <div id="new-form" class="new-form">
        
                        <div>
                        <div class="col-sm-12" style="margin-top: 8px;">
        <hr>
                            <div class="col-sm-6">  
        
                                <label>Hotel Name</label>
                                <select class="form-control he" name="hotelname_id[]">

<?php
if (!empty($data)) {
    foreach ($data as $val) {
        ?>
                                                            <option value="<?= $val['id'] ?>"><?= $val['location'] ?></option>
        <?php
    }
}
?>
                                </select>
                            </div>

                              <div class="col-sm-6">  
                                    <input type="hidden" name="room_id[]" class="room_id" value="<?= $val['id'] ?>">
                                    <label for="room_type[]">Room Type</label>
                                    <select id="room_type" name="room_type[]" class="form-control he">
                                       
<?php
foreach ($roomtype as $val) {
    ?>
                                            <option value ="<?= $val['id'] ?>" ><?= $val['room_type'] ?></option>
    <?php
}
?>
                                        
                                    </select>

                                </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 8px;">

                            <div class="col-sm-6">  
<?= $form->field($model, 'price[]')->textInput(['maxlength' => true, ['class' => 'form-control he']]) ?>
                            </div>

                            <div class="col-sm-6">  
<?= $form->field($model, 'total_rooms[]')->textInput(['maxlength' => true, 'type' => 'number', ['class' => 'form-control he']]) ?>
                            </div>
                        </div>

                        <div class="col-sm-12" style="margin-top: 8px;">

                            <div class="col-sm-6">  
<?= $form->field($model, 'is_active[]')->dropDownList(['1' => 'Active', '0' => 'inactive'], ['class' => 'form-control he']) ?>
                            </div>
        
        <div class="col-sm-6">  
                            <button class="btn btn-danger" onclick="removecontent(event)"><i class="fa fa-trash"></i>  Remove</button>
                        </div>


                        </div>
                        
                    </div>
                       
                    </div>
    `;



        $('#myform').append(html);
    }

    function removecontent(event) {
//        event.preventDefault();

        $(event.target).closest('.new-form').remove();
    }

</script>