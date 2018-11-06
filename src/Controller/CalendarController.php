<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 05/11/18
 * Time: 11:42
 */

namespace Controller;

use Model\ProductManager;
use Model\Product;

class CalendarController extends AbstractController
{
    public function show()
    {
        $productManager = new ProductManager($this->getPdo());
        $products = $productManager->showByCategory();

        return $this->twig->render('harvest_calendar.html.twig', [
            'products'=>$products,
        ]);
    }
}