<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Tour Top 100 - Radio 1</title>

    <!-- JS -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/script.js"></script>

    <!-- CSS -->
    <link href="style/style.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="wrap clearfix">
        <div class="subnav">
            <ul>
                <li>nieuwsbrief</li>
                <li>mobiel</li>
                <li>meld een fout</li>
                <li>frequenties</li>
                <li>help</li>
                <li>rss</li>
            </ul>
        </div>
        <h1 class="logo">
            <a href="?page=home&day=<?php echo $currentDay; ?>"></a>
        </h1>

        <div class="subTitle"><img src="img/tourtop100.png"></div>

        <ul class="nav">
            <li class="radio"><a href="?page=home">Radio1.NL</a></li>
            <li class="tour"><a href="?page=tour100">Tour Top 100</a></li>
            <li class="search">
                <form id="searchform" method="post" action="?page=search">
                    <input type="text" name="srchtxt" id="srchtxt" class="srchtxt" placeholder="zoek binnen Radio 1">
                    <input type="submit" name="submit" class="search_btn">
                </form>
            </li>
        </ul>
        <a href="http://www.npo.nl/radio"><img src="img/luisterlivemee.png" class="float"></a>

    </div>
</header>
<div class="container wrap clearfix">
    <div class="calender">
        <div class="calender_inner">
            <h3>JULI</h3>

            <?php

            //haal de menu items op. Zorg ervoor dat je niet verder kunt klikken dan de huidige dag. Alle voorgaande dagen krijgen een andere kleur

            for ($i = 2; $i <= 24; $i++) {
                if ($currentDay == $i) {
                    echo '<a href="?page=home&day=' . $i . '"><input class="pagenation_current pageBtn active" type="button" value="' . $i . '"></a>';
                } else if ($currentDay > $i) {
                    echo '<a href="?page=home&day=' . $i . '"><input class="pagenation_current pageBtn finished" type="button" value="' . $i . '"></a>';
                } else {
                    echo '<a href="#" onclick="dayAlert(' . $i . ');"><input class="pagenation_current pageBtn" type="button" value="' . $i . '"></a>';
                }
            }
            ?>

        </div>
    </div>
