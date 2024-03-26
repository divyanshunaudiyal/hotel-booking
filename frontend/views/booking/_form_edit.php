<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//echo "<pre>";
//print_r($model);
//die;
//echo $model->hotelname_id;die;
//echo $usertype;die;
?>
<div class="row well">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading center" style="font-size: 18px; font-weight: 700;">Enter customer Details..!</div>
            <p class="text-center text-danger"><?= !empty($msg) ? $msg : '' ?></p>
            <div class="product-form">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="row" style="font-size: 18px;" >
                    <!--**************************--->
                    <div id="myform">
                        <div>

                            <div class="col-sm-12" style="margin-top: 8px;">
                                <!--hotel main branch-->
                                <?php if ($usertype == 'superadmin') { ?>
                                    <div class="col-sm-4 form-group">  
                                        <label for="location">Main Branch</label>
                                        <select  id="hotel_id" name="location" onchange="gethotelname()" class="form-control he">

                                            <?php foreach ($userdata as $val) { ?>
                                                <option value="<?= $val['id'] ?>" ><?= $val['hotel_name'] ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                <?php } ?>

                                <div class="col-sm-4 form-group">  
                                    <label for="hotel_name">Hotel name</label>
                                    <select id="hotel_name" name="hotel_name" class="form-control he">
                                        <?php
                                        foreach ($data as $val) {
                                            ?>
                                            <option value="<?= $val['id'] ?>" <?= $val['id'] == $model->hotelname_id ? 'selected' : '' ?>><?= $val['location'] ?></option>
                                        <?php }
                                        ?>

                                    </select>

                                </div>



                                <div class="col-sm-4 form-group">  
                                    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
                                </div>

                                <div class="col-sm-4 form-group">  
                                    <?= $form->field($model, 'customer_number')->textInput(['maxlength' => true, 'type' => 'number']) ?>
                                </div>


                                
                                    <div class="col-sm-4 form-group"> 
                                    <label for="from_date">Check In</label>
                                    <input type="date" name="from_date" class="form-control he" id="booking-from_date" value="<?= $model['from_date'] ?>">
                                </div>

                                <div class="col-sm-4 form-group">  
                                      <label for="from_date">Check Out</label>
                                    <input type="date" name="from_date" class="form-control he" id="booking-to_date" value="<?= $model['to_date'] ?>">
                                </div>

                                <div class="col-sm-12 form-group" style="padding:0";>
                                    <div class="col-sm-4">  
                                    <label>Person(s)</label>
                                    <input type="number" class="form-control he" name="adult" id="adults" value="<?= $model['adult'] ?>" onkeyup="updateTotal(event)">

                                </div>
                                
                                
                                 <div class="col-sm-4 form-group">  
                                    <label for="plan">Plan</label>
                                    <select name="plan" id="plan" class="form-control he" onchange="updateTotal(event)">
                                        <option value="" >Select</option>
                                        <option value="MAP" <?= $model['plan'] == 'MAP' ? 'selected' : ""?>>MAP</option>
                                        <option value="CP" <?= $model['plan'] == 'CP' ? 'selected' : ""?>>CP</option>
                                        <option value="EP" <?= $model['plan'] == 'EP' ? 'selected' : ""?>>EP</option>
                                    </select>
                                </div>
                                    
                                <div class="col-sm-4 form-group">  
                                    <?= $form->field($model, 'advance_amount')->textInput(['maxlength' => true, 'type' => 'number']) ?>
                                </div>
                                    
                                </div>

                               
                                
                                
                                <?php
                                foreach($bookingroomdetails as $roomdetails){
                                ?>
                                <div class="col-sm-12 form-type_container" id='container' style="padding:0;">
                                    <div class="col-sm-4 form-group">  
                                        <label for="room_id[]">Room Type</label>
                                        <select id="room_id" name="room_id[]" class="form-control he room_type" >
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($roomtype as $val) {
                                                ?>
                                                <option value ="<?= $val['id'] ?>" <?= $val['id'] == $roomdetails['room_type'] ? 'selected' : "" ?>  ><?= $val['room_type'], " ", $val['room_category'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-4 form-group" class="no_of_rooms" id="no_of_rooms">  
                                        <label> Number Of Rooms</label>
                                        <input type="number" name="no_of_rooms[]" onkeyup="updateTotal(event)" class="rooms form-control he" value="<?= $roomdetails['no_of_rooms']  ?>" >

                                    </div>
                                   <div class="col-sm-4 form-group">
                                    <label for='extra-bed'>Extra bed</label>
                                    <input type="number" value="<?= $model['extra_bed'] ?>" name="extra_bed" id='extra-bed' class="form-control he extra-bed" onkeyup='updateTotal(event)'>
                                </div>
                                    
                                </div>
                                
                                <?php
                                }
                                ?>
                                
                                
                                
                                <div class="col-sm-12"><hr></div>
                                
                                
                                <small class="col-sm-12 error text-center text-danger" id="rooms_error"></small>

                                 <div class="col-sm-12 text-left form-group" style="margin: 2% 0;padding: 0;">
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-primary" onclick="addroomtype()">
                                            <i class="fa fa-plus"></i> add
                                        </button>
                                    </div>
                                    <div class="col-sm-9"></div>
                                </div>
                                
                                <div class="col-sm-12" >  

                                    <div class="form-group col-sm-4" style="padding:0;" >
                                        <label for="paymentmode">Payment mode</label>
                                        <select id="paymentmode" name="payment_mode" class="form-control he">
                                            <option value="">select</option>
                                            <option value="online" <?= $model['payment_mode'] == 'online' ? 'selected' : '' ?>>Online</option>
                                            <option value="cash" <?= $model['payment_mode'] == 'cash' ? 'selected' : '' ?>>Cash</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                    <label for="total_price">Total Price</label>
                                    <input type="number" name="total_amount" id="total_price"  class="form-control he" value="<?= $model['total_amount'] ?>"  >
                                </div>

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
        .form-group{
            margin-bottom: 8px!important;
        }
    </style>

    <script>
        
        function calculateprice() {
            const location = document.getElementById('hotel_name').value;

            ///////////////////////////////////////////////////////
            const fromdate = document.getElementById('booking-from_date').value;
            const todate = document.getElementById('booking-to_date').value;

            const differenceMs = new Date(todate).getTime() - new Date(fromdate).getTime();
            const days = differenceMs / (1000 * 60 * 60 * 24); //for no of days of booking

            ///////////////////////////////////////////////////////

            const adults = parseInt(document.getElementById('adults').value);
            const plan = document.getElementById('plan').value;
            const extrabed = document.getElementById('extra-bed').value;

            ///////////////////////////////////////////////////////
            const noofroomsElements = document.getElementsByName('no_of_rooms[]');
            const noofroomsValues = [];
            for (let i = 0; i < noofroomsElements.length; i++) {
                noofroomsValues.push(parseInt(noofroomsElements[i].value));
            }
            ///////////////////////////////////////////////////////
            const roomidElements = document.getElementsByName('room_id[]');
            const roomidValues = [];
            for (let i = 0; i < roomidElements.length; i++) {
                roomidValues.push(parseInt(roomidElements[i].value));
            }
            ///////////////////////////////////////////////////////

            $.ajax({
                url: '<?= BASE_URL ?>booking/calculatetotalprice',
                data: {
                    'location': location,
                    'fromdate': fromdate,
                    'todate': todate,
                    'adults': adults,
                    'plan': plan,
                    'extrabed': extrabed,
                    'noofroomsvalues': noofroomsValues,
                    'roomidvalues': roomidValues,
                    'days': days
                },
                type: 'post',
                success: function (result) {
//                    console.log(result);
                    $('#total_price').val(result);
                }
            });
        }

        function addroomtype() {
            const error = document.getElementById('rooms_error');
            error.innerText = '';

            const html = `<div class="form-type_container col-sm-12" style="padding:0;">
            <div class="col-sm-12"><hr></div>
            
                                <div class="col-sm-4">  
                                    <label for="room_id" >Room Type</label>
                                    <select  name="room_id[]" class="form-control he room_type room_id" onchange="updateTotal(event)">
                                       <option value="">Select</option>
<?php
foreach ($roomtype as $val) {
    ?>
                                                                        <option value ="<?= $val['id'] ?>" ><?= $val['room_type'] ?></option>
    <?php
}
?>
                                    </select>
                               </div>
                               <div class="col-sm-4">
                                    <label for="no_of_rooms" >No Of Rooms</label>
                                    <input type="number"  name="no_of_rooms[]" onkeyup = "updateTotal(event)" class="form-control he rooms"></input>
                               </div>
                                              <div class="col-sm-4" style="margin-top:2%;"><button class="btn btn-danger" type="button" onclick="removedetail(event)">Remove</button></div>
                        
                          </div>`;
            let room = document.querySelectorAll('.room_type');
            let container = document.getElementById('container');
            container.insertAdjacentHTML('beforeend', html);
        }


        function gethotelname() {

            var hotelid = document.getElementById('hotel_id').value;

            $.ajax({
                url: '<?= BASE_URL ?>booking/gethoteldata',
                data: {'hotelid': hotelid},
                type: 'post',
                success: function (result) {

                    $('#hotel_name').html(result);
                }
            });
        }

        function removedetail(event) {
            event.target.closest('.form-type_container').remove();
        }

      function updateTotal(event) {

            calculateprice();

//            let total = 0;
//            var room_price = parseInt($('#room_price').val());
//            const error = document.getElementById('rooms_error');
//            const rooms = parseInt(event.target.closest('.form-type_container').querySelector('.rooms').value);
//            const roomtypeid = parseInt(event.target.closest('.form-type_container').querySelector('.room_type').value);
//            let totalextrabedprice = parseInt(document.querySelector('#extra-bed').value) * parseInt(document.getElementById('extrabedprice').value);
//            const totalPrice = document.getElementById('total_price');
//            const fromdate = document.getElementById('booking-from_date').value;
//            const todate = document.getElementById('booking-to_date').value;
//            const location = document.getElementById('hotel_name').value;
//            if (event.target.classList.contains('new'))
//            {
//                total = parseInt(totalPrice.value);
//            }
//            if (roomtypeid && rooms && fromdate && todate && location) {
//
//                $.ajax({
//                    url: '<?= BASE_URL ?>booking/checkavailablerooms',
//                    type: 'POST',
//                    data: {
//                        'fromdate': fromdate,
//                        'todate': todate,
//                        'roomtypeid': roomtypeid,
//                        'location': location
//                    },
//                    success: function (result) {
//                        calculateprice();
////                        var data = JSON.parse(result);
//                        var {availablerooms, roomsbooked} = data;
//                        if (availablerooms < rooms) {
//                            error.textContent = `only ${availablerooms} rooms available`;
//                        } else if (availablerooms >= rooms) {
//                            if (totalextrabedprice) {
//                                total = room_price * rooms + totalextrabedprice;
//                            } else {
//                                total += room_price * rooms;
//                                error.textContent = `rooms available`;
//                            }
//                            totalPrice.value = total;
//                        } else {
//                            error.textContent = `no rooms available`;
//                        }
//                    }

//                });
//            }
        }
    </script>


