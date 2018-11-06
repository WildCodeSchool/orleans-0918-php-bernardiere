<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 24/10/18
 * Time: 12:19
 */

namespace Model;

class CategoryManager extends AbstractManager
{
    const TABLE = 'category';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function selectOneById(int $categoryId)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $categoryId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
