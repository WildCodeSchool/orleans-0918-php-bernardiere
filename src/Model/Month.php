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
 private $numbermonth;
 private $namemonth;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumbermonth()
    {
        return $this->numbermonth;
    }

    /**
     * @param mixed $numbermonth
     */
    public function setNumbermonth($numbermonth)
    {
        $this->numbermonth = $numbermonth;
    }

    /**
     * @return mixed
     */
    public function getNamemonth()
    {
        return $this->namemonth;
    }

    /**
     * @param mixed $namemonth
     */
    public function setNamemonth($namemonth)
    {
        $this->namemonth = $namemonth;
    }



}