<?php

namespace App\Packages\Command;

use App\Packages\Message\Receive;
use App\Packages\Message\Send;
use Illuminate\Console\Command;

class MessageConsumer extends Command
{
    protected $description = 'Up message consumer';
    protected $signature = 'message:up:consumer';

    public function handle(): void
    {
        $receiver = new Receive;
        $receiver->upConsumer();
    }
}
