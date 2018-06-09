<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;


class UserController extends CRUDController
{
    public $repository, $redirectRoute;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
        $this->viewFolder='user';
        $this->redirectRoute='company.show';
    }
    public function update(Request $request, $id)
    {
        $model=$this->repository->find($id);
        if(Auth::user()->id===intval($id)){
            $this->repository->update($model, $request->all());
        }
        $item=$this->repository->find($id);
        $compid=$item->companies->first()->id;
        return redirect()->route($this->redirectRoute, $compid);


    }



}
