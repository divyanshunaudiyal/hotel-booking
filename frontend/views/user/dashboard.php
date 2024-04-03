<?php
// echo '<pre>';
//print_r($userdata);
//die;

?>
<link rel="stylesheet" media="all" type="text/css" href="<?= STATIC_URL; ?>css/responsive.dataTables.min.css?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"/>
<script src="<?= STATIC_URL; ?>js/datatablejs/Searchingjquery.dataTables.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/SearchingdataTables.responsive.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/dataTables.tableTools.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/dataTables.colVis.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/datatable7.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script type="text/javascript">
    try {
        ace.settings.check('sidebar', 'fixed')
    } catch (e) {
    }
</script> 
<?php

use common\models\Utility;
?>


<div class="filter-form col-sm-12" style="margin-top:8px;">
    <div class="col-sm-12" style="margin:8px 0; border-radius: 8px; padding: 1rem; background: #d9d9d9; box-sizing: border-box;" >


            <?php if ($usertype == 'superadmin') { ?>


                <div class="col-sm-6" style="margin-top:2%;">  
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
                <div class="col-sm-6" style="margin-top:2%;">  
                    <label for="hotel_name">Location</label>
                    <select id="hotel_name" name="location" onchange="nextbookings()" class="form-control he" style="padding: 0px 12px;">
                        <option value="">Select</option>

                    </select>

                </div>


            <?php } else if ($usertype == 'admin') {
                ?>
        <div class="col-sm-6" >  
                    <label for="location">Hotel Name</label>
                    <select  id="hotel_id" name="hotel_name" onchange="gethotelname()" class="form-control he" style="padding: 0px 12px;">
                        <option value="">Select</option>
                        <?php
                        if(!empty($hotellist)){
                        foreach ($hotellist as $val) {
                            ?>
                            <option value="<?= $val['id'] ?>"><?= $val['location'] ?></option>
                            <?php
                        }
                        }
                        ?>
                    </select>

                </div>

                <div class="col-sm-6">  
                    <label for="hotel_name">Location</label>
                    <select id="hotel_name" name="location" onclick="gethotelname()" class="form-control he" style="padding: 0px 12px;">
                        <option value="">Select</option>

                    </select>

                </div>
                

                

            <?php } ?>

        </div>

</div>


<div class="col-sm-12"></div>
<div class="row border-bottom white-bg dashboard-header" style="margin-bottom: 10%;background: #f0f0f0;">
    <div class="wrapper wrapper-content switch-header">




        <div class="row">

            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title" style="display:flex; justify-content: space-between;">
                        <div style="display:flex; align-items: baseline">
                            <span class="label label-primary float-right">Today</span>
                            <h5>Bookings</h5>
                        </div>
                        <span class="date"><?= date('d-M-Y'); ?></span>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">&#8377; <?= !empty($todayamount) ? $todayamount['total_amount'] : '' ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox " >
                    <div class="ibox-title" style="display:flex; justify-content: space-between;">
                        <div style="display:flex; align-items: baseline">
                            <span class="label label-primary float-right">Monthly</span>
                            <h5>Bookings</h5>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">&#8377; <?= !empty($monthamount) ? $monthamount['total_amount'] : '' ?></h1>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title" style="display:flex; justify-content: space-between;">
                        <div style="display:flex; align-items: baseline">
                            <span class="label label-primary float-right">Total</span>
                            <h5>Income</h5>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">&#8377; <?= !empty($totalamount) ? $totalamount['total_amount'] : '' ?></h1>

                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:2%;">

            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title" style="display:flex; justify-content: space-between;">
                        <div style="display:flex; align-items: baseline">
                            <span class="label label-primary float-right" style="background:brown;">Check</span>
                            <h5>Bookings</h5>
                        </div>

                    </div>
                    <div class="ibox-content">
                        <input type="date" class="form-control he" id="check-date" value="<?= date('Y-m-d'); ?>" onchange="getdetails()">
                    </div>

                </div>
            </div>
            <div class="col-lg-8" id="checkbookingresult" style="padding:0;">
                <div class="col-lg-6">
                    <div class="ibox " >
                        <div class="ibox-title" style="display:flex; justify-content: space-between;">
                            <div style="display:flex; align-items: baseline">
                                <span class="label label-primary float-right" style="background:green;">Available</span>
                                <h5>Rooms</h5>
                            </div>

                        </div>
                        <div class="ibox-content">
    <!--                                                <input type="date" class="form-control he">-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title" style="display:flex; justify-content: space-between;">
                            <div style="display:flex; align-items: baseline">
                                <span class="label label-primary float-right" style="background:black;">Booked</span>
                                <h5>Rooms</h5>
                            </div>

                        </div>
                        <div class="ibox-content">
    <!--                                                <input type="date" class="form-control he">-->
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row" style="margin-top:2%;">

            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Upcoming Bookings </h5>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <div class="wrapper wrapper-content switch-header">
                                <div class="row" >
                                    <div class="col-xs-12"> 
                                        <div class="pull-right tableTools-container"></div>
                                        <div class="tblback"></div>
                                        <table id="dynamic-table" class="table table-striped table-bordered display nowrap">
                                            <thead >
                                                <tr>

                                                    <th>Customer Name</th>
                                                    <th>Number</th>
                                                    <th>Check In</th>
                                                    <th>Check Out</th>
                                                    <th>Person(s)</th>
                                                    <th>Advance</th>
                                                    <th>Total</th>

                                                </tr>
                                            </thead>
                                            <tbody id="tbody">
                                                <?php
                                                if (!empty($upcomingbooking)) {
                                                    foreach ($upcomingbooking as $val) {
                                                        ?>

                                                        <tr> 
                                                            <td><?= $val['customer_name'] ?></td>
                                                            <td><?= $val['customer_number'] ?></td>
                                                            <td><?= $val['from_date'] ?></td>
                                                            <td><?= $val['to_date'] ?></td>
                                                            <td><?= $val['adult'] ?></td>
                                                            <td><?= $val['advance_amount'] ?></td>
                                                            <td><?= $val['total_amount'] ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button class="btn btn-success" onclick="increaselimit()">see more</button>

                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
<br> <br> <br> <br>
</div>

<style>

    .ibox{
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        margin-top: 2%;
        border-radius:2rem !important;
        overflow:hidden !important;
    }
    .ibox .label{
        font-size:14px !important;
    }
    .ibox-content{
        min-height: 7rem;
    }
    .ibox .ibox-title span{
        margin-right: 5px;
    }
    .he{
        height: 34px!important;
    }
    .bg-red{
        background: rgb(242,106,89);
    }
    .bg-blue{
        background: rgb(45,157,241);
    }
    .bg-yellow{
        background: rgb(252,169,44);
    }
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

</style>
<style>
    
   

    .date{
        display: block;
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
    @media only screen and (max-width:600px){
        .ibox{
            margin-top: 4%;
        }
        .dashboard-header{
            padding: 0 !important;
        }

    }
</style>
<script>

    let offset = 0;
    function increaselimit() {
        offset += 10;
        let limit = 10;
        var hotelid = document.getElementById('hotel_name').value;
        $.ajax({
            url: '<?= BASE_URL ?>user/increaselimit',
            data: {'limit': limit,
                'offset': offset,
                'hotelid': hotelid
            },
            type: 'post',
            success: function (result) {
                $('#tbody').append(result);
            }
        });
    }

    function getdetails() {
        const date = document.getElementById('check-date').value;
        const hotelname = document.getElementById('hotel_name').value;

        $.ajax({
            url: '<?= BASE_URL ?>user/getdetailsofdate',
            data: {
                'date': date,
                'hotelname': hotelname,
            },
            type: 'post',
            success: function (result) {
                $('#checkbookingresult').html(result);
            }
        })
    }


    function nextbookings() {
        var hotelid = document.getElementById('hotel_name').value;
        console.log(hotelid);
        $.ajax({
            url: '<?= BASE_URL ?>user/nextbookings',
            data: {'hotelid': hotelid},
            type: 'post',
            success: function (result) {
                $('#tbody').html(result);

            }
        });

    }

    function gethotelname() {
        offset = 0;
        const hotelid = document.getElementById('hotel_id').value;
        
        $.ajax({
            url: '<?= BASE_URL ?>booking/gethoteldata',
            data: {
                'hotelid': hotelid,
            },
            type: 'post',
            success: function (result) {
                console.log(result);
                $('#hotel_name').html(result);
                getdetails();
                nextbookings();
            }
        });
    }

</script>