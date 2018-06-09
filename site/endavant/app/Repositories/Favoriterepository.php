<?php


namespace App\Repositories;


use App\company;
use App\favorite;
use App\student;
use Illuminate\Support\Facades\Auth;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class Favoriterepository extends AbstractRepository
{
    protected $model = favorite::class;
    public function getindex(){
        $id = Auth::user()->id;
        $isCompany=company::whereHas('users', function ($q) use ($id) {
            $q->where('user_id', $id);
        })->first();
        $isStudent=student::where('user_id',$id)->first();
        if($isCompany===null && $isStudent !== null){
            $job=favorite::where('student_id', $isStudent->id)->where('company_id', null)->where('type', 'student');
            $company=favorite::where('student_id', $isStudent->id)->where('posting_id', null)->where('type', 'student');
            if (request()->has('date')) {
                $data['jobs'] = $job->orderBy('created_at','DESC')->get();
                $data['companies'] =$company->orderBy('created_at','DESC')->get();
            }
            if (request()->has('newwest')) {
                $data['jobs'] = $job->orderBy('made_on','DESC')->get();
                $data['companies'] =$company->orderBy('made_on','DESC')->get();
            }
            elseif (request()->has('oldest')) {
                $data['jobs'] = $job->orderBy('made_on','ASC')->get();
                $data['companies'] =$company->orderBy('made_on','ASC')->get();
            }
            else{
                $data['jobs'] = $job->get();
                $data['companies'] =$company->get();
            }
        }else{
            $data['students']=favorite::where('company_id',$isCompany->id)->where('type','company')->get();
        }
        return $data;
    }
}
