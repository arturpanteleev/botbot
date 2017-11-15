<?php declare(strict_types=1);

namespace App\Test\unit;

use BotBot\Command\GifCommand;
use BotBot\Command\PictureCommand;
use BotBot\Command\QuoteCommand;
use BotBot\Command\StartCommand;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Commands\HelpCommand;

class BotTestCase extends TestCase
{
    /** @var  Api */
    protected $api;
    /** @var  Command[] */
    protected $commands;

    public function setUp()
    {
        $env = new Dotenv(__DIR__.'/../','.test_enviroment');
        $env->load();
        $this->api = new Api();

        $this->commands = [
            HelpCommand::class,
            PictureCommand::class,
            GifCommand::class,
            QuoteCommand::class,
            StartCommand::class,
        ];

        if (empty(getenv("TELEGRAM_BOT_TOKEN"))) {
            $this->markTestSkipped('all tests in this file will be invactive for this server configuration! until u dont provider access key');
        }

        $this->api->addCommands($this->commands);
    }
}
