<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\StudentRepository;
use App\Repositories\UserRepository;
use App\student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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



}
