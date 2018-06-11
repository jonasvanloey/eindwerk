<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\StudentRepository;
use App\Repositories\UserRepository;
use App\student;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

class StudentController extends CRUDController
{
    public $repository, $userrepository;

    public function __construct(StudentRepository $repository, UserRepository $userrepository)
    {
        $this->repository = $repository;
        $this->userrepository = $userrepository;
        $this->viewFolder = 'profile';
        $this->NameOfRoute='profile';
    }
    public function show($id){
        $data['item'] = $this->repository->find($id);
        Mapper::map($data['item']['user']['latitude'],$data['item']['user']['longtitude'],['zoom' => 15, 'markers' => ['animation' => 'DROP'],'mapTypeControl'=>false,'streetViewControl'=>false]);

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

       if( Auth::check()&& $data['item']['user']->id===Auth::user()->id){
            return view($this->viewFolder . '.edit', $data);
        }
        return redirect()->route('home');

    }
    public function update(Request $request, $id)
    {
        $data['item'] = $this->repository->find($id);

        if( Auth::check()&& $data['item']['user']->id===Auth::user()->id) {
            $user = $this->userrepository->find(Auth::user()->id);
            $student = $this->repository->find($id);
            $this->userrepository->update($user, $request['data']['user']);
            $this->repository->update($student, ['description' => $request['description']]);
            return redirect()->route($this->NameOfRoute . '.show', $student->id);
        }
        return redirect()->route('home');
    }
    public function uploadImage( Request $request,$id)
    {

        $store = Storage::disk('s3');
        $student = $this->repository->find($id);
        $model = $this->userrepository->find($student->user_id);
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
