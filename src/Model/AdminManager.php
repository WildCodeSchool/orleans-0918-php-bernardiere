<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 19/10/18
 * Time: 11:10
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


}

