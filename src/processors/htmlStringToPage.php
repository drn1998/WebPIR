<?php

function htmlStringToPage($html, $title) {
    echo('
    <!DOCTYPE html>
    <html>
        <head>
            <title>Request as static (print!) HTML page</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
            <meta charset="utf-8"/>
            <style>
            p, td {
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
