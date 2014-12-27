<?php
namespace Irishdash;

class Loader
{
    private $controller;
    private $action;
    private $urlValues;

    /**
     * Store the URL values on object creation
     *
     * @param array $urlValues
     */
    public function __construct($urlValues)
    {
        $this->urlValues = $urlValues;
        if ($this->urlValues['controller'] == "") {
            $this->controller = "home";
        } else {
            $this->controller = '\\Irishdash\\Controllers\\' . $this->urlValues['controller'] . "Controller";
        }
        if ($this->urlValues['action'] == "") {
            $this->action = "index";
        } else {
            $this->action = $this->urlValues['action'];
        }
    }

    /**
     * Establish the requested controller as an object
     *
     * @return mixed
     * @throws \Exception
     */
    public function createController()
    {
        //does the class exist?
        if (class_exists($this->controller)) {
            $parents = class_parents($this->controller);
            //does the class extend the controller class?
            if (in_array("Irishdash\\Controllers\\BaseController", $parents)) {
                //does the class contain the requested method?
                if (method_exists($this->controller, $this->action)) {
                    return new $this->controller($this->action, $this->urlValues);
                } else {
                    //bad method error
                    throw new \Exception("bad method error");
                }
            } else {
                //bad controller error
                throw new \Exception("bad controller error");
            }
        } else {
            //bad controller error
            throw new \Exception("bad controller error");
        }
    }
}