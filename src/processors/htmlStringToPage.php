<?php

function htmlStringToPage($html, $title) {
    echo('
    <!DOCTYPE html>
    <html>
        <head>
            <title>Laufschrift-Beispiel</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
            <meta charset="utf-8"/>
            <style>
            p {
                font-family: sans-serif;
                font-size: smaller;
            }
            </style>
        </head>
        <body><p>' .
        $title
        . '</p><p>' .
            $html
            . '</p>
        </body>
        </html>');
}

?>
