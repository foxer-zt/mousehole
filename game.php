<?php
namespace IrishdashGame;

use Irishdash\Mouse\Mouse;
use Irishdash\Item\Sword;

class Game
{
    /**
     * @constructor
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Game init.
     *
     * @return void
     */
    public function init()
    {
        $irishdash = new Mouse('Irishdash');
        $this->combatLog($irishdash);

        $irishdash->getStats()->changeStat('strength', 4);
        $this->combatLog($irishdash);

        $sword = new Sword();
        $irishdash->addToInventory($sword);
        $irishdash->applyWeaponFromInventory($sword);
        $this->combatLog($irishdash);
    }

    /**
     * Displays mouse attack damage.
     *
     * @param Mouse $mouse
     * @return void
     */
    public function combatLog(Mouse $mouse)
    {
        echo "{$mouse->getName()} aтакует на {$mouse->getDamage()} урона\n";
    }
}


