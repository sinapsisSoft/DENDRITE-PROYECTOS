<?php
#Author: LAURA GRISALES
#Date: 18/12/2020
#Description : Is DTO Request
class DtoRequest
{
    private $Req_id;
    private $Req_subject;
    private $Req_message;
    private $Act_id;
    private $Act_observation;
    private $Act_date;
    private $User_id;
    private $Stat_id;

    public function __construct()
    {

    }
    public function __setRequest($id, $subject, $message, $observation, $date, $user, $state)
    {
        $this->Req_id = $id;
        $this->Req_subject = $subject;
        $this->Req_message = $message;
        $this->Act_observation = $observation;
        $this->Act_date = $date;
        $this->User_id = $user;
        $this->Stat_id = $state;
    }

    public function __setAction($id, $observation, $date, $user, $request, $state)
    {
        $this->Act_id = $id;
        $this->Act_observation = $observation;
        $this->Act_date = $date;
        $this->User_id = $user;
        $this->Req_id = $request;
        $this->Stat_id = $state;        
    }

    public function __getRequest()
    {
        $objRequest = new DtoRequest();
        $objRequest->__getId();
        $objRequest->__getSubject();
        $objRequest->__getMessage();
        $objRequest->__getActId();
        $objRequest->__getObservation();
        $objRequest->__getDate();
        $objRequest->__getUserid();
        $objRequest->__getStatId();
        return $objRequest;
    }
    //SET CLIENT
    public function __setId($id)
    {
        $this->Req_id = $id;
    }
    public function __setSubject($subject)
    {
        $this->Req_subject = $subject;
    }
    public function __setMessage($message)
    {
        $this->Req_message = $message;
    }
    public function __setActId($id)
    {
        $this->Act_id = $id;
    }
    public function __setObservation($observation)
    {
        $this->Act_observation = $observation;
    }
    public function __setDate($date)
    {
        $this->Act_date = $date;
    }
    public function __setUserId($id)
    {
        $this->User_id = $id;
    }
    public function __setStat_id($state)
    {
        $this->Stat_id = $state;
    }
    //GET CLIENT
    public function __getId()
    {
        return $this->Req_id;
    }
    public function __getSubject()
    {
        return $this->Req_subject;
    }
    public function __getMessage()
    {
        return $this->Req_message;
    }
    public function __getActId()
    {
        return $this->Act_id;
    }
    public function __getObservation()
    {
        return $this->Act_observation;
    }
    public function __getDate()
    {
        return $this->Act_date;
    }
    public function __getUserId()
    {
        return $this->User_id;
    }    
    public function __getStatId()
    {
        return $this->Stat_id;
    }
}