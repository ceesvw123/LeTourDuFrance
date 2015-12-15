<?php
if (isset($_POST['submitForm'])) {
    //verzamel alle gegevens en stop het in de database

    $data[0] = $chart;
    $data[1] = addslashes($_POST['name']);
    $data[2] = addslashes($_POST['email']);
    $data[3] = addslashes($_POST['website']);
    $data[4] = addslashes($_POST['message']);
    $data[5] = isset($_POST['mailMe']) ? $_POST['mailMe'] : 0;

    if($_POST['name'] == "" || $_POST['email'] == "" || $_POST['website'] == "" || $_POST['message'] == ""){
        echo '<div class="alert">U heeft niet alles ingevuld.</div>';
    }else{
        $resultOutput = $newDatabase->insertComments($data, $mysqli);
        if ($resultOutput) {
            echo '<div class="good">U antwoord is verzonden.</div>';
        }
    }

}

//extra beveiliging zodat je niet vooruit kunt kijken d.m.v. de url

switch ($chart) {
    case $chart > 100:
        echo '<meta http-equiv="Refresh" content="0;URL=?page=detail&chart=100">';
        die;
        break;
    case 1:
        echo '<div class="songMenu"></div>';
        break;
}

//haal de nummers op voor de OneSong
while ($oneSong = $resultDetailSongs->fetch_assoc()) {
    echo '<div class="songMenu"><span class="rank">' . $oneSong['number'] . '</span><h3 class="song_tit"><a href="?page=detail&chart=' . $oneSong['number'] . '">' . $oneSong['artist'] . ' - ' . $oneSong['title'] . '</a></h3></div>';
}