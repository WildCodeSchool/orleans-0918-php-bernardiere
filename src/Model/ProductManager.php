<?php

namespace Model;
use Model\Product;

/**
 *
 */
class ProductManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'product';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function showByCategory() : array
    {
        return $this->pdo->query('
        SELECT product.*, category.title as category_title, mb.name_month month_begin, me.name_month month_end FROM ' . $this->table . ' 
            JOIN category ON category.id = product.category_id 
            JOIN month mb ON mb.id = product.product_begin 

            JOIN month me ON me.id = product.product_end  
        ORDER BY product.name ASC', \PDO::FETCH_ASSOC)->fetchAll();
    }

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
    public function update(Product $product):int
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $product->getId(), \PDO::PARAM_INT);
        $statement->bindValue('title', $product->getTitle(), \PDO::PARAM_STR);


        return $statement->execute();
    }

}
