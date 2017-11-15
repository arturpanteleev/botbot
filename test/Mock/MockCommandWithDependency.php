<?php declare(strict_types=1);

namespace App\Test\Mock;

use Telegram\Bot\Commands\Command;

class MockCommandWithDependency extends Command
{
    /**
     * @var \stdClass
     */
    protected $std;

    public function __construct(\stdClass $stdClass)
    {
        $this->std = $stdClass;
    }

    protected $name = 'mycommand';
    protected $description = 'a mock command';

    public function handle($args)
    {
        return 'mycommand handled';
    }
}
