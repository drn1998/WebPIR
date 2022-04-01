 <?php

function htmlTableToMarqueeTable($html, $scroll_speed) {
    echo('
    <!DOCTYPE html>
    <html>
    <head>
    <title>Request as scrolling HTML table</title>
    <style>
    table {
    font-family: sans-serif;
    font-size: small;
    }
    tr:nth-child(even) {background: #CCC};
    tr:nth-child(odd) {background: #FFF};
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <marquee direction="up" style="position: fixed" height="100%" width="100%" scrollamount="' . $scroll_speed . '"><center><h1 style="color:red; font-family:sans-serif">Watch entirely and with covered webcam; avoid moving mouse or touching screen!</h1>
    ');
        
    echo($html);

    echo('
    <h1 style="color:green; font-family:sans-serif">End of table. If you decide to watch again, watch completely!</h1></center></marquee>
    </body>
    </html>
    ');
}

 ?>