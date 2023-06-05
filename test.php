<?php

    require_once './classes/class.database.php';

    $obj = new query();
    $masterTable = 'tbl_product'; 
    // $aFields = ['pro_id', 'pro_name', 'pro_price', 'pro_man_date']; 
    // $sCondition = '';
    // $sLike = ''; 
    // $sOrderBy = 'added_on';
    // $sOrderByType = 'desc';
    // $iLimit = '';
    // $aData = $obj->getData($masterTable, $aFields, $sCondition, $sLike, $sOrderBy, $sOrderByType, $iLimit);
    // echo '<pre>';
    // print_r($aData);


    // $aInsertData = array(
    //     'pro_name' => 'Tab',
    //     'pro_price' => 20000,
    //     'pro_man_date' => '2023-02-01'
    // );
    // $bResult = $obj->insertData($masterTable, $aInsertData);


    // $aDeleteCondition = array(
    //     'pro_id' => 2
    // );
    // $bResult = $obj->deleteData($masterTable, $aDeleteCondition);
    // echo $bResult;


    // $aUpdateData = array(
    //     'pro_name' => 'new mobile',
    //     'pro_price' => 150000
    // );
    // $aCondition = array(
    //     'pro_id' => 2
    // );
    // $bResult = $obj->updateData($masterTable, $aUpdateData, $aCondition);
    // echo $bResult;
?>