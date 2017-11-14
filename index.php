<?php
include('vendor/autoload.php');
include('config.php');

$telegram = new Telegram\Bot\Api($CONFIG['token']);

$telegram->addCommands([
	Telegram\Bot\Commands\HelpCommand::class,
	BotBot\Command\PictureCommand::class,
	BotBot\Command\GifCommand::class,
	BotBot\Command\QuoteCommand::class,
	BotBot\Command\StartCommand::class
]);

$telegram->commandsHandler(true);