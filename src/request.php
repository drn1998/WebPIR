<?php

require_once('apiclient/wikidata.php');
require_once('processors/csvFilterRowsByPIRcode.php');
require_once('processors/csvToHtmlString.php');
require_once('processors/csvToHtmlTable.php');
require_once('processors/htmlStringToMarquee.php');
require_once('processors/htmlTableToMarqueeTable.php');

if($_POST["format"] == "htmltabled") {
	$filename = 'table.html';
	header('Content-disposition: attachment; filename=' . $filename);
	header('Content-type: text/html');
}

$csv = wikidataGetCsvFromSparql($_POST["sparql"]);

if(isset($_POST["pir"]))
    $csv = csvFilterRowsByPIRcode($csv, $_POST["pir"]);

$htmlTable = csvToHtmlTable($csv);

htmlTableToMarqueeTable($htmlTable, $_POST["speed"]);

?>
