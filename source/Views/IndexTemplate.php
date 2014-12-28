<?php
namespace Irishdash\Views;

class IndexTemplate extends MainTemplate
{
    public function render()
    {
        echo <<<HTML
        Welcome in index page! <br>
        Here you can create new <a href = "game/createMouse/name/Irishdash">mouse</a>
HTML;
    }
}