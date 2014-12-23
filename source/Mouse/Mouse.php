<?php
namespace Irishdash\Mouse;

use Irishdash\Inventory\Inventory;
use Irishdash\Item\Iteminterface;
use Irishdash\Item\Weapon;

class Mouse
{
    /**
     * Mouse's name
     *
     * @var string
     */
    protected $name;

    /**
     * Mouse's inventory
     *
     * @var Inventory
     */
    protected $inventory;

    /**
     * Mouse stats
     *
     * @var Stats
     */
    protected $stats;

    /**
     * @var
     */
    protected $cheese;

    /**
     * @var Weapon
     */
    protected $weapon;

    /**
     * @constructor
     */
    public function __construct($name = 'Souris')
    {
        $this->name = $name;
        $this->stats = Stats::getInstance();
        $this->inventory = Inventory::getInstance();
    }

    /**
     * Get mouse name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get mouse stats.
     *
     * @return Stats
     */
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * Add item to inventory.
     *
     * @param Iteminterface $item
     * @return void
     */
    public function addToInventory($item)
    {
        $this->inventory->addToInventory($item);
    }

    /**
     * Calculates mouse damage.
     *
     * @return float
     */
    public function getDamage()
    {
        return isset($this->weapon)
            ? $this->stats->getBaseDamage() + $this->weapon->getDamage()
            : $this->stats->getBaseDamage();
    }

    /*
     * Warms up weapon from inventory
     *
     * @param Weapon $weapon
     * @return void
     */
    public function applyWeaponFromInventory(Weapon $weapon)
    {
        if (in_array($weapon, $this->inventory->getInventory())) {
            $this->weapon = $weapon;
        } else {
            throw new \Exception("Нет такого оружия в инвинтаре");
        }
    }


}