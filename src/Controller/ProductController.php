<?php

namespace Controller;

use Model\ProductManager;

/**
 * Class ProductController
 *
 */
class ProductController extends AbstractController
{
    /**
     * Display product informations specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function show()
    {
        $productManager = new ProductManager($this->getPdo());
        $products = $productManager->showByCategory();

        $categories = array_column($products, 'category_title');
        $categories = array_unique($categories);

        return $this->twig->render('ourproducts.html.twig',
            [
                'categories' => $categories,
                'products'=> $products
            ]);
    }
}
