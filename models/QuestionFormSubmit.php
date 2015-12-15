<?php
if (isset($_POST['submitForm'])) {
    //verzamel alle gegevens en stop het in de database

    $data[0] = $chart;
    $data[1] = addslashes($_POST['name']);
    $data[2] = addslashes($_POST['email']);
    $data[3] = addslashes($_POST['answer']);
    $data[4] = isset($_POST['mailMe']) ? $_POST['mailMe'] : 0;

    if($_POST['name'] == "" || $_POST['email'] == "" || $_POST['answer'] == ""){
        echo '<div class="alert">U heeft niet alles ingevuld.</div>';
    }else{
        $resultOutput = $newDatabase->insertQuestion($data, $mysqli);
        if ($resultOutput) {
            echo '<div class="good">U antwoord is verzonden.</div>';
        }
    }
}