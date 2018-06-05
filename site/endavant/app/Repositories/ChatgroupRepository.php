<?php
namespace App\Repositories;

use App\Chatgroup;
use Illuminate\Support\Facades\Auth;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class ChatgroupRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Chatgroup::class;

    public function findChatgroup($posting_id){
        return Chatgroup::whereHas('users',function($q){
            $q->where('user_id',Auth::user()->id);
        })->where('posting_id',$posting_id)->get();
    }

}