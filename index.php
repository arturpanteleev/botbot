<?php declare(strict_types=1);

include 'vendor/autoload.php';
$env = new \Dotenv\Dotenv(__DIR__);
$env->load();
$telegram = new Telegram\Bot\Api();

$telegram->addCommands([
    Telegram\Bot\Commands\HelpCommand::class,
    BotBot\Command\PictureCommand::class,
    BotBot\Command\GifCommand::class,
    BotBot\Command\QuoteCommand::class,
    BotBot\Command\StartCommand::class,
]);

$telegram->commandsHandler(true);
