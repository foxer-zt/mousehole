<?php
namespace Irishdash\Views;

abstract class MainTemplate implements ViewInterface
{
    public function __construct(array $args = array())
    {
        if (!empty($args)) {
            foreach ($args as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Render this template.
     *
     * @return mixed|void
     */
    public function render()
    {
        echo 'This is template render example. Override render() method in your view to set another view.';
    }
}