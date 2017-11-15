<?php declare(strict_types=1);

namespace App\Test\Mock;

use Telegram\Bot\Commands\Command;

class MockCommandTwo extends Command
{
    public function __construct()
    {
    }

    protected $name = 'mycommand';
    protected $description = 'another mock command';

    public function handle($args)
    {
        return 'mycommand handled';
    }
}
