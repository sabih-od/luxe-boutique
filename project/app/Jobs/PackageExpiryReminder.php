<?php

namespace App\Jobs;

use App\Classes\GeniusMailer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class PackageExpiryReminder implements ShouldQueue
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
        $gs = DB::table('generalsettings')->find(1);
        $d1 = Carbon::now()->format('Y-m-d');
        $d2 = Carbon::now()->addDays(4)->format('Y-m-d');

        $users = User::whereBetween('date' , [$d1, $d2])->get();
        foreach ($users as $user) {
            $package = $user->subscribes()->where('status',1)->orderBy('id','desc')->first();
            $msg = "Dear {$user->name},<br><br>This is a reminder email. Your package {$package->title} is expiring on {$user->date}. <br><br>{$gs->title}";
            $data = [
                'to' => $user->email,
                'subject' => "Package Expiring Soon!",
                'body' => $msg,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        }
    }
}
