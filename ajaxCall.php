<?php

    session_start();
    $iUserID = $_SESSION['id'];
    require_once './classes/class.database.php';

    $obj = new query();

    $sType = $_REQUEST['sType'];


    switch ($sType) {
        case 'showProduct':
            $masterTable = 'tbl_product'; 
            $aFields = $_POST['aFields'];
            $sCondition = $_POST['sCondition'];
            $sOrderBy = $_POST['sOrderBy'];
            $sOrderByType = $_POST['sOrderByType'];
            $bDatatableUse = $_POST['datatable_use'];
            $iStart = isset($_POST['start'])?$_POST['start']:null;
            $iLimit = isset($_POST['length'])?$_POST['length']:null;
            
            $aReturn['data'] = $obj->getData($masterTable, $aFields, $sCondition, $sLike, $sOrderBy, $sOrderByType, $iStart, $iLimit, $bDatatableUse);
            
            $iStart = null;
            $iLimit = null;
            $bDatatableUse = false;

            $iTotalRec = $obj->getData($masterTable, $aFields, $sCondition, $sLike, $sOrderBy, $sOrderByType, $iStart, $iLimit, $bDatatableUse);
            
            $aReturn['draw'] = intval($_POST['draw']);
            $aReturn['recordsFiltered'] = intval($iTotalRec[0]['count']);
            $aReturn['recordsTotal'] = intval($iTotalRec[0]['count']);
            
            echo json_encode($aReturn);
        break;

        case 'addProduct':
            $masterTable = 'tbl_product'; 
            $sProductName = $_POST['sProductName'];
            $iProductPrice = $_POST['iProductPrice'];
            $dManufacturingDate = $_POST['dManufacturingDate'];
            $aInsertData = array(
                'pro_name' => $sProductName,
                'pro_price' => $iProductPrice,
                'pro_man_date' => $dManufacturingDate,
                'added_by' => $iUserID
            );
            $bResult = $obj->insertData($masterTable, $aInsertData);
            // echo $bResult;
            $aReturn['code'] = 111;
            $aReturn['massage'] = 'product added successfully';
            $aReturn['data'] = $bResult;
            echo json_encode($aReturn);
        break;

        case 'deleteProduct':
            $masterTable = 'tbl_product'; 
            $iID = $_POST['iID'];
            $aDeleteCondition = array(
                'pro_id' => $iID
            );
            $bResult = $obj->deleteData($masterTable, $aDeleteCondition);
            if ($bResult) {
                $aReturn['code'] = 111;
                $aReturn['massage'] = 'product deleted successfully';
                $aReturn['data'] = $bResult;
            } else {
                $aReturn['code'] = 000;
                $aReturn['massage'] = 'product not deleted successfully';
                $aReturn['data'] = $bResult;
            }
            
            echo json_encode($aReturn);
        break;


        case 'getProductToUpdate':
            $masterTable = 'tbl_product'; 
            $iID = $_POST['iID'];
            $aFields = $_POST['aFields'];
            $aUpdateCondition = array(
                'pro_id' => $iID
            );
            $bResult = $obj->getProductDetailToUpdate($masterTable, $aFields, $aUpdateCondition);
            if ($bResult) {
                $aReturn['code'] = 111;
                $aReturn['massage'] = 'Product data fetched successfully';
                $aReturn['data'] = $bResult;
            } else {
                $aReturn['code'] = 000;
                $aReturn['massage'] = 'Sorry, not able to fetch data';
                $aReturn['data'] = $bResult;
            }
            
            echo json_encode($aReturn);
        break;

        case 'updateProduct':
            $masterTable = 'tbl_product'; 
            $sProductName = $_POST['sProductName'];
            $iProductPrice = $_POST['iProductPrice'];
            $dManufacturingDate = $_POST['dManufacturingDate'];
            $iID = $_POST['iID'];
            $dUpdatedOn = date('Y-m-d H:i:s');
            $aUpdateData = array(
                'pro_name' => $sProductName,
                'pro_price' => $iProductPrice,
                'pro_man_date' => $dManufacturingDate,
                'updated_by' => $iUserID,
                'updated_on' => $dUpdatedOn
            );
            $aCondition = array(
                'pro_id' => $iID
            );
            $bResult = $obj->updateData($masterTable, $aUpdateData, $aCondition);
            if ($bResult) {
                $aReturn['code'] = 111;
                $aReturn['massage'] = 'Product updated successfully';
                $aReturn['data'] = $bResult;
            } else {
                $aReturn['code'] = 000;
                $aReturn['massage'] = 'Sorry, not able to update data';
                $aReturn['data'] = $bResult;
            }
            
            echo json_encode($aReturn);
        break;

        case 'login':
            $masterTable = 'tbl_user'; 
            $sUsername = $_POST['sUsername'];
            $sPassword = md5($_POST['sPassword']);
            $aFields = array(
                'username', 'email', 'user_id'
            );
            $sCondition = array(
                'username' => $sUsername,
                'password' => $sPassword
            );
            $bResult = $obj->loginCheck($masterTable, $aFields, $sCondition);
            if ($bResult) {
                $aReturn['code'] = 111;
                $aReturn['massage'] = 'Loged in successfully';
                $aReturn['data'] = $bResult;
            } else {
                $aReturn['code'] = 000;
                $aReturn['massage'] = 'Sorry, not able Login';
                $aReturn['data'] = $bResult;
            }
            
            echo json_encode($aReturn);
        break;

        case 'setSession':
            $sUsername = $_POST['username'];
            $iID = $_POST['iID'];
            $_SESSION['username'] = $sUsername;
            $_SESSION['id'] = $iID;
            // echo $_SESSION['username'];
            // echo $_SESSION['id'];
        break;
        
        case 'addNewUser':
            $masterTable = 'tbl_user'; 
            $sUsername = $_POST['sUsername'];
            $sAddEmail = $_POST['sAddEmail'];
            $sAddPassword1 = md5($_POST['sAddPassword1']);
            $aInsertData = array(
                'username' => $sUsername,
                'email' => $sAddEmail,
                'password' => $sAddPassword1
            );
            $bResult = $obj->insertData($masterTable, $aInsertData);
            if ($bResult) {
                $aReturn['code'] = 111;
                $aReturn['massage'] = 'Signup successfully';
                $aReturn['data'] = $bResult;
            } else {
                $aReturn['code'] = 000;
                $aReturn['massage'] = 'Sorry, not able Signup';
                $aReturn['data'] = $bResult;
            }
            echo json_encode($aReturn);
        break;
        
        default:
            # code...
            break;
    }

    

?>