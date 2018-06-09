<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\PostingRepository;
use App\Repositories\RatingRepository;
use App\Repositories\StudentRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends CRUDController
{
    public $repository, $postingRepository, $studentRepository, $userRepository;

    public function __construct(RatingRepository $repository, PostingRepository $postingRepository, StudentRepository $studentRepository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->postingRepository = $postingRepository;
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
        $this->viewFolder = 'rating';
    }

    public function StudentRating($posting_id, $student_id)
    {
        $posting = $this->postingRepository->find($posting_id);
        if($posting->is_finished===1){

            return view($this->viewFolder . '.rating', compact('posting_id', 'student_id'));
        }
        else{
            return redirect()->back();
        }
    }

    public function storestudentrating(Request $request, $posting_id, $student_id)
    {
        if (isset($request['star'])) {
            $posting = $this->postingRepository->find($posting_id);
            $postingids = $posting->company->users->pluck('id');
            if ($postingids->contains(Auth::user()->id)) {
                $this->repository->create([
                    'posting_id' => $posting_id,
                    'student_id' => $student_id,
                    'rating' => $request['star']

                ]);
                return redirect('inbox');
            } else {
                return redirect('inbox');
            }

        } else {

            return redirect('inbox');
        }


    }
    public function storecompanyrating(Request $request, $posting_id, $company_id)
    {
        if (isset($request['star'])) {
            $posting = $this->postingRepository->find($posting_id);
            $student = $this->studentRepository->find($posting->student_id);
            $user = $this->userRepository->find($student->user_id);
            if ($user->id===Auth::user()->id) {
                $this->repository->create([
                    'posting_id' => $posting_id,
                    'company_id' => $company_id,
                    'rating' => $request['star']

                ]);
                return redirect('inbox');
            } else {
                return redirect('inbox');
            }

        } else {

            return redirect('inbox');
        }


    }
    //
}
