<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 12/10/18
 * Time: 14:35
 */

namespace Controller;


class HomeController extends AbstractController
{
    public function homeAction()
    {
        return $this->twig->render('home.html.twig');
    }
}