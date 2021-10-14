<?php
#Author: EDWIN OCAMPO
#Date: 07/10/2021
#Description : Is BO Quotation
include "../dto/dto_quotation.php";
include "../dao/dao_quotation.php";
header("Content-type: application/json; charset=utf-8");
class BoQuotation
{
  private $objClient;
  private $objDao;
  private $intValidate;

  public function __construct()
  {
    $this->objClient = new DtoQuotation();
    $this->objDao = new DaoQuotation();
  }

  #Description: Function for create a new Client
  // public function newClient($id, $name, $identification, $address, $tel, $email, $contactName, $contactTitle, $contactTel, $contactCel, $contactEmail, $state, $user, $password, $company)
  // {
  //   try {
  //     $this->objClient->__setClient($id, $name, $identification, $address, $tel, $email, $contactName, $contactTitle, $contactTel, $contactCel, $contactEmail, $state, $user, $password, $company);
  //     $intValidate = $this->objDao->newClient($this->objClient);
  //   } catch (Exception $e) {
  //     echo 'Exception captured: ', $e->getMessage(), "\n";
  //     $intValidate = 0;
  //   }
  //   return $intValidate;
  // }

  #Description: Function for select Clients
  public function selectQuotations($iniDate, $finDate)
  {
    try {
      echo $this->objDao->selectQuotations($iniDate, $finDate);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
    }
  }
}

$obj = new BoQuotation();
/// We get the json sent
$getData = file_get_contents('php://input');
$data = json_decode($getData);

/**********CREATE ************/
if (isset($data->POST)) {
    // if ($data->POST == "POST") {
    //   echo $obj->newClient($data->Client_id,$data->Client_name, $data->Client_identification, $data->Client_address,$data->Client_tel, $data->Client_email, $data->Client_contactName, $data->Client_contactTitle,$data->Client_contactTel, $data->Client_contactCel, $data->Client_contactEmail,$data->Stat_id, $data->Client_user, @$data->Login_password, $data->Comp_id);
    // }
}

/**********READ AND CONSULT ************/
if (isset($data->GET)) {   
    if ($data->GET == "GET_BY_DATE") {
        echo $obj->selectQuotations($data->Quo_iniDate, $data->Quo_finDate); 
    }
}

/********** UPDATE ************/
if (isset($data->PUT)) {
    if ($data->PUT == "PUT") {

    }
}

/********** DELETE  ************/
if (isset($data->DELETE)) {
    if ($data->DELETE == "DELETE") {

    }
}
/**********************/
//echo $obj->newClient(33,'DAKATI GROUP','900748749-3','TV 26 # 57 - 78','3114823442','documentos@rescatefinanciero.com','DIRECTOR','DIRECTOR','','','directorlegal@rescatefinanciero.com',8,0,'Laura1234',1);
// echo $obj->selectQuotations("2021-10-11","2021-10-31"); 
//$obj->selectClients("");
  