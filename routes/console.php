<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;


// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
//     Log::info('Inspiring quote displayed');
// })->purpose('Display an inspiring quote')->everySecond();

// // I need to send notification  who wins the auction ..there is is a table name bidder_registration and auction_times from this find whcih auction has finished and then find the highest bidder from bidder_registration table and send notification to tha


Schedule::command('notification:for-auction-winner')->everySecond();
