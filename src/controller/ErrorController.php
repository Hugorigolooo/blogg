<?php
namespace App\src\controller;
use App\src\DAO\ArticleDAO;

class ErrorController
{
    public function errorNotFound()
    {
        require '../templates/error_404.html';
    }

    public function errorServer()
    {
        require '../templates/error_500.html';
    }
}