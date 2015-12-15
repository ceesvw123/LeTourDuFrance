<?php
session_start();
require_once 'config/config.php';
require_once 'libs/database.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$chart = isset($_GET['chart']) ? $_GET['chart'] : '';
$day = isset($_GET['day']) ? $_GET['day'] : $currentDay;

require_once 'models/Database.Class.php';
require_once 'views/header.php';

$newDatabase = new Database();

//$newDatabase->insertTextRandom($mysqli);

switch($page){
    case 'detail':
        $result = $newDatabase->getChart("hitlist", $chart, $mysqli);
        $resultComment = $newDatabase->getComments($chart, $mysqli);
        $resultDetailSongs = $newDatabase->getDetailSongs("hitlist", $chart, $mysqli);
        include 'views/detail.php';
        break;
    case 'bners':
        $result = $newDatabase->get("bners", $mysqli);
        include 'views/bners.php';
        break;
    case 'question':
        $result = $newDatabase->get("hitlist", $mysqli);
        include 'views/question.php';
        break;
    case 'tour100':
        $result = $newDatabase->getList("hitlist", $mysqli);
        include 'views/tour100.php';
        break;
    case 'search':
        include 'views/search.php';
        break;
    case 'home':
    default:
        $result = $newDatabase->getLimit("hitlist", $day, $currentDay, $mysqli);
        include 'views/home.php';
        break;
}
include 'views/footer.php';

