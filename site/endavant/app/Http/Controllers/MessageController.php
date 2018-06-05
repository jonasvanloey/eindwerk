<?php

namespace App\Http\Controllers;

use App\Repositories\ChatgroupRepository;
use App\Repositories\MessageRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class MessageController extends Controller
{

    public $repository, $chatgroupRepository, $studentRepository;

    public function __construct(MessageRepository $repository, ChatgroupRepository $chatgroupRepository, StudentRepository $studentRepository)
    {
        $this->repository = $repository;
        $this->chatgroupRepository = $chatgroupRepository;
        $this->studentRepository = $studentRepository;
//        $this->viewFolder = 'favorite';
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Auth::user()->chatgroups;
        return view('messages.index', compact('groups'));
    }

    public function detail($id)
    {
        $data['item'] = $this->chatgroupRepository->find($id);
        $chatgroupids = $data['item']->users->pluck('id');
        if ($chatgroupids->contains(Auth::user()->id)) {
            $studentids = $this->studentRepository->all()->pluck('user_id');
            $students = $data['item']->users;
            foreach ($students as $student) {
                if ($studentids->contains($student->id)) {
                    $data['student'] = $student;
                    if ($data['item']->is_active===1){
                        $data['active']=1;
                    } else {
                        $data['active']=0;
                    }
                }
            }
            $data['destination_id'] = $id;
            return view('messages.detail', $data);
        } else {
            return redirect('inbox');
        }

    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages($id)
    {
        $chatgroup = $this->chatgroupRepository->find($id);
        $chatgroupids = $chatgroup->users->pluck('id');
        if ($chatgroupids->contains(Auth::user()->id)) {
            return Message::with('user')->where('destination_id', $id)->get();
        } else {
            return redirect('home');
        }

    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage($id, Request $request)
    {
        $chatgroup = $this->chatgroupRepository->find($id);
        if($chatgroup->is_active === 1){
            return $this->repository->sendMessage($request['message'], $id);
        }
        else{
            return null;
        }

    }
    //
}
