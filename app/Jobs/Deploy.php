<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class Deploy implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        // Redis::tunnel('deployment')
        //     ->limit(5)
        // only allow 10 deployment each 60 sec
        // Redis::throttle('deployment')
        //     ->allow(10)
        //     ->every(60)
        //     ->block(10)
        //     ->then(function() {
        //         info('Started Deploying...');

        //         sleep(5);

        //         info('Finished Deploying!');
        //     });

        // 10 times to throw exception
        // with this: two works will not start at same time, start after other finished
        // Cache::lock('deployment')->block(10,function(){
        //     info('Started Deploying...');

        //     sleep(5);

        //     info('Finished Deploying!');
        // });


        info('Started Deploying...');

        sleep(5);

        info('Finished Deploying!');
        
    }

    public function middleware()
    {
        // prevent running this job if another same job is in progress
        // the middleware will release the job back to the queue, it won't block like we have seen Redis limit and Cache lock
        // and it won't throw an exception
        return [
            // sec argument for release delay, here is 10 sec
            // now when it releases the job, it is going to be delay 10sec before a worker can attempt it again.
            new WithoutOverlapping('deployments', 10)
        ];
    }
}
