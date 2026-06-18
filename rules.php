<?php
require_once __DIR__ . "/cfg.php";
require_once __DIR__ . "/common.php";

$_name = e($config["name"]);
$_desc = e($config["description"]);
$_style = e($config["css"]);
$_icon = e($config["favicon"])
#body


?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Rules - <?=$_name?></title>
        <meta charset="UTF-8"/>
        <meta name="description" content="<?=$_desc?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'">
        <meta name="referrer" content="no-referrer">

        <link rel="stylesheet" href="<?=$_style?>"/>
        <link rel="icon" type="image/png" href="<?=$_icon?>"/>
</head>
<body>
<?= renderTopbar($index["topbar"])?>

<h1><?=$_name?></h1>
<hr/>
<?= renderBoxes($rules["boxes"]);?>
<hr>
<p class="text-footer">
<?=e($index["footer"]);?>
</p>
<hr>
</body>
</html>

