<?php
$usertype = $userdetails['user_type'];
$userid = $userdetails['id'];
//echo "<pre>";print_r($userdetails);die;
//echo $html;die;
?>

<link rel="stylesheet" media="all" type="text/css" href="<?= STATIC_URL; ?>css/responsive.dataTables.min.css?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"/>
<script src="<?= STATIC_URL; ?>js/datatablejs/Searchingjquery.dataTables.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/SearchingdataTables.responsive.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/dataTables.tableTools.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/dataTables.colVis.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/datatable12.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script type="text/javascript">
    try {
        ace.settings.check('sidebar', 'fixed');
    } catch (e) {
    }
</script> 
<?php

use common\models\Utility;
?>

<div class="row " style="margin-bottom: 4%;">  
    <div class="col-sm-4  ab">
        <span>Enquire Here</span>
    </div>
    <div class="col-sm-5"></div>
    <div class="col-sm-3"  style="margin-top:4%;" >
        <a class="btn btn-block  btn-primary btn-rounded" href="<?= BASE_URL ?>booking-create">Add Booking</a>
    </div>
</div>
<div class="col-sm-12"></div>

<div class="row border-bottom white-bg dashboard-header" style="margin-bottom: 10%;">
    <div class="filter-form" style="margin-top:8px;">
        <form action="" method="post">
            <div class="col-sm-12" style="margin:8px 0; border-radius: 8px; padding: 1rem; background: #d9d9d9; box-sizing: border-box;" >


                <?php if ($usertype == 'superadmin') { ?>


                <div class="col-sm-4" style="margin-top:2%;">  
                        <label for="location">Hotel Name</label>
                        <select  id="hotel_id" name="hotel_name" onchange="gethotelname()" class="form-control he" style="padding: 0px 12px;">
                            <option value="">Select</option>
                            <?php
                            foreach ($userdata as $val) {
                                ?>
                                <option value="<?= $val['id'] ?>"><?= $val['hotel_name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                <div class="col-sm-4" style="margin-top:2%;">  
                        <label for="hotel_name">Location</label>
                        <select id="hotel_name" name="location" class="form-control he" style="padding: 0px 12px;">
                            <option value="">Select</option>

                        </select>

                    </div>
                    <div class="col-sm-4 col-xs-12" style="margin-top:2%;">
                        <label class="col-xs-12 " for="date-filter" style="padding:0;">
                            Date :
                            </label>
                            <input type="date" class="form-control he col-sm-12 col-xs-12" name="date" id="date-filter" style="height:2.5rem;" >
                        
                    </div>

                    <div class="col-sm-12">
                        <div class="col-sm-4">

                        </div>


                        <div class="col-sm-4 text-center" style="margin-top:2%;">
                            <button type="submit" class="btn btn-success" >Apply filter</button>

                        </div>

                    </div>

                <?php } else if ($usertype == 'admin') {
                    ?>

                    <div class="col-sm-6">  
                        <label for="hotel_name">Location</label>
                        <select id="hotel_name" name="location" onclick="gethotelname()" class="form-control he" style="padding: 0px 12px;">
                            <option value="">Select</option>

                        </select>

                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-12" for="date-filter">
                            Date :
                             </label>
                            <input type="date" class="form-control he col-sm-12" name="date" id="date-filter" >
                       
                    </div>

                    <div class="col-sm-12">
                        <div class="col-sm-4"></div>


                        <div class="col-sm-4 text-center" style="margin-top:2%;">
                            <button type="submit" class="btn btn-success" >Search</button>
                        </div>

                        </label>
                    </div>

                <?php } ?>

            </div>
        </form>

    </div>

    <div class="col-sm-12 enquiry-container " style="border:2px solid #1c921c; margin: 2% auto 0 auto; border-radius:0.5rem; " >

        <div class=" ">
            <h4 class="col-sm-3 col-xs-3">Room type</h4>
            <h4 class="col-sm-3 col-xs-3">Total Rooms</h4>
            <h4 class="col-sm-3 col-xs-3">Booked Rooms</h4>
            <h4 class="col-sm-3 col-xs-3">Available Rooms</h4>
        </div>

        <?php
        if(!empty($final)){
            foreach($final as $room){
            ?>
        
        <div class="col-sm-12 col-xs-12">
                        <h5 class="col-sm-3 col-xs-3" style="padding: 0; text-transform: capitalize;"><?= $room['room_type'] ?></h5>  
                        <h5 class="col-sm-3 col-xs-3"  ><?= $room['total_rooms'] ?></h5> 
                        <h5 class="col-sm-3 col-xs-3" ><?= $room['booked_rooms']?$room['booked_rooms']:0 ?></h5>
                        <h5 class="col-sm-3 col-xs-3" ><?= $room['available_rooms'] ?></h5>

                    </div>
            
        
        <?php
            }
        }
        ?>

    </div>


    <br> <br> <br> <br>
</div>


<style>

    .tableTools-container {
        margin-bottom: 8px;
        margin-bottom: -4%;
    }
    .current {
        background-color: #428bca;
        color: white;
        border: 1px solid #428bca;
    }
    .blockquote1 {
        padding: 5px 20px;
        margin: 0px 0 -3px;
        font-size: 17px;
        border-left: 5px solid #f3f3f4;
    }
    .colorblue {
        color: #29abe2 !important;
    }

    .btn-default-new {
        color: #fff;
        background: #163850;
        border: 1.5px solid #163850;
    }
    .btn-default-new:hover {
        color: #fff;
    }
    .btn-default-new:focus {
        color: #fff;
    }

    @media
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {

        .a{
            text-align: right;
        }
        .b{
            text-align: right;
        }
        .searchtop{
            margin:0 0 0 80px;
        }
        input[type=search] {
            width:20% !important;
        }
        #ui-id-8 {
            display: block;
        }
        .ui-tooltip-content{
            display:block;
        }
        .unitBlanace {
            display: none;
        }
        .netInvestment {
            display: none;
        }

        .dataTables_wrapper label {
            display: inline-block;
            font-size: 14px;
            width:100%;
            padding-top: 13px;
        }
        .dataTables_filter {
            text-align: right;
            margin-right: 0px;
            margin: -10px 0% 0 0px;
            width:100%;
        }
        #dynamic-table_filter {
            width: 100%;
        }
        input[type=search] {
            width: 20%;
        }
        #dynamic-table_length {
            background-color: #DCDCDC;
            height: 60px;
            margin-top: 49px;
        }
    }
    #dataTables_filter input[type=search] {
        width:95%;
    }
    .btn-bold{
        margin-top:0px !important;
    }
    .searchtop{
        margin:0 0 0 80px;
    }
    .col-xs-6 {
        width: 44%;
    }
    @media only screen and (max-width: 320px)
    {
        input[type=search] {
            width:20% !important;
        }
        #ui-id-8 {
            display: block;
        }
        .ui-tooltip-content{
            display:block;
        }
        .unitBlanace {
            display: none;
        }
        .netInvestment {
            display: none;
        }

        .dataTables_wrapper label {
            display: inline-block;
            font-size: 14px;
            width:100%;
            padding-top: 13px;
        }
        .dataTables_filter {
            text-align: right;
            margin-right: 0px;
            margin: -10px 0% 0 0px;
            width:100%;
        }
        #dynamic-table_filter {
            width: 100%;
        }
        input[type=search] {
            width: 100%;
        }

        #dynamic-table_length {
            background-color: #DCDCDC;
            height: 62px;
            margin-top: 49px;
        }

    }

    div.container {
        max-width: 1200px
    }
    .unitBlanace {
        display: none;
    }
    .netInvestment {
        display: none;
    }
    #dynamic-table_length{
        background-color: #DCDCDC;
        height: 62px;
        width: 100%;
    }
    .dataTables_wrapper label {
        display: inline-block;
        font-size: 14px;
        padding-top: 13px;
    }
    .hidden {
        display: none;
    }
    .dataTables_filter {
        text-align: right;
        margin-right: 200px;
    }


    .ColVis_Button
    {
        display: none;
    }
    .dataTables_filter label {
        margin-right: -58px;
    }

    .dataTables_paginate .paginate_button {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        float: left;
    }
    #dynamic-table_paginate{
        float: right;
        margin-top: 2%;
    }
    #dynamic-table_filter {
        width: 77%;
    }
    @media only screen and (max-width: 768px) {
        .dataTables_filter label {
            margin-right: auto;
        }
        
    }
</style>

<script>
    function gethotelname() {
        const user = '<?= $usertype ?>';
        if (user == 'superadmin') {
            var hotelid = document.getElementById('hotel_id').value;
        } else if (user == 'admin') {
            var hotelid = <?= $userid ?>;
        }
        $.ajax({
            url: '<?= BASE_URL ?>booking/gethoteldata',
            data: {
                'hotelid': hotelid,
            },
            type: 'post',
            success: function (result) {
                console.log(result);
                $('#hotel_name').html(result);
            }
        });

    }

    //    function enquirefilter(event) {
    //        let location = document.getElementById('hotel_name').value;
    //        let date = document.getElementById('date-filter').value;
    //
    //        $.ajax({
    //            url: '<?= BASE_URL ?>booking/filteredhoteldetails',
    //            data: {
    //                'location': location,
    //                'date': date
    //            },
    //            type: 'post',
    //            success: function (result) {
    //
    //                if (!empty(result)) {
    //
    //                } else {
    //                }
    //                console.log(result);
    //            }
    //        });
    //    }

    //    function filterdetails(event) {
    //        let location = document.getElementById('hotel_name').value;
    //        let date = document.getElementById('date-filter').value;
    //        $.ajax({
    //            url: '<?= BASE_URL ?>booking/filterhoteldata',
    //            data: {
    //                'location': location,
    //                'date': date
    //            },
    //            type: 'post',
    //            success: function (result) {
    //                $('#resultdata').html(result);
    //            }
    //        });
    //
    //    }
</script>