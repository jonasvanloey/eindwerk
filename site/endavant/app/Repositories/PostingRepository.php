<?php
namespace App\Repositories;


use App\company;
use App\favorite;
use App\posting;
use App\student;
use Illuminate\Support\Facades\Auth;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class PostingRepository extends AbstractRepository
{
    protected $model = posting::class;


    public function getfavs()
    {
        if(Auth::user()){
            return favorite::where('student_id',Auth::user()->id)->get()->pluck('posting_id');
        }
        else
        {
            return null;
        }

    }
    public function getCompanyId(){
        $company_id=company::whereHas('users',function($q){
            $q->where('user_id',Auth::user()->id);
        })->first();
        return $company_id->id;
    }
    public function findJobs(){
        return posting::where('student_id',null);
    }
    //TODO delete favorites if posting is deleted

}