<?php

$subject = 'Заказ с сайта клея(d4)';

$name = $_POST['name'];
$tel = $_POST['tel'];
$comment = $_POST['comment'];
$cart = $_POST['cartData'];
$total = $_POST['total'];

$message = "Имя заказчика: $name\nТелефон: $tel\nСообщение: $comment\nЗаказ:\n$cart\nСумма заказа: $total грн";

file_put_contents('orders.txt', "$message\n", FILE_APPEND | LOCK_EX);

mail('gagarinbrood@gmail.com', $subject, $message);

?>
