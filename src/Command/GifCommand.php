<?php declare(strict_types=1);

namespace BotBot\Command;

use Telegram\Bot\Commands\Command;

class GifCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'gif';

    /**
     * @var string Command Description
     */
    protected $description = 'Генерирует рандомную гифку';

    public function handle($arguments)
    {
        $gif = json_decode(file_get_contents('https://api.giphy.com/v1/gifs/random?api_key=dc6zaTOxFJmzC'));

        $this->replyWithDocument([
            'document' => $gif->data->image_original_url,
        ]);
    }
}
