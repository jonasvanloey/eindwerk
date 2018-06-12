<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Http\Requests\PortfolioRequest;
use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;

class PortfolioController extends CRUDController
{
    public $repository;

    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
        $this->viewFolder = 'portfolio';
        $this->formRequest = new PortfolioRequest;
    }
    public function getportfolio($id, $portfolio_id){
        $data['item']=$this->repository->find($portfolio_id);

        return view($this->viewFolder.'.detail',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->getRules());
        $portfolio=$this->repository->find($id);
        $item = $this->repository->update($portfolio, $request->all());

        return redirect()->route($this->viewFolder . '.show', $id);
    }


}
