<?php
#Author: LAURA GRISALES
#Date: 16/05/2021
#Description : Is DTO Event
class DtoEvent
{
    private $Event_id;
    private $Event_title;
    private $Event_color;
    private $Event_start;
    private $Event_end;
    private $Client_id;

    public function __construct()
    {

    }
    public function __setEvent($id, $title, $color, $start, $end, $client)
    {
        $this->Event_id = $id;
        $this->Event_title = $title;
        $this->Event_color = $color;
        $this->Event_start = $start;
        $this->Event_end = $end;
        $this->Client_id = $client;        
    }

    public function __getEvent()
    {
        $objClient = new DtoEvent();
        $objClient->__getId();
        $objClient->__getTitle();
        $objClient->__getColor();
        $objClient->__getStart();
        $objClient->__getEnd();
        $objClient->__getClientId();
        return $objClient;
    }
    //SET EVENT
    public function __setId($id)
    {
        $this->Event_id = $id;
    }
    public function __setTitle($title)
    {
        $this->Event_title = $title;
    }
    public function __setColor($color)
    {
        $this->Event_color = $color;
    }
    public function __setStart($start)
    {
        $this->Event_start = $start;
    }
    public function __setEnd($end)
    {
        $this->Event_end = $end;
    }
    public function __setUserId($id)
    {
        $this->Client_id = $id;
    }
    //GET EVENT
    public function __getId()
    {
        return $this->Event_id;
    }
    public function __getTitle()
    {
        return $this->Event_title;
    }
    public function __getColor()
    {
        return $this->Event_color;
    }
    public function __getStart()
    {
        return $this->Event_start;
    }
    public function __getEnd()
    {
        return $this->Event_end;
    }
    public function __getClientId()
    {
        return $this->Client_id;
    }    
}