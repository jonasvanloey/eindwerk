<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\PostingRepository;
use App\Repositories\RatingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends CRUDController
{
    public $repository, $postingRepository;

    public function __construct(RatingRepository $repository, PostingRepository $postingRepository)
    {
        $this->repository = $repository;
        $this->postingRepository = $postingRepository;
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
    //
}
