<?php

require_once('apiclient.php');

class GenericCSV extends API_Client
{
    protected function getURL() {
        return NULL;
    }
    
    public function getCSVbyScript($script)
    {
        // This function literally does nothing, but it is implemented so for
        // the sake of consistency

        return $script;
    }
}

?>
