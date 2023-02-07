<?php

abstract class API_Client {
    protected function getUA()
    {
        $config = parse_ini_file("config/ua.ini", true);

        $name  = $config["user-agent"]["name"];
        $tel   = $config["user-agent"]["tel"];
        $fax   = $config["user-agent"]["fax"];
        $notes = $config["user-agent"]["notes"];

        $ua_string = "User-agent: bot/WebPIR " . $name . " (Tel: " . $tel . ", Fax: " . $fax . ") " . $notes;

        if ($name == "Firstname Lastname" || $tel == "123" || $fax == "123")
            die('Config file has not been set correctly: No contact data in User-agent string');

        return $ua_string;
    }

    public abstract function getCSVbyScript($script);
    protected abstract function getURL();
}