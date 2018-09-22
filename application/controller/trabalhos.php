<?php

class Trabalhos extends Controller
{
    public function index()
    {
        require './application/views/_templates/header.php';
        require './application/views/trabalhos/index.php';
        require './application/views/_templates/footer.php';
    }
    public function caixa()
    {
        require './application/views/_templates/header.php';
        require './application/views/trabalhos/caixa.php';
        require './application/views/_templates/footer.php';
    }
    public function outros()
    {
        require './application/views/_templates/header.php';
        require './application/views/trabalhos/outros.php';
        require './application/views/_templates/footer.php';
    }
    
}
    