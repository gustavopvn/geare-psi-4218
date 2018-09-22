<?php

class Realize extends Controller
{
    public function index()
    {
        require './application/views/_templates/header.php';
        require './application/views/realize/index.php';
        require './application/views/_templates/footer.php';
    }
    public function relatorioUnidade()
    {
        require './application/views/_templates/header.php';
        require './application/views/realize/relatorioUnidade.php';
        require './application/views/_templates/footer.php';
    }
    
}
    