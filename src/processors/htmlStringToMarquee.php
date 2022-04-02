<?php

function htmlStringToMarquee($html, $title, $scroll_speed) {
    echo('
    <!DOCTYPE html>
    <html>
        <head>
            <title>Laufschrift-Beispiel</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
            <meta charset="utf-8"/>
            <style>
            h1, p, marquee {
                font-family: sans-serif;
            }
            </style>
        </head>
        <body>' .

        . '<marquee behavior="scroll" scrollamount="' . $scroll_speed . '" bgcolor="#000088" style="color: #FFFFFF;">' .
            $html
            . '</marquee>
        </body>
        </html>');
}

?>
