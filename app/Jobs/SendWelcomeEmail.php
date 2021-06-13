<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SebastianBergmann\Invoker\TimeoutException;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    // 2 sec after the first attempt, and 3 sec after 2nd attempt and up til 10.
    // public $backoff = [2,10];

    public $maxExceptions = 2;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // throw new Exception('Failed!');

        sleep(1);

        return $this->release(2);

        // info('Hello!');
    }

    // public function retryUntil()
    // {
    //     return now()->addMinute();
    // }
}
