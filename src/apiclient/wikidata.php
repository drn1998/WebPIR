<?php

function SPARQLgetURL() {
    $config = parse_ini_file("config/wikidata.ini", true);

    $url = $config["connection"]["URL"];

    if(!filter_var($url, FILTER_VALIDATE_URL))
      die('Config file has not been set correctly: Invalid URL');

    return $url;
}

function SPAQRLgetUserAgentString() {
    $config = parse_ini_file("config/wikidata.ini", true);

    $name = $config["user-agent"]["name"];
    $tel = $config["user-agent"]["tel"];
    $fax = $config["user-agent"]["fax"];
    $notes = $config["user-agent"]["notes"];

    $ua_string = "User-agent: bot/WebPIR " . $name . " (Tel: " . $tel . ", Fax: " . $fax . ") Notice: " . $notes;

    if($name == "Firstname Lastname" || $tel == "123" || $fax == "123")
      die('Config file has not been set correctly: No contact data in User-agent string');

    return $ua_string;
}

function wikidataGetCsvFromSparql($script) {
    $client = curl_init();

    $request_headers = [];
    $request_headers[] = 'Accept: text/csv';
    $request_headers[] = SPARQLgetUserAgentString();
    curl_setopt($client, CURLOPT_URL, SPARQLgetURL());
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
