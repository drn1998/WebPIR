<?php

require_once('apiclient/wikidata.php');

require_once('util/isDownload.php');

require_once('processors/csvFilterRowsByPIRcode.php');
require_once('processors/csvToHtmlString.php');
require_once('processors/csvToHtmlTable.php');
require_once('processors/htmlStringToMarquee.php');
require_once('processors/htmlStringToPage.php');
require_once('processors/htmlTableToMarqueeTable.php');

if($_POST["load"] == "download") {
	$filename = 'output.html';	// How to give better file names?
	header('Content-disposition: attachment; filename=' . $filename);
	header('Content-type: text/html');
}

$csv = wikidataGetCsvFromSparql($_POST["sparql"]);

if(isset($_POST["pir"]))
    $csv = csvFilterRowsByPIRcode($csv, $_POST["pir"]);

if($_POST["format"] == "htmltable") {
	$htmlBody = csvToHtmlTable($csv);
} else if($_POST["format"] == "htmlstring") {
	$htmlBody = csvToHtmlString($csv);
} else {
	die("Invalid format set");
}

if($_POST["display"] == "mq" && $_POST["format"] == "htmltable") {
	htmlTableToMarqueeTable($htmlBody, $_POST["speed"]);
} else if($_POST["display"] == "mq" && $_POST["format"] == "htmlstring") {
	$htmlTitle = csvToHtmlTitleString($csv);
	htmlStringToMarquee($htmlBody, $htmlTitle, $_POST["speed"]);
} else if($_POST["display"] == "st" && $_POST["format"] == "htmlstring") {
	$htmlTitle = csvToHtmlTitleString($csv);
	htmlStringToPage($htmlBody, $htmlTitle);
} else if($_POST["display"] == "st" && $_POST["format"] == "htmltable") {
	htmlStringToPage($htmlBody, "Table");
} else {
	die("Not implemented or bad combination!");
}


?>
