<?php

namespace BotBot\Command;

use Telegram\Bot\Commands\Command;

class QuoteCommand extends Command {
	/**
	 * @var string Command Name
	 */
	protected $name = 'quote';

	/**
	 * @var string Command Description
	 */
	protected $description = 'Выдает цитату';

	public function handle($arguments)
	{
		$this->replyWithMessage([
			'text'    =>
				file_get_contents('https://api.forismatic.com/api/1.0/?method=getQuote&format=text')
		]);
	}
}