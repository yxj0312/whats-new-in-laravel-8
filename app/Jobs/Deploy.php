<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
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
        Redis::throttle('deployment')
            ->allow(10)
            ->every(60)
            ->block(10)
            ->then(function() {
                info('Started Deploying...');

                sleep(5);

                info('Finished Deploying!');
            });

        // 10 times to throw exception
        // with this: two works will not start at same time, start after other finished
        // Cache::lock('deployment')->block(10,function(){
        //     info('Started Deploying...');

        //     sleep(5);

        //     info('Finished Deploying!');
        // });
        
    }
}
