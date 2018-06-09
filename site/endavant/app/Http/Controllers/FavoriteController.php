<?php

namespace App\Http\Controllers;

use App\company;
use App\favorite;
use App\Http\Controllers\Admin\CRUDController;
use App\posting;
use App\Repositories\Favoriterepository;
use App\Repositories\StudentRepository;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends CRUDController
{
    public $repository, $studentRepository;

    public function __construct(Favoriterepository $repository, StudentRepository $studentRepository)
    {
        $this->repository = $repository;
        $this->studentRepository = $studentRepository;
        $this->viewFolder = 'favorite';
    }
    public function index(){
       $data = $this->repository->getindex();
        return view($this->viewFolder . '.index', $data);

    }
    public function addToFave(Request $request){

        if(isset($request['job_id'])){
            $user_id=Auth::user()->id;
            $student=$this->studentRepository->findWhere(['user_id'=>$user_id])->first();
            $created=posting::where('id',$request['job_id'])->first();
            $check=favorite::where('student_id',$user_id)->where('posting_id',$request['job_id'])->first();
            if($check===null){
                $fav = new favorite();
                $fav->posting_id=$request['job_id'];
                $fav->student_id=$student->id;
                $fav->type='student';
                $fav->made_on=$created->created_at;
                $fav->save();
                return response('success');
            }
            else{
                favorite::where('student_id',$user_id)->where('posting_id',$request['job_id'])->delete();
                return response('success');
            }


        }
        else{
            return response('fail');
        }

    }
    //
}
