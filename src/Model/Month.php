<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 24/10/18
 * Time: 13:26
 */

namespace Model;


class Month
{
    private $id;
    private $numberMonth;
    private $nameMonth;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): Month
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumberMonth(): int
    {
        return $this->numberMonth;
    }

    /**
     * @param mixed $numberMonth
     */
    public function setNumberMonth($numberMonth): Month
    {
        $this->numberMonth = $numberMonth;
    }

    /**
     * @return mixed
     */
    public function getNameMonth(): int
    {
        return $this->nameMonth;
    }

    /**
     * @param mixed $nameMonth
     */
    public function setNameMonth($nameMonth): Month
    {
        $this->nameMonth = $nameMonth;
    }



}