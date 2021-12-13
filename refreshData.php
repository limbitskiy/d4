<?php

$payload = file_get_contents('php://input');
file_put_contents('products.json', $payload);

// $message = json_decode($payload, true);


// $jsonString = file_get_contents('test.json');
// $data = json_decode($jsonString, true);

// $newJsonString = json_encode($data);




// $utf_message = mb_convert_encoding($message, 'UTF-8', mb_detect_encoding($message, 'ASCII', true));

// $file = 'test.json';

// file_put_contents($file, $message[0]['name'], LOCK_EX);

?>
