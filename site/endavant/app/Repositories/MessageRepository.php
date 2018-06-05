<?php

namespace App\Repositories;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class MessageRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Message::class;

    public function sendMessage($message,$destination_id)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $message,
            'destination_id'=>$destination_id
        ]);
        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }

}
