<?php
session_start();

require_once 'config/config.php';
require_once 'libs/database.php';

require_once 'models/Database.Class.php';

include 'models/functions.php';
include 'views/header.php';

$page = isset($_GET['page']) ? $_GET['page'] : '';
$newDatabase = new Database();

switch($page){
    case 'detail':
        break;
    case 'bners':
        break;
    case 'questions':
        break;
    case 'top100':
        break;
    case 'home':
    default:
        $result = $newDatabase->get("articles", $mysqli);
        include 'views/home.php';
        break;
}
include 'views/footer.php';