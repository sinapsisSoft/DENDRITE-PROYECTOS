<?php
#Author: LAURA GRISALES
#Date: 16/05/2021
#Description : Is DAO Event
include "../class/connectionDB.php";
class DaoEvent
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
  #Description: Function for create a new Event
  public function newEvent($objEvent)
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        $dataEvent = $objEvent->__getId() . ",'" . $objEvent->__getTitle() . "','" . $objEvent->__getColor() . "','" . $objEvent->__getStart() . "','" . $objEvent->__getEnd() . "'," . $objEvent->__getClientId();
        // echo "CALL sp_event_insert_update (" . $dataEvent . ")";
        if ($con->query("CALL sp_event_insert_update (" . $dataEvent . ")")) {
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

  #Description : Function for select by client
  public function selectEventByClient($dataEvent)
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($result = $con->query("CALL sp_event_select_client (" . $dataEvent . ")")) {
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

  #Description : Function for select client by user email
  public function selectClientId($dataUser)
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($result = $con->query("CALL sp_client_id ('" . $dataUser . "')")) {
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

  #Description: Function for delete a Event
  public function deleteEvent($idEvent)
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($con->query("CALL sp_event_delete (" . $idEvent . ")")) {
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
}
