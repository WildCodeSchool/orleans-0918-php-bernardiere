<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 18/10/18
 * Time: 10:05
 */

namespace Controller;


class ContactController extends AbstractController
{
    public function showContact() {
        return $this->twig->render('contact.html.twig');
    }
}