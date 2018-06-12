<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Http\Requests\UserRequest;
use App\Repositories\StudentRepository;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;


class UserController extends CRUDController
{
    public $repository, $redirectRoute, $studentRepository;

    public function __construct(UserRepository $repository, StudentRepository $studentRepository)
    {
        $this->repository = $repository;
        $this->studentRepository = $studentRepository;
        $this->viewFolder = 'user';
        $this->redirectRoute = 'company.show';
        $this->formRequest = new UserRequest;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->getRules());
        $model = $this->repository->find($id);
        if (Auth::user()->id === intval($id)) {
            $this->repository->update($model, $request->all());
        }
        $item = $this->repository->find($id);
        $compid = $item->companies->first()->id;
        return redirect()->route($this->redirectRoute, $compid);


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
