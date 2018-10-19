<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 16/10/18
 * Time: 14:36
 */

namespace Controller;


class ConceptController extends AbstractController
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function showConcept()
    {
        return $this->twig->render('concept.html.twig');
    }
}