<?php
#Author: LAURA GRISALES
#Date: 16/05/2021
#Description : Is BO Event
include "../dto/dto_event.php";
include "../dao/dao_event.php";
header("Content-type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Origin, X-Requested-With");
class BoEvent
{
  private $objEvent;
  private $objDao;
  private $intValidate;

  public function __construct()
  {
    $this->objEvent = new DtoEvent();
    $this->objDao = new DaoEvent();
  }

  #Description: Function for create a new Event
  public function newEvent($id, $title, $color, $start, $end, $client)
  {
    try {
      $this->objEvent->__setEvent($id, $title, $color, $start, $end, $client);
      $intValidate = $this->objDao->newEvent($this->objEvent);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }

  #Description: Function for select by client
  public function selectEventByClient($clientId)
  {
    try {
      $intValidate = $this->objDao->selectEventByClient($clientId);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }

  #Description: Function for select client by user email
  public function selectClientId($userEmail)
  {
    try {
      $intValidate = $this->objDao->selectClientId($userEmail);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }

  #Description: Function for delete a Event
  public function deleteEvent($idEvent)
  {
    try {
      $intValidate = $this->objDao->deleteEvent($idEvent);
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $intValidate = 0;
    }
    return $intValidate;
  }
}

$obj = new BoEvent();
/// We get the json sent
$getData = file_get_contents('php://input');
$data = json_decode($getData);

/**********CREATE ************/
if (isset($data->POST)) {
  if ($data->POST == "POST") {
    echo $obj->newEvent($data->Event_id, $data->Event_title, $data->Event_color, @$data->Event_start, @$data->Event_end, @$data->Client_id);
  }
  if ($data->POST == "DELETE") {
    echo $obj->deleteEvent($data->Event_id);
  }
}

/**********READ AND CONSULT ************/
if (isset($data->GET)) {
  if ($data->GET == "GET_EVENT_CLIENT") {
    echo $obj->selectEventByClient($data->Client_id);
  }  
  if ($data->GET == "GET_CLIENT_ID") {
    echo $obj->selectClientId($data->User_email);
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