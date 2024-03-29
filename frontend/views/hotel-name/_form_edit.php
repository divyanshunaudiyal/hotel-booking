<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        <?php

        use yii\helpers\Html;
        use yii\widgets\ActiveForm;
        
//        echo "<pre>";print_r($model);die;
        ?>
        <div class="row well">
            <div class="col-sm-12">
                <div class="panel panel-primary">
                    <div
                        class="panel-heading center"
                        style="font-size: 18px; font-weight: 700"
                        >
                        Edit Hotel Details..!
                    </div>
                    <p class="text-center text-danger"><?= !empty($msg) ? $msg : '' ?></p>

                    <div class="product-form">

                        <?php
                        $form = ActiveForm::begin(['options' =>
                                    ['enctype' => 'multipart/form-data']]);
                        ?>
                        <div class="row" style="font-size: 18px">

                            <!--**************************--->
                            <div class="col-sm-12" id="myform" style="margin-top: 8px">
                                <?php
                                foreach ($data as $val) {
//                                    echo "<pre>";print_r($data);die;
                                    
                                    ?>
                                    <div class="col-sm-12 new-form" > 

                                        <div class="col-sm-6">
                                            <input type="hidden" name="hotel_id[]" class="hotel_id" value="<?= $val['id'] ?>"

                                                   <label>Destination</label>
                                            <select class="form-control he" name="destination_id[]">
                                                <option value="">Select</option>
                                                <?php
                                                if (!empty($destinationlist)) {
                                                    foreach ($destinationlist as $val1) {
//                                                          echo "<pre>";print_r($val1);die;
                                                        ?>
                                                        <option value="<?= $val1['id'] ?>" <?= $val1['id'] == $val['destination_id'] ? 'selected' : '' ?>><?= $val1['destination_name'] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>

                                        <div class="col-sm-6">
                                            <label for="" class="col-sm-12">
                                                location:
                                                <input type="text" name="location[]" class="form-control he" value="<?= $val['location'] ?>">
                                            </label>

                                        </div>

                                        <div class="col-sm-6">
                                            <label for="" class="col-sm-12">
                                                Breakfast
                                                <input type="number" name="breakfast[]" class="form-control he" value="<?= $val['breakfast'] ?>">
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="col-sm-12">
                                                Lunch
                                                <input type="number" name="lunch[]" class="form-control he" value="<?= $val['lunch'] ?>">
                                            </label>

                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="col-sm-12">
                                                Dinner 
                                                <input type="number" name="dinner[]" class="form-control he" value="<?= $val['dinner'] ?>">
                                            </label>

                                        </div>
                                        <div class="col-sm-6">

                                            <label for="" class="col-sm-12">
                                                Extra Bed
                                                <input type="number" name="extra_bed[]" class="form-control he" value="<?= $val['extra_bed'] ?>">
                                            </label>

                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="col-sm-12">
                                                No of rooms
                                                <input type="number" name="no_of_rooms[]" class="form-control he" value="<?= $val['no_of_rooms'] ?>">
                                            </label>

                                        </div>
                                        <div class="col-sm-6">
                                            <?=
                                            $form->field($model, 'is_active')->dropDownList(['1' =>
                                                'Active', '0' => 'Inactive'], ['class' => 'form-control he',
                                                'name' => 'is_active[]'])
                                            ?>
                                        </div>

                                        <!--remove-->
                                        <div class="col-sm-4">  
                                            <button class="btn btn-danger" onclick="removecontent(event)"><i class="fa fa-trash"></i>  Remove</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <hr>
                                    </div>

                                    <?php
                                }
                                ?>


                            </div>
                            <div class="col-sm-12 text-right" style="margin-top: 2%">
                                <div class="col-sm-9"></div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary" onclick="addcontent(event)">
                                        <i class="fa fa-plus"></i> add
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-12" style="margin-top: 2%;">

                                <!--**************************--->
                                <div class="form-group center" >
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6" style="margin-bottom: 25px; margin-top: 20px;">
                                        <?= Html::submitButton($model->isNewRecord ? 'Update' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            }
            .note-editor.note-frame .note-editing-area .note-editable {
                color: #676a6c;
                padding: 15px;
                border: solid 2px #f5f5f5;
                height: 200px;
            }
            .he {
                height: 34px !important;
            }
            .new-form {
                background: #ddd;
            }
        </style>

        <script>

            function addcontent(event) {
                event.preventDefault(); // stop from submit on add button click
                var html = `
           <div class="col-sm-12" style="margin-top: 8px">
                    <div class="col-sm-12 new-form" id="newform">
            <hr>
                      <div class="col-sm-6">
                                                    <input type="hidden" name="hotel_id[]" class="hotel_id" value="0"
                        <label>Destination</label>
                        <select class="form-control he" name="destination_id[]">
                          <option value="">Select</option>
<?php
if (!empty($destinationlist)) {
    foreach ($destinationlist as $val) {
        ?>
                                                                  <option value="<?= $val['id'] ?>">
        <?= $val['destination_name'] ?>
                                                                  </option>
        <?php
    }
}
?>
                        </select>
                      </div>

                      <div class="col-sm-6">
                         <label for="" class="col-sm-12">
                            location:
                          <input type="text" name="location[]" class="form-control he">
                        </label>
                   
                      </div>

                      <div class="col-sm-6">
                      <label for="" class="col-sm-12">
                          Breakfast
                          <input type="number" name="breakfast[]" class="form-control he">
                        </label>
                      </div>
                      <div class="col-sm-6">
                      <label for="" class="col-sm-12">
                          Lunch
                          <input type="number" name="lunch[]" class="form-control he">
                        </label>
                  
                      </div>
                      <div class="col-sm-6">
                       <label for="" class="col-sm-12">
                          Dinner 
                          <input type="number" name="dinner[]" class="form-control he">
                        </label>
                  
                      </div>
                      <div class="col-sm-6">

                      <label for="" class="col-sm-12">
                          Extra Bed
                          <input type="number" name="extra_bed[]" class="form-control he">
                        </label>
                   
                      </div>
                      <div class="col-sm-6">
                      <label for="" class="col-sm-12">
                          No of rooms
                          <input type="number" name="no_of_rooms[]" class="form-control he">
                        </label>
               
                      </div>
                      <div class="col-sm-6">
<?=
$form->field($model, 'is_active')->dropDownList(['1' =>
    'Active', '0' => 'Inactive'], ['class' => 'form-control he',
    'name' => 'is_active[]'])
?>
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
                var hotelid = event.target.closest('.new-form').querySelector('.hotel_id').value;
                if (hotelid != '') {
                    $.ajax({
                        url: '<?= BASE_URL ?>hotel-name/deletehotel',
                        type: 'post',
                        data: {'hotelid': hotelid},
                        success: function (result) {

                        }
                    });
                }
                $(a).closest('.new-form').remove();
            }

        </script>
    </body>
</html>
