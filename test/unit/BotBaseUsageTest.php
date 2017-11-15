<?php declare(strict_types=1);

namespace App\Test;

use App\Test\unit\BotTestCase;
use BotBot\Command\GifCommand;
use BotBot\Command\PictureCommand;
use BotBot\Command\QuoteCommand;
use BotBot\Command\StartCommand;
use Telegram\Bot\Api;

class BotBaseUsageTest extends BotTestCase
{
    public function testCanCreateInstance()
    {
        $this->assertInstanceOf(Api::class, $this->api);
        $this->assertSame(getenv('TELEGRAM_BOT_TOKEN'), $this->api->getAccessToken());
    }

    public function testCanRegisterMultiplyCommand()
    {
        $commands = $this->api->getCommands();
        $this->assertInstanceOf(PictureCommand::class, $commands['picture']);
        $this->assertInstanceOf(QuoteCommand::class, $commands['quote']);
        $this->assertInstanceOf(StartCommand::class, $commands['start']);
        $this->assertInstanceOf(GifCommand::class, $commands['gif']);
    }

    public function testShouldRemoveCommandFromBus()
    {
        $this->api->removeCommand('picture');
        $this->api->removeCommand('quote');
        $this->api->removeCommand('start');
        $this->api->removeCommand('gif');
        $this->api->removeCommand('help');
        $this->assertCount(0, $this->api->getCommands());
    }

    public function testShouldREmoveMultiplyCommandsFromBus()
    {
        $this->api->removeCommands([
            'picture',
            'quote',
            'start',
            'gif',
            'help',
        ]);

        $this->assertCount(0, $this->api->getCommands());
    }

    /**
     * @expectedException \TypeError
     * @dataProvider WrongCommandsTypeProvider
     */
    public function testShouldThrowExceptionIfIncorrectTypeCommandsGiven($commands)
    {
        $this->api->addCommands($commands);
    }

    public function WrongCommandsTypeProvider()
    {
        return [
            [new \stdClass()],
            [123],
            [false],
            [Api::class],
        ];
    }

    /**
     * @expectedException \Telegram\Bot\Exceptions\TelegramSDKException
     */
    public function testShouldThrowExceptionIfCommandsDoesNotExist()
    {
        $this->api->addCommand(DoesNotExistCommandName::class);
    }
}
