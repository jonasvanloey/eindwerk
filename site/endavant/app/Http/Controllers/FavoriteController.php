<?php

namespace App\Http\Controllers;

use App\company;
use App\favorite;
use App\Http\Controllers\Admin\CRUDController;
use App\posting;
use App\Repositories\Favoriterepository;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends CRUDController
{
    public $repository;

    public function __construct(Favoriterepository $repository)
    {
        $this->repository = $repository;
        $this->viewFolder = 'favorite';
    }
    public function index(){
       $data = $this->repository->getindex();
        return view($this->viewFolder . '.index', $data);

    }
    public function addToFave(Request $request){

        if(isset($request['job_id'])){
            $user_id=Auth::user()->id;
            $created=posting::where('id',$request['job_id'])->first();
            $check=favorite::where('student_id',$user_id)->where('posting_id',$request['job_id'])->first();
            if($check===null){
                $fav = new favorite();
                $fav->posting_id=$request['job_id'];
                $fav->student_id=$user_id;
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
