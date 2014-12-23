<?php
namespace Irishdash\Mouse;

class Stats
{
    /**
     * @var int
     */
    protected $hp;

    /**
     * @var int
     */
    protected $strength;

    /**
     * @var int
     */
    protected $baseDamage;

    /**
     * @var Stats
     */
    protected static $_instance;

    /**
     * Damage multiplier
     */
    const MULT = 1.3;

    /**
     * @constructor
     */
    private function __construct()
    {
        $this->hp = 10;
        $this->strength = 1;
    }

    /**
     *
     */
    private function __clone()
    {
        //
    }

    /**
     * Get Stats singleton
     *
     * @return Stats
     */
    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Change stats
     *
     * @param string $stat
     * @param int $value
     * @param bool $inc
     * @return void
     */
    public function changeStat($stat, $value = 1, $inc = true)
    {
        if (isset($this->$stat)) {
            $inc == false ? $this->$stat -= $value : $this->$stat += $value;
        }
    }

    /**
     * Calculate damage according to stats.
     *
     * @return float
     */
    public function getBaseDamage()
    {
        return floor(self::MULT * $this->strength);
    }
}