<?php

    class database {
        private $sHostName;
        private $sUserName;
        private $sPassword;
        private $sDBName;

        protected function connect() {
            $this->sHostName = 'localhost';
            $this->sUserName = 'root';
            $this->sPassword = 'plus91';
            $this->sDBName = 'curd';

            $oConn = new mysqli($this->sHostName,$this->sUserName,$this->sPassword,$this->sDBName);
            return $oConn;
        }
    }

    class query extends database {

        public function getData($masterTable = '', $aFields = array('*'), $sCondition = array(), $sLike = '', $sOrderBy = '', $sOrderByType = 'desc', $iStart = '', $iLimit = '', $bDatatableUse) {
            
            if (!$bDatatableUse) {
                $sQuery = "SELECT COUNT(`pro_id`) AS `count` FROM $masterTable WHERE `status` = 1;";
            } else {
    
                $sQuery = 'SELECT ';
                
                if (gettype($aFields) == 'array') {
                    $sFields = implode(", ", $aFields);
                } else {
                    $sFields = $aFields;
                }
                
                $sQuery .= "$sFields FROM `$masterTable` WHERE `status` = 1 ";

                if (gettype($sCondition) == 'array') {
                    foreach($sCondition as $key => $val) {
                        $sQuery .= ' and $key = `$val` ';
                    }
                } else {
                    $sQuery .= $sCondition;
                }

                if ($sOrderBy != '') {
                    $sQuery .= "ORDER BY $sOrderBy $sOrderByType ";
                }
                
                if ($iStart != null && $iLimit != null) {
                    $sQuery .= " LIMIT {$iStart}, {$iLimit}";
                }
            }
            // var_dump($sQuery);exit();
            
            $aResult = $this->connect()->query($sQuery);
            if ($aResult->num_rows > 0) {
                $i=(int)$iStart;
                while($aRow = $aResult->fetch_assoc()){
                    $aRow['sr_no']=++$i;
                    $aData[] = $aRow;
                }
                return $aData;
            } else {
                return 0;
            }
        }

        public function insertData($masterTable = '', $sCondition = array()) {

            $sQuery = "INSERT INTO `$masterTable` ";

            if (gettype($sCondition) == 'array' && COUNT($sCondition) > 0) {
                foreach($sCondition as $key => $val) {
                    $aFieldArr[] = $key;
                    $aValueArr[] = $val;
                }
                $sField = implode(", ", $aFieldArr);
                $sValue = implode("', '", $aValueArr);
                $sValue = "'".$sValue."'";
                $sQuery .= " ($sField) VALUES ($sValue); ";
            } 
            
            // var_dump($sQuery);exit();
            
            $aResult = $this->connect()->query($sQuery);
            if ($aResult) {
                return true;
            } else {
                return false;
            }
        }


        public function deleteData($masterTable = '', $sCondition = array()) {

            $sQuery = "UPDATE `$masterTable` SET `status` = 0 WHERE ";

            if (gettype($sCondition) == 'array') {
                foreach($sCondition as $key => $val) {
                    $sQuery .= " $key = $val;";
                }
            } 
            // var_dump($sQuery);exit();
            
            $aResult = $this->connect()->query($sQuery);
            if ($aResult) {
                return true;
            } else {
                return false;
            }
        }

        public function updateData($masterTable = '', $aUpdateData = array(), $aCondition = array()) {

            $sQuery = "UPDATE `$masterTable` SET ";

            if (gettype($aUpdateData) == 'array') {
                $i = 1;
                $aUpdateConditionCount = COUNT($aUpdateData);
                foreach($aUpdateData as $key => $val) {
                    if ($i == $aUpdateConditionCount) {
                        $sQuery .= " `$key` = '$val' WHERE ";
                    } else {
                        $sQuery .= " `$key` = '$val', ";
                    }
                    $i++;
                }
            } else {
                $sQuery .= $aUpdateData;
            }

            if (gettype($aCondition) == 'array') {
                foreach($aCondition as $key => $val) {
                    $sQuery .= "`$key` = $val;";
                }
            } 
            // var_dump($sQuery);exit();
            
            $aResult = $this->connect()->query($sQuery);
            if ($aResult) {
                return true;
            } else {
                return false;
            }
        }

        public function getProductDetailToUpdate($masterTable = '', $aFields = array('*'), $aUpdateCondition = array()) {
            
            $sQuery = 'SELECT ';
                
            if (gettype($aFields) == 'array') {
                $sFields = implode(", ", $aFields);
            } else {
                $sFields = $aFields;
            }
                
            $sQuery .= "$sFields FROM `$masterTable` WHERE `status` = 1 ";

            if (gettype($aUpdateCondition) == 'array') {
                foreach($aUpdateCondition as $key => $val) {
                    $sQuery .= " and $key = $val ";
                }
            } else {
                $sQuery .= $aUpdateCondition;
            }
            // var_dump($sQuery);exit();
            
            $aResult = $this->connect()->query($sQuery);
            if ($aResult->num_rows > 0) {
                while($aRow = $aResult->fetch_assoc()){
                    $aData = $aRow;
                }
                return $aData;
            } else {
                return 0;
            }
        }

        public function loginCheck($masterTable = '', $aFields, $aCondition = array()) {
            $sQuery = 'SELECT ';

            if (gettype($aFields) == 'array') {
                $sFields = implode(", ", $aFields);
            } else {
                $sFields = $aFields;
            }
                
            $sQuery .= "$sFields FROM `$masterTable` WHERE `status` = 1 ";

            if (gettype($aCondition) == 'array') {
                foreach($aCondition as $key => $val) {
                    $sQuery .= " and $key = '$val' ";
                }
            } else {
                $sQuery .= $aCondition;
            }
            // var_dump($sQuery);exit();
            
            $aResult = $this->connect()->query($sQuery);
            if ($aResult->num_rows > 0) {
                while($aRow = $aResult->fetch_assoc()){
                    $aData = $aRow;
                }
                return $aData;
            } else {
                return 0;
            }
        }
    }

    

?>