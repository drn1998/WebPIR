<?php

require_once('apiclient/wikidata.php');

require_once('util/isDownload.php');

require_once('processors/csvFilterRowsByPIRcode.php');
require_once('processors/csvToHtmlString.php');
require_once('processors/csvToHtmlTable.php');
require_once('processors/htmlStringToMarquee.php');
require_once('processors/htmlTableToMarqueeTable.php');

if(isDownload($_POST["format"])) {
	$filename = 'output.html';	// How to give better file names?
	header('Content-disposition: attachment; filename=' . $filename);
	header('Content-type: text/html');
}

$csv = wikidataGetCsvFromSparql($_POST["sparql"]);

if(isset($_POST["pir"]))
    $csv = csvFilterRowsByPIRcode($csv, $_POST["pir"]);

switch($_POST["format"]) {
	case "htmlmarquee":
	case "htmlmarqueed":
	  $htmlTitle = csvToHtmlTitleString($csv);
		$htmlBody = csvToHtmlString($csv);
		htmlStringToMarquee($htmlBody, $htmlTitle, $_POST["speed"]);
		break;
	case "htmltable":
	case "htmltabled":
		$htmlBody = csvToHtmlTable($csv);
		htmlTableToMarqueeTable($htmlBody, $_POST["speed"]);
		break;
}


?>
