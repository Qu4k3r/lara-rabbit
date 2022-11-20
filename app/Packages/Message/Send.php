<?php

namespace App\Packages\Message;

use PhpAmqpLib\Channel\AbstractChannel;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Send
{
    public static function connect(string $host = 'localhost', int $port = 15672, string $user = 'guest', string $password = 'guest'): AMQPStreamConnection
    {
        return new AMQPStreamConnection($host, $port, $user, $password);
    }

    public static function publishBasicMessage(
        AMQPStreamConnection $connection,
        string $queueName = 'hello',
        string $message = 'Hello World!',
        string $exchangeName = '',
        string $routingKeyName = 'hello'
    ): void
    {
        $channel  = $connection->channel();
        $channel->queue_declare($queueName, false, false, false, false);

        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, $exchangeName, $routingKeyName);

        echo "[x] Sent $message ! \n";

        $channel->close();
        $connection->close();
    }
}
