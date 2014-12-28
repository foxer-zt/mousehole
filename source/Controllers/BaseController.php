<?php
namespace Irishdash\Controllers;

use Irishdash\Views\ViewInterface;

/**
 * General class all controllers should extends.
 */
abstract class BaseController
{
    const V_NS = 'Irishdash\\Views\\';
    const V_PREFIX = 'Template';

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
        return is_array($this->action)
            ? $this->{$this->action['action']}($this->action['args'])
            : $this->{$this->action}();
    }

    /**
     * Render view template.
     *
     * @param string $viewModel
     * @param array $args
     */
    protected function render($viewModel, array $args = array()) {
        $viewTemplate = $this->resolveTemplateName($viewModel);
        /** @var ViewInterface $viewTemplate */
        $viewTemplate = new $viewTemplate($args);
        $viewTemplate->render();
    }

    /**
     * Resolve template name.
     *
     * @param string $view
     * @return string
     */
    protected function resolveTemplateName($view)
    {
        return self::V_NS . ucfirst($view) . self::V_PREFIX;
    }
}