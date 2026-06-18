<?php
require_once __DIR__ . "/cfg.php";
require_once __DIR__ . "/common.php";

$_name = e($config["name"]);
$_desc = e($config["description"]);
$_style = e($config["css"]);
$_icon = e($config["favicon"]);

#url params

$id = $_GET["i"];
$currentBoard = boardinfo($id, $boards);

if (!$id or !$currentBoard) {
    http_response_code(404);
    die("<h1>404 Board Not Found</h1><p>The requested board does not exist.</p>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>/<?=e($currentBoard["code"])?>/ - <?=e($currentBoard["title"])?> - <?=$_name?></title>
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

<h1>/<?=e($currentBoard["code"])?>/ - <?=e($currentBoard["title"])?></h1>

<div id="form-container" class="form-init">
    <h2>[<a href="#" id="open-form">New Thread</a>]</h2>
</div>

<hr>
<script src="./board.js"></script>
</body>
</html>

