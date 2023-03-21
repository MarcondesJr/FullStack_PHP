<?php

namespace Source\Members;

class Config
{
    public const COMPANY = "VAT Tecnologia";
    protected const DOMAIN = "vattecnologia.com.br";
    private const SECTOR = "Serviços";

    public static $company = "VAT";
    public static $domain;
    public static $sector;

    public static function setConfig($company, $domain, $sector)
    {
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }
}