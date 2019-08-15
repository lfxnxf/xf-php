<?php

include "../vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$host = '47.92.245.105';
$port = 5672;
$userName = "guest";
$pass = "guest";
$connection = new AMQPStreamConnection($host, $port, $userName, $pass);
$channel = $connection->channel();

$queue = 'test_list';

$channel->queue_declare($queue, false, false, false, false, false);

$text = date('Y-m-d H:i:s', time()) . 'Hello World';

$msg = new AMQPMessage($text);
$channel->basic_publish($msg, $queue);
echo "[x]sent{" . $text . "}\n";
$channel->close();
$connection->close();