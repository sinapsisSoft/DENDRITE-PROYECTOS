<?php
#Author: EDWIN OCAMPO
#Date: 06/10/2021
#Description : Is DTO Quotation
class DtoQuotation
{
    private $Quo_id;
    private $Quo_prefix;
    private $Quo_number;
    private $Quo_parentNumber;
    private $Quo_date;
    private $Quo_trm;
    private $Quo_percCompany;
    private $Quo_percCommission;
    private $Quo_hours;
    private $Quo_days;
    private $Quo_unexpected;
    private $Host_id;
    private $Quo_hostMonths;
    private $Ssl_id;
    private $Quo_sslMonths;
    private $Domain_id;
    private $Quo_domainMonths;
    private $Email_id;
    private $Quo_emailNum;
    private $Quo_emailMonths;
    private $Stat_id;



    

    public function __construct()
    {

    }
    public function __setQuotation($id, $prefix, $number, $parentNumber, $date, $trm, $company, $commission, $hours, $days, $unexpected, $host_id,$hostMonths, $ssl_id, $sslMonths, $domain_id, $domainMonths, $email_id, $emailNumber, $emailMonths, $stat_id)
    {
        $this->Quo_id = $id;
        $this->Quo_prefix = $prefix;
        $this->Quo_number = $number;
        $this->Quo_parentNumber = $parentNumber;
        $this->Quo_date = $date;
        $this->Quo_trm = $trm;
        $this->Quo_percCompany = $company;
        $this->Quo_percCommission = $commission;
        $this->Quo_hours = $hours;
        $this->Quo_days = $days;
        $this->Quo_unexpected = $unexpected;
        $this->Host_id = $host_id;
        $this->Quo_hostMonths = $hostMonths;
        $this->Ssl_id = $ssl_id;
        $this->Quo_sslMonths = $sslMonths;
        $this->Domain_id = $domain_id;
        $this->Quo_domainMonths = $domainMonths;
        $this->Email_id = $email_id;
        $this->Quo_emailNum = $emailNumber;
        $this->Quo_emailMonths = $emailMonths;
        $this->Stat_id = $stat_id;
    }

    //SET QUOTATION
    public function __setId($id)
    {
        $this->Quo_id = $id;
    }
    public function __setPrefix($prefix)
    {
        $this->Quo_prefix = $prefix;
    }
    public function __setNumber($number)
    {
        $this->Quo_number = $number;
    }
    public function __setParentNumber($parentNumber)
    {
        $this->Quo_parentNumber = $parentNumber;
    }
    public function __setDate($date)
    {
        $this->Quo_date = $date;
    }
    public function __setTrm($trm)
    {
        $this->Quo_trm = $trm;
    }
    public function __setCompany($company)
    {
        $this->Quo_percCompany = $company;
    }
    public function __setCommission($commission)
    {
        $this->Quo_percCommission = $commission;
    }
    public function __setHours($hours)
    {
        $this->Quo_hours = $hours;
    }
    public function __setDays($days)
    {
        $this->Quo_days = $days;
    }
    public function __setUnexpected($unexpected)
    {
        $this->Quo_unexpected = $unexpected;
    }
    public function __setHostId($host_id)
    {
        $this->Host_id = $host_id;
    }
    public function __setHostMonths($hostMonths)
    {
        $this->Quo_hostMonths = $hostMonths;
    }
    public function __setSslId($ssl_id)
    {
        $this->Ssl_id = $ssl_id;
    }
    public function __setSslMonths($sslMonths)
    {
        $this->Quo_sslMonths = $sslMonths;
    }
    public function __setDomainId($domain_id)
    {
        $this->Domain_id = $domain_id;
    }
    public function __setDomainMonths($domainMonths)
    {
        $this->Quo_domainMonths = $domainMonths;
    }
    public function __setEmailId ($email_id)
    {
        $this->Email_id = $email_id;
    }
    public function __setEmailNumber($emailNumber)
    {
        $this->Quo_emailNum = $emailNumber;
    }
    public function __setEmailMonths($emailMonths)
    {
        $this->Quo_emailMonths = $emailMonths;
    }
    public function __setStatId($stat_id)
    {
        $this->Stat_id = $stat_id;
    }
    //GET CLIENT
    public function __getId()
    {
        return $this->Quo_id;
    }
    public function __getPrefix()
    {
        return $this->Quo_prefix;
    }
    public function __getNumber()
    {
        return $this->Quo_number;
    }
    public function __getParentNumber()
    {
        return $this->Quo_parentNumber;
    }
    public function __getDate()
    {
        return $this->Quo_date;
    }
    public function __getTrm()
    {
        return $this->Quo_trm;
    }
    public function __getPercCompany()
    {
        return $this->Quo_percCompany;
    }
    public function __getPercCommission()
    {
        return $this->Quo_percCommission;
    }
    public function __getHours()
    {
        return $this->Quo_hours;
    }
    public function __getDays()
    {
        return $this->Quo_days;
    }
    public function __getUnexpected()
    {
        return $this->Quo_unexpected;
    }
    public function __getHostId()
    {
        return $this->Host_id;
    }
    public function __getHostMonths()
    {
        return $this->Quo_hostMonths;
    }
    public function __getSslId()
    {
        return $this->Ssl_id;
    }
    public function __getSslMonths()
    {
        return $this->Quo_sslMonths;
    }
    public function __getDomainId()
    {
        return $this->Domain_id;
    }
    public function __getDomainMonths()
    {
        return $this->Quo_domainMonths;
    }
    public function __getEmailId()
    {
        return $this->Email_id;
    }
    public function __getEmailNum()
    {
        return $this->Quo_emailNum;
    }
    public function __getEmailMonths()
    {
        return $this->Quo_emailMonths;
    }
    public function __getStat_id()
    {
        return $this->Stat_id;
    }
}
