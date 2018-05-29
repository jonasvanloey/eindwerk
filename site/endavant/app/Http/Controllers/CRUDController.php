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

        Session::flash('success', 'Item was deleted successfully!');

        return $this->redirectIndex ? redirect()->route($this->viewFolder . '.index') : redirect()->route($this->viewFolder . '.index');
    }

    public function create()
    {
        $data = $this->repository->getFormData();

        return view($this->viewFolder . '.create', $data);
    }


    //TODO checken of de functies hier onder wel gebruikt worden.


    public function store(Request $request)
    {
        $this->validate($request, $this->getRules());
        $item = $this->repository->save($request->all());
        Session::flash('success', 'Item was created successfully!');

        return $this->redirectIndex ? redirect()->route('admin.' . $this->routeName . '.index',
            $item->id) : redirect()->route('admin.' . $this->routeName . '.edit', $item->id);
    }

    public function edit($id)
    {
        $data = $this->repository->getFormData($id);
        $data['item'] = $this->repository->getById($id);

        return view($this->viewFolder . '.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->getRules());
        $item = $this->repository->update($id, $request->all());
        Session::flash('success', 'Item was updated successfully!');

        return $this->redirectIndex ? redirect()->route('admin.' . $this->routeName . '.index',
            $item->id) : redirect()->route('admin.' . $this->routeName . '.edit', $item->id);
    }



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
