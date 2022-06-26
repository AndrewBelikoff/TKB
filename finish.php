<?php
require_once('engine/sql.php');

$title = "статистика";
require_once('head.php');

$sql = "SELECT * FROM users WHERE id=?";
$user = q1($sql, [$_POST['user']]);

echo '<h1>Результаты по опроса пользователя ' . $user['name'] . '</h1><br>';

$sql = "SELECT COUNT(question_id) FROM answers WHERE user_id=?";
$cnt = q1($sql, [$user['id']])["COUNT(question_id)"];
$word = ' вопросов';
if ($cnt == 1) {
    $word = ' вопрос';
}
if ($cnt > 1 && $cnt < 5) {
    $word = ' вопроса';
}
echo 'были получены ответы на ' . $cnt . $word . '<br><br>';

echo 'первый раз были даны ответы: <br>';
$sql = "SELECT  id, question_id, answer FROM answers WHERE user_id=?";
$answers = q($sql, [$user['id']]);
//var_dump($answers);

$first_answer = [];
$last_answer = [];
foreach ($answers as $answer) {
    if (!isset($first_answer[$answer['question_id']])) $first_answer[$answer['question_id']] = $answer['id'];
    if (!isset($last_answer_answer[$answer['question_id']])) $last_answer[$answer['question_id']] = $answer['id'];

//    echo($answer['question_id'] . ' ' . $answer['id'] . '<br>');
}

echo '<br>';
drawIt($first_answer);

echo '<br>окончательные ответы: <br>';
drawIt($last_answer);


function drawIt($arr)
{
    foreach ($arr as $q_id =>$value) {
        $sql = "SELECT question FROM questions WHERE id=?";
        $question = q1($sql, [$q_id]);
        echo 'на вопрос: ' . $question['question'] . ' - ';
        $sql = "SELECT  id, question_id, answer FROM answers WHERE id=?";
        $answers = q1($sql, [$value]);
        $answer_arr = explode(', ', $answers['answer']);
        $div = '';
        foreach ($answer_arr as $key => $value) {
            $sql = "SELECT `option` FROM options WHERE id=?";
            $options = q1($sql, [$value]);
            $div .= ($options['option'] . ', ');
        }
        $div = mb_substr($div, 0, -2);
        echo $div . '<br>';
    }
}








