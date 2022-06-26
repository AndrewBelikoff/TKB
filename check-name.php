<?php
require_once('engine/sql.php');

$title = "вопросы";
require_once('head.php');
require_once('getquestion.php');
require_once('getfreq.php');

if (isset($_POST['name'])) {
    $name = $_POST['name'];

    $sql = "SELECT 1 FROM users WHERE name=?";
    $user = q1($sql, [$name]);
    if (!$user) {
        // регистрация и администрирование не входила в задание
        $sql = "INSERT INTO users (`name`,`email`,`password`) VALUES (?,?,?)";
        qi($sql, [$name, 'test1@tkbbank.ru', md5('123')]);

    }

    $sql = "SELECT * FROM users WHERE name=?";
    $user = q1($sql, [$name]);
} else {
    $sql = "SELECT * FROM users WHERE id=?";
    $user = q1($sql, [$_GET['id']]);
}

echo "Опросник. Отвечайте любое количество раз, каждый ответ будет записан в бд. Для завершения нажмите кнопку внизу страницы.<br>";

$sql = "SELECT * FROM questions";
$questions = q($sql, []);
foreach ($questions as $question) {
    echo('<h1>' . $question['title'] . '</h1><br>');
    echo('<h3>' . $question['question'] . '</h3><br>');

    getFreq($user, $question);
    getQuestion($user['id'], $question);

}

echo '<br>
    <form action="finish.php" method="POST">
    <input type="submit" value="Прекратить отвечать" />
    <input type="hidden" name="user" value="' . $user['id'] . '" />
</form>

<script src="js/script.js"></script>';
