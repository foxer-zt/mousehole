<?php
namespace Irishdash\Controllers;

class HomeController extends BaseController
{
    /**
     * Home index action.
     *
     * @return void.
     */
    public function index()
    {
        $this->render('HomeTemplate', array('name' => 'Irishdash'));
    }
}