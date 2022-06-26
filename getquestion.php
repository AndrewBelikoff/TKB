<?php

function getQuestion($user_id, $question)
{

    $sql = "SELECT * FROM options WHERE question_id=?";
    $options = q($sql, [$question['id']]);
    echo '<form id="form_id' . $question['id'] . '" action="set-answer.php" method="post">';
    if ($question['select_type'] === 'single') {
        foreach ($options as $option) {
            echo '<input class="radio" type="radio" name="q' . $question['id'] . '[]" value="' . $option['id'] . '"> ' . $option['option'] . '<Br>';
        }
    } else {
        foreach ($options as $option) {
            echo '<input type="checkbox" name="q' . $question['id'] . '[]" value="' . $option['id'] . '"> ' . $option['option'] . '<Br>';
        }
        echo '<input type="submit" value="Отправить">';
    }

    echo '
    <input type="hidden" name="user_id" value="' . $user_id . '">
    <input type="hidden" name="question_id" value="' . $question['id'] . '">
    </form>';
}
