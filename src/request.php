<?php

require('apiclient/wikidata.php');
require('processors/csvToHtmlTable.php');
require('processors/htmlTableToMarqueeTable.php');
require('processors/csvFilterRowsByPIRcode.php');

$csv = wikidataGetCsvFromSparql($_POST["sparql"]);

if(isset($_POST["pir"]))
    $csv = csvFilterRowsByPIRcode($csv, $_POST["pir"]);

$htmlTable = csvToHtmlTable($csv);

htmlTableToMarqueeTable($htmlTable, $_POST["speed"]);

?>