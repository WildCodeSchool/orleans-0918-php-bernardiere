<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 24/10/18
 * Time: 13:22
 */

namespace Model;


class Category
{
    private $categoryId;
    private $title;

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

}