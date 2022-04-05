<?php

require_once('apiclient/wikidata.php');
require_once('apiclient/openstreetmap.php');

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

if($_POST["api"] == "wikidata")
	$csv = wikidataGetCsvFromSparql($_POST["script"]);
else if($_POST["api"] == "openstreetmap")
	$csv = openstreetmapGetCsvFromOql($_POST["script"]);

if(isset($_POST["pir"]))
    $csv = csvFilterRowsByPIRcode($csv, $_POST["pir"], $_POST["api"]);

if($_POST["format"] == "htmltable") {
	$htmlBody = csvToHtmlTable($csv, $_POST["api"]);
} else if($_POST["format"] == "htmlstring") {
	$htmlBody = csvToHtmlString($csv, $_POST["api"]);
} else {
	die("Invalid format set");
}

if($_POST["display"] == "mq" && $_POST["format"] == "htmltable") {
	htmlTableToMarqueeTable($htmlBody, $_POST["speed"]);
} else if($_POST["display"] == "mq" && $_POST["format"] == "htmlstring") {
	$htmlTitle = csvToHtmlTitleString($csv, $_POST["api"]);
	htmlStringToMarquee($htmlBody, $htmlTitle, $_POST["speed"]);
} else if($_POST["display"] == "st" && $_POST["format"] == "htmlstring") {
	$htmlTitle = csvToHtmlTitleString($csv, $_POST["api"]);
	htmlStringToPage($htmlBody, $htmlTitle);
} else if($_POST["display"] == "st" && $_POST["format"] == "htmltable") {
	htmlStringToPage($htmlBody, "Table");
} else {
	die("Not implemented or bad combination!");
}


?>
