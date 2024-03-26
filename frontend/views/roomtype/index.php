<?php ?>
<link rel="stylesheet" media="all" type="text/css" href="<?= STATIC_URL; ?>css/responsive.dataTables.min.css?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"/>
<script src="<?= STATIC_URL; ?>js/datatablejs/Searchingjquery.dataTables.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/SearchingdataTables.responsive.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/dataTables.tableTools.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/dataTables.colVis.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/datatablejs/datatable4.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
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
        <span>All Room types</span>
    </div>
    <div class="col-sm-5"></div>
    <?php
    if($usertype == 'superadmin'){
        ?>
    <div class="col-sm-3"  style="margin-top:4%;" >
        <a class="btn btn-block  btn-primary btn-rounded" href="<?= BASE_URL ?>roomtype-create">Add Room Type</a>
    </div>
    
    
    <?php
    }
    ?>
</div>
<div class="col-sm-12"></div>
<div class="row border-bottom white-bg dashboard-header" style="margin-bottom: 10%;">
    <div class="wrapper wrapper-content switch-header">
        <div class="row" >
            <div class="col-xs-12"> 
                <div class="pull-right tableTools-container"></div>
                <div class="tblback"></div>
                <table id="dynamic-table" class="table table-striped table-bordered display nowrap" style="width:100%;" >
                    <thead>
                        <tr>
                            <th style="text-align: center;"><?= \Yii::t('invest_quick', 'Room Type'); ?> </th>
                             <th style="text-align: center;"><?= \Yii::t('invest_quick', 'Room Category'); ?> </th>
                            <th style="text-align: center;"><?= \Yii::t('invest_quick', 'Is Active'); ?> </th>
                            <?php if($usertype == 'superadmin') { ?>
                            <th style="text-align: center;"><?= \Yii::t('invest_quick', 'Actions'); ?> </th>
                            <?php } ?>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($data)) {


                            $i = 1;
                            foreach ($data as $val) {

                                ?>
                                <tr>

                                    <td>
                                        <?= !empty($val['room_type']) ? ucwords($val['room_type']) : ''; ?>
                                    </td>
                                    <td>
                                        <?= !empty($val['room_category']) ? ucwords($val['room_category']) : ''; ?>
                                    </td>
                                    <td style="text-align: center;">
        <?php
        if (!empty($val['is_active'])) {
            if ($val['is_active'] == '1') {
                ?>
                                                <a class="btn btn-success btn-rounded" href="#">Active</a>
                                            <?php } else { ?>
                                                <a class="btn btn-warning btn-rounded" href="#">InActive</a>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </td>
                                    
                                   

                                    <?php
                                    if($usertype == 'superadmin'){
                                    ?>
                                    <td style="text-align: center;">
                                        <a href="<?= BASE_URL ?>roomtype/update?id= <?= $val['id'] ?>" title='Edit'><button type="button" class="btn btn-success">Edit</button></a>
                                        <a href="<?= BASE_URL ?>roomtype/delete?id= <?= $val['id'] ?>" title='Delete'><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <tr><td style="text-align: center" colspan="9"><?= \Yii::t('invest_quick', 'No Records Found'); ?></td></tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
        </div>
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