<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\PostingRepository;
use App\Repositories\StudentRepository;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyJobController extends CRUDController
{
    public $repository, $studentRepository;

    public function __construct(PostingRepository $repository, StudentRepository $studentRepository)
    {
        $this->repository = $repository;
        $this->studentRepository = $studentRepository;
        $this->viewFolder = 'myjobs';
    }
    public function index(){
        $student=$this->studentRepository->findWhere(['user_id'=>Auth::user()->id])->first();
        $finished=$this->repository->orderBy('updated_at','DESC')->findWhere([
            'student_id'=>$student->id,
            'is_finished'=>1
        ]);
        $data['finished']=$finished;
        $not_finished=$this->repository->orderBy('updated_at','DESC')->findWhere([
            'student_id'=>$student->id,
            'is_finished'=>0
        ]);
        $data['not_finished']=$not_finished;
        return view($this->viewFolder.'.index',$data);
    }
    public function show($id)
    {
        $data['item'] = $this->repository->find($id);
        if ($data['item']->student_id !== null) {
            $student = $this->studentRepository->findWhere(['user_id' => Auth::user()->id]);
            if ($data['item']->student_id === $student[0]->id) {
                Mapper::map($data['item']['company']['latitude'], $data['item']['company']['longtitude'], ['zoom' => 15, 'markers' => ['animation' => 'DROP'], 'mapTypeControl' => false, 'streetViewControl' => false]);
                return view($this->viewFolder . '.detail', $data);
            } else {
                return redirect('jobs');
            }
        } else {
            Mapper::map($data['item']['company']['latitude'], $data['item']['company']['longtitude'], ['zoom' => 15, 'markers' => ['animation' => 'DROP'], 'mapTypeControl' => false, 'streetViewControl' => false]);
            return view($this->viewFolder . '.detail', $data);
        }
    }

}
