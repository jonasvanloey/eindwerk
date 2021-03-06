<?php

namespace App\Mail;

use App\posting;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserNotChosen extends Mailable
{
    use Queueable, SerializesModels;

    private $user, $posting;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, posting $posting)
    {
        $this->user = $user;
        $this->posting = $posting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['user'] = $this->user;
        $data['posting'] = $this->posting;
        $this->subject('U bent jammer genoeg niet gekozen voor volgend project');
        return $this->view('mails.notchosen', $data);
    }
}
