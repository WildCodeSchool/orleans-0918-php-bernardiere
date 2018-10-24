<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 16/10/18
 * Time: 16:57
 */

namespace Controller;
use Model\ProductManager;


class AdminController extends AbstractController
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function adminIndex()
    {
        return $this->twig->render('index_admin.html.twig');
    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function listItem()
    {
        $productManager = new ProductManager($this->getPdo());
        $productsByCategories = $productManager->showByCategory();

        foreach ($productsByCategories as $productByCategory){
            $category = $productByCategory['category_title'];
            $categoriesWithProducts[$category][] = $productByCategory;
        }

        return $this->twig->render('listItem.html.twig',
            [
                'categoriesWithProducts'=>$categoriesWithProducts,
            ]);
    }

}