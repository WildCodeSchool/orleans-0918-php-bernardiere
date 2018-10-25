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
            JOIN months mb ON mb.id = product.product_begin 
            JOIN months me ON me.id = product.product_end  
        ORDER BY product.category_id ASC', \PDO::FETCH_ASSOC)->fetchAll();
    }
}
