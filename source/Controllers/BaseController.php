<?php
namespace Irishdash\Controllers;

use Irishdash\Views\ViewInterface;

/**
 * General class all controllers should extends.
 */
abstract class BaseController
{
    /**
     * @var string
     */
    protected $urlValues;

    /**
     * @var string
     */
    protected $action;

    public function __construct($action, $urlValues) {
        $this->action = $action;
        $this->urlValues = $urlValues;
    }

    /**
     * Call action method.
     *
     * @return mixed
     */
    public function executeAction() {
        return $this->{$this->action}();
    }

    /**
     * Render view template.
     *
     * @param string $viewModel
     * @param array $args
     */
    protected function render($viewModel, array $args) {
        $viewTemplate = "Irishdash\\Views\\" . ucfirst($viewModel);
        /** @var ViewInterface $viewTemplate */
        $viewTemplate = new $viewTemplate($args);
        $viewTemplate->render();
    }
}