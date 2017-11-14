<?php

namespace BotBot\Command;

use BotBot\Service\PictureService;
use Telegram\Bot\Commands\Command;

class PictureCommand extends Command
{
	/**
	 * @var string Command Name
	 */
	protected $name = 'picture';

	/**
	 * @var string Command Description
	 */
	protected $description = 'Генерирует рандомную картинку';

	public function handle($arguments)
	{
		$pictureService = new PictureService();
		$this->replyWithPhoto([
			'photo'   => $pictureService->getPicture(),
			'caption' => 'Это картинка'
		]);
	}
}
