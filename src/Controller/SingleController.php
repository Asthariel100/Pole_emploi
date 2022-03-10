<?php
namespace App\Controller;

use App\Model\SingleModel;
use App\Controller\AbstractController;

class SingleController extends AbstractController
{
    public function index()
    {
        $singleModel = new SingleModel();
        $this->render('single.php', [
            'single' => $single
        ]);
    }
}