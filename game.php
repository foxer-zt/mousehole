<?php
namespace IrishdashGame;

use Irishdash\Mouse\Mouse;
use Irishdash\Item\Sword;
use Irishdash\Hole\Hole;

class Game
{
    /**
     * @constructor
     */
    public function __construct()
    {
        //
    }

    /**
     * Game init.
     *
     * @return void
     */
    public function init()
    {
        $hole = new Hole();
        $irishdash = new Mouse('Irishdash');
        $irishdash->getStats()->changeStat('strength', 4);
        $sword = new Sword();
        $irishdash->addToInventory($sword);
        $irishdash->applyWeaponFromInventory($sword);
        $hole->placeMouseInHole($irishdash);
        $hole->incDeep($irishdash);
        echo $irishdash->getDeepLevel();

    }
}


