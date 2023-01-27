<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending daily notification';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails=User::pluck('email')->toArray();
        foreach ($emails as $email){
            Mail::to($email)->send(new \App\Mail\Notify());
        }
    }
}
