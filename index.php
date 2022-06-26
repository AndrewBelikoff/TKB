<?php
require_once('engine/sql.php');

$title = "Главная страница";
require_once('head.php');

if (isset($_GET['name']) && $_GET['name'] !== ''){
    $placeholder = 'Это имя занято';
} else {
    $placeholder = 'Введите имя';
}

echo '<h1>Опросник</h1><br>
<form id = "setname" action="check-name.php" method="post">
<input
type="text"
name="name"
placeholder="'.$placeholder.'">

</form>';



