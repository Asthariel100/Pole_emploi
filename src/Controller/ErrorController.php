<?php

namespace App\Controller;

use App\Controller\AbstractController;

class ErrorController extends AbstractController
{
    public function error404()
    {
        $this->render('404.php');
    }
}