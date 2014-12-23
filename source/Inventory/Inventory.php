<?php
namespace Irishdash\Inventory;

use Irishdash\Item\Iteminterface;

class Inventory
{
    protected static $_instance;
    protected $inventory = array();

    private function __construct()
    {
       //
    }

    private function __clone()
    {
        //
    }

    /**
     * Get Inventory singleton.
     *
     * @return Inventory
     */
    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Get inventory.
     *
     * @return array
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * Add item to inventory.
     *
     * @param $item
     */
    public function addToInventory($item)
    {
        if ($item instanceof Iteminterface) {
            array_push($this->inventory, $item);
        }
    }



}