<?php

function getFreq($user, $question)
{
    //проверка, отвечал ли пользователь на этот вопрос
    $sql = "SELECT * FROM answers WHERE question_id=? AND user_id=?";
    $answers = q1($sql, [$question['id'], $user['id']]);
    if (!$answers) {
        return;
    }

    // статистика по ответам на вопрос
    $sql = "SELECT * FROM answers WHERE question_id=?";
    $answers = q($sql, [$question['id']]);
    $freq = [];
    foreach ($answers as $answer) {
        $answer_ids = explode(', ', ($answer['answer']));
        foreach ($answer_ids as $answer_id) {
            if (!isset($freq[$answer_id])) $freq[$answer_id] = 0;
            $freq[$answer_id]++;
        }
    }

    if (count($freq) && max($freq) !== 0) {
        $div = '<p class="answered">Пользователь ' . $user['name'] . ' уже отвечал на этот вопрос, поэтому ему доступна информация: чаще всего выбирают ответы: ';
        foreach ($freq as $key => $value) {
            if ($value === max($freq)) {
                $max_id = $key;
                $sql = "SELECT * FROM options WHERE question_id=? AND id=?";
                $options = q($sql, [$question['id'], $max_id]);
                $div .= ($options[0]['option'] . ', ');
            }
        }
        $div = mb_substr($div, 0, -2);
        echo($div . '</p>');
    }


}
