<?php

namespace App\Jobs;

use App\Mail\UserNotChosen;
use App\posting;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendUserNotChosen implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $user, $posting;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, posting $posting)
    {
        $this->user=$user;
        $this->posting=$posting;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new UserNotChosen($this->user,$this->posting));
    }
}
