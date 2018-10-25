<?php
/**
 * Created by PhpStorm.

 * User: wilder4
 * Date: 23/10/18
 * Time: 19:07
10

 */

namespace Model;

class AdminManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'product';

    /**
     * ItemManager constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE,$pdo);
    }

    /**
     * @param \Model\Product $product
     * @return int
     */
    public function insert(Product $product): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`) VALUES (:name)");
        $statement->bindValue('name', $product->getName(), \PDO::PARAM_STR);
        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }


    /**
     * @param Item $item
     * @return int
     */
    public function update(Item $item):int
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $item->getId(), \PDO::PARAM_INT);
        $statement->bindValue('title', $item->getTitle(), \PDO::PARAM_STR);


        return $statement->execute();
    }
}
