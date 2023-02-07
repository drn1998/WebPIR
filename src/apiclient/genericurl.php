<?php

require_once('apiclient.php');

class GenericURL extends API_Client
{
    protected function getURL() {
        return NULL;
    }

    public function getCSVbyScript($script)
    {
        if (!filter_var($script, FILTER_VALIDATE_URL))
            die('Unable to perform GET request to access CSV data: Invalid URL');

        $client = curl_init();

        $request_headers   = [];
        $request_headers[] = $this->getUA();
        curl_setopt($client, CURLOPT_URL, $script);
        curl_setopt($client, CURLOPT_HTTPHEADER, $request_headers);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($client);

        curl_close($client);

        return $output;
    }

}

?>
