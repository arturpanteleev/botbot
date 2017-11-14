<?php

namespace BotBot\Command;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
	/**
	 * @var string Command Name
	 */
	protected $name = 'start';

	/**
	 * @var string Command Description
	 */
	protected $description = 'Начать работу с ботом';

	public function handle($arguments)
	{
		$keyboard = [
			['/picture'],
			['/gif'],
			['/quote']
		];

		$reply = 'Добро пожаловать в бота!';
		$reply_markup = $this->telegram->replyKeyboardMarkup([
			'keyboard'          => $keyboard,
			'resize_keyboard'   => true,
			'one_time_keyboard' => false
		]);
		$this->replyWithMessage([
			'text'         => $reply,
			'reply_markup' => $reply_markup
		]);
	}
}