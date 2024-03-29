<?php

require_once('apiclient/wikidata.php');
require_once('apiclient/openstreetmap.php');
require_once('apiclient/genericurl.php');
require_once('apiclient/genericcsv.php');

require_once('processors/csvFilterRowsByPIRcode.php');
require_once('processors/csvToHtmlString.php');
require_once('processors/csvToHtmlTable.php');
require_once('processors/csvToSsmlString.php');
require_once('processors/htmlStringToMarquee.php');
require_once('processors/htmlStringToPage.php');
require_once('processors/htmlTableToMarqueeTable.php');

if ($_POST["load"] == "download") {
    if ($_POST["format"] == "htmltable" || $_POST["format"] == "htmlstring") {
        header('Content-type: text/html');
        $filename = 'output.html';
    } else if ($_POST["format"] == "ssmlstring") {
        header('Content-type: text/ssml');
        $filename = 'output.ssml';
    }

    header('Content-disposition: attachment; filename=' . $filename);
}

if ($_POST["api"] == "wikidata") {
    $client = new Wikidata();
    $csv    = $client->getCSVbyScript($_POST["script"]);
} else if ($_POST["api"] == "openstreetmap") {
    $client = new OpenStreetMap();
    $csv    = $client->getCSVbyScript($_POST["script"]);
} else if ($_POST["api"] == "genericurl") {
    $client = new GenericURL();
    $csv    = $client->getCSVbyScript($_POST["script"]);
} else if ($_POST["api"] == "genericcsv") {
    $client = new GenericCSV();
    $csv    = $client->getCSVbyScript($_POST["script"]);
} else {
    die("Invalid API selected.");
}

if (isset($_POST["pir"]) && $_POST["pir"] != "")
    $csv = csvFilterRowsByPIRcode($csv, $_POST["pir"], $_POST["api"]);

if ($_POST["format"] == "htmltable") {
    $htmlBody = csvToHtmlTable($csv, $_POST["api"]);
} else if ($_POST["format"] == "htmlstring") {
    $htmlBody = csvToHtmlString($csv, $_POST["api"]);
} else if ($_POST["format"] == "ssmlstring") {
    $htmlBody = csvToSsmlString($csv, $_POST["api"]);
} else {
    die("Bad format set!");
}

if ($_POST["display"] == "mq" && $_POST["format"] == "htmltable") {
    htmlTableToMarqueeTable($htmlBody, $_POST["speed"]);
} else if ($_POST["display"] == "mq" && $_POST["format"] == "htmlstring") {
    $htmlTitle = csvToHtmlTitleString($csv, $_POST["api"]);
    htmlStringToMarquee($htmlBody, $htmlTitle, $_POST["speed"]);
} else if ($_POST["display"] == "st" && $_POST["format"] == "htmlstring") {
    $htmlTitle = csvToHtmlTitleString($csv, $_POST["api"]);
    htmlStringToPage($htmlBody, $htmlTitle);
} else if ($_POST["display"] == "st" && $_POST["format"] == "htmltable") {
    htmlStringToPage($htmlBody, "Table");
} else if ($_POST["format"] == "ssmlstring") {
    // TODO This should become an output processor
    echo ($htmlBody);
} else {
    die("Not implemented or bad combination!");
}


?>
