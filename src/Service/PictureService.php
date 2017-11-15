<?php declare(strict_types=1);

namespace BotBot\Service;

class PictureService
{
    private $apiUrl = 'http://lorempixel.com/g/500/500/';

    public function getPicture()
    {
        return $this->apiUrl;
    }
}
