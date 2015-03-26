<?php

namespace Fervo\Composer\HerokuDb;

use Composer\Script\Event;
use Icecave\Lace\DatabaseDsnParser;

class RedisToGo
{
    public static function populateEnvironment(Event $event)
    {
        $parser = new DatabaseDsnParser;

        $url = getenv("REDISTOGO_URL");

        if ($url) {
            $options = $parser->parse($url);

            putenv("REDIS_HOST={$options['host']}");
            putenv("REDIS_PORT={$options['port']}");
            putenv("REDIS_AUTH={$options['user']}:{$options['password']}");
        }

        $io = $event->getIO();

        $io->write("REDISTOGO_URL=".getenv("REDISTOGO_URL"));
    }
}
