<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class CRUDController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $repository;
    public $viewFolder;
    public $routeName;
    public $formRequest;
    public $redirectIndex = false;
    public $pagination = true;

    public function index()
    {
        $data['items'] = $this->repository->all();

        return view($this->viewFolder . '.index', $data);
    }
    public function show($id){
        $data['item'] = $this->repository->find($id);


        return view($this->viewFolder . '.detail', $data);
    }
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route($this->viewFolder . '.index');
    }

    public function create()
    {

        return view($this->viewFolder . '.create');
    }
    public function store(Request $request)
    {
        $item = $this->repository->create($request->all());

        return redirect()->route($this->NameOfRoute  . '.index', $item->id);
    }
    public function edit($id)
    {
        $data['item'] = $this->repository->find($id);

        return view($this->viewFolder . '.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $model=$this->repository->find($id);
        $this->repository->update($model, $request->all());
        $item=$this->repository->find($id);
        return redirect()->route($this->redirectRoute, $item->id);
    }

    //TODO checken of de functies hier onder wel gebruikt worden.







    public function sort(Request $request)
    {
        $this->repository->sort($request->all());
    }

    public function dataTable(Request $request)
    {
        return $this->repository->dataTable($request->all());
    }

    protected function getRules()
    {
        if ($this->formRequest) {
            return $this->formRequest->rules();
        }

        return [];
    }
}
