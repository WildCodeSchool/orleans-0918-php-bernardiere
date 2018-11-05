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
        return $this->pdo->query('
        SELECT product.*, category.title as category_title, mb.name_month month_begin, me.name_month month_end FROM ' . $this->table . ' 
            JOIN category ON category.id = product.category_id 
            JOIN month mb ON mb.id = product.product_begin 
            JOIN month me ON me.id = product.product_end  
        ORDER BY product.name ASC', \PDO::FETCH_ASSOC)->fetchAll();
    }

}
