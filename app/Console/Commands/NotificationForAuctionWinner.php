<?php

namespace App\Console\Commands;

use App\Mail\AuctionWinnerMail;
use App\Models\AuctionTime;
use App\Models\BidderRegistration;
use App\Models\Car;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\error;

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


        // count the number of bidders for the car
        $bidders = BidderRegistration::where('car_id', $auction->car_id)->count();

       if($bidders > 0) {
          // find winner of the auction and send him a notification from email
          $winner = BidderRegistration::where('car_id', $auction->car_id)->orderBy('bit_amount', 'desc')->first();
          
          $user = User::where('id', $winner->user_id)->first();
          $car_id = $auction->car_id;
          $car_info = Car::where('id', $car_id)->first();
          $to = $user->email;



            try {
            $x =  Mail::to($to)->send(new AuctionWinnerMail($user, $car_info));
            if($x){
               info('Mail sent to ' . $to);
            }
           } catch (\Exception $e) {
               info(error('Mail error: ' . $e->getMessage()));
           }

       }else{
            info('No bidders');
       }

       }
    }

}
