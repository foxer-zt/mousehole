<?php
namespace Irishdash;

class Router
{
    const C_NS = 'Irishdash\\Controllers\\';
    const C_PREFIX = 'Controller';

    protected  $controller;
    protected $action;
    protected $urlValues;
    protected $params;

    /**
     * Store the URL values on object creation.
     *
     * @param array $urlValues
     */
    public function __construct($urlValues)
    {
        $this->urlValues = $urlValues;

        $this->controller = isset($this->urlValues['controller'])
            ? $this->resolveControllerName($this->urlValues['controller'])
            : $this->getDefaultController();

        $this->action = isset($this->urlValues['action'])
            ? $this->urlValues['action']
            : $this->getDefaultAction();

        $this->params = isset($this->urlValues['params'])
            ? $this->resolveParams($this->urlValues['params'])
            : null;
    }

    /**
     * Establish the requested controller as an object
     *
     * @return mixed
     */
    public function createController()
    {
        return $this->validateController($this->controller, $this->action);
    }

    /**
     * Resolve controller name from query.
     *
     * @param string $query
     * @return string
     */
    protected function resolveControllerName($query)
    {
        return self::C_NS . ucfirst($query) . self::C_PREFIX;
    }

    /**
     * Resolve params.
     *
     * @param $query
     * @return array|string
     */
    protected function resolveParams($query)
    {
        if (strpos($query, '/') !== false) {
            $args = array();
            $params = explode('/', $query);
            for ($i = 0; $i < count($params); $i += 2) {
                $args[$params[$i]] = $params[$i + 1];
            }
            unset($params);
            return $args;
        } else {
            return $query;
        }
    }

    /**
     * Validate controller.
     *
     * @param string $controller
     * @param string $action
     * @return mixed
     * @throws \Exception
     */
    protected function validateController($controller, $action)
    {
        //does the class exist?
        if (class_exists($controller)) {
            $parents = class_parents($controller);
            //does the class extend the controller class?
            if (in_array(self::C_NS . "BaseController", $parents)) {
                return new $this->controller($this->action, $this->params);
            } else {
                //bad controller error
                throw new \Exception("Controller $controller should extend BaseController.");
            }
        } else {
            //bad controller error
            throw new \Exception("Class $controller doesn't exists.");
        }
    }

    /**
     * Get default controller name.
     *
     * @return string
     */
    protected function getDefaultController()
    {
        return $this->resolveControllerName('home');
    }

    /**
     * Get default controller action.
     *
     * @return string
     */
    protected function getDefaultAction()
    {
        return "index";
    }
}