<?php

require_once('apiclient.php');

class Wikidata extends API_Client
{
    protected function getURL() {
        return "https://query.wikidata.org/sparql";
    }

    public function getCSVbyScript($script)
    {
        $client = curl_init();

        $request_headers   = [];
        $request_headers[] = 'Accept: text/csv';
        $request_headers[] = $this->getUA();
        curl_setopt($client, CURLOPT_URL, $this->getURL());
        curl_setopt($client, CURLOPT_POST, 1);
        curl_setopt($client, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($client, CURLOPT_POSTFIELDS, "query=" . urlencode($script));

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($client);

        if (!curl_errno($client)) {
            switch ($http_code = curl_getinfo($client, CURLINFO_HTTP_CODE)) {
                case 200: # OK
                    break;
                case 400:
                    die('HTTP Error 400: The most likely reason is an invalid SPARQL request.');
                    break;
                default:
                    die('The API has returned a non-200 HTTP status code: ' . $http_code);
                    break;
            }
        }

        curl_close($client);

        return $output;
    }
}

?>
