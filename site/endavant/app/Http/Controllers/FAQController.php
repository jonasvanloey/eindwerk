<?php

namespace App\Http\Controllers;

use App\Repositories\FAQRepository;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public $repository;

    public function __construct(FAQRepository $repository)
    {
        $this->repository = $repository;
        $this->viewFolder = 'FAQ';
    }

    public function index(Request $request){

        if($request->has('question')){
            $data['questions']=$this->repository->findFAQ($request);
        }
        else{
            $data['questions']=$this->repository->all();
        }


        return view($this->viewFolder.'.index',$data);
    }
}
