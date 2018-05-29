<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\StudentRepository;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends CRUDController
{
    public $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
        $this->viewFolder = 'profile';
    }


}
