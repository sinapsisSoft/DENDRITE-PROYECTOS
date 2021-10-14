<?php
#Author: EDWIN OCAMPO
#Date: 07/10/2021
#Description : Is DAO Quotation
include "../class/connectionDB.php";
class DaoQuotation
{
    private $objConntion;
    private $arrayResult;
    private $intValidatio;

    public function __construct()
    {
        $this->objConntion = new Connection();
        $this->arrayResult = array();
        $this->intValidatio;
    }
    #Description: Function for create a new Quotation
    public function newQuotation($objQuotation)
    {
        try {
            $con = $this->objConntion->connect();
            $con->query("SET NAMES 'utf8'");
            if ($con != null) {
                $dataClient = $objQuotation->__getId().",'" . $objQuotation->__getName() . "','" . $objQuotation->__getIdentification() . "','" . $objQuotation->__getAddress() . "','" . $objQuotation->__getTel() . "','" . $objQuotation->__getEmail() . "','" . $objQuotation->__getContactName() . "','" . $objQuotation->__getContactTitle() . "','" . $objQuotation->__getContactTel() . "','" . $objQuotation->__getContactCel() . "','" . $objQuotation->__getContactEmail() . "'," . $objQuotation->__getStatId() . "," . $objQuotation->__getUser() . ",'" . $objQuotation->__getPassword() . "'," . $objQuotation->__getCompany();
                if ($con->query("CALL sp_client_insert_update (" . $dataClient . ")")) {
                    $this->intValidatio = 1;
                } else {
                    $this->intValidatio = 0;
                }
            }
            $con->close();         
        } catch (Exception $e) {
            echo 'Exception captured: ', $e->getMessage(), "\n";
            $this->intValidatio = 0;
        }
        return $this->intValidatio;
    }

    #Description : Function for select Quotation
    public function selectQuotations($iniDate, $finDate)
    {
        try {
            $con = $this->objConntion->connect();
            $con->query("SET NAMES 'utf8'");
            if ($con != null) {
                if ($result = $con->query("CALL sp_quotation_select_date ('" . $iniDate . "','" . $finDate . "')")) {
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $this->arrayResult[] = $row;
                    };
                    mysqli_free_result($result);
                }
            }
            $con->close();
        } catch (Exception $e) {
            echo 'Exception captured: ', $e->getMessage(), "\n";
        }
        return json_encode($this->arrayResult);
    }
}
