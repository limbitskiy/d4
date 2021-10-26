<?php

$mailTo = 'target@himpost.com, sale@himpost.com, ostraukhova@gmail.com';

$subject = 'Заказ с сайта клея(d4.himpost.com)';

$headers = 'Content-type: text/html; charset="utf-8"';
$name = $_POST['name'];
$tel = $_POST['tel'];
$comment = $_POST['comment'];
$cart = $_POST['cartData'];
$total = $_POST['total'];


$message = "Имя заказчика: $name\nТелефон: $tel\nСообщение: $comment\nЗаказ:\n$cart\nСумма заказа: $total грн";

file_put_contents('orders.txt', "$message\n---\n", FILE_APPEND | LOCK_EX);

mail($mailTo, $subject, $message, $headers);

?>
