<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

class CompanyController extends CRUDController
{
    public $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
        $this->viewFolder = 'company';
        $this->NameOfRoute = 'company';
    }
    public function show($id){
        $data['item'] = $this->repository->find($id);
        Mapper::map($data['item']['latitude'],$data['item']['longtitude'],['zoom' => 15, 'markers' => ['animation' => 'DROP'],'mapTypeControl'=>false,'streetViewControl'=>false]);
        if($data['item']->ratings->avg('rating')===null){
            $data['avg']=0;
        }
        else{
            $data['avg']=$data['item']->ratings->avg('rating');
        }
        return view($this->viewFolder . '.detail', $data);

    }
    public function edit($id)
    {
        $data['item'] = $this->repository->find($id);

        if( Auth::check()&& $data['item']->users->pluck('id')->contains(Auth::user()->id)){
            return view($this->viewFolder . '.edit', $data);
        }
        return redirect()->route('home');

    }
    public function update(Request $request, $id)
    {

        $company=$this->repository->find($id);
        if( Auth::check()&& $company->users->pluck('id')->contains(Auth::user()->id)) {
            $this->repository->update($company, $request['company']);
            $this->repository->update($company, ['description' => $request['description']]);
            return redirect()->route($this->NameOfRoute . '.show', $company->id);
        }
        return redirect()->route('home');
    }
    public function uploadImage( Request $request,$id)
    {

        $store = Storage::disk('s3');
        $model = $this->repository->find($id);
        $key = $request->input('key');
        $base64 = $request->input('image');
        [$mime, $data] = explode(';', $base64);
        [$filetype, $ext] = explode('/', $mime);
        [$prefix, $imageString] = explode(',', $data);
        $raw = base64_decode($imageString);
        $fileName = $request->input('resource') . '/' . Uuid::generate(4) . '.' . $ext;

        if ($store->exists($model->{$key})) {
            $store->delete($model->{$key});
        }
        $store->put($fileName, $raw, 'public');
        $model->{$key} = Storage::disk('s3')->url($fileName);
        $model->save();

        return response()->json([
            'url' => Storage::disk('s3')->url($fileName)
        ]);

    }

}
