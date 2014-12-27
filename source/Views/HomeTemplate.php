<?php
namespace Irishdash\Views;

class HomeTemplate extends MainTemplate
{
    public function render()
    {
        echo "Welcome home, " . $this->name;
    }
}