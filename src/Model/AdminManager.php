<?php
/**
 * Created by PhpStorm.

 * User: wilder4
<<<<<<< HEAD
 * Date: 26/10/18
 * Time: 09:38
=======
 * Date: 23/10/18
 * Time: 19:07
10

>>>>>>> 082c8d4f1d1558794930023f72dfb55019a22aa8
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

<<<<<<< HEAD
    public function insert(Product $product): int
    {
        // prepared request
        $statement = $this->pdo->prepare('INSERT INTO ' . $this->table . ' 
            (`category_id`,`name`,`product_begin`,`product_end`,`image`,`description_produit`) 
            VALUES (:category_id,:name_product,:product_begin,:product_end,:image,:description_produit) ');
        $statement->bindValue('name_product', $product->getName(), \PDO::PARAM_STR);
        $statement->bindValue('product_begin', $product->getProductBegin(), \PDO::PARAM_INT);
        $statement->bindValue('product_end', $product->getProductEnd(), \PDO::PARAM_INT);
        $statement->bindValue('image', $product->getImage(), \PDO::PARAM_STR);
        $statement->bindValue('description_produit', $product->getDescriptionProduct(), \PDO::PARAM_STR);
        $statement->bindValue('category_id', $product->getCategoryId(), \PDO::PARAM_INT);


=======
    /**
     * @param \Model\Product $product
     * @return int
     */
    public function insert(Product $product): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`) VALUES (:name)");
        $statement->bindValue('name', $product->getName(), \PDO::PARAM_STR);
>>>>>>> 082c8d4f1d1558794930023f72dfb55019a22aa8
        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }
}

<<<<<<< HEAD
=======
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
>>>>>>> 082c8d4f1d1558794930023f72dfb55019a22aa8
