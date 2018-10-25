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
        $productsByCategories = $productManager->showByCategory();

        foreach ($productsByCategories as $productByCategory){
            $category = $productByCategory['category_title'];
            $categoriesWithProducts[$category][] = $productByCategory;
        }
        return $this->twig->render('ourProducts.html.twig',
            [
                'categoriesWithProducts'=>$categoriesWithProducts,
            ]);
    }


}

