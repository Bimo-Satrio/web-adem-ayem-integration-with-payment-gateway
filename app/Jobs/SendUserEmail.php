<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendUserEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $userCreate;
    /**
     * Create a new job instance.
     * 
     * @return void
     */
    public function __construct($userCreate)
    {
        $this->userCreate = $userCreate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        event(new Registered($this->userCreate));
    }
}
