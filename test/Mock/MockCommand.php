<?php declare(strict_types=1);

namespace App\Test\Mock;

use Telegram\Bot\Commands\Command;

class MockCommand extends Command
{
    public function __construct()
    {
    }

    protected $name = 'command';
    protected $description = 'a mock command';

    public function handle($args)
    {
        return 'command handle';
    }
}
