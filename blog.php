<?php
 $blog = $_POST;
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

foreach($blog as $key => $value) {
    echo '<pre>';
    echo $key . ':' . h($value);
    echo '</pre>';
}

?>