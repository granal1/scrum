<?php

namespace app\db;

use PDO;

class Db
{
    public static $db = null;

    public static function getDb()
    {
        if (is_null(self::$db)) {
            self::$db = new PDO('sqlite:../db/database.db', null, null, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
        return self::$db;
    }
}
