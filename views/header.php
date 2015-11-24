<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Tour Top 100 - Radio 1</title>

    <!-- JS -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/script.js"></script>

    <!-- CSS -->
    <link href="style/main.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <div id="header">
            <ul>
                <li>nieuwsbrief</li>
                <li>mobiel</li>
                <li>contact</li>
                <li>meld frecuenties</li>
                <li>help</li>
                <li>rss</li>
            </ul>
    </div>
    <!--<div id="radio">
        <ul>
            <li>RADIO.NL</li>
            <li>TOUR TOP 100</li>
            <li><input type="text" ></li>
        </ul>
    </div>
    <div id="listen">
        <ul>
            <li>LUISTER LIVE PRAAT MEE</li>
        </ul>
    </div>-->
    <div id="menu" style="padding-top: 234px;">
        <ul>
            <li>JULI</li>
        <?php
        $currentDay = date("j");
            for($i = 2; $i < 25; $i++) {
                if ($currentDay == $i) {
                    echo '<li class="active"><a href="?p=datums&dag=' . $i . '" title="Dag ' . $i . '">' . $i . '</a></li> ';
                } else {
                    echo '<li><a href="?p=datums&dag=' . $i . '" title="Dag ' . $i . '">' . $i . '</a></li> ';
                }
            }
        ?>
        </ul>
    </div>
