<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 12/10/18
 * Time: 14:35
 */

namespace Controller;

use Model\HomeManager;

class HomeController extends AbstractController
{
    /**
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function homeAction()
    {
        $homeManager = new HomeManager($this->getPdo());
        $products = $homeManager->selectRandomProduct();

        return $this->twig->render('home.html.twig', ['products'=>$products]);
    }
}
