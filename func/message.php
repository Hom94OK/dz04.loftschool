<?php
function message($message, $status = 'warning', $btn = null)
{
    $result = '<h3 class="text-center ';
    if ($status == 'success') {
        $result .= 'alert-success">' . $message . '</h3>';
        if ($btn) {
            $result .= '<a class="btn btn-block btn-success" type="button" href="/index.php">Продовжити</a>';
        }
        echo $result;
        return '';
    } elseif ($status == 'warning') {
        $result .= 'alert-warning';
//		echo '<button class="btn btn-block btn-warning" type="button" id="popup-btn-warning">Продовжити</button>';
    };
    $result .= '">' . $message . '</h3>';
    echo $result;
    return '';
}
