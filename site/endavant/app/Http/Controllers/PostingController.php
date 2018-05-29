<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\PostingRepository;
use Illuminate\Http\Request;

class PostingController extends CRUDController
{
    public $repository;

    public function __construct(PostingRepository $repository)
    {
        $this->repository = $repository;
        $this->viewFolder = 'postings';
    }
    public function index()
    {
        $data['items'] = $this->repository->all();
        $data['favs']=$this->repository->getfavs();

        return view($this->viewFolder . '.index', $data);
    }

}
