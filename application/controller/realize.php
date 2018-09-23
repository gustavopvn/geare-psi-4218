<?php

class Realize extends Controller
{
    public function index()
    {
        require './application/views/_templates/header.php';
        require './application/views/realize/index.php';
        require './application/views/_templates/footer.php';
    }
    public function relatorioUnidade($param = 0)
    {
        $realize = $this->loadModel('RealizeModel');
        if ($param == 0 OR $param == NULL)
        {
            $baseRealize = $realize->getBaseRealizeAll();
        }
        else
        {
            $baseRealize = $realize->getBaseRealize($param);
        }
        require './application/views/_templates/header.php';
        require './application/views/realize/relatorioUnidade.php';
        require './application/views/_templates/footer.php';
    }
}
