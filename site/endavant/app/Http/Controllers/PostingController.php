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
        $this->NameOfRoute = 'jobs';
    }
    public function index()
    {
        $data['items'] = $this->repository->all();
        $data['favs']=$this->repository->getfavs();

        return view($this->viewFolder . '.index', $data);
    }
    public function store(Request $request){
        $item = $this->repository->create([
            'title'=>$request['title'],
            'reason'=>$request['reason'],
            'description'=>$request['description'],
            'company_id'=>$this->repository->getCompanyId(),
            'postingtype_id'=>1

        ]);
       return redirect()->route($this->NameOfRoute . '.show', $item->id);
    }

}
