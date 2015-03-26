<?php

namespace Fervo\Composer\HerokuDb;

use Composer\Script\Event;

class RedisToGo
{
    public static function populateEnvironment(Event $event)
    {
        $url = getenv("REDISTOGO_URL");

        if ($url) {
            $data = parse_url($url);

            putenv("REDIS_HOST={$data['host']}");
            putenv("REDIS_PORT={$data['port']}");
            putenv("REDIS_AUTH={$data['pass']}");
        }

        $io = $event->getIO();

        $io->write("REDISTOGO_URL=".getenv("REDISTOGO_URL"));
    }
}
