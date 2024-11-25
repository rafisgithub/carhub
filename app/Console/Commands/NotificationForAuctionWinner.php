<?php

namespace App\Console\Commands;

use App\Models\AuctionTime;
use App\Models\BidderRegistration;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Http;

class NotificationForAuctionWinner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:for-auction-winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // info("Cron Job running at ". now());

       $auctions = AuctionTime::where('end_time', '>', now())->get();

       foreach($auctions as $auction) {
              $winner = BidderRegistration::where('car_id', $auction->car_id)->orderBy('bit_amount', 'desc')->first();
              $all_bidder = BidderRegistration::where('user_id','!=',$winner->user_id)->where('car_id', $auction->car_id)->pluck('user_id')->toArray();
              
       }
    }

}
