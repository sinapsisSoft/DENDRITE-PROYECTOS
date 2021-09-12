<?php
#Author: LAURA GRISALES
#Date: 18/12/2020
#Description : Is DAO Request
include "../class/connectionDB.php";
class DaoRequest
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
  #Description: Function for create a new request
  public function newRequest($objRequest)
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        $dataRequest = $objRequest->__getId() . ",'" . $objRequest->__getSubject() . "','" . $objRequest->__getMessage() . "','" . $objRequest->__getObservation() . "','" . $objRequest->__getDate() . "'," . $objRequest->__getUserid() . "," . $objRequest->__getStatId();
        if ($con->query("CALL sp_request_insert_update (" . $dataRequest . ")")) {
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

  #Description : Function for select action
  public function selectAction($requestId)
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($result = $con->query("CALL sp_action_select_one (" . $requestId . ")")) {
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

  #Description : Function for select all request
  public function selectRequest()
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($result = $con->query("CALL sp_request_select_all()")) {
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

  #Description : Function for select one request
  public function selectOneRequest($dataRequest)
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($result = $con->query("CALL sp_request_select_one (" . $dataRequest . ")")) {
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

  #Description : Function for select request status
  public function selectRequestStatus()
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($result = $con->query("CALL sp_request_status()")) {
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

  #Description: Function for create a new action
  public function newAction($objRequest)
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        $dataRequest = $objRequest->__getActId() . ",'" . $objRequest->__getObservation() . "','" . $objRequest->__getDate() . "'," . $objRequest->__getUserId() . "," . $objRequest->__getId() . "," . $objRequest->__getStatId();
        if ($con->query("CALL sp_action_insert (" . $dataRequest . ")")) {
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

  #Description: Function for list today request
  public function selectTodayReq()
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($result = $con->query("CALL sp_request_select_today()")) {
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

  #Description: Function for list today request
  public function selectPendingReq()
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($result = $con->query("CALL sp_request_select_pending()")) {
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

  #Description: Function for request by user
  public function selectRequestUser($userId)
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($result = $con->query("CALL sp_request_select_user(" . $userId . ")")) {
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

  #Description: Function for get chart1 info
  public function selectChart1Request($dateInitial, $dateFinal)
  {
    try {
      $con = $this->objConntion->connect();
      $con->query("SET NAMES 'utf8'");
      if ($con != null) {
        if ($result = $con->query("CALL sp_request_chart1('". $dateInitial ."','" . $dateFinal . "')")) {
          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $this->arrayResult[] = $row;
          };
          mysqli_free_result($result);
        }
      }
      $con->close();
    } catch (Exception $e) {
      echo 'Exception captured: ', $e->getMessage(), "\n";
      $this->intValidatio = 0;
    }
    return json_encode($this->arrayResult);
  }
}
