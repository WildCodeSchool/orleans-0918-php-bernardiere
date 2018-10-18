<?php

namespace Model;

/**
 * Class Product
 *
 */
class Product
{
    private $id;

    private $title;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Product
     */
    public function setId($id): Product
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return Product
     */
    public function setTitle($title): Product
    {
        $this->title = $title;

        return $this;
    }
}
