<?php
namespace Irishdash\Controllers;

class HomeController extends BaseController
{
    /**
     * Home action.
     *
     * @return void.
     */
    public function index()
    {
        $this->render('Index');
    }

    /**
     * Index action.
     *
     * @param array $args
     * @return void.
     */
    public function home($args)
    {
        $this->render('Home', $args);
    }
}