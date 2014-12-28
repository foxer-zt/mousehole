<?php
namespace Irishdash\Controllers;

use Irishdash\Mouse\Mouse;

class GameController extends BaseController
{
    public function createMouse($args)
    {
        extract($args);
        $mouse = new Mouse($name);
        echo "Hi, my name is " . $mouse->getName();
    }
}