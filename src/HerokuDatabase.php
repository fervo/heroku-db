<?php

namespace Fervo\Composer\HerokuDb;

use Composer\Script\Event;
use Icecave\Lace\DatabaseDsnParser;

class HerokuDatabase
{
    public static function populateEnvironment(Event $event)
    {
        $parser = new DatabaseDsnParser;

        $url = getenv("DATABASE_URL");

        if ($url) {
            $options = $parser->parse($url);

            putenv("DATABASE_DRIVER={$options['driver']}");
            putenv("DATABASE_HOST={$options['host']}");
            putenv("DATABASE_USER={$options['user']}");
            putenv("DATABASE_PASSWORD={$options['password']}");
            putenv("DATABASE_PORT={$options['port']}");
            putenv("DATABASE_NAME={$options['dbname']}");
        }

        $io = $event->getIO();

        $io->write("DATABASE_URL=".getenv("DATABASE_URL"));
    }
}
