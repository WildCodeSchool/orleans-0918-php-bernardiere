<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 24/10/18
 * Time: 12:18
 */

namespace Model;

class MonthManager extends AbstractManager
{
    const TABLE = 'month';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }
}
