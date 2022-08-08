<?php

// $mailTo = 'target@himpost.com';

// $subject = 'Заказ с сайта клея(d4.himpost.com)';

// $headers = 'Content-Type: text/plain; charset=utf-8';
$feedback = $_POST['feedback'];
// $tel = $_POST['tel'];
// $comment = $_POST['comment'];
// $cart = $_POST['cartData'];
// $total = $_POST['total'];
$date = date('d/m/Y');
$time = date('H:i');

$message = "$feedback\nДата: $date\nВремя: $time";

// mail($mailTo, $subject, $message, $headers);

file_put_contents('feedback.txt', "$message\n---\n", FILE_APPEND | LOCK_EX);

?>
