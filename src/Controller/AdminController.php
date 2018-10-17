<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 16/10/18
 * Time: 16:57
 */

namespace Controller;


class AdminController extends AbstractController
{
    public function adminIndex()
    {
        return $this->twig->render('/Item/index_admin.html.twig');
    }

}