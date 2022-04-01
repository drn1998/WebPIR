<?php

function getURL() {
    $config = parse_ini_file("config/apiclient.ini", true);

    $url = $config["connection"]["URL"];

    return $url;
}

function getUserAgentString() {
    $config = parse_ini_file("config/apiclient.ini", true);

    $name = $config["user-agent"]["name"];
    $tel = $config["user-agent"]["tel"];
    $fax = $config["user-agent"]["fax"];
    $notes = $config["user-agent"]["notes"];

    $ua_string = "User-agent: bot/WebPIR " . $name . " (Tel: " . $tel . ", Fax: " . $fax . ") Notice: " . $notes;

    return $ua_string;
}

function wikidataGetCsvFromSparql($script) {
    $client = curl_init();

    $request_headers = [];
    $request_headers[] = 'Accept: text/csv';
    $request_headers[] = getUserAgentString();
    curl_setopt($client, CURLOPT_URL, getURL());
    curl_setopt($client, CURLOPT_POST, 1);
    curl_setopt($client, CURLOPT_HTTPHEADER, $request_headers);
    curl_setopt($client, CURLOPT_POSTFIELDS,
                "query=" . urlencode($script));

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($client);

    curl_close ($client);

    return $output;
}

?>
