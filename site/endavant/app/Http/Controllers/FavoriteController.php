<?php

namespace App\Http\Controllers;

use App\company;
use App\favorite;
use App\Http\Controllers\Admin\CRUDController;
use App\posting;
use App\Repositories\CompanyRepository;
use App\Repositories\Favoriterepository;
use App\Repositories\StudentRepository;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends CRUDController
{
    public $repository, $studentRepository, $companyRepository;

    public function __construct(Favoriterepository $repository, StudentRepository $studentRepository, CompanyRepository $companyRepository)
    {
        $this->repository = $repository;
        $this->studentRepository = $studentRepository;
        $this->companyRepository = $companyRepository;
        $this->viewFolder = 'favorite';
    }

    public function index()
    {
        $data = $this->repository->getindex();
        return view($this->viewFolder . '.index', $data);

    }

    public function addToFave(Request $request)
    {

        if (isset($request['job_id'])) {
            $user_id = Auth::user()->id;
            $student = $this->studentRepository->findWhere(['user_id' => $user_id])->first();
            $created = posting::where('id', $request['job_id'])->first();
            $check = favorite::where('student_id', $student->id)->where('posting_id', $request['job_id'])->first();
            if ($check === null) {
                $fav = new favorite();
                $fav->posting_id = $request['job_id'];
                $fav->student_id = $student->id;
                $fav->type = 'student';
                $fav->made_on = $created->created_at;
                $fav->save();
                return response('success');
            } else {
                favorite::where('student_id', $student->id)->where('posting_id', $request['job_id'])->delete();
                return response('success');
            }


        } else {
            return response('fail');
        }

    }

    public function addCompToFave($company_id)
    {
        $user_id = Auth::user()->id;
        $student = $this->studentRepository->findWhere(['user_id' => $user_id])->first();
        $created = $this->companyRepository->find($company_id);
        $check = favorite::where('student_id', $student->id)->where('company_id', $company_id)->first();
        if ($check === null) {
            $fav = new favorite();
            $fav->company_id = $company_id;
            $fav->student_id = $student->id;
            $fav->type = 'student';
            $fav->made_on = $created->created_at;
            $fav->save();
            return redirect()->back();
        } else {
            favorite::where('student_id', $student->id)->where('company_id', $company_id)->delete();
            return redirect()->back();
        }

    }
    public function addStudToFave($student_id)
    {
        $company_id = Auth::user()->companies[0]->id;
        $created = $this->studentRepository->find($student_id);
        $check = favorite::where('company_id', $company_id)->where('student_id', $student_id)->first();
        if ($check === null) {
            $fav = new favorite();
            $fav->company_id = $company_id;
            $fav->student_id = $student_id;
            $fav->type = 'company';
            $fav->made_on = $created->created_at;
            $fav->save();
            return redirect()->back();
        } else {
            favorite::where('company_id', $company_id)->where('student_id', $student_id)->delete();
            return redirect()->back();
        }

    }
    //
}
