<?php

namespace App\Packages\Command;

use App\Packages\Message\Send;
use Illuminate\Console\Command;

class SendMessage extends Command
{
    protected $description = 'Publishing messages with RabbitMQ';
    protected $signature = 'message:publish';

    public function handle(): void
    {
        $connection = Send::connect();
        Send::publishBasicMessage($connection);
    }
}
