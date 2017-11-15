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
    protected $config;

    public function setUp()
    {
        $env = new Dotenv(__DIR__.'/../../');
        $env->load();
        $this->api = new Api();

        $this->commands = [
            HelpCommand::class,
            PictureCommand::class,
            GifCommand::class,
            QuoteCommand::class,
            StartCommand::class,
        ];

        $this->config = [
            'token' => 'test' ?? getenv('TELEGRAM_BOT_TOKEN'),
        ];

        $this->api->addCommands($this->commands);
    }
}
