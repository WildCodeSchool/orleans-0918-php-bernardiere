<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 17/10/18
 * Time: 15:09
 */

namespace Model;

class HomeManager extends AbstractManager
{
    const TABLE = 'product';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function selectRandomProduct(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table . ' 
        ORDER BY RAND() ' . ' LIMIT 3 ', \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }
}
