<?php

namespace Model;

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
        return $this->pdo->query('SELECT product.*, category.title as category_title FROM ' . $this->table . ' JOIN  category  ON  category.id = product.category_id  ORDER BY  product.category_id  ASC', \PDO::FETCH_ASSOC)->fetchAll();
    }

}
