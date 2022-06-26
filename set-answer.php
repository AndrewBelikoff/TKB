<?php
require_once('engine/sql.php');

$user_id = $_POST['user_id'];
$question_id = $_POST['question_id'];
$answer = '';
foreach ($_POST['q' . $question_id] as $key => $value) {
    $answer .= $value . ', ';
}
$answer= mb_substr($answer, 0, -2);

$sql = "INSERT INTO answers (`user_id`,`question_id`,`answer`) VALUES (?,?,?)";
qi($sql, [$user_id, $question_id, $answer]);

header('location:check-name.php?id='.$user_id);
