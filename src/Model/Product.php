<?php

namespace Model;

/**
 * Class Product
 *
 */
class Product
{
    private $id;

    private $name;

    private $product_begin;
    private $product_end;
    private $image;
    private $description_product;
    private $category_id;


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
    public function setId(int $id): Product
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param mixed $name_product
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProductBegin(): int
    {
        return $this->product_begin;
    }

    /**
     * @param mixed $product_begin
     */
    public function setProductBegin(int $product_begin)
    {
        $this->product_begin = $product_begin;
    }

    /**
     * @return mixed
     */
    public function getProductEnd(): int
    {
        return $this->product_end;
    }

    /**
     * @param mixed $product_end
     */
    public function setProductEnd(int $product_end)
    {
        $this->product_end = $product_end;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDescriptionProduct(): string
    {
        return $this->description_product;
    }

    /**
     * @param mixed $description_product
     */
    public function setDescriptionProduct(string $description_product)
    {
        $this->description_product = $description_product;
    }

    /**
     * @return mixed
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId(int $category_id)
    {
        $this->category_id = $category_id;
    }
}
