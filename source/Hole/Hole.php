<?php
namespace Irishdash\Hole;

use Irishdash\Mouse\Mouse;
class Hole
{
    /**
     * Mice in hole.
     *
     * @var Mouse
     */
    protected $mice = array();

    /**
     * place mouse in hole.
     *
     * @param Mouse $mouse
     * @return void
     */
    public function placeMouseInHole(Mouse $mouse)
    {
        array_push($this->mice, $mouse);
    }

    /**
     * Inc deep level.
     *
     * @param Mouse $mouse
     * @return void
     */
    public function incDeep(Mouse $mouse)
    {
        $mouseIndex = $this->getMouseIndex($mouse);
        $mouse->deepLevel += $mouseIndex !== null ? 1 : 0;
    }

    /**
     * Dec deep level.
     *
     *
     * @param Mouse $mouse
     * @throws \Exception
     * @return void
     */
    public function decDeep(Mouse $mouse)
    {
        $mouseIndex = $this->getMouseIndex($mouse);
        $mouse->deepLevel -= $mouseIndex !== null || $mouse->deepLevel > 1 ? 1 : 0;
    }

    /**
     * Get hole mice.
     *
     * @return array|Mouse
     */
    public function getMice()
    {
        return $this->mice;
    }

    /**
     * Check if selected mouse in hole and get it index.
     *
     * @param Mouse $mouse
     * @return bool
     */
    protected function getMouseIndex(Mouse $mouse)
    {
        if (in_array($mouse, $this->mice)) {
            return array_search($mouse, $this->mice);
        } else {
            return null;
        }
    }
}