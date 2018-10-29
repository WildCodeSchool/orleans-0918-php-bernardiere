<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 24/10/18
 * Time: 13:26
 */

namespace Model;


class Months
{
 private $id;

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

}