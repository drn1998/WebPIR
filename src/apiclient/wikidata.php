<?php

class Wikidata_APIclient {
  private function getURL() {
      $config = parse_ini_file("config/wikidata.ini", true);

      $url = $config["connection"]["URL"];

      if(!filter_var($url, FILTER_VALIDATE_URL))
        die('Config file has not been set correctly: Invalid URL');

      return $url;
  }

  private function getUA() {
      $config = parse_ini_file("config/wikidata.ini", true);

      $name = $config["user-agent"]["name"];
      $tel = $config["user-agent"]["tel"];
      $fax = $config["user-agent"]["fax"];
      $notes = $config["user-agent"]["notes"];

      $ua_string = "User-agent: bot/WebPIR " . $name . " (Tel: " . $tel . ", Fax: " . $fax . ") " . $notes;

      if($name == "Firstname Lastname" || $tel == "123" || $fax == "123")
        die('Config file has not been set correctly: No contact data in User-agent string');

      return $ua_string;
  }

  public function getCSVbyScript($script) {
      $client = curl_init();

      $request_headers = [];
      $request_headers[] = 'Accept: text/csv';
      $request_headers[] = $this->getUA();
      curl_setopt($client, CURLOPT_URL, $this->getURL());
      curl_setopt($client, CURLOPT_POST, 1);
      curl_setopt($client, CURLOPT_HTTPHEADER, $request_headers);
      curl_setopt($client, CURLOPT_POSTFIELDS,
                  "query=" . urlencode($script));

      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

      $output = curl_exec($client);

      if (!curl_errno($client)) {
        switch ($http_code = curl_getinfo($client, CURLINFO_HTTP_CODE)) {
          case 200:  # OK
            break;
          case 400:
            die('HTTP Error 400: The most likely reason is an invalid SPARQL request.');
            break;
          default:
            die('The API has returned a non-200 HTTP status code: ', $http_code);
            break;
        }
      }

      curl_close($client);

      return $output;
  }
}

?>
