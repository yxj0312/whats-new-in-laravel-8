<?php

use Illuminate\Support\Facades\Route;
use App\Events\GiftCertificatePurchased;
use App\Jobs\ProcessPayment;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Bus;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    event(new GiftCertificatePurchased());

    // SendWelcomeEmail::dispatch();

    // foreach (range(1, 100) as $i) {
    //    SendWelcomeEmail::dispatch();
    // }
    
    // ProcessPayment::dispatch()->onQueue('payments');

    // $chain = [
    //     new App\Jobs\PullRepo(),
    //     new App\Jobs\RunTests(),
    //     new App\Jobs\Deploy()
    // ];

    // php artisan queue:batches-table
    $batch = [
        new App\Jobs\PullRepo('laracasts/project1'),
        new App\Jobs\PullRepo('laracasts/project2'),
        new App\Jobs\PullRepo('laracasts/project3'),
    ];

    Bus::batch($batch)
    ->allowFailures()
    ->dispatch();
    
    return view('welcome');
});

Route::get('/downloads', function() {
    return 'some File::download() call';
})->middleware('throttle:downloads');
