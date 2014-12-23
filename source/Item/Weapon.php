<?php
namespace Irishdash\Item;

abstract class Weapon implements Iteminterface
{
    /*
     * $var string
     */
    protected $name;

    /*
     * $var int
     */
    protected $baseDamage;

    /**
     * @return mixed
     */
    public function getItemName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getItemStats()
    {
        return $this->baseDamage;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->baseDamage;
    }
}