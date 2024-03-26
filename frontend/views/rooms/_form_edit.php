<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//echo "<pre>";print_r($roomlist);die;x
//echo $model->user_id;die;
//echo "<pre>";print_r($data);die;
//echo "<pre>";print_r($model);die;

?>
<div class="row well">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading center" style="font-size: 18px; font-weight: 700;">Edit Room Details..!</div>
            <p class="text-center text-danger"><?= !empty($msg) ? $msg : '' ?></p>
            <div class="product-form">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="row" style="font-size: 18px;" >
                    <!--**************************--->
                    <div id="myform" class="col-sm-12" >

                        <?php
                        if (!empty($roomlist)) {

                            foreach ($roomlist as $val) {
                                ?>
                                <br>
                                <div class="col-sm-12 room-form new-form">
                                    <hr>
                                    <div class="col-sm-6" style="margin-top: 8px;">

                                        <div class="col-sm-12"> 
                                            <input type="hidden" name="room_id[]" class="room_id" value="<?= $val['id'] ?>">
                                            <label>Hotel Name </label>
                                            <select class="form-control he" name="hotelname_id[]">

                                                <?php
                                                if (!empty($data)) {

                                                    foreach ($data as $val1) {
                                                        ?>
                                                        <option value="<?= $val1['id'] ?>" <?= $val1['id'] == $val['hotelname_id'] ? "selected" : "" ?>><?= $val1['location'] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>

                                    </div>
                                    <div class="col-sm-6">  
                                        <label for="room_type[]">Room Type</label>
                                        <select  name="room_type[]" class="form-control he">
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($roomtype as $val1) {
                                                ?>
                                                <option value ="<?= $val1['id'] ?>" <?= $val1['id'] == $val['room_type'] ? 'selected' : '' ?>><?= $val1['room_type']," - ",$val1['room_category'] ?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>

                                    </div>

                                    <div class="col-sm-12" style="margin-top: 8px;">

                                        <div class="col-sm-6">  
                                            <label>
                                                Price:  </label>
                                            <input type="number" class="form-control he" name="price[]" value="<?= $val['price'] ?>">

                                        </div>

                                        <div class="col-sm-6"> 
                                            <label>
                                                Total Rooms:  </label>
                                            <input type="number" class="form-control he"  name="total_rooms[]" value="<?= $val['total_rooms'] ?>">

                                        </div>
                                        <div class="col-sm-6">  
                            <?= $form->field($model, 'is_active[]')->dropDownList(['1' => 'Active', '0' => 'inactive'], ['class' => 'form-control he']) ?>
                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 8px;">
                                    </div>
                                    <div class="col-sm-6" style="margin:8px 0;">  
                                        <button class="btn btn-danger" onclick="removecontent(event)"><i class="fa fa-trash"></i>  Remove</button>
                                    </div>

                                </div>

                                <?php
                            }
                        }
                        ?>

                        
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
</style>

<script>

    function addcontent(event) {
        event.preventDefault(); // stop from submit on add button click
        var html = `
            <div id="new-form" class="new-form">
        
                        <div>
                        <div class="col-sm-12" >
        <hr>
                            <div class="col-sm-6">
                <input type="hidden" name="room_id[]" class="room_id" value="0"

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
                                        <label for="room_type[]">Room Type</label>
                                        <select  name="room_type[]" class="form-control he">
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($roomtype as $val1) {
                                                ?>
                                                <option value ="<?= $val1['id'] ?>"><?= $val1['room_type']," - ",$val1['room_category'] ?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>

                                    </div>
                        <div class="col-sm-12"">

                            <div class="col-sm-6">  
                               <label>
                                   Price:  </label>
                                   <input type="number" class="form-control he" name="price[]" >

                            </div>

                            <div class="col-sm-6">  
                                <label>   Total Rooms:  </label>
                                 <input type="number" class="form-control he"  name="total_rooms[]" >

                            </div>
                        </div>

                        <div class="col-sm-12" style="margin-top: 8px;">

                              <div class="col-sm-6">  
                            <?= $form->field($model, 'is_active[]')->dropDownList(['1' => 'Active', '0' => 'inactive'], ['class' => 'form-control he']) ?>
                        </div>


                        </div>
                        <div class="col-sm-4">  
                            <button class="btn btn-danger" onclick="removecontent(event)"><i class="fa fa-trash"></i>  Remove</button>
                        </div>
                    </div>
                       
                    </div>
    `;



        $('#myform').append(html);
    }

    function removecontent(event) {
        event.preventDefault();
        var a = event.target;
        var roomid = event.target.closest('.new-form').querySelector('.room_id').value;

        if (roomid != '') {
            $.ajax({
                url: '<?= BASE_URL ?>rooms/deleteroom',
                type: 'post',
                data: {'roomid': roomid},
                success: function (result) {
                    window.location.reload();
                }
            });
        }
        $(a).closest('.new-form').remove();
    }

</script>