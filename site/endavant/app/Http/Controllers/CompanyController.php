<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends CRUDController
{
    public $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
        $this->viewFolder = 'company';
    }


}
