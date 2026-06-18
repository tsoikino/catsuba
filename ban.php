<?php
#TODO
require_once __DIR__ . "/cfg.php";
require_once __DIR__ . "/data.php";

$ip = $_SERVER['REMOTE_ADDR'];

$banned = null;
?>
<!DOCTYPE html>
<head>
    <title><?= $banned ? true : "You are banned!"; ?></title>
</head>