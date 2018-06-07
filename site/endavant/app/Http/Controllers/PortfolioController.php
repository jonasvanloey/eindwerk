<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public $repository;

    public function __construct(PortfolioController $repository)
    {
        $this->repository = $repository;
        $this->viewFolder = 'portfolio';
    }
}
