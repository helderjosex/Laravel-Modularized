<?php

namespace App\Applications\Site\Http\Controllers;

class HomeController extends BaseController
{

    //protected $viewNamespace = null;

    /**
     * Show the application index.
     *
     * @return Response
     */
    public function index()
    {
        return $this->view('home');
    }

}