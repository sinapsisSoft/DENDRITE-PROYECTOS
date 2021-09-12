<?php
#Author: LAURA GRISALES
#Date: 23/08/2019
#Description : Is BO Request
include "../dto/dto_request.php";
include "../dao/dao_request.php";
header("Content-type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Origin, X-Requested-With");
class BoRequest
{
  private $objRequest;
  private $objDao;
  private $intValidate;

  public function __construct()
  {
    $this->objRequest = new DtoRequest();
    $this->objDao = new DaoRequest();
  }

  #Description: Function for create a new Process
  public function newRequest($id, $subject, $message, $observation, $date, $user, $state)
  {
    try {
      $this->objRequest->__setRequest($id, $subject, $message, $observation, $date, $user, $state);
      $intValidate = $this->objDao->newRequest($this->objRequest);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }

  #Description: Function for select action
  public function selectAction($dataRequest)
  {
    try {
      echo $this->objDao->selectAction($dataRequest);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
    }
  }

  #Description: Function for select all request
  public function selectRequest()
  {
    try {
      echo $this->objDao->selectRequest();
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
    }
  }

  #Description: Function for select one request
  public function selectOneRequest($requestId)
  {
    try {
      $intValidate = $this->objDao->selectOneRequest($requestId);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }

  #Description: Function for select request status
  public function selectRequestStatus()
  {
    try {
      $intValidate = $this->objDao->selectRequestStatus();
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }

  #Description: Function for create a new Action
  public function newAction($id, $observation, $date, $user, $request, $stat)
  {
    try {
      $this->objRequest->__setAction($id, $observation, $date, $user, $request, $stat);
      $intValidate = $this->objDao->newAction($this->objRequest);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }

  #Description: Function for list today request
  public function selectTodayReq()
  {
    try {
      $intValidate = $this->objDao->selectTodayReq();
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }

  #Description: Function for list pending request
  public function selectPendingReq()
  {
    try {
      $intValidate = $this->objDao->selectPendingReq();
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }

  #Description: Function for request by user
  public function selectRequestUser($userId)
  {
    try {
      $intValidate = $this->objDao->selectRequestUser($userId);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }

  #Description: Function select requests by date
  public function selectChart1Request($iniDate, $finDate)
  {
    try {
      $intValidate = $this->objDao->selectChart1Request($iniDate, $finDate);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }
}

$obj = new BoRequest();
/// We get the json sent
$getData = file_get_contents('php://input');
$data = json_decode($getData);

/**********CREATE ************/
if (isset($data->POST)) {
  if ($data->POST == "POST") {
    echo $obj->newRequest($data->Req_id, $data->Req_subject, $data->Req_message, $data->Act_observation, $data->Act_date, $data->User_id, $data->Stat_id);
  }
  if ($data->POST == "POST_ACTION") {
    echo $obj->newAction($data->Act_id, $data->Act_observation, $data->Act_date, $data->User_id, $data->Req_id, $data->Stat_id);
  }
}

/**********READ AND CONSULT ************/
if (isset($data->GET)) {
  if ($data->GET == "GET_REQUEST") {
    echo $obj->selectRequest();
  }
  if ($data->GET == "GET_ACTION") {
    echo $obj->selectAction($data->Req_id);
  }
  if ($data->GET == "GET_ONE_REQUEST") {
    echo $obj->selectOneRequest($data->Req_id);
  }
  if ($data->GET == "GET_LIST_STATUS") {
    echo $obj->selectRequestStatus();
  }
  if ($data->GET == "GET_TODAY_REQUEST") {
    echo $obj->selectTodayReq();
  }
  if ($data->GET == "GET_PENDING_REQUEST") {
    echo $obj->selectPendingReq();
  }
  if ($data->GET == "GET_USER_REQUEST") {
    echo $obj->selectRequestUser($data->User_id);
  }
  if ($data->GET == "GET_RESERV_CHART1") {
    echo $obj->selectChart1Request($data->Req_iniDate, $data->Req_finDate);
  }
}

/********** UPDATE ************/
if (isset($data->PUT)) {
  if ($data->PUT == "PUT") { }
}

/********** DELETE  ************/
if (isset($data->DELETE)) {
  if ($data->DELETE == "DELETE") { }
}
/**********************/